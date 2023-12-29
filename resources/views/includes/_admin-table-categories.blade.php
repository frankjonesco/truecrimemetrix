<section class="admin-content">

    <div class="heading">


        <span>Categories</span>


        <div class="flex gap-3">

            <a 
                href="/admin/categories" 
                class="btn"
            >
                <i class="fa-solid fa-list"></i>
                View all
            </a>
            

            <a
                href="/categories/create"
                class="btn"
            >
                <i class="fa-solid fa-plus"></i>
                Create category
            </a>


        </div>

    
    </div>



    <table class='content-table'>

        <thead>
            <tr>
                <th>Hex</th>
                <th class="text-left">Name</th>
                <th></th>
            </tr>
        </thead>
                
        <tbody>

            @foreach($categories as $category)
                <tr class="{{$loop->iteration % 2 == 0 ? 'alternate-row' : null}}">
                    <td>{{$category->hex}}</td>
                    <td class="flex justify-start items-center gap-3">
                        <div class="w-4 h-3 bg-{{$category->color}}"></div>
                        <a 
                            href="{{$category->link()}}" 
                            title="{{$category->linkLabel()}}" 
                            aria-label="{{$category->linkLabel()}}"
                        >
                            {{$category->name}}
                        </a>
                    </td>
                    <td>
                        <x-elements.resource-crud-buttons :resource="$category" />
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>


    {{ $categories->links(); }}

</section>