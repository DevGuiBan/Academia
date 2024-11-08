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

    .cardP {
        background-color: #343A40;
        width: 40%;
        height: 10vh;
        padding: 1rem;
        margin-right: 1rem;
        transition: box-shadow 0.5s ease-in-out;
    }

    .cardP:hover {
        box-shadow: -10px 5px 10px -5px #86B201;
    }
</style>
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
@section('content')
<div class="flex flex-col space w-full">
    <div class="flex flex-row">
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
    <h1 class="text-xl font-bold">Treinos</h1>
    <br>
    <div class="flex flex-row">
        <p>Treinos da Semana</p>
        <button class="flex flex-row bg-[#CCFF33] py-2 px-4 buttonAdd rounded text-[#212529]" style="margin-left: 65%;">
            <a href="{{ route('aluno.solicitarTreino') }}" class="mt-1">Solicitar Treino</a>
        </button>
    </div>

    <div class="flex flex-row">
        @if ($treinos && count($treinos) > 0)
        <div class="relative">
            <div id="cards" class="flex">
                @foreach ($treinos as $treino)
                <a href="{{ route('aluno.getExercicios', ['aluno_id' => session('user_id'), 'treino_id' => $treino->treino->id]) }}">
                    <div class="card bg-[#343A40] w-[15rem] p-4 rounded">
                        <h1 class="text-white">{{ $treino->treino->musculo }}</h1>
                        <p class="text-gray-400">{{ $treino->treino->tipo_de_treino }}</p>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="flex justify-between mt-4">
                <button onclick="previousCard()" class="bg-[#CCFF33] p-2 rounded hover:bg-[#86B201] transition-colors duration-300 text-[#212529]">
                    Anterior
                </button>
                <button onclick="nextCard()" class="bg-[#CCFF33] p-2 rounded hover:bg-[#86B201] transition-colors duration-300 text-[#212529]">
                    Próximo
                </button>
            </div>
        </div>
        @else
        <h1>Nenhum Treino solicitado :(</h1>
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

    <br>
    <br>
    <br>
    <p class="mt-5 text-xl font-bold">Meus professores</p>
    <div class="flex flex-row">
        @if ($personais && count($personais) > 0)
        <div class="relative">
            <div id="cardsP" class="flex">
                @foreach ($personais as $personal)
                <div class="cardP flex flex-col bg-[#343A40] w-[15rem] rounded  ">
                    <h1 class="text-white text-xl mt-2">{{ $personal->name }}</h1>
                    <a style="margin-top: -2.25rem; margin-left:3rem;" href="https://wa.me/5541928647481?text=Que%20horas%20vai%20ser%20a%20aula%3F">
                        <svg viewBox="0 0 24 24" fill="none" class="ml-[7rem]" width="40" height="40" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22Z" stroke="#CCFF33" stroke-width="1.5"></path>
                                <path opacity="0.5" d="M8 10.5H16" stroke="#CCFF33" stroke-width="1.5" stroke-linecap="round"></path>
                                <path opacity="0.5" d="M8 14H13.5" stroke="#CCFF33" stroke-width="1.5" stroke-linecap="round"></path>
                            </g>
                        </svg>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="flex justify-between mt-4">
                <button onclick="previousCardP()" class="bg-[#CCFF33] p-2 rounded hover:bg-[#86B201] transition-colors duration-300 text-[#212529]">
                    Anterior
                </button>
                <button onclick="nextCardP()" class="bg-[#CCFF33] p-2 rounded hover:bg-[#86B201] transition-colors duration-300 text-[#212529]">
                    Próximo
                </button>
            </div>
        </div>
        @else
        <h1>Nenhum Treino solicitado :(</h1>
        @endif
    </div>

    <script>
        let currentIndexP = 0;
        const cardsP = document.querySelectorAll('.cardP');

        function showCardP(index) {
            cardsP.forEach((cardP, i) => {
                cardP.classList.toggle('hidden', i !== index);
            });
        }

        function nextCardP() {
            currentIndexP = (currentIndexP + 1) % cardsP.length;
            showCardP(currentIndexP);
        }

        function previousCardP() {
            currentIndexP = (currentIndexP - 1 + cardsP.length) % cardsP.length;
            showCardP(currentIndexP);
        }

        showCardP(currentIndexP);
    </script>

</div>

@endsection