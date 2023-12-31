<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Category;
use App\Traits\FileUploadTrait;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\DataTables\CategoriesDataTable;
use App\Http\Requests\Admin\Dashboard\CategoryStoreRequest;
use App\Http\Requests\Admin\Dashboard\CategoryUpdateRequest;

class CategoryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        // dd($request->all());

        $category = new Category();

        $icon_imgPath = $this->uploadImage($request, 'icon_img');
        $bg_imgPath = $this->uploadImage($request, 'bg_img');

        if (!empty($icon_imgPath)) {
            $category->icon_img = $icon_imgPath;
        }

        if (!empty($bg_imgPath)) {
            $category->bg_img = $bg_imgPath;
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->show_at_home = $request->show_at_home === 'on' ? 1 : 0;
        $category->status = $request->status === 'on' ? 1 : 0;

        $category->save();

        toastr()->success('Category has been created successfully!');
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
        return view('admin.dashboard.categories.edit', ([
            'category' => Category::findOrFail($id),
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category): RedirectResponse
    {
        // dd($request->all());
        $icon_imgPath = $this->uploadImage($request, 'icon_img');
        $bg_imgPath = $this->uploadImage($request, 'bg_img');

        if (!empty($icon_imgPath)) {
            $category->icon_img = $icon_imgPath;
        }

        if (!empty($bg_imgPath)) {
            $category->bg_img = $bg_imgPath;
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->show_at_home = $request->show_at_home === 'on' ? 1 : 0;
        $category->status = $request->status === 'on' ? 1 : 0;

        $category->save();

        toastr()->success('Category has been updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $category = Category::findOrFail($id);
        $this->deleteImage($category->icon_img);
        $this->deleteImage($category->bg_img);
        $category->delete();

        return response(['status' => 'success', 'message' => 'Category has been deleted successfully.']);
    }
}
