<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Models\Playground\Photo;
use App\Http\Controllers\Controller;
use App\Models\Media;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $data['listing'] = Listing::findOrFail($id);
        return view('admin.dashboard.image-gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $sourceDir = storage_path('tmp/uploads/');
        $targetDir = public_path('uploads/');
        foreach ($request->input('document', []) as $file) {
            rename($sourceDir . $file, $targetDir . $file);
            Media::create([
                'user_id' => $request->user()->id,
                'listing_id' => $request->listing_id,
                'media_type' => 'photo',
                'media_path' => '/uploads/' . $file
            ]);
        }
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

    public function uploads(Request $request)
    {
        $path = storage_path('tmp/uploads');

        !file_exists($path) && mkdir($path, 0777, true);

        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
