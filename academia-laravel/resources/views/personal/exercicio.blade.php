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
    <h1>Exercicíos</h1>
    <br>
    <p>Exercicíos cadastrados</p>

    <table class="tabela text-center border border-gray-500" style="background-color: #343a40;">
        <thead>
            <tr>
                <th class="p-2 border border-[#CCFF33]">Grupo de Músculos</th>
                <th class="p-2 border border-[#CCFF33]">Exercício</th>
                <th class="p-2 border border-[#CCFF33]">Repetições</th>
            </tr>
        </thead>
        <tbody class="border border-gray-500">
            <tr class="bg-[#212529]">
                <td class="p-2">Peito</td>
                <td class="p-2">Peck Deck</td>
                <td class="p-2">4 x 12</td>
            </tr>
            <tr class="bg-[#212529]">
                <td class="p-2">Peito</td>
                <td class="p-2">Supino Reto</td>
                <td class="p-2">4 x 12</td>
            </tr>
            <tr class="bg-[#212529]">
                <td class="p-2">Peito</td>
                <td class="p-2">Supino Declinado</td>
                <td class="p-2">4 x 12</td>
            </tr>
            <tr class="bg-[#212529]">
                <td class="p-2">Peito</td>
                <td class="p-2">Supino Inclinado</td>
                <td class="p-2">4 x 10</td>
            </tr>
        </tbody>
    </table>
    <br>
    <button class="editButton bg-[#CCFF33] py-2 px-4 rounded max-w-md mt-4 text-[#212529]"><a href="#">Editar Exercicío</a></button>
</div>
@endsection