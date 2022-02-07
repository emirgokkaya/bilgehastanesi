<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdministrativeTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AdministrativeTeamController extends Controller
{
    public function index()
    {
        $administrative_teams = AdministrativeTeam::orderBy('id', 'DESC')->get();
        return view('admin.pages.corporations.administrative_teams.index')->with('administrative_teams', $administrative_teams);
    }

    public function create()
    {
        return view('admin.pages.corporations.administrative_teams.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'degree' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'role' => 'required',
            'profile_photo' => 'required|image|mimes:jpg,png',
            'email' => 'required|email|unique:administrative_teams,email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $team = new AdministrativeTeam();
        $team->degree = $request->degree;
        $team->name = $request->name;
        $team->lastname = $request->lastname;
        $team->email = $request->email;
        $team->role = $request->role;

        if ($request->has('profile_photo')) {
            $file = $request->profile_photo;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $team->profile_photo = $fileNameToStore;


            $image = Image::make($file)->save($filename);
            Storage::put("public/images/corporate/teams/{$fileNameToStore}", $image);
        }

        $team->save();

        return redirect()->route('admin.administrative_teams')->with('message', 'Başhekimlik kaydı yapıldı')->with('status', 'success');
    }

    public function show($slug)
    {
        $team = AdministrativeTeam::whereSlug($slug)->firstOrFail();
        return view('admin.pages.corporations.administrative_teams.show')->with('team', $team);
    }

    public function update(Request $request, $slug)
    {
        $team = AdministrativeTeam::whereSlug($slug)->firstOrFail();
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

        $team->degree = $request->degree;
        $team->name = $request->name;
        $team->lastname = $request->lastname;
        $team->email = $request->email;
        $team->role = $request->role;

        if ($request->has('profile_photo')) {
            $file = $request->profile_photo;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $team->profile_photo = $fileNameToStore;


            $image = Image::make($file)->save($filename);
            Storage::put("public/images/corporate/teams/{$fileNameToStore}", $image);
        }

        $team->update();

        return redirect()->route('admin.administrative_teams')->with('message', 'Başhekimlik kaydı düzenlendi')->with('status', 'success');
    }

    public function destroy($slug)
    {
        AdministrativeTeam::where('slug', $slug)->delete();

        return redirect()->route('admin.administrative_teams')->with('message', 'Başhekimlik kaydı silindi')->with('status', 'success');
    }
}
