@extends('master')

@section('judul_halaman', 'Latest Beri.ta 🤙')

@section('konten')

    <div class="home__news-list">
        @if ($news->count())
            @foreach ($news as $item)
                <div class="home__news">
                    <h2><a class="news__title" href="/{{ $item->news_slug }}">{{ $item->news_title }}</a></h2>
                    <p class="news__content">
                        {{ $item->excerpt }}
                    </p>
                    <div class="news__information">
                        <p class="news__writer">{{ $item->author->author_name }}</p>
                        <p class="news__date">{{ $item->created_at->diffForHumans() }}</p>
                    </div>
                    {{-- @dd($item->category->category_name) --}}
                    <div class="news__tag-list">
                        <a href="/categories/{{ $item->category->category_slug }}"
                            class="news__tag">{{ $item->category->category_name }}</a>
                    </div>
                </div>
            @endforeach
            {{ $news->links() }}
        @else
            <p>BERITA TIDAK ADA</p>
        @endif
    </div>
@endsection
