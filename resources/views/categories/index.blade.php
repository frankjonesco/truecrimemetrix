<x-layout.app :pageHeadings="$pageHeadings">

    {{-- GRID --}}

    <div class="grid grid-cols-2">


        @foreach($categories as $category)


            {{-- CATEGORY LIST ITEM --}}

            <x-cards.category-list-item :category="$category" />


        @endforeach
    

    </div>


    {{-- PAGINATION --}}

    {{ $categories->links() }}


</x-layout.app>