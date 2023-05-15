<x-layout>

    <style>
        .ck-editor__editable {
            min-height: 600px !important;
            margin-bottom: 3rem;
        }
    </style>

    
    <div class="container">
        <h1>Create a new criminal case</h1>
        <h2>Add the information to your new criminal case.</h2>
        <form id="createCriminalForm" action="/dashboard/criminal-cases/store" method="post" class="mx-auto w-4/5 mt-16 flex flex-col">
            @csrf

            {{-- Title --}}
            @error('title')
                <p class="form-error">
                    Enter a title
                </p>
            @enderror
            <input type="text" name="title" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="Title" value="{{old('title')}}" autofocus>
            
            {{-- Caption --}}
            @error('caption')
                <p class="form-error">
                    Enter a caption
                </p>
            @enderror
            <input type="text" name="caption" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center !mb-20" placeholder="Caption" value="{{old('title')}}">

            {{-- Status --}}
            @error('status')
                <p class="form-error">
                    Choose a status for the article
                </p>
            @enderror
            <select name="status" class="text-3xl text-thin text-gray-600 w-2/5 mx-auto mb-20">
                <option value="private">Private</option>
                <option value="public">Public</option>
            </select>

            <div class="flex justify-center">
                <button type="submit" class="btn btn-dark">Create criminal case</button>
            </div>

        </form>
    </div>
</x-layout>