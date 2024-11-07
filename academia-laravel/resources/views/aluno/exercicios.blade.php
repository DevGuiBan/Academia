@extends('aluno.sidebar')
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

    .buttonAdd {
        transition: background-color 0.5s ease-in-out;
    }

    .buttonAdd:hover {
        background-color: #86B201;
    }

</style>
@if (session('error'))
<script>
    alert('{{ session('error') }}');
</script>
@endif
@section('content')
<div class="flex flex-col space w-full mr-5">
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
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-bold">Exercicios</h1>
    </div>
    <br>
    @if ($dados && count($dados) > 0)
    <p>Exercícios do Treino</p>
    <table class="tabela text-center border border-gray-500" style="background-color: #343a40;">
        <thead>
            <tr>
                <th class="p-2 border border-[#CCFF33]">Exercício</th>
                <th class="p-2 border border-[#CCFF33]">Repetições</th>
            </tr>
        </thead>
        <tbody class="border border-gray-500">
            @foreach ($dados as $exercicio)
            <tr class="bg-[#212529]">
                <td class="p-2">{{ $exercicio['nome'] }}</td>
                <td class="p-2">{{ $exercicio['quantidade_de_repeticoes'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h1>Nenhum Exercício Cadastrado :< </h1>
    @endif
    <br>
    <a href={{route('aluno.concluirTreino',['id_aluno'=>session('user_id'),'id_treino'=>$treino_id])}} class="flex flex-row bg-[#CCFF33] py-2 px-4 buttonAdd rounded text-[#212529] w-[10rem]">
    Concluir Treino
    </a>
    

</div>
@endsection