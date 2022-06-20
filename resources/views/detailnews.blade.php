@extends('master')

@section('konten')
    <div class="home__news-list">
        <h2>{{ $news->news_title }}</h2>
        <div class="news__information">
            <p class="news__writer">Writer</p>
            <p class="news__date">{{ $news->created_at }}</p>
        </div>
        <p class="news__content">
            {!! $news->news_content !!}
        </p>
        <div class="news__tag-list">
            <a href="" class="news__tag">#Komputer</a>
        </div>
    </div>
@endsection
