<x-layout.app :pageHeadings="$pageHeadings" :viewAssets="$viewAssets">

    <x-cards.form class="form-{{$model->form_size}}">

        <form action="{{$resource->link('destroy')}}" method="POST">
            
            @csrf
            @method('DELETE')


            <input 
                type="hidden" 
                name="resource" 
                value="{{$resource}}"
            >


            <div class="field">

                @if($model->has_image == true)

                    <x-cards.content-delete :title="$resource->title" :image="$resource->fetchImage('tn')" />

                @else

                    <x-cards.content-delete :title="$resource->title" />

                @endif

            </div>


            <div class="buttons">

                <button
                    type="submit"
                    class="btn-success"
                >Confirm delete</button>

                <a
                    href="/admin/{{$model->directory}}"
                    class="btn-danger"
                >Cancel</a>

            </div>


        </form>


    </x-cards.form>


</x-layout.template>