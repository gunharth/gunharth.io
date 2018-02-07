@extends('layouts.master')

@section('meta')
    <meta property="og:url" content="{{ $article->url }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{ $article->title }}"/>
    <meta property="og:description" content="{{ strip_tags($article->summary) }}"/>
    <meta property="og:image" content="{{ $article->preview_image }}"/>

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@gunharth" />
    <meta name="twitter:title" content="{{ $article->title }}" />
    <meta name="twitter:description" content="{{ strip_tags($article->summary) }}" />
    <meta name="twitter:image" content="{{ $article->preview_image }}" />
@endsection

@section('content')
    <article class="mt-8 mb-8">
        <time class="mb-2 text-grey-darkest font-bold uppercase text-med"> | <span
                    class="text-orange">Cat</span>
        </time>
        <h1 class="mt-2 mb-8 text-grey-darkest text-4xl">{{ $article->title }}</h1>

        <header class="font-sans leading-normal font-sans text-xl text-grey-darkest font-bold mb-8">
            {!!  $article->summary !!}
        </header>
        {!! $article->contents !!}

        @include('layouts.partials.topbutton')

    </article>

@endsection