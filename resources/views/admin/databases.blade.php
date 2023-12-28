<x-layout.app :pageHeadings="$pageHeadings" :viewAssets="$viewAssets">
    <div class="flex justify-center gap-3">
        <form 
            action="/admin/databases/clone" 
            method="post"
        >
            @csrf
            <a 
                href="#" 
                class="btn-danger"
                onclick="this.parentNode.submit()"
            >
                Clone database
            </a>
        </form>
    </div>
</x-layout.app>