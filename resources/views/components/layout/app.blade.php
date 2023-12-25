<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset('images/favicon-94x94.png')}}">
    
    @meta_tags


    {{-- GOOGLE FONTS --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,400;0,600;0,700;1,300;1,400;1,600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');">


    <!-- GOOGLE ADSENSE -->

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5443411235770747"
     crossorigin="anonymous"></script>


    <!-- GOOGLE ANALYTICS -->
    
    <script defer src="https://www.googletagmanager.com/gtag/js?id=G-41956QHQLE"></script>
    <script defer>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-41956QHQLE');
    </script>



    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <link href="{{ asset('build/assets/app-gpIJNYej.css')}}"  rel="preload" as="style" onload="this.rel='stylesheet'">
    <script src="{{ asset('build/assets/app-ukowwLvl.js')}}" defer></script>


    

</head>
<body>
    <x-layout.navigation />
    <main>
        {{$slot}}
    </main>
    <x-layout.footer />
    <x-blocks.blackout />
</body>
</html>