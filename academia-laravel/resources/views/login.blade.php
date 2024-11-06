@use('Illuminate\Support\Facades\Vite')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Adicionar o font -->
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #212529;
            font-family: 'Epilogue', sans-serif;
        }

        .home{
            margin-left: 2%;
            margin-top: 2%;
            position: fixed;
        }
    </style>
    <!-- Adicionando tailwindcss -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>
@if (session('error'))
<script>
    alert('Credenciais Inválidas');
</script>
@endif
<body>
    <header>
    <a class="home" href="{{route('homepage')}}">
            <svg width="40" height="40" viewBox="0 0 4242 3001" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1595.44 0C1596.09 0 1596.7 0.31526 1597.08 0.845479L2119.14 739.301C2119.93 740.428 2121.61 740.428 2122.4 739.301L2644.46 0.84546C2644.83 0.31524 2645.44 0 2646.09 0H4239.53C4241.15 0 4242.1 1.82985 4241.17 3.15454L3707.52 758H2664.65V890H3614.2L3052.17 1685H2681.65V1817H2958.85L2122.4 3000.16C2121.6 3001.29 2119.93 3001.29 2119.13 3000.16L1282.69 1817H1629.65V1685H1189.37L627.334 890H1618.65V758H534.016L0.370398 3.15455C-0.566105 1.82986 0.3812 0 2.0035 0H1595.44Z" fill="#CCFF33"/>
            </svg>
        </a>
    </header>
    <main class="flex justify-center items-center min-h-screen">
        <div class="flex flex-col items-center w-full max-w-md border border-gray-500 p-6" style="height: 80vh;">
            <h1 class="text-white text-xl m-5 font-bold">Bem-Vindo de Volta!</h1>
            <h1 class="text-gray-500 text-sm text-center">Entre na sua conta da Invictus ou crie uma nova.</h1>

            <form action={{route('authenticate')}} method="POST" class="w-full mt-6">
                @csrf

                <label for="email" class="text-gray-500">E-mail</label>
                <input type="email" name="email" id="email" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Digite seu e-mail">

                <label for="password" class="text-gray-500">Senha</label>
                <input type="password" name="password" id="password" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Digite sua senha">

                <input type="submit" value="Entrar" class="bg-[#CCFF33] py-2 px-4 rounded mt-12 w-full cursor-pointer text-[#212529]">
            </form>

            <button class="bg-[#212529] py-2 px-4 rounded mt-4 w-full border border-[#CCFF33] cursor-pointer text-[#CCFF33]"><a href={{route('register')}}>Criar Conta</a></button>
        </div>
    </main>
</body>

</html>