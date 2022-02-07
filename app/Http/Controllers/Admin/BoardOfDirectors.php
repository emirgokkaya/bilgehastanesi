<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoardOfDirector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class BoardOfDirectors extends Controller
{
    public function index()
    {
        $board_of_directors = BoardOfDirector::orderBy('id', 'DESC')->get();
        return view('admin.pages.corporations.board_of_directors.index')->with('board_of_directors', $board_of_directors);
    }

    public function create()
    {
        return view('admin.pages.corporations.board_of_directors.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'degree' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'role' => 'required',
            'profile_photo' => 'required|image|mimes:jpg,png',
            'email' => 'required|email|unique:board_of_directors,email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $director = new BoardOfDirector();
        $director->degree = $request->degree;
        $director->name = $request->name;
        $director->lastname = $request->lastname;
        $director->email = $request->email;
        $director->role = $request->role;

        if ($request->has('profile_photo')) {
            $file = $request->profile_photo;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $director->profile_photo = $fileNameToStore;


            $image = Image::make($file)->save($filename);
            Storage::put("public/images/corporate/directors/{$fileNameToStore}", $image);
        }

        $director->save();

        return redirect()->route('admin.board_of_directors')->with('message', 'Yönetici kaydı yapıldı')->with('status', 'success');
    }

    public function show($slug)
    {
        $director = BoardOfDirector::whereSlug($slug)->firstOrFail();
        return view('admin.pages.corporations.board_of_directors.show')->with('director', $director);
    }

    public function update(Request $request, $slug)
    {
        $director = BoardOfDirector::whereSlug($slug)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'degree' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'role' => 'required',
            'profile_photo' => 'image|mimes:jpg,png',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $director->degree = $request->degree;
        $director->name = $request->name;
        $director->lastname = $request->lastname;
        $director->email = $request->email;
        $director->role = $request->role;

        if ($request->has('profile_photo')) {
            $file = $request->profile_photo;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $director->profile_photo = $fileNameToStore;


            $image = Image::make($file)->save($filename);
            Storage::put("public/images/corporate/directors/{$fileNameToStore}", $image);
        }

        $director->update();

        return redirect()->route('admin.board_of_directors')->with('message', 'Yönetici kaydı düzenlendi')->with('status', 'success');
    }

    public function destroy($slug)
    {
        BoardOfDirector::where('slug', $slug)->delete();

        return redirect()->route('admin.board_of_directors')->with('message', 'Yönetici kaydı silindi')->with('status', 'success');
    }
}
