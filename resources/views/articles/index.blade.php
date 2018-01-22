@component('layouts.app', [
    'title' => 'Blog',
])
    <div class="container">
        <header class="">
            <section class="">
                <h1 class="h1">
                    Articles
                </h1>
            </section>
            <ul class="">
                <li class="">
                    <a href="{{ url('blogroll') }}">
                        <span class="icon -s" title="Blogroll">
                            {{ svg('star') }}
                        </span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('feed') }}" data-turbolinks="false">
                        <span class="icon -s" title="RSS">
                            {{ svg('rss') }}
                        </span>
                    </a>
                </li>
            </ul>
        </header>
    </div>
    <div class="container">
        @foreach($articles as $category => $articles)
        <h2>{{ $category }}</h2>
        @foreach($articles as $article)
            <article class="">
                <h3 class="">
                    <a href="{{ $article->url }}" class="">
                        {{ $article->title }}
                    </a>
                </h3>
                <section class="post-contents">

                </section>
                <a href="{{ $article->read_more_url }}" target="sebdd" class="">
                    {{ $article->read_more_text ?? 'Read more' }}
                </a>
            </article>
        @endforeach
        @endforeach
    </div>
    <div class="container">
        @include('partials.footer')
    </div>
@endcomponent
