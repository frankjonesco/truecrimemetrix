<nav id="siteNav">
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
                title="Go to True Crime Metrix homepage" 
                aria-label="Go to True Crime Metrix homepage"
            >
                True Crime Metrix
            </a>
        </li>
        <li>
            <a
                id="toggleSearchBar"
                href="#"
                title="Search True Crime Metrix" 
                aria-label="Search True Crime Metrix"
            >
                <i class="fa-solid fa-search"></i>
            </a>
        </li>
    </ul>
</nav>

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
        <li>
            <a 
                href="/login"
                title="Go to login page" 
                aria-label="Go to login page"
            >
                Log in
            </a>
        </li>
    </ul>
</nav>

<div id="navSearchBar">
    <form action="/search" method="POST">
        @csrf
        <input id="navSearchInput" type="text" name="search_term" placeholder="Search...">
    </form>
</div>
