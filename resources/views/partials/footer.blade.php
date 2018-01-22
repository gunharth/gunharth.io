<footer class="max-w-lg mx-auto mt-12 py-4">
    <div>
        © {{ carbon()->format('Y') }}
        <a href="{{ url('about') }}">Gunharth Randolf</a>
    </div>
    <a href="{{ url('feed') }}" data-turbolinks="false" class="footer__rss">
        <span class="icon -xs" title="RSS">
            {{ svg('rss') }}
        </span>
    </a>
</footer>
