<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Location;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\DataTables\LocationsDataTable;
use App\Http\Requests\Admin\Dashboard\LocationStoreRequest;
use App\Http\Requests\Admin\Dashboard\LocationUpdateRequest;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LocationsDataTable $dataTable): View | JsonResponse
    {
        return $dataTable->render('admin.dashboard.locations.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.dashboard.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationStoreRequest $request): RedirectResponse
    {
        // dd($request->all());

        $location = new Location();

        $location->name = $request->name;
        $location->slug = $request->slug;
        $location->show_at_home = $request->show_at_home === 'on' ? 1 : 0;
        $location->status = $request->status === 'on' ? 1 : 0;

        $location->save();

        toastr()->success('Location has been created successfully!');
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
    public function edit(string $id): View
    {
        return view('admin.dashboard.locations.edit', ([
            'location' => Location::findOrFail($id),
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationUpdateRequest $request, Location $location): RedirectResponse
    {
        $location->name = $request->name;
        $location->slug = $request->slug;
        $location->show_at_home = $request->show_at_home === 'on' ? 1 : 0;
        $location->status = $request->status === 'on' ? 1 : 0;

        $location->save();

        toastr()->success('Location has been updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return response(['status' => 'success', 'message' => 'Location has been deleted successfully.']);
    }
}
