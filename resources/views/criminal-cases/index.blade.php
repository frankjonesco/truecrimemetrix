<x-layout.app :pageHeadings="$pageHeadings">


    {{-- GRID --}}

    <div class="grid-4-cols">
        

        @foreach($criminal_cases as $criminal_case)


            {{-- CONTENT LIST ITEM --}}

            <x-cards.content-list-item :resource="$criminal_case" class="content-list-item-vertical" />


        @endforeach

    
    </div>


    {{-- PAGINATION --}}

    {{ $criminal_cases->links() }}
    

</x-layout.app>