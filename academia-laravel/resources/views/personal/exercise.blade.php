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
</style>
<script>
    function confirmarExclusao() {
        if (confirm("Tem certeza que deseja excluir este exercício?")) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
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
<div class="flex flex-col space w-full mr-5">
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
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-bold">Exercicios</h1>
        <a href="{{ route('personal.exercise') }}" class="bg-[#CCFF33] text-[#212529] mt-5 mr-2 px-4 py-2 rounded-md hover:bg-[#b3e600] transition-colors">
            Adicionar Exercício
        </a>
    </div>
    <br>
    @if ($dados && count($dados) > 0)
    <p>Exercícios cadastrados</p>
    <table class="tabela text-center border border-gray-500" style="background-color: #343a40;">
        <thead>
            <tr>
                <th class="p-2 border border-[#CCFF33]">Grupo de Músculos</th>
                <th class="p-2 border border-[#CCFF33]">Exercício</th>
                <th class="p-2 border border-[#CCFF33]">Repetições</th>
                <th class="p-2 border border-[#CCFF33]">Ações</th>
            </tr>
        </thead>
        <tbody class="border border-gray-500">
            @foreach ($dados as $infos)
            @foreach ($infos['exercicios'] as $exercicio)
            <tr class="bg-[#212529]">
                <td class="p-2">{{ $infos['treino']->musculo }}</td>
                <td class="p-2">{{ $exercicio['nome'] }}</td>
                <td class="p-2">{{ $exercicio['quantidade_de_repeticoes'] }}</td>
                <td class="p-2 flex flex-row">
                    <a href="{{ route('personal.exerciseEdit', ['id'=> $exercicio['id']]) }}" class="px-4">
                        <svg viewBox="0 0 24 24" fill="none" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8477 1.87868C19.6761 0.707109 17.7766 0.707105 16.605 1.87868L2.44744 16.0363C2.02864 16.4551 1.74317 16.9885 1.62702 17.5692L1.03995 20.5046C0.760062 21.904 1.9939 23.1379 3.39334 22.858L6.32868 22.2709C6.90945 22.1548 7.44285 21.8693 7.86165 21.4505L22.0192 7.29289C23.1908 6.12132 23.1908 4.22183 22.0192 3.05025L20.8477 1.87868ZM18.0192 3.29289C18.4098 2.90237 19.0429 2.90237 19.4335 3.29289L20.605 4.46447C20.9956 4.85499 20.9956 5.48815 20.605 5.87868L17.9334 8.55027L15.3477 5.96448L18.0192 3.29289ZM13.9334 7.3787L3.86165 17.4505C3.72205 17.5901 3.6269 17.7679 3.58818 17.9615L3.00111 20.8968L5.93645 20.3097C6.13004 20.271 6.30784 20.1759 6.44744 20.0363L16.5192 9.96448L13.9334 7.3787Z" fill="#CCFF33"></path>
                            </g>
                        </svg>
                    </a>
                    <form id="deleteForm" method="POST" action="{{ route('personal.deleteExercise', ['id' => $exercicio['id']]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" style="display: none;">
                    </form>

                    <button onclick="confirmarExclusao()">
                        <svg viewBox="0 0 24 24" fill="none" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M4 7H20" stroke="#FF3D38" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M6 7V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V7" stroke="#FF3D38" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#FF3D38" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </button>
                </td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
        @else
        <h1>Nenhum Exercício Cadastrado :(</h1>
        @endif

</div>
@endsection