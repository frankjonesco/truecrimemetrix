<x-layout>
    
    <div class="container">
        <h1>Edit this topic</h1>
        <h2>Update the topic information accordingly and click Update topic.</h2>

        <div class="grid grid-cols-1">
            <a href="/dashboard/topics/{{$topic->hex}}/images/upload" class="btn btn-dark">
                Upload image
            </a>           
        </div>

        <form id="editTopicForm" action="/dashboard/topics/{{$topic->hex}}/update" method="post" class="mx-auto w-4/5 mt-16 flex flex-col">
            @csrf

            {{-- Criminal Case --}}
            @error('criminal_case_id')
                <p class="form-error">
                    Choose a criminal case for this topic.
                </p>
            @enderror
            <select name="criminal_case_id" class="text-3xl text-thin text-gray-600 w-3/4 mx-auto">
                <option disabled selected>Select a criminal case</option>
                @foreach ($criminal_cases as $criminal_case)
                    <option class="text-center" value="{{$criminal_case}}" {{$topic->criminal_case_id == $criminal_case->id ? 'selected' : null}}>{{$criminal_case->title}}</option>
                @endforeach
            </select>
            
            {{-- Title --}}
            @error('title')
                <p class="form-error">
                    Enter a title
                </p>
            @enderror
            <input type="text" name="title" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="Criminal case title" value="{{old('title')?:$topic->title}}" autofocus>

            {{-- Status --}}
            @error('status')
                <p class="form-error">
                    Choose a status for the topic.
                </p>
            @enderror
            <select name="status" class="text-3xl text-thin text-gray-600 w-2/5 mx-auto mb-20">
                <option class="text-center" value="private" {{$topic->status == 'private' ? 'selected' : null}}>Private</option>
                <option class="text-center" value="public" {{$topic->status == 'public' ? 'selected' : null}}>Public</option>
            </select>

            <div class="flex justify-center">
                <button type="submit" class="btn btn-dark">Update topic</button>
            </div>

            

            
        </form>
    </div>

    
</x-layout>