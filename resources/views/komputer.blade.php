@extends('master')

@section('konten')
    <div class="home__news-list">
        <h1>{{ $category_title }}</h1>
        @foreach ($news as $item)
            <div class="home__news">
                <h2><a class="news__title" href="/{{ $item->id }}">{{ $item->news_title }}</a></h2>
                <p class="news__content">
                    {{ $item->excerpt }}
                </p>
                <div class="news__information">
                    <p class="news__writer">Writer</p>
                    <p class="news__date">{{ $item->created_at }}</p>
                </div>
                <div class="news__tag-list">
                    <a href="/kategori/{{ $item->category->slug }}"
                        class="news__tag">{{ $item->category->category_name }}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
