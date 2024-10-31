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
    <h1 class="text-xl font-bold">Treinos</h1>
    <br>
    <div class="flex flex-row">
        <p>Treinos da Semana</p>
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
            <a href={{url('/aluno/solicitar-treino')}} class="mt-1">Solicitar Treino</a>
        </button>
    </div>

    <br>
    <div class="flex flex-row">
        <!-- Container dos cards e botões de navegação -->
        <div class="relative">
            <!-- Cartões de Treinos -->
            <div id="cards" class="flex">
                <div class="card hidden bg-[#343A40] w-[15rem] p-4 rounded shadow-md hover:shadow-xl transition-shadow duration-500">
                    <h1 class="text-white">Segunda</h1>
                    <p class="text-gray-400">Peito</p>
                </div>
                <div class="card hidden bg-[#343A40] w-[15rem] p-4 rounded shadow-md hover:shadow-xl transition-shadow duration-500">
                    <h1 class="text-white">Terça</h1>
                    <p class="text-gray-400">Funcional</p>
                </div>
                <div class="card hidden bg-[#343A40] w-[15rem] p-4 rounded shadow-md hover:shadow-xl transition-shadow duration-500">
                    <h1 class="text-white">Quarta</h1>
                    <p class="text-gray-400">Gluteos</p>
                </div>
                <!-- Clone o bloco acima para mais cards, cada card terá a classe 'card' -->
                <!-- Exemplo de card extra -->
                <div class="card hidden bg-[#343A40] w-[15rem] p-4 rounded shadow-md hover:shadow-xl transition-shadow duration-500">
                    <h1 class="text-white">Quinta</h1>
                    <p class="text-gray-400">Crossfit - Cardio</p>
                    <!-- Outros detalhes do card aqui -->
                </div>
                <!-- Adicione quantos cards forem necessários -->
            </div>

            <!-- Botões de navegação -->
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

        // Exibir o primeiro card inicialmente
        showCard(currentIndex);
    </script>


    <p class="mt-5">Meus professores</p>
    <br>
    <div class="flex flex-row" style="width: 100%;">
        <div class="flex flex-col">
            <div class="flex flex-row card rounded " style="width: 100%;">
                <div>
                    <h3 class="text-xl text-bold">Leandro Feitosa</h3>
                    <p>Professor(a) de Musculação</p>
                </div>

                <a href="https://wa.me/5541928647481?text=Que%20horas%20vai%20ser%20a%20aula%3F">
                    <svg viewBox="0 0 24 24" fill="none" class="mt-2 ml-3" width="40" height="40" xmlns="http://www.w3.org/2000/svg">
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

            <div class="flex flex-row card rounded mt-5" style="width: 100%;">
                <div>
                    <h3 class="text-xl text-bold">Mônica Flores</h3>
                    <p>Professor(a) de Yoga</p>
                </div>
                <a href="https://wa.me/5541928647481?text=Que%20horas%20vai%20ser%20a%20aula%3F">
                    <svg viewBox="0 0 24 24" fill="none" class="mt-2" style="margin-left: 4rem;" width="40" height="40" xmlns="http://www.w3.org/2000/svg">
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


        </div>
    </div>


</div>
@endsection