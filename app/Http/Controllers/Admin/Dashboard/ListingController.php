<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Carbon\Carbon;
use App\Models\Amenity;
use App\Models\Listing;
use App\Models\Package;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\DataTables\ListingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dashboard\ListingStoreRequest;
use App\Http\Requests\Admin\Dashboard\ListingUpdateRequest;

class ListingController extends Controller
{
    use FileUploadTrait;
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
        // dd(array_values($request->amenities_id));

        $imagePath = $this->uploadImage($request, 'image');
        $thumbnailPath = $this->uploadImage($request, 'thumbnail');
        $attachmentPath = $this->uploadImage($request, 'attachment');

        $listing = new Listing();

        if (!empty($imagePath)) {
            $listing->image = $imagePath;
        }

        if (!empty($thumbnailPath)) {
            $listing->thumbnail = $thumbnailPath;
        }

        if (!empty($attachmentPath)) {
            $listing->attachment = $attachmentPath;
        }

        $listing->title = $request->title;
        $listing->slug = $request->slug;
        $listing->user_id = $request->user()->id;
        $listing->category_id = $request->category_id;
        $listing->location_id = $request->location_id;
        $listing->package_id = 1;
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
        $listing->is_verified = $request->is_verified === 'on' ? 1 : 0;
        $listing->is_featured = $request->is_featured === 'on' ? 1 : 0;
        $listing->status = $request->status === 'on' ? 1 : 0;
        $listing->expire_at = Carbon::now()->addMonths(2);

        $listing->save();

        $listing->amenities()->attach($request->amenities_id);

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
        $data['listing'] = Listing::findOrFail($id);
        // dd($data['listing']->title);
        // dd(json_encode($data['listing']->amenities->pluck('id')));
        $data['categories'] = Category::activeCategories();
        $data['locations'] = Location::activeLocations();
        $data['packages'] = Package::activePackages();
        $data['amenities'] = Amenity::activeAmenities();
        return view('admin.dashboard.listing.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ListingUpdateRequest $request, Listing $listing)
    {
        // dd($request->all());

        $imagePath = $this->uploadImage($request, 'image');
        $thumbnailPath = $this->uploadImage($request, 'thumbnail');
        $attachmentPath = $this->uploadImage($request, 'attachment');

        if (!empty($imagePath)) {
            $listing->image = $imagePath;
        }

        if (!empty($thumbnailPath)) {
            $listing->thumbnail = $thumbnailPath;
        }

        if (!empty($attachmentPath)) {
            $listing->attachment = $attachmentPath;
        }

        $listing->title = $request->title;
        $listing->slug = $request->slug;
        $listing->user_id = $request->user()->id;
        $listing->category_id = $request->category_id;
        $listing->location_id = $request->location_id;
        $listing->package_id = 1;
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
        $listing->is_verified = $request->is_verified === 'on' ? 1 : 0;
        $listing->is_featured = $request->is_featured === 'on' ? 1 : 0;
        $listing->status = $request->status === 'on' ? 1 : 0;
        $listing->expire_at = Carbon::now()->addMonths(2);

        $listing->save();

        $listing->amenities()->sync($request->amenities_id);

        toastr()->success('Listing has been updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $listing = Listing::findOrFail($id);
            $this->deleteImage($listing->image);
            $this->deleteImage($listing->thumbnail);
            $listing->delete();

            return response([
                'status' => 'success',
                'message' => 'Listing has been deleted successfully.',
            ]);
        } catch (\Exception $e) {
            logger($e);

            return response([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}