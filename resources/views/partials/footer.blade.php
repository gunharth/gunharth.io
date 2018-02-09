<footer class="flex justify-center m-4">
    <p class="text-lg text-grey-dark">
         © {{ carbon()->format('Y') }}
        <a href="{{ url('about') }}">Gunharth Randolf</a>
        <a class="ml-4 no-underline" href="https://twitter.com/gunharth" target="_blank" data-turbolinks="false">{{ svg('twitter_2') }}</a>
        <a class="ml-4 no-underline" href="https://github.com/gunharth" target="_blank" data-turbolinks="false">{{ svg('github') }}</a>
        <a class="ml-4 no-underline" href="{{ url('feed') }}" target="_blank" data-turbolinks="false">{{ svg('rss_2') }}</a>
    </p>
</footer>