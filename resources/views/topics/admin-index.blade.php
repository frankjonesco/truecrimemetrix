<x-layout>
    <div class="container">
        <h1>Topic</h1>
        <h2>Manage the topics on True Crime Metrix.</h2>

        <div class="grid grid-cols-1 mb-10">
            <a href="/dashboard/topics/create" class="btn btn-dark">
                New Topic
            </a>
        </div>

        <div class="grid grid-cols-4 gap-6 border-t p-6">
            @foreach($topics as $topic)
                <div>
                    <div class="w-full aspect-video mb-4">
                        @if($topic->image)
                            <div class="w-full h-full bg-no-repeat bg-cover bg-center" style="background-image:url('{{asset('images/topics/'.$topic->hex.'/tn-'.$topic->image)}}');"></div>
                        @else
                            <div class="bg-gradient-to-tr from-cyan-400 to-teal-200 h-full"></div>
                        @endif
                    </div>
                    
                    <div class="font-bold leading-5 mb-4">{{$topic->title}}</div>
                    <div>
                        <a href="/dashboard/topics/{{$topic->hex}}/edit" class="btn btn-dark btn-sm">
                            Edit
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>