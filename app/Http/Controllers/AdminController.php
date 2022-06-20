<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function adminDashboard()
    {
        return view('stisla.pages.index-0');
    }

    public function adminTable()
    {
        return view('stisla.pages.components-table', [
            'news' => News::all()
        ]);
    }

    public function create()
    {
        return view('stisla.pages.forms-editor');
    }

    public function store(Request $request)
    {

        News::create([
            'news_title' => $request->news_title,
            'news_content' => $request->news_content,
            'news_slug' => $request->news_slug,
            'excerpt' => $request->excerpt,
            'category_id' => $request->category_id,
            'author_id' => $request->author_id
        ]);

        return redirect()->route('table');
    }

    public function getupdate($id)
    {
        $news = News::select('*')->where('id', $id)->get();
        return view('stisla.pages.forms-update', ['news' => $news]);
    }

    public function updatenews(Request $request)
    {
        $berita = News::where('id', $request->id)->update([
            'news_title' => $request->news_title,
            'news_content' => $request->news_content,
            'news_slug' => $request->news_slug,
            'excerpt' => $request->excerpt,
            'category_id' => $request->category_id,
            'author_id' => $request->author_id
        ]);

        return redirect()->route('table');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('/table');
    }
}
