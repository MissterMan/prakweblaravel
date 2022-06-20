<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //

    public function home()
    {
        $news = News::with(['author', 'category'])->latest();

        if (request('search')) {
            $news->where('news_title', 'like', '%' . request('search') . '%')
                ->orWhere('news_content', 'like', '%' . request('search') . '%');
        }

        return view('home', [
            'news' => $news->paginate(2)
        ]);
    }

    public function show(News $news)
    {
        return view('detailnews', [
            'news_title' => 'news_title',
            'news' => $news
        ]);
    }

    public function showCategories(Category $category)
    {
        return view('komputer', [
            'category_title' => $category->category_name,
            'news' => $category->news->load('category', 'author')
        ]);
    }

    public function profile()
    {
        return view('profile');
    }
}
