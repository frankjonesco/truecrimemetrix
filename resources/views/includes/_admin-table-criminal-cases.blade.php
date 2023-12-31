<section class="admin-content">


    {{-- CONTENT HEADING --}}

    <div class="heading">


        <span>Criminal cases</span>


        <div class="flex gap-3">

            <a 
                href="/admin/criminal-cases" 
                class="btn"
            >
                <i class="fa-solid fa-list"></i>
                View all
            </a>
            

            <a
                href="/criminal-cases/create"
                class="btn"
            >
                <i class="fa-solid fa-plus"></i>
                Create category
            </a>


        </div>

    
    </div>


    {{-- CONTNT TABLE --}}

    <table class='content-table'>


        {{-- TABLE HEAD --}}

        <thead>

            <tr>
                <th>Hex</th>
                <th class="text-left">Title</th>
                <th></th>
            </tr>

        </thead>


        {{-- TABLE BODY --}}
                
        <tbody>

            @foreach($criminal_cases as $criminal_case)

                <tr class="{{$loop->iteration % 2 == 0 ? 'alternate-row' : null}}">

                    <td>{{$criminal_case->hex}}</td>
                    <td class="title-thumbnail">
                        
                        <a 
                            href="{{$criminal_case->link()}}" 
                            title="{{$criminal_case->linkLabel()}}" 
                            aria-label="{{$criminal_case->linkLabel()}}"
                        >
                            {{$criminal_case->title}}
                        </a>
                    </td>
                    <td>
                        <x-elements.resource-crud-buttons :resource="$criminal_case" />
                    </td>

                </tr>

            @endforeach

        </tbody>


    </table>


    {{-- PAGINATION --}}

    {{$criminal_cases->links()}}


</section>