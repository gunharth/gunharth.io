@component('layouts.app', [
    'title' => 'Blog',
])
    <div class="container">
        <header class="blog__header">
            <section class="blog__header__h1">
                <h1 class="h1">
                    Articles
                </h1>
            </section>
            <ul class="blog__header__nav">
                <li class="blog__header__nav__item">
                    <a href="{{ url('blogroll') }}">
                        <span class="icon -s" title="Blogroll">
                            {{ svg('star') }}
                        </span>
                    </a>
                </li>
                <li class="blog__header__nav__item">
                    <a href="{{ url('feed') }}" data-turbolinks="false">
                        <span class="icon -s" title="RSS">
                            {{ svg('rss') }}
                        </span>
                    </a>
                </li>
            </ul>
        </header>
    </div>
    <div class="container -pull-out">
        @foreach($paginator as $article)
            <article class="blog__excerpt">
                <a href="{{ $article->url }}" class="blog__excerpt__date">

                </a>
                <h2 class="blog__excerpt__title">
                    <a href="{{ $article->url }}" class="blog__excerpt__title__link">
                        {{ $article->title }}
                    </a>
                </h2>
                <section class="post-contents">
                    {!! $article->summary !!}
                </section>
                <a href="{{ $article->read_more_url }}" target="sebdd" class="blog__excerpt__readmore">
                    {{ $article->read_more_text ?? 'Read more' }}
                </a>
            </article>
        @endforeach
    </div>
    <div class="container">
        @include('posts.partials.paginator')
        @include('partials.footer')
    </div>
@endcomponent
