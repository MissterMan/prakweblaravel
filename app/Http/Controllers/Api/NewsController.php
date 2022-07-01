<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return new NewsResource(true, 'News List', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'news_title' => 'required',
            'news_content' => 'required',
            'news_slug' => 'required',
            'excerpt' => 'required',
            'category_id'  => 'required',
            'author_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $postnews = News::create([
            'news_title' => $request->news_title,
            'news_content' => $request->news_content,
            'news_slug' => $request->news_slug,
            'excerpt' => $request->excerpt,
            'category_id' => $request->category_id,
            'author_id' => $request->author_id
        ]);
        return new NewsResource(true, 'News added', $postnews);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return new NewsResource(true, 'News Found', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validator = Validator::make($request->all(), [
            'news_title' => 'required',
            'news_content' => 'required',
            'news_slug' => 'required',
            'excerpt' => 'required',
            'category_id'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $news->update([
            'news_title' => $request->news_title,
            'news_content' => $request->news_content,
            'news_slug' => $request->news_slug,
            'excerpt' => $request->excerpt,
            'category_id' => $request->category_id,
        ]);

        return new NewsResource(true, 'News Updated', $news);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return new NewsResource(true, 'Data Deleted', null);
    }
}
