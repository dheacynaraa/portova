<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
style="
margin:0;
padding:0;
background:#0B1112;
font-family:'Space Grotesk',sans-serif;
">
      
    
    @include('partials.navbar')

    <main style="background:#0B1112;">
    @yield('content')
    </main>

    @include('partials.footer')

    
</body>
</html>