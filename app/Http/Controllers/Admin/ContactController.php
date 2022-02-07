<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('admin.pages.contact.index')->with('contact', $contact);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'email' => 'required|email',
            'phone' => 'required',
            'whatsapp' => '',
            'image' => 'mimes:jpg,png,jpeg',
            'fax' => '',
            'map' => '',
            'address' => 'required',
            'how_can_i_go' => ''
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if (count(Contact::all()) > 0) {
            $contact = Contact::first();
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->whatsapp = $request->whatsapp;
            $contact->fax = $request->fax;
            $contact->map_url = $request->map;
            $contact->how_can_i_go = $request->how_can_i_go;
            $contact->address = $request->address;

            if ($request->has('image')) {
                $file = $request->file('image');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $contact->image = $fileNameToStore;

                $file->storeAs('public/images/contact', $fileNameToStore);
            }

            $contact->update();

            return redirect()->route('admin.contact')->with('message', 'İletişim Bilgileri güncellendi')->with('status', 'info');
        } else {
            $contact = new Contact();
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->whatsapp = $request->whatsapp;
            $contact->fax = $request->fax;
            $contact->map_url = $request->map;
            $contact->how_can_i_go = $request->how_can_i_go;
            $contact->address = $request->address;

            if ($request->has('image')) {
                $file = $request->file('image');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $contact->image = $fileNameToStore;

                $file->storeAs('public/images/contact', $fileNameToStore);
            }

            $contact->save();

            return redirect()->route('admin.contact')->with('message', 'İletişim Bilgileri kaydedildi')->with('status', 'success');
        }
    }
}
