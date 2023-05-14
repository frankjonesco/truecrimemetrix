<x-layout>

    <style>
        .ck-editor__editable {
            min-height: 600px !important;
            margin-bottom: 3rem;
        }
    </style>

    
    <div class="container">
        <h1>Edit this article</h1>
        <h2>Update the article information accordingly and click Update article.</h2>

        <div class="grid grid-cols-1">
            <a href="/dashboard/articles/{{$article->hex}}/images/upload" class="btn btn-dark">
                Upload image
            </a>           
        </div>

        <form id="editArticleForm" action="/dashboard/articles/{{$article->hex}}/update" method="post" class="mx-auto w-4/5 mt-16 flex flex-col">
            @csrf
            
            {{-- Title --}}
            @error('title')
                <p class="form-error">
                    Enter a title
                </p>
            @enderror
            <input type="text" name="title" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="Title" value="{{old('title')?:$article->title}}" autofocus>
            
            {{-- Caption --}}
            @error('caption')
                <p class="form-error">
                    Enter a caption
                </p>
            @enderror
            <input type="text" name="caption" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center !mb-20" placeholder="Caption" value="{{old('caption')?:$article->caption}}">

            {{-- Body --}}
            @error('body')
                <p class="form-error">
                    Enter a content for the article body
                </p>
            @enderror
            {{-- <textarea name="body" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center !mb-20" placeholder="Article body"></textarea> --}}
            {{-- <textarea id="editor">True Crime Metrix</textarea>  --}}
            <div class="article-body mx-0">
                <textarea id="editor" name="body">
                    {!!$article->body!!}
                </textarea>
            </div>



            <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor' ), {
                        ckfinder: {
                            uploadUrl: '/dashboard/articles/{{$article->hex}}/upload-article-images?_token={{csrf_token()}}',
                        }
                    })
                    .catch( error => {
                        console.error( error );
                    } );
            </script>

            {{-- Status --}}
            @error('status')
                <p class="form-error">
                    Choose a status for the article.
                </p>
            @enderror
            <select name="status" class="text-3xl text-thin text-gray-600 w-2/5 mx-auto mb-20">
                <option value="private" {{$article->status == 'private' ? 'selected' : null}}>Private</option>
                <option value="public" {{$article->status == 'public' ? 'selected' : null}}>Public</option>
            </select>

            <div class="flex justify-center">
                <button type="submit" class="btn btn-dark">Update article</button>
            </div>

            

            
        </form>
    </div>

    {{-- <script>
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
      </script> --}}
</x-layout>