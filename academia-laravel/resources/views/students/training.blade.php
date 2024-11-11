@extends('students.sidebar')
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
    alert('{{ session('
        error ') }}');
</script>
@endif
@section('content')
<div class="flex flex-col space w-full">
    <div class="flex flex-row">
        <a href={{ route('student.profile',['id'=>session('user_id')]) }} class="mt-[-5]" style="margin-left: 95%;">
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
            <a href="{{ route('student.requestTraining') }}" class="mt-1">Solicitar Treino</a>
        </button>
    </div>

    <div class="flex flex-row">
        @if ($trainings && count($trainings) > 0)
        <div class="relative">
            <div id="cards" class="flex">
                @foreach ($trainings as $treino)
                <a href="{{ route('student.getExercise', ['student_id' => session('user_id'), 'training_id' => $treino->treino->id]) }}">
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
    <div>
        <a href="{{route('student.searchPersonal')}}"
            class="flex flex-row bg-[#212529] text-[#CCFF33] p-5 rounded text-xl border border-[#CCFF33] hover:bg-[#343a40] transition-colors duration-500  w-[17rem]">
            <svg viewBox="0 0 24 24" width="30" height="30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#CCFF33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
            <p class="mt-1 ml-2">Meus professores</p>
        </a>
    </div>

</div>

@endsection