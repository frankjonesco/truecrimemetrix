{{-- SITE NAVIGATION --}}


<nav id="siteNav" class="bg-white">


    {{-- FIXED TOP BAR --}}

    <ul>

        <li>
            <a 
                id="openMainMenuIcon"
                href="#"
                title="Show main menu" 
                aria-label="Show main menu"
            >
                <i class="fa-solid fa-bars"></i>
            </a>
        </li>

        <li>
            <a 
                href="/" 
                title="Go to {{config('app.name')}} homepage" 
                aria-label="Go to {{config('app.name')}} homepage"
            >
                {{config('settings.meta_author')}}
            </a>
        </li>

        <li>
            <a
                id="toggleSearchBar"
                href="#"
                title="Search {{config('app.name')}}" 
                aria-label="Search {{config('app.name')}}"
            >
                <i class="fa-solid fa-search"></i>
            </a>
        </li>

    </ul>

</nav>


{{-- MAIN MENU --}}

<nav id="mainMenu" class="-translate-x-full">

    <a
        id="closeMainMenuIcon"
        href="#"
        title="Close main menu" 
        aria-label="Close main menu"
    >
        <i class="fa-solid fa-times"></i>
    </a>

    <ul>
        
        @auth

            <li>
                    
                <a 
                    href="/admin"
                    title="Go to admin" 
                    aria-label="Go to admin"
                >
                    Admin
                </a>

            </li>

            <li>
                    
                <form 
                    action="/logout" 
                    method="post"
                >
                    @csrf
                    <a 
                        id="slideMenuLastItem"
                        href="#" 
                        onclick="this.parentNode.submit()"
                    >
                        Log out
                    </a>
                </form>

            </li>
            
            
        @else
            
            <li>
                
                <a 
                    href="/login"
                    title="Go to login page" 
                    aria-label="Go to login page"
                >
                    Log in
                </a>

            </li>

        @endauth
        

    </ul>

</nav>


{{-- SEARCH BAR --}}

<div id="navSearchBar">

    <form action="/search" method="POST">

        @csrf

        <input
            id="navSearchInput"
            type="text"
            name="search_term"
            placeholder="Search..."
        >

    </form>

</div>
