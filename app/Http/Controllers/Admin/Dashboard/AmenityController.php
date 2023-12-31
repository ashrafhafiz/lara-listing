<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Amenity;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\DataTables\AmenitiesDataTable;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Requests\Admin\Dashboard\AmenityStoreRequest;
use App\Http\Requests\Admin\Dashboard\AmenityUpdateRequest;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AmenitiesDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.amenities.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.dashboard.amenities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AmenityStoreRequest $request): RedirectResponse
    {
        // dd($request->all());
        $amenity = new Amenity();

        $amenity->name = $request->name;
        $amenity->slug = $request->slug;
        $amenity->amenity_icon = $request->amenity_icon;
        $amenity->status = $request->status === 'on' ? 1 : 0;

        $amenity->save();

        toastr()->success('Amenity has been created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.dashboard.amenities.edit', ([
            'amenity' => Amenity::findOrFail($id)
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AmenityUpdateRequest $request, Amenity $amenity)
    {
        $amenity->name = $request->name;
        $amenity->slug = $request->slug;
        $amenity->amenity_icon = $request->amenity_icon;
        $amenity->status = $request->status === 'on' ? 1 : 0;

        $amenity->save();

        toastr()->success('Amenity has been updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $amenity = Amenity::findOrFail($id);
            $amenity->delete();

            return response([
                'status' => 'success',
                'message' => 'Amenity has been deleted successfully.',
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
