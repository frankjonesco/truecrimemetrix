<nav class="border-b border-b-gray-200 bg-white">
    <div class="container">
        <ul class="w-full flex justify-between items-center text-3xl text-black">
            <li>
                <a href="" id="openMenuIcon">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </li>
            <li>
                <a href="/" class="no-underline">
                    <h1 class="site-logo">true crime metrix.</h1>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-search"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>

{{-- <div class="bg-gray-900 border-b border-b-lime-100">
    <div class="container flex justify-center py-3 mb-0">
        <input type="text" class="text-2xl font-light outline-none !bg-transparent !mb-[0.375rem] !border-0 text-center w-full placeholder-gray-600" autofocus placeholder="Search">
    </div>
</div> --}}

<div id="slideMenu" class="fixed -left-1/4 top-0 w-2/12 h-screen bg-lime-300 transition-all duration-300 ease-in">
    <a href="" id="closeMenuIcon" class="text-3xl text-gray-700 absolute top-6 right-6 hidden transition-all duration-300 ease-in delay-300">
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
    </ul>
</div>


<script>

var openMenuIcon = document.getElementById('openMenuIcon');
var closeMenuIcon = document.getElementById('closeMenuIcon');
var slideMenu = document.getElementById('slideMenu');

openMenuIcon.addEventListener('click', function(e){
    slideMenu.classList.remove('-left-1/4');
    slideMenu.classList.add('left-0');
    closeMenuIcon.classList.remove('hidden');
    e.preventDefault();
});

closeMenuIcon.addEventListener('click', function(e){
    slideMenu.classList.remove('left-0');
    slideMenu.classList.add('-left-1/4');
    closeMenuIcon.classList.add('hidden');
    e.preventDefault();
});

</script>