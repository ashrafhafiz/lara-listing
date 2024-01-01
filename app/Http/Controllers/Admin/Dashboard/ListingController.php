<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Amenity;
use App\Models\Package;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use App\DataTables\ListingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dashboard\ListingStoreRequest;
use App\Models\Listing;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListingDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.listing.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd(Category::activeCategories());
        $data['categories'] = Category::activeCategories();
        $data['locations'] = Location::activeLocations();
        $data['packages'] = Package::activePackages();
        $data['amenities'] = Amenity::activeAmenities();
        return view('admin.dashboard.listing.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListingStoreRequest $request)
    {
        dd($request->all());

        $listing = new Listing();
        $listing->title = $request->title;
        $listing->slug = $request->slug;
        $listing->category_id = $request->category_id;
        $listing->location_id = $request->location_id;
        // $listing->amenity_id = $request->amenity_id;
        $listing->description = $request->description;
        $listing->google_map_embed_code = $request->google_map_embed_code;
        $listing->seo_title = $request->seo_title;
        $listing->seo_description = $request->seo_description;
        $listing->email = $request->email;
        $listing->phone = $request->phone;
        $listing->address = $request->address;
        $listing->website = $request->website;
        $listing->facebook_link = $request->facebook_link;
        $listing->twitter_link = $request->twitter_link;
        $listing->linkedin_link = $request->linkedin_link;
        $listing->whatsapp_link = $request->whatsapp_link;
        $listing->is_verified = $request->is_featured === 'on' ? 1 : 0;
        $listing->is_featured = $request->is_featured === 'on' ? 1 : 0;
        $listing->status = $request->status === 'on' ? 1 : 0;

        toastr()->success('Listing has been created successfully!');
        return redirect()->back();
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
        return view('admin.dashboard.listing.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        toastr()->success('Listing has been updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
