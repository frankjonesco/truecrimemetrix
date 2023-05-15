<x-layout>

    <style>
        .ck-editor__editable {
            min-height: 600px !important;
            margin-bottom: 3rem;
        }
    </style>

    
    <div class="container">
        <h1>Edit this criminal case</h1>
        <h2>Update the criminal case information accordingly and click Update criminal case.</h2>

        <div class="grid grid-cols-1">
            <a href="/dashboard/criminal-cases/{{$criminal_case->hex}}/images/upload" class="btn btn-dark">
                Upload image
            </a>           
        </div>

        <form id="editCriminalCaseForm" action="/dashboard/criminal-cases/{{$criminal_case->hex}}/update" method="post" class="mx-auto w-4/5 mt-16 flex flex-col">
            @csrf
            
            {{-- Title --}}
            @error('title')
                <p class="form-error">
                    Enter a title
                </p>
            @enderror
            <input type="text" name="title" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="Title" value="{{old('title')?:$criminal_case->title}}" autofocus>

            {{-- Status --}}
            @error('status')
                <p class="form-error">
                    Choose a status for the criminal case.
                </p>
            @enderror
            <select name="status" class="text-3xl text-thin text-gray-600 w-2/5 mx-auto mb-20">
                <option value="private" {{$criminal_case->status == 'private' ? 'selected' : null}}>Private</option>
                <option value="public" {{$criminal_case->status == 'public' ? 'selected' : null}}>Public</option>
            </select>

            <div class="flex justify-center">
                <button type="submit" class="btn btn-dark">Update criminal case</button>
            </div>

            

            
        </form>
    </div>

    
</x-layout>