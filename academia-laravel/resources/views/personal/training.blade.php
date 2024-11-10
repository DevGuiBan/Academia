@extends('personal.sidebar')
<style>
    .space {
        margin-left: 5%;
        margin-top: 7%;
    }

    .bell {
        margin-left: 90%;
    }

    .buttonAdd {
        margin-left: 70%;
        transition: background-color 0.3s ease-in-out;
    }

    .buttonAdd:hover {
        background-color: #86B201;
    }

    .card {
        background-color: #343A40;
        width: 15rem;
        padding: 1rem;
        margin-right: 1rem;
        transition: box-shadow 0.5s ease-in-out;
    }

    .card:hover {
        box-shadow: -10px 5px 10px -5px #86B201;
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

        @foreach ($notifications as $notificacao)
        <div class="absolute bg-[#343A40] p-4 rounded shadow-lg" style="top: 10%; right: 5%;">
            <form method="post" action={{route('notificacao.lida',['id'=>$notificacao->id,'aluno_id' => $notificacao->id_aluno, 'personal_id' => $notificacao->id_personal, 'treino_id' => $notificacao->id_treino])}}>
                @csrf
                <p>{{ $notificacao->mensagem }}</p>
                <input type="submit" value="Visualizar solicitação" class="text-[#CCFF33] underline cursor-pointer">
            </form>
        </div>
        @endforeach
    </div>
    <div class="flex flex-row mt-5">
        <h1 class="text-xl font-bold">Treinos</h1>
        <button class="flex flex-row bg-[#CCFF33] mt-10 py-2 px-4 buttonAdd rounded text-[#212529]">
            <svg viewBox="0 0 24 24" width="30" height="30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <rect width="24" height="24" fill="none"></rect>
                    <path d="M12 6V18" stroke="#212529" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M6 12H18" stroke="#212529" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
            <a href={{route('personal.createTraining')}} class="mt-1">Criar Treino</a>
        </button>
    </div>
    <br>

    <br>
    <div class="flex flex-col">
        @if ($requests && count($requests) > 0)
        <p>Treinos cadastrados</p>
        <br>

        <div class="flex flex-row">
            <div class="relative">
                <div id="cards" class="flex">
                    @foreach ($requests as $solicitacao)
                    <div class="flex flex-col rounded card">
                        <a href={{route('personal.saveTraining',$solicitacao->treino->id)}}>
                            <h1 class="text-white">{{ $solicitacao->treino->musculo }}</h1>
                            <br>
                            <p class="text-gray-400">{{ $solicitacao->treino->tipo_de_treino }}</p>
                        </a>
                    </div>
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
        </div>
        @else
        <h1>Nenhuma solicitação feita :< </h1>
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