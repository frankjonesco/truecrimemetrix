<x-layout.app :pageHeadings="$pageHeadings">


    {{-- GRID --}}

    <div class="grid grid-cols-4">
        

        @foreach($criminal_cases as $criminal_case)

        {{-- {{dd($criminal_case->category)}} --}}

            {{-- CONTENT LIST ITEM --}}

            <x-cards.content-list-item :resource="$criminal_case" class="content-list-item-vertical" />


        @endforeach

    
    </div>


    {{-- PAGINATION --}}

    {{ $criminal_cases->links() }}
    

</x-layout.app>