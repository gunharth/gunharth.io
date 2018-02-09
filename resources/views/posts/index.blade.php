@extends('layouts.master')

@section('meta')

@endsection

@section('content')
    <ul class="flex flex-col p-0 mt-0 mb-0 sm:justify-center w-full white flex-grow">
        @foreach($paginator as $post)
            <li class="mb-6 w-full list-reset">
                <time class="mb-0 text-grey-darkest font-bold uppercase text-sm font-sans">{{ $post->dateShort }} |
                    <span class="text-orange">{{ $post->category }}</span>
                </time>
                <h2 class="mt-0 mb-2 text-grey-darkest text-lg lg:text-xl">
                    <a class="no-underline" href="{{ $post->url }}">{{ $post->title }}</a>
                </h2>
                <p class="blogsummary hidden  text-base md:block">{!! $post->summary_short !!}</p>
                <a class="text-blue-light text-sm" href="{{ $post->url }}">Read more</a>
            </li>
        @endforeach
    </ul>

    {!! $paginator->render() !!}

@endsection
