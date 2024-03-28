<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha384-xmFksxyX5n78a4QzirXvDv3jB8vzLOQ8qaTb4avfkQhFf+JzQV63fze/JW2m5KSk" crossorigin="anonymous">

</head>

<body class="font-inter bg-black">

    <div class="px-0  py-0 md:lg:px-[32px] md:lg:py-[25px] flex">


        {{-- Sidebar --}}
        @include('admin.components.sidebar')

        @yield('content')

    </div>

</body>

</html>
