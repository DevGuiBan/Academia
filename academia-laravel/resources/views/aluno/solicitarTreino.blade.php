@extends('aluno.sidebar')
<style>
    .space {
        margin-left: 5%;
        margin-top: 4%;
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
    <div class="flex flex-row ">
        <a href="#" style="margin-left: 90%;">
            <svg viewBox="0 0 16 16" class="bell" fill="none" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M3 5C3 2.23858 5.23858 0 8 0C10.7614 0 13 2.23858 13 5V8L15 10V12H1V10L3 8V5Z" fill="#CCFF33"></path>
                    <path d="M7.99999 16C6.69378 16 5.58254 15.1652 5.1707 14H10.8293C10.4175 15.1652 9.30621 16 7.99999 16Z" fill="#CCFF33"></path>
                </g>
            </svg>
        </a>
        <a href={{ route('aluno.profile', session('user_id')) }} class="ml-10 mt-[-5]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#CCFF33" width="30" height="30" viewBox="0 0 24 24">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"></path>
                </g>
            </svg>
        </a>
    </div>
    <h1 class="text-xl font-bold">Solicitar treino</h1>
    <br>
    <div class="flex flex-col items-center w-full max-w-md border border-gray-500 p-6">
        <form action={{route('solicitar-treino',session('user_id'))}} method="POST" class="w-full mt-6">
            @csrf
            <label for="users">Personal</label>
            <select name="users" id="users" class="mt-1 w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded text-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-600">
                @if ($personal)
                    @foreach ($personal as $per)
                        <option value={{$per->id}}>{{$per->name}}</option>
                    @endforeach
                @else
                    <option value="blank">Nenhum Personal Encontrado</option>
                @endif
            </select>
            <br>
            <br>
            <label for="musculo">Grupo Muscular</label>
            <select name="musculo" id="musculo" class="mt-1 w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded text-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-600">
                @if ($treinos)
                    @foreach ($treinos as $treino)
                        <option value={{$treino->id}}>{{$treino->musculo}} - {{$treino->tipo_de_treino}}</option>
                    @endforeach
                @else
                    <option value="blank">Nenhum Treino Encontrado</option>
                @endif
            </select>

            <input type="submit" value="Solicitar Treino" class="bg-[#CCFF33] py-2 px-4 rounded mt-5 w-full cursor-pointer text-[#212529]">
        </form>
        <button class="flex flex-row bg-[#FF3D38] py-2 px-4 rounded text-white w-full">
            <a href={{route('aluno.treino')}} class="mt-1 w-full">Cancelar Solicitação</a>
        </button>
    </div>
    <br>
</div>
@endsection