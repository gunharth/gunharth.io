<nav class="p-8 sm:pt-0 sm:pr-0 sm:pl-8 sm:pb-0">
    <ul class="list-reset flex justify-center sm:justify-end">
        <li class="p-2 sm:ml-4 font-sans {{ request()->route()->getName() === 'home' ? 'underline' : '' }}">
            <a class="text-grey-darkest  text-lg no-underline hover:underline" href="{{ route('home') }}">Home</a>
        </li>
        <li class="p-2 sm:ml-4 font-sans {{ request()->route()->getName() === 'articles.index' ? 'underline' : '' }}">
            <a class="text-grey-darkest  text-lg no-underline hover:underline" href="{{ route('articles.index') }}">Music Articles</a>
        </li>
        <li class="p-2 sm:ml-4 font-sans {{ request()->route()->getName() === 'about' ? 'underline' : '' }}">
            <a class="text-grey-darkest  text-lg no-underline hover:underline" href="{{ route('about') }}">About</a>
        </li>
    </ul>
</nav>