<div class="border-b py-4 pb-6 px-10">

    <div class="w-full flex justify-between items-start text-3xl font-bold tracking-tight leading-7">
        

        {{-- TITLE & DESCRIPTION --}}

        <span>
            
            <a 
                href="{{$category->link()}}" 
                aria-label="{{$category->linkLabel()}}"
                class="block no-underline animation-300 hover:translate-y-1 hover:text-red-400"
                >
                {{$category->name}}
            </a>

            <div class="font-thin text-xl mt-3">{{$category->description}}</div>

        </span>


        {{-- COUNT --}}

        <span>
            {{-- {{count($category->criminal_cases)}} --}}
        </span> 


    </div>

                
</div>