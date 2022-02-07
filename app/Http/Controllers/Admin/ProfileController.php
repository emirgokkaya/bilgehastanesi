<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('admin.pages.profile.index')->with('user', $user);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                'unique:users,email,'.auth()->user()->id
            ],
            'password' => 'nullable|min:6',
            'repassword' => 'nullable|min:6|same:password',
            'profile_photo' => 'image|mimes:jpg,png'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != null or $request->password != "") {
            $user->password = Hash::make($request->password);
        }

        if ($request->has('profile_photo')) {
            $file = $request->file('profile_photo');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $user->profile_photo = $fileNameToStore;

            $file->storeAs('public/images/users', $fileNameToStore);
            /*Storage::put("public/images/fuses/{$fileNameToStore}", $file);*/
        }

        $user->update();

        return redirect()->back()->with('message', 'Profil Başarıyla Güncellendi')->with('status', 'success');
    }
}
