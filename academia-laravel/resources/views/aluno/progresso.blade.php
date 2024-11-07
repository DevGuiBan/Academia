@extends('aluno.sidebar')
<style>
    .space {
        margin-left: 5%;
        margin-top: 7%;
    }

    .bell {
        margin-left: 90%;
    }

    .buttonAdd {
        margin-left: 60%;
        transition: background-color 0.3s ease-in-out;
    }

    .buttonAdd:hover {
        background-color: #86B201;
    }

    .card {
        background-color: #343A40;
        width: 40%;
        padding: 1rem;
        margin-right: 1rem;
        transition: box-shadow 0.5s ease-in-out;
    }

    .card:hover {
        box-shadow: -10px 5px 10px -5px #86B201;
    }
</style>
@section('content')
<div class="flex flex-col space w-full">
    <div class="flex flex-row ">
        <a href={{ route('aluno.profile', session('user_id')) }} class="mt-[-5]" style="margin-left: 95%;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#CCFF33" width="30" height="30" viewBox="0 0 24 24">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"></path>
                </g>
            </svg>
        </a>
    </div>
    <h1 class="text-xl font-bold">Progresso</h1>

    <br>
    <br>
    <div class="relative">
        @if($progresso && count($progresso) > 0)
        <div id="cards" class="flex">
            @foreach ($progresso as $treino)
            <a href={{route('aluno.getExercicios',['aluno_id'=>session('user_id'),'treino_id'=>$treino->treino->id])}}>
                <div class="card bg-[#343A40] w-[15rem] p-4 rounded shadow-md hover:shadow-xl transition-shadow duration-500">
                    <h1 class="text-white">{{$treino->treino->musculo}}</h1>
                    <p class="text-gray-400">{{$treino->treino->tipo_de_treino}}</p>
                    <p class="text-gray-400">Concluído: {{ number_format(($treino->progresso / 30) * 100, 2) }}% </p>
                </div>
            </a>

            @endforeach
        </div>
        <div class="flex mt-4">
            <button onclick="previousCard()" class="bg-[#CCFF33] mr-20 p-2 rounded hover:bg-[#86B201] transition-colors duration-300 text-[#212529]">
                Anterior
            </button>
            <button onclick="nextCard()" class="bg-[#CCFF33] p-2 rounded hover:bg-[#86B201] transition-colors duration-300 text-[#212529]">
                Próximo
            </button>
        </div>
    </div>
    @else
    <h1>Nenhum Treino concluido :< </h1>
    @endif
</div>

<script>
    let currentIndex = 0;
    const cards = document.querySelectorAll('.card');

    function showCard(index) {
        cards.forEach((card, i) => {
            card.classList.toggle('hidden', i !== index);
        });
    }

    function nextCard() {
        currentIndex = (currentIndex + 1) % cards.length;
        showCard(currentIndex);
    }

    function previousCard() {
        currentIndex = (currentIndex - 1 + cards.length) % cards.length;
        showCard(currentIndex);
    }

    showCard(currentIndex);
</script>


</div>
@endsection