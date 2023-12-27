<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\AdminProfileUpdateRequest;
use App\Http\Requests\Admin\AdminPasswordUpdateRequest;

class AdminProfileController extends Controller
{
    use FileUploadTrait;

    public function index(): View
    {
        return view('admin.profile.index', ['user' => auth()->user()]);
    }

    public function update(AdminProfileUpdateRequest $request): RedirectResponse
    {
        // $user = Auth::user();
        $user = $request->user();

        $avatarPath = $this->uploadImage($request, 'avatar', $user->avatar);
        $bannerPath = $this->uploadImage($request, 'profile_banner', $user->profile_banner);

        // $user->avatar = !empty($avatarPath) ? $avatarPath : '';
        if (!empty($avatarPath)) {
            $user->avatar = $avatarPath;
        }
        // $user->profile_banner = !empty($bannerPath) ? $bannerPath  : '';
        if (!empty($bannerPath)) {
            $user->profile_banner = $bannerPath;
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->website = $request->website;
        $user->address = $request->address;
        $user->bio = $request->bio;

        $user->save();

        toastr()->success('Data has been saved successfully!');
        return redirect()->back();
    }

    public function passwordUpdate(AdminPasswordUpdateRequest $request)
    {
        $user = $request->user();
        $user->password = Hash::make($request->password);
        $user->save();

        toastr()->success('Password has been updated successfully!');
        return redirect()->back();
    }
}
