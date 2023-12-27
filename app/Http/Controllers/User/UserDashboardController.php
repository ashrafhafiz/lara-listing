<?php

namespace App\Http\Controllers\User;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        return view('user.dashboard.index', ['user' => $user]);
    }
}
