@component('layouts.app', [
    'title' => 'Music Articles',
])
    <div class="max-w-lg mx-auto mt-12 py-4">
        <header class="">
            <section class="">
                <h1 class="h1">
                    Music Theory Articles
                </h1>
            </section>
        </header>
    </div>
    <div class="max-w-lg mx-auto mt-12 py-4">
        @foreach($articles as $category => $articles)
        <h2>{{ $category }}</h2>

        <ul class="articles">
        @foreach($articles as $article)
            <!-- <article > -->
                <!-- <h3> -->
                    <li><a href="{{ $article->url }}" class="">
                        {{ $article->title }}
                    </a></li>
                <!-- </h3> -->
                <!-- <section>
                    {!! $article->summary !!}
                </section> -->
            <!-- </article> -->
        @endforeach
</ul>
        @endforeach
    </div>
        @include('partials.footer')
@endcomponent
