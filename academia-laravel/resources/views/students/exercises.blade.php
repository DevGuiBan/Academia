@extends('students.sidebar')
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
        <a href={{ route('student.profile', session('user_id')) }} class="mt-[-5]" style="margin-left: 95%;">
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
            <a href={{route('student.concludeTraining',['student_id'=>session('user_id'),'training_id'=>$training_id])}} class="flex flex-row bg-[#CCFF33] py-2 px-4 buttonAdd rounded text-[#212529] w-[10rem]">
                Concluir Treino
            </a>
            <br>
            <br>
            <a href={{route('student.downloadPdf',['student_id'=>session('user_id'),'training_id'=>$training_id])}} class="flex flex-row bg-[#CCFF33] py-2 px-4 buttonAdd rounded text-[#212529] w-[11rem]">
                <svg viewBox="0 0 24 24" width="30" height="30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M12.5535 16.5061C12.4114 16.6615 12.2106 16.75 12 16.75C11.7894 16.75 11.5886 16.6615 11.4465 16.5061L7.44648 12.1311C7.16698 11.8254 7.18822 11.351 7.49392 11.0715C7.79963 10.792 8.27402 10.8132 8.55352 11.1189L11.25 14.0682V3C11.25 2.58579 11.5858 2.25 12 2.25C12.4142 2.25 12.75 2.58579 12.75 3V14.0682L15.4465 11.1189C15.726 10.8132 16.2004 10.792 16.5061 11.0715C16.8118 11.351 16.833 11.8254 16.5535 12.1311L12.5535 16.5061Z" fill="#212529"></path>
                        <path d="M3.75 15C3.75 14.5858 3.41422 14.25 3 14.25C2.58579 14.25 2.25 14.5858 2.25 15V15.0549C2.24998 16.4225 2.24996 17.5248 2.36652 18.3918C2.48754 19.2919 2.74643 20.0497 3.34835 20.6516C3.95027 21.2536 4.70814 21.5125 5.60825 21.6335C6.47522 21.75 7.57754 21.75 8.94513 21.75H15.0549C16.4225 21.75 17.5248 21.75 18.3918 21.6335C19.2919 21.5125 20.0497 21.2536 20.6517 20.6516C21.2536 20.0497 21.5125 19.2919 21.6335 18.3918C21.75 17.5248 21.75 16.4225 21.75 15.0549V15C21.75 14.5858 21.4142 14.25 21 14.25C20.5858 14.25 20.25 14.5858 20.25 15C20.25 16.4354 20.2484 17.4365 20.1469 18.1919C20.0482 18.9257 19.8678 19.3142 19.591 19.591C19.3142 19.8678 18.9257 20.0482 18.1919 20.1469C17.4365 20.2484 16.4354 20.25 15 20.25H9C7.56459 20.25 6.56347 20.2484 5.80812 20.1469C5.07435 20.0482 4.68577 19.8678 4.40901 19.591C4.13225 19.3142 3.9518 18.9257 3.85315 18.1919C3.75159 17.4365 3.75 16.4354 3.75 15Z" fill="#212529"></path>
                    </g>
                </svg>
                <p class="mt-1 ml-2">Baixar Treino</p>
            </a>


</div>
@endsection