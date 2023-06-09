<nav class="border-b border-b-gray-200 bg-white fixed w-screen top-0 z-40">
    <div class="container">
        <ul class="w-full flex justify-between items-center text-3xl">
            <li>
                <a href="#" id="openMenuIcon">
                    <i class="fa-solid fa-bars" id="menuBars"></i>
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



<div id="slideMenu" class="-left-1/4">
    <div class="flex justify-between p-6 bg-gray-900 text-white">
        <div class="menu-heading">Menu</div>
        <a href="#" id="closeMenuIcon" class="text-3xl hover:text-2xl !text-white flex justify-center items-center transition-all duration-150 ease-in hover:bg-yellow-300 hover:!text-gray-900 w-9 aspect-square rounded-full no-underline">
            <i class="fa-solid fa-times"></i>
        </a>
    </div>
    <ul>
        <li>
            <a href="/" id="homeBtn">Home</a>
        </li>
        <li>
            <a href="/criminal-cases">Criminal Cases</a>
        </li>
        <li>
            <a href="/articles">Articles</a>
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

<script>



    
</script>


