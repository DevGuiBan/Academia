@extends('personal.sidebar')
<style>
    .space {
        margin-left: 5%;
        margin-top: 7%;
    }

    .bell {
        margin-left: 90%;
    }

    .tabela {
        width: 70%;
    }

    .editButton {
        width: 20%;
        transition: background-color 0.5s ease-in-out;
    }

    .editButton:hover {
        background-color: #86B201;
    }

    .tamTitle {
        font-size: x-large;
    }
</style>
@section('content')
<div class="flex flex-col space w-full">
    <a href="#">
        <svg viewBox="0 0 16 16" class="bell" fill="none" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path d="M3 5C3 2.23858 5.23858 0 8 0C10.7614 0 13 2.23858 13 5V8L15 10V12H1V10L3 8V5Z" fill="#CCFF33"></path>
                <path d="M7.99999 16C6.69378 16 5.58254 15.1652 5.1707 14H10.8293C10.4175 15.1652 9.30621 16 7.99999 16Z" fill="#CCFF33"></path>
            </g>
        </svg>
    </a>
    <h1 class="text-xl font-bold">Exercicíos</h1>
    <br>
    <div class="flex flex-col items-center w-full max-w-md border border-gray-500 p-6">
            <form action="" method="POST" class="w-full mt-6">
                @csrf
                <label for="nome" class="text-gray-500">Nome do Exercicio</label>
                <input type="text" name="nome" id="nome" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Digite o nome do exercicio">

                <label for="repeticoes" class="text-gray-500">Quantidade de Repetições</label>
                <input type="text" name="repeticoes" id="repeticoes" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Ex: 10 x 5">

                <label for="link" class="text-gray-500">Link de visualização</label>
                <input type="text" name="link" id="link" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="https://youtube.com/asdasdjb">

                <label for="tipo_treino" class="text-gray-500">Grupo Muscular</label>
                <input type="text" name="tipo_treino" id="tipo_treino" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Panturrilha">

                <input type="submit" value="Salvar" class="bg-[#CCFF33] py-2 px-4 rounded mt-5 w-full cursor-pointer text-[#212529]">
            </form>
        </div>
    <br>
</div>
@endsection