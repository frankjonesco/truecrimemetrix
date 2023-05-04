<nav class="border-b border-b-gray-200 bg-white fixed w-screen top-0 z-40">
    <div class="container">
        <ul class="w-full flex justify-between items-center text-3xl">
            <li>
                <a href="#" id="openMenuIcon">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </li>
            <li>
                <a href="/" class="site-logo">
                    true crime metrix.
                </a>
            </li>
            <li>
                <a href="#" id="toggleSearchIcon">
                    <i class="fa-solid fa-search"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>



<div id="slideMenu" class="fixed -left-1/4 top-0 w-2/12 h-screen border-r border-r-gray-900 bg-amber-300 bg-opacity-90 z-50 transition-all duration-300 ease-in">
    <a href="" id="closeMenuIcon" class="text-3xl text-gray-900 hover:text-gray-900 absolute top-6 right-6 hidden transition-all duration-150 ease-in hover:-translate-y-1">
        <i class="fa-solid fa-times"></i>
    </a>
    <ul>
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/">Criminals</a>
        </li>
        <li>
            <a href="/">Prosecutors</a>
        </li>
        <li>
            <a href="/">Defence Attornies</a>
        </li>
        <li>
            <a href="/">Judges</a>
        </li>
        @auth
            <li>
                <a href="/dashboard">Dashboard</a>
            </li>
            <li>
                <form action="/logout" class="inline" method="POST">
                    @csrf
                    <a href="#" onclick="this.parentNode.submit()" class="py-3 px-3 mx-2 ">Logout</a>
                </form>
                
            </li>
        @else
            <li>
                <a href="/signup">Sign up</a>
            </li>
            <li>
                <a href="/login">Log in</a>
            </li>
        @endauth
    </ul>
</div>


