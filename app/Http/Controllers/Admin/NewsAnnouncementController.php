<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\ImageManagement;
use App\Http\Controllers\Controller;
use App\Models\NewsAnnouncement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsAnnouncementController extends Controller
{
    public function index()
    {
        $news_announcements = NewsAnnouncement::orderBy('created_at', 'DESC')->get();

        return view('admin.pages.corporations.news_announcements.index')->with('news_announcements', $news_announcements);
    }

    public function create()
    {
        return view('admin.pages.corporations.news_announcements.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpg,png|max:5120',
            'title' => 'required',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $news = new NewsAnnouncement();
        if ($request->has('image')) {
            $news->image = ImageManagement::imageUploadNewsAnnouncement($request->file('image'), 'public/images/news_announcements');
            $news->title = $request->title;
            $news->content = $request->content;
        }

        $news->save();

        return redirect()->route('admin.news_announcements')->with('message', 'Yeni haber-duyuru kaydı tamamlandı')->with('status', 'success');
    }

    public function show($slug)
    {
        $news = NewsAnnouncement::whereSlug($slug)->firstOrFail();

        return view('admin.pages.corporations.news_announcements.show')->with('news', $news);
    }

    public function update(Request $request, $slug)
    {
        $news = NewsAnnouncement::whereSlug($slug)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpg,png|max:2048|nullable',
            'title' => 'required',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->has('image')) {
            $news->image = ImageManagement::imageUploadNewsAnnouncement($request->file('image'), 'public/images/news_announcements');
        }
        $news->title = $request->title;
        $news->content = $request->content;

        $news->update();
        return redirect()->route('admin.news_announcements')->with('message', 'Haber-Duyuru kaydı güncellendi')->with('status', 'info');
    }

    public function destroy($slug)
    {
        NewsAnnouncement::whereSlug($slug)->delete();

        return redirect()->route('admin.news_announcements')->with('message', 'Haber-Duyuru başarıyla silindi')->with('status', 'success');
    }
}
