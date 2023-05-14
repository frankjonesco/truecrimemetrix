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
                    <div class="w-full aspect-video mb-4">
                        @if($article->image)
                            <div class="w-full h-full bg-no-repeat bg-auto bg-center" style="background-image:url('{{asset('images/articles/'.$article->hex.'/tn-'.$article->image)}}');"></div>
                        @else
                            <div class="bg-gradient-to-tr from-yellow-400 to-amber-100 h-full"></div>
                        @endif
                    </div>
                    
                    <div class="font-bold leading-5 mb-4">{{$article->title}}</div>
                    <div>
                        <a href="/dashboard/articles/{{$article->hex}}/edit" class="btn btn-dark btn-sm">
                            Edit
                        </a>
                    </div>
                </div>
            
            @endforeach
        </div>
    </div>
</x-layout>