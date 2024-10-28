@extends('personal.sidebar')
<style>
    .space {
        margin-left: 5%;
        margin-top: 7%;
    }

    .bell {
        margin-left: 90%;
    }

    .buttonAdd{
        margin-left: 60%;
    }

    .card {
        background-color: #343A40;
        width: 15%;
        padding: 1rem;
        margin-right: 1rem;
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
    <h1 class="tamTitle">Treinos</h1>
    <br>
    <div class="flex flex-row">
        <p>Treinos cadastrados</p>
        <button class="flex flex-row bg-[#CCFF33] py-2 px-4 buttonAdd rounded text-[#212529]">
            <svg viewBox="0 0 24 24" width="30" height="30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <rect width="24" height="24" fill="none"></rect>
                    <path d="M12 6V18" stroke="#212529" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M6 12H18" stroke="#212529" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
            <a href="#" class="mt-1">Adicionar Treino</a>
        </button>
    </div>

    <br>
    <div class="flex flex-row">
        <div class="flex flex-col rounded card">
            <h1>Peitoral</h1>
            <br>
            <p class="text-gray-400">Hipertrofia</p>
        </div>
        <div class="flex flex-col rounded card">
            <h1>Costas</h1>
            <br>
            <p class="text-gray-400">Hipertrofia</p>
        </div>
        <div class="flex flex-col rounded card">
            <h1>Abdomêm</h1>
            <br>
            <p class="text-gray-400">Força</p>
        </div>
    </div>


</div>
@endsection