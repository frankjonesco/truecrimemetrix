<x-layout>
    
    <div class="container">
        <h1>Create a new topic</h1>
        <h2>Add the information to your new topic.</h2>

        <form id="editTopicForm" action="/dashboard/topics/store" method="post" class="mx-auto w-4/5 mt-16 flex flex-col">
            @csrf

            {{-- Criminal Case --}}
            @error('criminal_case_id')
                <p class="form-error">
                    Choose a criminal case for this topic.
                </p>
            @enderror
            <select name="criminal_case_id" class="text-3xl text-thin text-gray-600 w-2/5 mx-auto mb-20">
                <option disabled selected>Select a criminal case</option>
                @foreach ($criminal_cases as $criminal_case)
                    <option value="{{$criminal_case->id}}" {{$criminal_case->id == old('criminal_case_id') ? 'selected' : null}}>{{$criminal_case->title}}</option>
                @endforeach
            </select>
            
            {{-- Title --}}
            @error('title')
                <p class="form-error">
                    Enter a title
                </p>
            @enderror
            <input type="text" name="title" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="Topic title" value="{{old('title')}}" autofocus>

            {{-- Status --}}
            @error('status')
                <p class="form-error">
                    Choose a status for the topic.
                </p>
            @enderror
            <select name="status" class="text-3xl text-thin text-gray-600 w-2/5 mx-auto mb-20">
                <option value="private" {{old('status') == 'private' ? 'selected' : null}}>Private</option>
                <option value="public" {{old('status') == 'public' ? 'selected' : null}}>Public</option>
            </select>

            <div class="flex justify-center">
                <button type="submit" class="btn btn-dark">Create topic</button>
            </div>

            

            
        </form>
    </div>

    
</x-layout>