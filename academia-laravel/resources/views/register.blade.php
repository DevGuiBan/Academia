@use('Illuminate\Support\Facades\Vite')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            <h1 class="text-white text-xl font-bold">Criar conta na Invictus</h1>
            <form action={{route('sign-in')}} method="POST" class="w-full mt-6">
                @csrf
                <label for="nome" class="text-gray-500">Nome Completo</label>
                <input type="text" name="nome" id="nome" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Digite seu nome completo">

                <label for="email" class="text-gray-500">E-mail</label>
                <input type="email" name="email" id="email" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Digite seu e-mail">

                <label for="endereco" class="text-gray-500">Endereço</label>
                <input type="text" name="endereco" id="endereco" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Rua - N° - Estado">

                <label for="password" class="text-gray-500">Senha</label>
                <input type="password" name="password" id="password" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Digite sua senha">

                <input type="submit" value="Criar Conta" class="bg-[#CCFF33] py-2 px-4 rounded mt-5 w-full cursor-pointer text-[#212529]">
            </form>
            <button class="bg-[#212529] py-2 px-4 rounded mt-4 w-full border border-[#CCFF33] cursor-pointer text-[#CCFF33]"><a href={{route('login')}}>Já tenho uma conta</a></button>
        </div>
    </main>
</body>
</html>
