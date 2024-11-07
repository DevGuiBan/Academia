@use('Illuminate\Support\Facades\Vite')
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('images/svg/Component1.ico')}}" type="image/x-icon">
    <title>Invictus | Academia Inteligente</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #212529;
            font-family: 'Epilogue', sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            color: white;
        }
        main{
            display: flex;
            flex-direction: row;
            height: 100vh;
        }
        .sidebar{
            width: 20%;
            height: 100vh;
        }
        .content{
            width: 80%;
            height: 100vh;
            margin-left: 20%;
        }
    </style>
    <!-- Adicionando tailwindcss -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>

<body>
    <main>
        <section class="sidebar">
            <div class="flex">
                @yield('sidebar')
            </div>
        </section>
        
        <section class="content">
            <div class="flex">
                @yield('content')
            </div>
        </section>
    </main>
</body>

</html>