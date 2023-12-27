<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function profileEdit(): View
    {
        $user = Auth::user();
        return view('user.dashboard.profile', ['user' => $user]);
    }

    public function profileUpdate(): RedirectResponse
    {
        toastr()->success('Data has been saved successfully!');
        return redirect()->back();
    }

    public function passwordUpdate(): RedirectResponse
    {
        toastr()->success('Password has been updated successfully!');
        return redirect()->back();
    }
}
