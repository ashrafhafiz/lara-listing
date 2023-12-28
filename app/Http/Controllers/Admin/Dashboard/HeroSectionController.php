<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Hero;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\Dashboard\HeroSectionUpdateRequest;

class HeroSectionController extends Controller
{
    use FileUploadTrait;

    public function index(): View
    {
        $latestHeroData = Hero::latestActive();
        // $latestHeroData = Hero::where('active', 1)->latest()->first();
        // dd($latestHeroData);
        return view('admin.dashboard.hero.index', [
            'hero' => $latestHeroData,
        ]);
    }

    public function store(HeroSectionUpdateRequest $request): RedirectResponse
    {
        $hero = Hero::latestActive();
        $bg_imgPath = $this->uploadImage($request, 'bg_img');

        if (!empty($bg_imgPath)) {
            $hero->bg_img = $bg_imgPath;
        }

        $hero->title = $request->title;
        $hero->subtitle = $request->subtitle;

        $hero->save();

        toastr()->success('Data has been saved successfully!');
        return redirect()->back();
    }
}
