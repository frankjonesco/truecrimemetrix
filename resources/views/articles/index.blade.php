<x-layout>
    <div class="container">
        <h1>True Crime News Articles</h1>
        <h2>Browse our list of news articles on true crime.</h2>

        <div class="grid grid-cols-4 gap-6 border-t p-6">
            @foreach($articles as $article)
                <div>
                    <div class="w-full aspect-video mb-4">
                        @if($article->image)
                            <div class="w-full h-full bg-no-repeat bg-cover bg-center" style="background-image:url('{{asset('images/articles/'.$article->hex.'/tn-'.$article->image)}}');"></div>
                        @else
                            <div class="bg-gradient-to-tr from-yellow-400 to-amber-100 h-full"></div>
                        @endif
                    </div>
                    
                    <div class="font-bold leading-5 mb-4">
                        <a href="/articles/{{$article->hex}}">
                            {{$article->title}}
                        </a>
                    </div>
                    
                </div>
            
            @endforeach
        </div>
    </div>
</x-layout>