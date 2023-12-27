<x-layout.app :pageHeadings="$pageHeadings">
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
</x-layout.app>