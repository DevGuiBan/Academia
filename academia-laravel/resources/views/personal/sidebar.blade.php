@extends('layout.app')
<style>
.sidebar {
    background-color: #343a40;
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: fixed;
    top: 0;
    left: 0;
}

.sidebar h1 {
    font-weight: bold;
}

.sidebar a {
    transition: color 0.5s ease-in-out;
    padding: 2rem;
}

.sidebar a:hover {
    color: #CCFF33;
}

.button_exit {
    margin-top: 1rem;
}
.image{
    margin-right: 0.5rem;
}
.active {
    color: #CCFF33;
}
</style>
@section('sidebar')
<div class="sidebar">
    <!-- Sidebar -->
    <img class="mt-[-50]" src="{{asset('images/logo_academia.png')}}" alt="logo_academia" width="250" height="250">

    <a href={{url('/personal/treino')}} class="flex flex-row mt-[-60] {{ Request::is('personal/treino') ? 'active' : '' }}">
        <svg fill="currentColor" class="image" viewBox="0 0 24 24" id="Layer_1" width="20" height="20" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path d="M22.942,6.837,20.76,4.654l.947-.947a1,1,0,1,0-1.414-1.414l-.947.947L17.163,1.058a3.7,3.7,0,0,0-5.105,0,3.609,3.609,0,0,0,0,5.106L14.24,8.346,8.346,14.24,6.163,12.058a3.7,3.7,0,0,0-5.105,0,3.609,3.609,0,0,0,0,5.106L3.24,19.346l-.947.947a1,1,0,1,0,1.414,1.414l.947-.947,2.183,2.182a3.609,3.609,0,0,0,5.105,0h0a3.608,3.608,0,0,0,0-5.105L9.76,15.655l5.9-5.895,2.182,2.182a3.609,3.609,0,0,0,5.105,0h0a3.608,3.608,0,0,0,0-5.105ZM11,20.39a1.6,1.6,0,0,1-.472,1.138,1.647,1.647,0,0,1-2.277,0L2.472,15.749a1.61,1.61,0,1,1,2.277-2.277l5.779,5.779A1.6,1.6,0,0,1,11,20.39Zm10.528-9.862a1.647,1.647,0,0,1-2.277,0L13.472,4.749a1.61,1.61,0,1,1,2.277-2.277l5.779,5.779a1.609,1.609,0,0,1,0,2.277Z"></path>
            </g>
        </svg>
        Treino
    </a>
    <a href={{url('/personal/horario')}} class="flex flex-row {{ Request::is('personal/horario') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="image" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
        </svg>
        Horários
    </a>
    <a href={{route('personal.exercicios',session('user_id'))}} class="flex flex-row {{ Request::routeIs('personal.exercicios') ? 'active' : '' }}">
        <svg fill="currentColor" class="image" viewBox="0 0 24 24" version="1.1" width="20" height="20" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <g id="Guides"></g>
                <g id="_x32_0"></g>
                <g id="_x31_9"></g>
                <g id="_x31_8"></g>
                <g id="_x31_7"></g>
                <g id="_x31_6"></g>
                <g id="_x31_5"></g>
                <g id="_x31_4"></g>
                <g id="_x31_3"></g>
                <g id="_x31_2"></g>
                <g id="_x31_1"></g>
                <g id="_x31_0"></g>
                <g id="_x30_9"></g>
                <g id="_x30_8"></g>
                <g id="_x30_7"></g>
                <g id="_x30_6"></g>
                <g id="_x30_5"></g>
                <g id="_x30_4"></g>
                <g id="_x30_3"></g>
                <g id="_x30_2"></g>
                <g id="_x30_1">
                    <path d="M21,4h-3c-0.5522461,0-1,0.4477539-1,1v2H7V5c0-0.5522461-0.4477539-1-1-1H3C2.4477539,4,2,4.4477539,2,5v6 c0,0.5522461,0.4477539,1,1,1h3c0.5522461,0,1-0.4477539,1-1V9h1v10c0,0.5522461,0.4477539,1,1,1s1-0.4477539,1-1v-3h4v3 c0,0.5522461,0.4477539,1,1,1s1-0.4477539,1-1V9h1v2c0,0.5522461,0.4477539,1,1,1h3c0.5522461,0,1-0.4477539,1-1V5 C22,4.4477539,21.5522461,4,21,4z M5,10H4V6h1V10z M14,14h-4V9h4V14z M20,10h-1V6h1V10z"></path>
                </g>
            </g>
        </svg>
        Exercícios
    </a>
    <a href={{route('personal.alunos',['id_personal'=>session('user_id')])}} class="flex flex-row {{ Request::routeIs('personal.alunos') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="image" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
        </svg>
        Alunos</a>
    <a href={{route('login')}} class="flex flex-row button_exit">
        <svg xmlns="http://www.w3.org/2000/svg" class="image" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
        </svg>
        Sair
    </a>
</div>
@endsection
