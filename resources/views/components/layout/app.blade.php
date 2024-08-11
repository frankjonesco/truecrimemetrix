<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>True Crime Metrix - Gallows humour & observational analysis of true crime criminal cases.</title>
    <meta name="description" content="Collection of true crime news, statistics and personality profiles of the best known and hottest criminal cases in the true crime universe.">
    <link rel="icon" type="image/png" href="{{asset('images/truecrimemetrix-ico-32x32.png')}}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    {{-- @vite('resources/css/app.css') --}}

    <link href="{{ asset('build/assets/app-CD_q1-pC.css')}}"  rel="preload" as="style" onload="this.rel='stylesheet'">
    <script src="{{ asset('build/assets/app-I5i9CKeh.js') }}" defer></script>

     <!-- Google AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5443411235770747"
     crossorigin="anonymous"></script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-41956QHQLE"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-41956QHQLE');
    </script>

</head>

<body>
    <main>
        {{$slot}}
    </main>
</body>
</html>