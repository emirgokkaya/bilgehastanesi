<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('admin.pages.users.index')->with('users', $users);
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'profile_photo' => 'mimes:jpg,png,jpeg',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'status' => 'required',
            'password' => 'required|min:6',
            'repassword' => 'required|min:6|same:password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->status = (int)$request->status;

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

            $user->save();
            return redirect()->route('admin.users')->with('message', 'Yeni kullanıcı kaydı tamamlandı')->with('status', 'success');
        }
    }

    public function show($email)
    {
        $user = User::whereEmail($email)->firstOrFail();
        return view('admin.pages.users.show')->with('user', $user);
    }

    public function update(Request $request, $email)
    {
        $user = User::whereEmail($email)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'profile_photo' => 'mimes:jpg,png,jpeg',
            'name' => 'required',
            'email' => 'required|email|unique:users,id,' . $user->id,
            'role' => 'required',
            'status' => 'required',
            'password' => 'nullable|min:6',
            'repassword' => 'nullable|min:6|same:password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password != "") $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->status = (int)$request->status;

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
            return redirect()->route('admin.users')->with('message', 'Kullanıcı kaydı güncellendi')->with('status', 'info');
        }
    }

    public function destroy($email)
    {
        User::whereEmail($email)->delete();

        return redirect()->route('admin.users')->with('message', 'Kullanıcı kaydı silindi')->with('status', 'success');
    }
}
