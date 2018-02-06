@extends('layouts.post')

@section('meta')
    <meta property="og:url" content="{{ Request::url() }}"/>

@endsection



@section('content')

    <div class="max-w-lg mx-auto">
        <h1 class="mt-2 mb-8 text-grey-darkest text-4xl">Music Theory Articles</h1>
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


@endsection
