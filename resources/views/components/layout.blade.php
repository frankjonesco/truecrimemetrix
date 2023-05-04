<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TrueCrime Metrix</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,400;0,600;0,700;1,300;1,400;1,600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')

</head>
<body>

    <x-navbar />
    
    <div id="searchSlide" class="!z-40 -translate-y-20 transition-all duration-300 ease-out">
        <div id="searchCard" class="bg-neutral-100 border-b border-b-gray-400 w-screen">
            <div class="container flex justify-center py-1.5 mb-0">
                <input id="searchField" type="text" class="text-xl font-light outline-none !bg-transparent !mb-0 !border-0 focus:ring-0 text-center w-full placeholder-gray-600" autofocus placeholder="Search">
            </div>
        </div>
        <div id="blackout" class="w-screen h-screen fixed hidden bg-gray-900 bg-opacity-60 z-30 transition-all !duration-1000 ease-out"></div> 
            {{$slot}}
        
    </div>

    <script>

        var openMenuIcon = document.getElementById('openMenuIcon');
        var closeMenuIcon = document.getElementById('closeMenuIcon');
        var slideMenu = document.getElementById('slideMenu');
        var toggleSearchIcon = document.getElementById('toggleSearchIcon');
        var searchSlide = document.getElementById('searchSlide');
    
        openMenuIcon.addEventListener('click', function(e){
            showMenu();
            openMenuIcon.classList.toggle('text-white');
            e.preventDefault();
        });
    
        closeMenuIcon.addEventListener('click', function(e){
            hideMenu();
            openMenuIcon.classList.toggle('text-white');
            e.preventDefault();
        });
    
        toggleSearchIcon.addEventListener('click', function(e){
            hideMenu();
            searchSlide.classList.toggle('-translate-y-20');
            document.getElementById('blackout').classList.toggle('hidden');
            document.getElementById("searchField").focus();

            if(openMenuIcon.classList.contains('text-white') === true){
                openMenuIcon.classList.toggle('text-white');
            }

            e.preventDefault();
        });

        function showMenu(){
            closeSearch();
            slideMenu.classList.remove('-left-1/4');
            slideMenu.classList.add('left-0');
            closeMenuIcon.classList.remove('hidden');
        }

        function hideMenu(){
            slideMenu.classList.remove('left-0');
            slideMenu.classList.add('-left-1/4');
            closeMenuIcon.classList.add('hidden');
        }
        
        function closeSearch(){
            if(searchSlide.classList.contains('-translate-y-20') === false){
                searchSlide.classList.toggle('-translate-y-20');
                document.getElementById('blackout').classList.toggle('hidden'); 
            }
        }
        </script>

</body>
</html>