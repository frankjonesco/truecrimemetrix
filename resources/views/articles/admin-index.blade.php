<x-layout>
    <div class="container">
        <h1>Articles</h1>
        <h2>Manage the True Crime Metrix articles.</h2>

        <div class="grid grid-cols-1 mb-10">
            <a href="/dashboard/articles/create" class="btn btn-dark">
                New article
            </a>
        </div>

        <x-articles-grid :articles="$articles" />
    </div>
</x-layout>