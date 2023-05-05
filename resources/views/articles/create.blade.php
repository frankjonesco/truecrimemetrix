<x-layout>
    <div class="container">
        <h1>Create a new article</h1>
        <h2>Add the information to your new article.</h2>
        <form action="/dashboard/articles/store" method="post" class="mx-auto w-4/5 mt-16 flex flex-col">
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
            <input type="text" name="caption" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center !mb-20" placeholder="Caption">

            {{-- Body --}}
            @error('body')
                <p class="form-error">
                    Enter a content for the article body
                </p>
            @enderror
            {{-- <textarea name="body" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center !mb-20" placeholder="Article body"></textarea> --}}
            <textarea id="editor">True Crime Metrix</textarea> 

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
                <button type="submit" class="btn btn-dark">Create article</button>
            </div>

            

            
        </form>
    </div>

    <script>
        tinymce.init({
          selector: "#editor",
          plugins: "advcode advlist advtable anchor autocorrect autolink autosave casechange charmap checklist codesample directionality editimage emoticons export footnotes formatpainter help image insertdatetime link linkchecker lists media mediaembed mergetags nonbreaking pagebreak permanentpen powerpaste searchreplace table tableofcontents tinymcespellchecker typography visualblocks visualchars wordcount",
          toolbar: "undo redo spellcheckdialog  | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | align lineheight checklist bullist numlist | indent outdent | removeformat typography",
          height: '700px',
          toolbar_sticky: true,
          autosave_restore_when_empty: true,
          spellchecker_active: true,
          spellchecker_language: 'en_US',
          spellchecker_languages: 'English (United States)=en_US,English (United Kingdom)=en_GB,Danish=da,French=fr,German=de,Italian=it,Polish=pl,Spanish=es,Swedish=sv',
          typography_langs: [ 'en-US' ],
          typography_default_lang: 'en-US',
          content_style: "@import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,400;0,600;0,700;1,300;1,400;1,600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap');body{background: #fff;font-size: 1.875rem;line-height: 2.25rem;font-weight: 900;font-family: 'Roboto Slab', serif;text-transform: capitalize;letter-spacing: -0.05em;margin-top: 0px;margin-bottom: 0px;text-decoration-line: none;}",
          font_family_formats : "Roboto Slab=roboto slab,serif;"+
            "Poppins=poppins, sans-serif"
        });
      </script>
</x-layout>