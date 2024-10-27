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
    </style>
    <!-- Adicionando tailwindcss -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>
<body>
    <main class="flex justify-center items-center min-h-screen">
        <div class="flex flex-col items-center w-full max-w-md border border-gray-500 p-6" style="height: 80vh;">
            <h1 class="text-white text-xl m-5 font-bold">Bem-Vindo de Volta!</h1>
            <h1 class="text-gray-500 text-sm text-center">Entre na sua conta da Invictus ou crie uma nova.</h1>

            <form action={{url('/authenticate')}} method="POST" class="w-full mt-6">
                @csrf    

                <label for="email" class="text-gray-500">E-mail</label>
                <input type="email" name="email" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Digite seu e-mail">

                <label for="password" class="text-gray-500">Senha</label>
                <input type="password" name="password" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Digite sua senha">

                <input type="submit" value="Entrar" class="bg-[#CCFF33] py-2 px-4 rounded mt-12 w-full cursor-pointer text-[#212529]">
            </form>
            
            <button class="bg-[#212529] py-2 px-4 rounded mt-4 w-full border border-[#CCFF33] cursor-pointer text-[#CCFF33]"><a href={{route('register')}}>Criar Conta</a></button>
        </div>
    </main>
</body>
</html>
