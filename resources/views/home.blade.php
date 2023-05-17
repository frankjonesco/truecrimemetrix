<x-layout>
    <div class="container">
        <h1>
            Welcome to our True Crime blog
        </h1>
        <h2>
            We bring <span class="font-bold">news stories</span> and <span class="font-bold">opions</span> on some of the craziest courtroom spectacles to be ever broadcast to the public.
        </h2>
        <x-articles-grid :articles="$articles" />
    </div>
</x-layout>