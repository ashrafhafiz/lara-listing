<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\AdminProfileUpdateRequest;

class AdminProfileController extends Controller
{
    public function index(): View
    {
        return view('admin.profile.index', ['user' => auth()->user()]);
    }

    public function update(AdminProfileUpdateRequest $request): RedirectResponse
    {
        toastr()->success('Data has been saved successfully!');
        return redirect()->back();
    }
}
