@extends('personal.sidebar')
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
        background-color: #343a40;
    }

    .tamTitle {
        font-size: x-large;
    }
</style>
@section('content')
@if (session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
@endif

@if (session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
@endif
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
        <a href={{ route('personal.profile', session('user_id')) }} class="ml-10 mt-[-5]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#CCFF33" width="30" height="30" viewBox="0 0 24 24">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"></path>
                </g>
            </svg>
        </a>
    </div>
    <h1 class="text-xl font-bold">Treino</h1>
    <br>
    @if (isset($training))
    <div class="flex flex-col items-center w-full max-w-md border border-gray-500 p-6">
        <form action={{route('personal.updateTraining',['training_id'=>$training->id])}} method="POST" class="w-full mt-6">
            @csrf
            @method('PUT')
            <label for="musculo" class="text-gray-500">Grupo Trabalhado</label>
            <input type="text" name="musculo" id="musculo" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" value={{$treino->musculo}}>

            <label for="tipo_treino" class="text-gray-500">Tipo de Treino</label>
            <input type="text" name="tipo_de_treino" id="tipo_treino" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" value={{$treino->tipo_de_treino}}>

            <input type="submit" value="Salvar" class="bg-[#CCFF33] py-2 px-4 rounded mt-5 w-full cursor-pointer text-[#212529]">
        </form>
        <form action={{route('personal.deleteTraining',['id'=>$training->id])}} method="POST" class="w-full">
            @csrf
            @method('DELETE')

            <input type="submit" value="Excluir" class="bg-[#FF3D38] text-white py-2 px-4 rounded mt-5 w-full cursor-pointer text-[#212529]">
        </form>
    </div>

    @else
    <div class="flex flex-col items-center w-full max-w-md border border-gray-500 p-6">
        <form action={{route('personal.create',['id'=>session('user_id')])}} method="POST" class="w-full mt-6">
            @csrf
            <label for="musculo" class="text-gray-500">Grupo Trabalhado</label>
            <input type="text" name="musculo" id="musculo" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Costa">

            <label for="tipo_treino" class="text-gray-500">Tipo de Treino</label>
            <input type="text" name="tipo_de_treino" id="tipo_treino" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Força">

            <input type="submit" value="Salvar" class="bg-[#CCFF33] py-2 px-4 rounded mt-5 w-full cursor-pointer text-[#212529]">
        </form>
    </div>
    @endif

</div>
@endsection