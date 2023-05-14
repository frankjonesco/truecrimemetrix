<div class="container">
    @if(session()->has('success'))
        <div class="w-fit px-4 py-2 mx-auto mt-10 bg-lime-400 border border-lime-500 rounded shadow text-gray-900">
            Some alert here.
        </div>
    @endif   
</div>