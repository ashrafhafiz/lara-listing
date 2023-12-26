<?php

namespace App\Http\Controllers\Admin;

use App\Traits\FileUploadTrait;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\AdminProfileUpdateRequest;

class AdminProfileController extends Controller
{
    use FileUploadTrait;

    public function index(): View
    {
        return view('admin.profile.index', ['user' => auth()->user()]);
    }

    public function update(AdminProfileUpdateRequest $request): RedirectResponse
    {
        $avatarPath = $this->uploadImage($request, 'avatar');
        $bannerPath = $this->uploadImage($request, 'profile_banner');

        $user = $request->user();
        // $user->avatar = !empty($avatarPath) ? $avatarPath : '';
        // $user->profile_banner = !empty($bannerPath) ? $bannerPath  : '';
        if (!empty($avatarPath)) {
            $user->avatar = $avatarPath;
        }
        if (!empty($bannerPath)) {
            $user->avatar = $bannerPath;
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->website = $request->website;
        $user->address = $request->address;
        $user->bio = $request->bio;

        $user->save();

        // dd($avatarPath, $bannerPath);
        toastr()->success('Data has been saved successfully!');
        return redirect()->back();
    }
}
