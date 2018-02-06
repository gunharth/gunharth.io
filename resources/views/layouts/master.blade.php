<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
        @if($header ?? true)
            @include('partials.header')
        @endif

        {{ $slot }}

        @if(app()->environment('production'))
            @include('partials.analytics')
        @endif
    </body>
</html>
