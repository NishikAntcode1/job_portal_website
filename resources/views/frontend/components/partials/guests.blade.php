<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title CSS -->
    <title>Jovie - Job Board & Portal HTML Template</title>
    
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>

    @vite(['resources/js/app.js', 'resources/css/app.css'])


    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset("/assets/img/favicon.png") }}">
</head>
<body>
    @include('components.pre_loader')
    @include('components.navbar')
    
    {{ $slot }}

    @include('components.subscribe')
    @include('components.footer')
    @include('components.back_to_top')
    
</body>
</html>