<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AllPlants;
use App\Models\Garden;
use App\Models\Orders;
use App\Models\Search;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $searchString = Search::where('exists', 0)->select('searchString')->get()->toArray();
        $gardensname = Garden::where('user_id', Auth::user()->id)->select('id', 'garden_name')->get();
        $orderThisUser = [];
        foreach ($gardensname as $key => $gardens) {
            $orderThisUser[] = Orders::where('garden_id', $gardens->id)->where('status', 'pending')->first();
        }
        $filteredArray = array_filter($orderThisUser, function ($value) {
            return $value !== null;
        });
        $getPlant = [];
        foreach ($filteredArray as $key => $value) {
            $getPlant[] = Orders::where('garden_id', $value->id)->with(['user', 'allplants', 'gardens'])->get()->toArray();
        }
        return view('backend2.seller.dashboard', compact('searchString', 'gardensname', 'getPlant'));
    }

    public function showAddGardenForm()
    {
        $category = "SHOW COLUMNS FROM gardens WHERE Field = 'garden_category'";
        DB::statement($category);
        $categoryColumnType = DB::select($category)[0]->Type;
        preg_match("/^enum\((.*)\)$/", $categoryColumnType, $categoryMatches);
        $gardencategories = array_map('trim', explode(',', str_replace('\'', '', $categoryMatches[1])));
        return view('backend2.seller.gardens.index', compact('gardencategories'))->render();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addGarden(Request $request)
    {
        Garden::create([
            'user_id' => Auth::user()->id,
            'garden_name' => $request->gardenname,
            'local_address' => $request->localaddress,
            'city' => $request->gardencity,
            'garden_size' => $request->gardensize,
            'total_plants' => $request->gardentotalplants,
            'garden_category' => $request->gardencategory,
            'created_at' => now(),
        ]);
        return response()->json(['success' => true]);
    }
    public function viewGardenlist()
    {
        $gardensname = Garden::where('user_id', Auth::user()->id)->select('garden_name')->get();
        return view('backend2.seller.gardens.gardenlist', compact('gardensname'))->render();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
