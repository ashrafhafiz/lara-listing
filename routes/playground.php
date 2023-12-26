<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/test1', function () {
    $user = Auth::user();
    $usersWithTwitter = User::withTwitter()->pluck('name');

    dd($usersWithTwitter);
    // dd($user->social_media_subscriptions->firstWhere('social_media_type', 'facebook')->social_media_link);
    // dd(collect($user->social_media_subscriptions)->contains('social_media_type', 'facebook'));
    // dd($user->hasFacebook());
    // foreach ($user->social_media_subscriptions as $sms) {
    //     if ($sms->social_media_type === 'facebook') {
    //         echo ($sms->social_media_link);
    //     }
    // };
})->name('test1');


Route::get('/test2', function () {
    return view('playgound.test2');
})->name('test2.index');

Route::post('/test2', function (Request $request) {
    $request->validate([
        'addMoreInputFields.*.subject' => 'required'
    ]);
    foreach ($request->addMoreInputFields as $key => $value) {
        Student::create($value);
    }
    return back()->with('success', 'New subject has been added.');
})->name('test2.store');

Route::get('/test3', function () {
})->name('test3');

Route::get('/test4', function () {
})->name('test4');
