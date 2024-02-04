<?php

namespace App\Http\Controllers;

use App\Models\AllPlants;
use App\Models\Orders;
use App\Models\PlantsUsersCarts;
use App\Models\Garden;
use App\Models\Ratings;
use App\Models\Search;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $category = "SHOW COLUMNS FROM all_plants WHERE Field = 'category'";
        $subCategory = "SHOW COLUMNS FROM all_plants WHERE Field = 'sub_category'";
        DB::statement($category);
        DB::statement($subCategory);
        $categoryColumnType = DB::select($category)[0]->Type;
        $subCategoryColumnType = DB::select($subCategory)[0]->Type;
        preg_match("/^enum\((.*)\)$/", $categoryColumnType, $categoryMatches);
        preg_match("/^enum\((.*)\)$/", $subCategoryColumnType, $subCategoryMatches);
        $categories = array_map('trim', explode(',', str_replace('\'', '', $categoryMatches[1])));
        $subCategories = array_map('trim', explode(',', str_replace('\'', '', $subCategoryMatches[1])));
        $cartItems = 0;
        if (Auth::user()) {
            $cartItems = PlantsUsersCarts::where('user_id', Auth::user()->id)->count();
        }
        $topPlants = [];
        $searchStr = Search::where('exists', 1)->select('searchString')->take(10)->get();
        foreach ($searchStr as $key => $value) {
            $topPlants[] = AllPlants::where('globalname', 'like', '%' . $value->searchString . '%')
                ->orwhere('localname', 'like', '%' . $value->searchString . '%')->select('id', 'globalname', 'localname', 'offer_price', 'photo_1')->first();
        }
        $plants = AllPlants::with(['garden', 'ratings'])->latest()->paginate(10);
        $newPlants = AllPlants::whereBetween('created_at', [now()->subDays(30), now()])->select('id', 'globalname', 'offer_price', 'photo_1', 'category', 'details', )->take(10)->get();
        $countPlant = AllPlants::count();
        return view('home.main', compact('countPlant', 'plants', 'categories', 'subCategories', 'cartItems', 'topPlants', 'newPlants'));
    }
    public function searchKey()
    {
        $plantNameArray = [];
        $searchKey = Search::where('exists', 1)->select('searchString')->get()->toArray();
        foreach ($searchKey as $value) {
            $plantNameArray[] = ucfirst($value['searchString']);
        }
        $plantsName = AllPlants::select('globalname', 'localname')->get()->toArray();
        foreach ($plantsName as $value) {
            $plantNameArray[] = ucfirst($value['globalname']);
            $plantNameArray[] = ucfirst($value['localname']);
        }

        $plantNameArray = array_values(array_unique($plantNameArray));
        return response()->json($plantNameArray);
    }
    public function homePagination()
    {
        $plants = AllPlants::with('garden')->latest()->paginate(10);
        return view('home.allPlants.paginate_all_plants_home', compact('plants'))->render();
    }
    public function homeSearch(Request $request)
    {
        if (preg_match('/^[\p{L}\s]+$/u', $request->searchString)) {
            $plants = AllPlants::where('globalname', 'like', '%' . $request->searchString . '%')
                ->orwhere('localname', 'like', '%' . $request->searchString . '%')
                ->orwhere('category', 'like', '%' . $request->searchString . '%')
                ->orwhere('sub_category', 'like', '%' . $request->searchString . '%')
                ->orwhere('price', 'like', '%' . $request->searchString . '%')
                ->latest()->paginate(session('perPage'));
            if ($plants->count() >= 1) {
                getBrowserAndDeviceInfo(true, $request->searchString);
                return view('home.allPlants.paginate_all_plants_home', compact('plants'))->render();
            } else {
                getBrowserAndDeviceInfo(false, $request->searchString);
                return '<span style="color:red";>Nothing Found for- ' . $request->searchString . '! Sorry.</span>';
            }
        } else {
            return response()->json(['error' => 'You can search with letters and spaces for all languages.'], 422);
        }
    }
    protected $selectedPage;
    public function homePerPage(Request $request)
    {
        if ($request->has('perpage')) {
            $this->selectedPage = $request->perpage;
        } else {
            $this->selectedPage = 10;
        }
        ;
        session()->put('selectedPage', $this->selectedPage);
        $plants = AllPlants::latest()->paginate($request->perpage);
        return view('home.allPlants.paginate_all_plants_home', compact('plants'))->render();
    }
    public function homeFilter(Request $request)
    {
        $rangefrom = $request->rangefrom;
        $rangeto = $request->rangeto;
        $price = $request->price;
        $category = $request->category;
        $season = $request->season;
        $query = AllPlants::query();
        if ($rangefrom && $rangeto) {
            $query->whereBetween('offer_price', [$rangefrom, $rangeto])->orderBy('globalname', 'asc');
        }
        if ($price !== 'none') {
            $query->orderBy('offer_price', $price);
        }
        if ($category !== 'none') {
            $query->where('category', $category);
        }
        if ($season !== 'none') {
            $query->where('sub_category', $season);
        }
        // $query->with('garden');
        $plants = $query->paginate(10);
        if ($plants->count() >= 1) {
            return view('home.allPlants.paginate_all_plants_home', compact('plants'))->render();
        } else {
            return "Nothing Found with this Filter. Sorry!";
        }
    }
    public function homeAddToCart(Request $request)
    {
        if (Auth::user()) {
            $requestForCart = PlantsUsersCarts::where('user_id', Auth::user()->id)->where('plant_id', $request->plantId)->first();
            if ($requestForCart) {
                return response()->json(['error' => 'Plants already exits in your Cart. If you add more quantity for this plant, please go to your cart!']);
            } else {
                PlantsUsersCarts::create([
                    'user_id' => Auth::user()->id,
                    'plant_id' => $request->plantId,
                    'pieces' => 1,
                ]);
            }
            $count = PlantsUsersCarts::where('user_id', Auth::user()->id)->select(\DB::raw('SUM(pieces) as pieces'))->first();
            return response()->json([
                'success' => 'Sucessfully added items in your Cart.',
                'pieces' => $count
            ], 200);
        } else {
            return response()->json(['error' => 'You should Log In first.'], 422);
        }

    }
    public function homeCart()
    {
        $cartPlants = [];
        $carts = PlantsUsersCarts::where('user_id', Auth::user()->id)->get();
        foreach ($carts as $key => $cart) {
            $cartPlants[$cart->id] = AllPlants::where('id', $cart->plant_id)->with('garden')->first();
        }
        return view('home.cart.index', compact('cartPlants'))->render();
    }
    public function removeCartItem(Request $request)
    {
        PlantsUsersCarts::find($request->id)->delete();
        $cartPlants = [];
        $carts = PlantsUsersCarts::where('user_id', Auth::user()->id)->get();
        foreach ($carts as $key => $cart) {
            $cartPlants[$cart->id] = AllPlants::where('id', $cart->plant_id)->with('garden')->first();
        }
        return view('home.cart.index', compact('cartPlants'))->with(['success' => 'Item remove form your Cart!'])->render();
        // return response()->json(['success' => 'Item remove from your Cart.']);
    }
    public function confirmOrder(Request $request)
    {
        $currentDateTime = Carbon::now();
        $newDateTime = $currentDateTime->addHours(6);
        foreach ($request->orderDetails as $key => $value) {
            Orders::updateOrInsert([
                'user_id' => Auth::user()->id,
                'plant_id' => $value['plantId'],
                'garden_id' => $value['gardenId'],
                'pieces' => $value['qty'],
                'total_price' => ($value['priceValue'] * $value['qty']),
                'orderable_after' => $newDateTime,
            ]);
        }
        return response()->json(['success' => 'Order Confirmed! You will get Notification for later updates.']);
    }
    public function homeTopTen()
    {
        $topPlants = [];
        $searchStr = Search::where('exists', 1)->select('searchString')->take(10)->get();
        foreach ($searchStr as $key => $value) {
            $topPlants[] = AllPlants::where('globalname', 'like', '%' . $value->searchString . '%')
                ->orwhere('localname', 'like', '%' . $value->searchString . '%')->select('id', 'globalname', 'localname', 'offer_price', 'photo_1')->first();
        }
        return view('home.topPlants.index', compact('topPlants'))->render();
    }
    public function homeGetOwner(Request $request)
    {
        $gardens = Garden::where('id', $request->id)->with('user')->first();
        if (Auth::user()) {
            return view('home.garden_owner.index', compact('gardens'))->render();
        } else {
            return 'You Should Log In First!';
        }
    }
    public function viewPlantRatingDetails(Request $request)
    {
        $plant = AllPlants::where('id', $request->plant_id)->with('ratings')->first()->toArray();
        return view('home.plant_rating.index', compact('plant'));
    }
    public function catchPlantRating(Request $request)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $plant_id = $request->plant_id;
            $rating = $request->rating;
            $numericPart = explode('_', $rating)[1];
            Ratings::updateOrInsert([
                'user_id' => $user_id,
                'plant_id' => $plant_id
            ], [
                'ratings' => $numericPart,
            ]);
            return response()->json(['success' => 'Your Ratings Submitted Successfully!']);
        } else {
            return response()->json(["error" => "You Should Log In First!"]);
        }

    }
}
function getBrowserAndDeviceInfo($exists, $searchString)
{
    $user_ip = getenv('REMOTE_ADDR');
    $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
    $country = $geo["geoplugin_countryName"];
    $city = $geo["geoplugin_city"];

    $searchRecord = Search::where('searchString', $searchString)->first();
    if ($searchRecord) {
        $searchRecord->update(['timesofsearch' => $searchRecord->timesofsearch + 1]);
    } else {
        Search::create([
            'searchString' => $searchString,
            'timesofsearch' => 1,
            'exists' => $exists,
            'city' => $city,
            'country' => $country,
        ]);
    }
}
