@push('head')
<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
@endpush

@component('layouts.app', [
    'title' => $article->title,
])
    <article class="post">
        <header class="post__header">
            <div class="container">
                <div class="post__header__logotype">
                    <a href="{{ url('/') }}" class="logotype"></a>
                </div>
                <h1 class="post__header__title">
                    {{ $article->title }}
                </h1>

            </div>
        </header>
        <section class="post__body">
            <div class="container">
                <div class="post-contents">
                    {!! $article->contents !!}
                </div>
                @if($article->read_more_text)
                    <a href="{{ $article->read_more_url }}" target="sebdd" class="post__body__readmore">
                        {{ $article->read_more_text }}
                    </a>
                @endif
            </div>
        </section>

    </article>
@endcomponent
