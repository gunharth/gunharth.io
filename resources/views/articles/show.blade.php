@push('head')
<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
@endpush

@component('layouts.app', [
    'title' => $article->title,
])
    <article class="max-w-lg mx-auto mt-12 py-4">
        <header>
            <h1>{{ $article->title }}</h1>
        </header>
        <section>
            {!! $article->contents !!}

            @if($article->read_more_text)
                <a href="{{ $article->read_more_url }}" target="sebdd" class="post__body__readmore">
                    {{ $article->read_more_text }}
                </a>
            @endif
    </article>
@endcomponent
