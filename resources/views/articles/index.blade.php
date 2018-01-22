@component('layouts.app', [
    'title' => 'Music Articles',
])
    <div class="max-w-lg mx-auto mt-12 py-4">
        <header class="">
            <section class="">
                <h1 class="h1">
                    Music Articles
                </h1>
            </section>
        </header>
    </div>
    <div class="max-w-lg mx-auto mt-12 py-4">
        @foreach($articles as $category => $articles)
        <h2>{{ $category }}</h2>
        @foreach($articles as $article)
            <article >
                <h3>
                    <a href="{{ $article->url }}" class="">
                        {{ $article->title }}
                    </a>
                </h3>
                <section>
                    {!! $article->summary !!}
                </section>
            </article>
        @endforeach
        @endforeach
    </div>
        @include('partials.footer')
@endcomponent
