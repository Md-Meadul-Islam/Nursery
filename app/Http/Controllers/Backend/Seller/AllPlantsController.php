<?php

namespace App\Http\Controllers\Backend\Seller;

use App\Http\Controllers\Controller;
use App\Models\AllPlants;
use App\Models\Garden;
use App\Models\Ratings;
use App\Rules\ValidationVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AllPlantsController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $plants = AllPlants::where('user_id', $userId)->with('garden')->latest()->paginate(3);
        $gardens = Garden::where('user_id', $userId)->with('user')->get();
        //for show categories and subCategories enum value
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
        //end enum value shows
        $allplantsId = AllPlants::select('id')->get();
        foreach ($allplantsId as $key => $plantsId) {
            Ratings::updateOrInsert([
                'user_id' => Auth::user()->id,
                'plant_id' => $plantsId->id,
            ], [
                'ratings' => 0,
                'created_at' => now()
            ]);
        }
        return view('backend2.seller.allplants.index', compact('plants', 'gardens', 'categories', 'subCategories'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'globalname' => ['required', 'string', 'max:20', 'regex:/^[\pL\s\-_]*$/u'],
            'localname' => ['nullable', 'string'],
            'details' => ['nullable', 'string', 'max:1000'],
            'price' => ['required', 'integer'],
            'offer_price' => ['nullable', 'integer'],
            'photo_1' => ['required', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'photo_2' => ['nullable', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'photo_3' => ['nullable', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'video' => ['nullable', 'mimes:mp4,webm,ogg', 'file', new ValidationVideo],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {
            //file management
            //photo
            $photoFields = ['photo_1', 'photo_2', 'photo_3'];
            $imageNames = [];
            foreach ($photoFields as $field) {
                if ($request->hasFile($field)) {
                    $imageName = time() . rand() . '.' . $request->file($field)->getClientOriginalExtension();
                    $request->file($field)->storeAs('public/plants_images', $imageName);
                    $imageNames[$field] = $imageName;
                }
            }
            //video
            if ($request->file('video')) {
                $videoName = time() . rand() . '.' . $request->file('video')->getClientOriginalExtension();
                $request->file('video')->storeAs('public/plants_video', $videoName);
                $videoOriginalName = $request->file('video')->getClientOriginalName();
                if (strlen($videoOriginalName) >= 100) {
                    return response()->json(['errors' => 'Video name length maximum 100 !'], 422);
                }
            }
            //insert into user model
            $allPlants = AllPlants::create([
                'user_id' => $request->user()->id,
                'garden_id' => $request->garden_id,
                'globalname' => $request->globalname,
                'localname' => $request->localname ?? null,
                'details' => $request->details ?? null,
                'category' => $request->category,
                'sub_category' => $request->sub_category,
                'price' => $request->price,
                'offer_price' => $request->offer_price ?? $request->price,
                'photo_1' => $imageNames['photo_1'] ?? null,
                'photo_2' => $imageNames['photo_2'] ?? null,
                'photo_3' => $imageNames['photo_3'] ?? null,
                'video' => $videoName ?? null,
                'video_original_name' => $videoOriginalName ?? null,
            ]);

            return response()->json(['success' => 'Plants added successfully'], 200);
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'globalname' => ['required', 'string', 'max:20', 'regex:/^[\pL\s\-_]*$/u'],
            'localname' => ['nullable', 'string', 'regex:/^[\pL\s\-_]*$/u'],
            'details' => ['nullable', 'string', 'max:1000'],
            'price' => ['required', 'integer'],
            'offer_price' => ['nullable', 'integer'],
            'photo_1' => ['mimes:jpg,jpeg,png,webp', 'max:3072'],
            'photo_2' => ['nullable', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'photo_3' => ['nullable', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'video' => ['nullable', 'mimes:mp4,webm,ogg', 'file', new ValidationVideo],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {
            //file management
            //photo
            $photoFields = ['photo_1', 'photo_2', 'photo_3'];
            $imageNames = [];
            $exPhoto1 = null;
            $exPhoto2 = null;
            $exPhoto3 = null;
            $exVideo = null;
            $exOriginalVideo = null;
            foreach ($photoFields as $field) {
                if ($request->hasFile($field)) {
                    $imageName = time() . rand() . '.' . $request->file($field)->getClientOriginalExtension();
                    $request->file($field)->storeAs('public/plants_images', $imageName);
                    $imageNames[$field] = $imageName;
                } else {
                    $allplants = AllPlants::find($request->up_id);
                    $exPhoto1 = $allplants->photo_1;
                    $exPhoto2 = $allplants->photo_2;
                    $exPhoto3 = $allplants->photo_3;
                }
            }
            //video
            if ($request->file('video')) {
                $videoName = time() . rand() . '.' . $request->file('video')->getClientOriginalExtension();
                $request->file('video')->storeAs('public/plants_video', $videoName);
                $videoOriginalName = $request->file('video')->getClientOriginalName();
                if (strlen($videoOriginalName) >= 100) {
                    return response()->json(['errors' => 'Video name length maximum 100!'], 422);
                }
            } else {
                $allplants = AllPlants::find($request->up_id);
                $exVideo = $allplants->video;
                $exOriginalVideo = $allplants->video_original_name;
            }
            $updatePlants = AllPlants::find($request->up_id);
            if ($updatePlants) {
                $updatePlants->update([
                    'user_id' => $request->user()->id,
                    'garden_id' => $request->garden_id,
                    'globalname' => $request->globalname,
                    'localname' => $request->localname ?? null,
                    'details' => $request->details ?? null,
                    'category' => $request->category,
                    'sub_category' => $request->sub_category,
                    'price' => $request->price,
                    'offer_price' => $request->offer_price ?? $request->price,
                    'photo_1' => $imageNames['photo_1'] ?? $exPhoto1,
                    'photo_2' => $imageNames['photo_2'] ?? $exPhoto2,
                    'photo_3' => $imageNames['photo_3'] ?? $exPhoto3,
                    'video' => $videoName ?? $exVideo,
                    'video_original_name' => $videoOriginalName ?? $exOriginalVideo,
                ]);
            }
            return response()->json(['success' => 'Plants data Update Successfull !'], 200);
        }
    }
    public function destroy(Request $request)
    {
        AllPlants::find($request->id)->delete();
        return response()->json(['success' => 'Plants Deleted Successfull !'], 200);
    }
    public function paginate(Request $request)
    {
        $userId = Auth::user()->id;
        $plants = AllPlants::where('user_id', $userId)->with('garden')->latest()->paginate(3);
        return view('backend2.seller.allplants.paginated_plants', compact('plants'))->render();
    }
}
