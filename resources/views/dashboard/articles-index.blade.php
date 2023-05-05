<x-layout>
    <div class="container">
        <h1>Articles</h1>
        <h2>Manage the True Crime Metrix articles.</h2>

        <div class="grid grid-cols-1 mt-12">
            <a href="/dashboard/articles/create" class="btn btn-dark">
                New article
            </a>
        </div>

        <div class="grid grid-cols-4 gap-6 border-t p-6">
            @foreach($articles as $article)
                <div>
                    <img src="{{asset('images/articles/'.$article->hex.'/'.$article->main_image)}}" alt="" class="w-fit mb-4">
                    <div class="flex flex-rows">
                        <div class="font-bold leading-5">{{$article->title}}</div>
                        <div>
                        <a href="/dashboard/articles/{{$article->hex}}/edit" class="btn btn-dark btn-sm inline-block">Edit</a></div>
                    </div>
                </div>
            
                <div>
                <img src="{{asset('images/articles/'.$article->hex.'/'.$article->main_image)}}" alt="" class="w-fit mb-4">
                <div class="flex flex-rows">
                    <div class="font-bold leading-5">{{$article->title}}</div>
                    <div>
                    <a href="/dashboard/articles/{{$article->hex}}/edit" class="btn btn-dark btn-sm inline-block">Edit</a></div>
                </div>
            </div>
            
            <div>
                <img src="{{asset('images/articles/'.$article->hex.'/'.$article->main_image)}}" alt="" class="w-fit mb-4">
                <div class="flex flex-rows">
                    <div class="font-bold leading-5">{{$article->title}}</div>
                    <div>
                    <a href="/dashboard/articles/{{$article->hex}}/edit" class="btn btn-dark btn-sm inline-block">Edit</a></div>
                </div>
            </div>
            
            <div>
                <img src="{{asset('images/articles/'.$article->hex.'/'.$article->main_image)}}" alt="" class="w-fit mb-4">
                <div class="flex flex-rows">
                    <div class="font-bold leading-5">{{$article->title}}</div>
                    <div>
                    <a href="/dashboard/articles/{{$article->hex}}/edit" class="btn btn-dark btn-sm inline-block">Edit</a></div>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
</x-layout>