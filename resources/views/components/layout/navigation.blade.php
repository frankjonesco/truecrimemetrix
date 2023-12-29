{{-- SITE NAVIGATION --}}

<nav id="siteNav" class="bg-white">
    

    <ul>


        {{-- MAIN MENU ICON --}}

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


        {{-- APP NAME --}}

        <li>
            <a 
                href="/" 
                title="Go to {{config('app.name')}} homepage" 
                aria-label="Go to {{config('app.name')}} homepage"
            >
                {{config('app.name')}}
            </a>
        </li>


        {{-- SEARCH AND ADMIN ICONS --}}

        <li>
            @auth
                <a
                    href="/admin"
                    title="Admin - Manage content" 
                    aria-label="Admin - Manage content"
                >
                    <i class="fa-solid fa-hammer"></i>
                </a>
            @endauth

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


    {{-- CLOSE MENU ICON --}}

    <x-blocks.container class="close-icon">
        <a
            id="closeMainMenuIcon"
            href="#"
            title="Close main menu" 
            aria-label="Close main menu"
        >
            <i class="fa-solid fa-times"></i>
        </a>
    </x-blocks.container>



    {{-- MAIN MENU --}}

    <ul>


        {{-- CATEGORIES --}}

        <li>
                
            <a 
                href="/categories"
                title="True crime categories" 
                aria-label="True crime categories"
            >
                Categories
            </a>

        </li>

        
        @auth


            {{-- ADMIN --}}

            <li>
                    
                <a 
                    href="/admin"
                    title="Go to admin" 
                    aria-label="Go to admin"
                >
                    Admin
                </a>

            </li>


            {{-- LOG OUT --}}

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

            
            {{-- LOG IN --}}
            
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