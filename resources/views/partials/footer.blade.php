<footer class="flex justify-center m-4">
    <p class="text-lg text-grey-dark">
         © {{ carbon()->format('Y') }}
        <a href="{{ url('about') }}">Gunharth Randolf</a>
        <a class="ml-4 no-underline" href="https://twitter.com/christophrumpel">{{ svg('twitter') }}</a>
        <a class="ml-4 no-underline" href="{{ url('feed') }}">{{ svg('rss') }}</a>
    </p>
</footer>