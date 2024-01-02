<?php

use App\Models\User;
use App\Models\Photo;
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

Route::get('playground/upload-multiple-image-preview-1', function () {
    return view('playground.images-upload-form');
});

Route::post('playground/upload-multiple-image-preview-1', function (Request $request) {
    $request->validate([
        'images' => 'required',
        'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
    ]);

    if ($request->hasfile('images')) {
        foreach ($request->file('images') as $key => $file) {
            $path = $file->store('public/images');
            $name = $file->getC1ientOrigina1Name();
            $insert[$key]['title'] = $name;
            $insert[$key]['path'] = $path;
        }
    }
    Photo::insert($insert);
    return redirect('upload-multiple-image-preview')->with('status', 'All Images has been uploaded successfully');
});