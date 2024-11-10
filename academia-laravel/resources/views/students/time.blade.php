@extends('students.sidebar')
<style>
    .space {
        margin-left: 5%;
        margin-top: 7%;
    }

    .bell {
        margin-left: 90%;
    }

    .card {
        background-color: #343A40;
        min-width: min-content;
        max-width: max-content;
        padding: 1rem;
        margin: 1rem;
        transition: box-shadow 0.5s ease-in-out;
    }

    .card:hover {
        box-shadow: 0 2px 10px #86B201;
    }

    .status {
        width: 15%;
    }

    .tam {
        font-size: small;
    }
</style>
@section('content')
<div class="flex flex-col space w-full">
    <div class="flex flex-row ">
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
    <h1 class="text-xl font-bold">Horários da Academia</h1>

    <div class="felx flex-col">
        <div class="flex flex-row">
            <div class="flex flex-col rounded card">
                <h1>Segunda a Sexta</h1>
                <br>
                <p class="text-gray-400">Musuculação - Funcional</p>
                <div class="flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="image" width="16" height="16" fill="#9CA3AF" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                    </svg>
                    <p class="tam text-gray-400">05:00 - 12:00</p>
                    <a href="https://www.bing.com/maps?mepi=127%7E%7EUnknown%7EAddress_Link&ty=18&q=Invictus+Academia&ss=ypid.YN7993x14742333165683499671&ppois=-23.646400451660156_-46.67100143432617_Invictus+Academia_YN7993x14742333165683499671%7E&cp=-23.646392%7E-46.670995&v=2&sV=1&FORM=MPSRPL&lvl=16.0" class="flex flex-row">
                        <svg viewBox="0 0 192 192" width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path stroke="#9CA3AF" stroke-width="12" d="M96 22a51.88 51.88 0 0 0-36.77 15.303A52.368 52.368 0 0 0 44 74.246c0 16.596 4.296 28.669 20.811 48.898a163.733 163.733 0 0 1 20.053 28.38C90.852 163.721 90.146 172 96 172c5.854 0 5.148-8.279 11.136-20.476a163.723 163.723 0 0 1 20.053-28.38C143.704 102.915 148 90.841 148 74.246a52.37 52.37 0 0 0-15.23-36.943A51.88 51.88 0 0 0 96 22Z"></path>
                                <circle cx="96" cy="74" r="20" stroke="#9CA3AF" stroke-width="12"></circle>
                            </g>
                        </svg>
                        <p class="tam text-gray-400">Academia Invictus</p>
                    </a>
                </div>
            </div>

            <div class="flex flex-col rounded card">
                <h1>Segunda a Sexta</h1>
                <br>
                <p class="text-gray-400">Musuculação - Funcional - Yoga</p>
                <div class="flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="image" width="16" height="16" fill="#9CA3AF" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                    </svg>
                    <p class="tam text-gray-400">14:00 - 22:00</p>
                    <a href="https://www.bing.com/maps?mepi=127%7E%7EUnknown%7EAddress_Link&ty=18&q=Invictus+Academia&ss=ypid.YN7993x14742333165683499671&ppois=-23.646400451660156_-46.67100143432617_Invictus+Academia_YN7993x14742333165683499671%7E&cp=-23.646392%7E-46.670995&v=2&sV=1&FORM=MPSRPL&lvl=16.0" class="flex flex-row">
                        <svg viewBox="0 0 192 192" width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path stroke="#9CA3AF" stroke-width="12" d="M96 22a51.88 51.88 0 0 0-36.77 15.303A52.368 52.368 0 0 0 44 74.246c0 16.596 4.296 28.669 20.811 48.898a163.733 163.733 0 0 1 20.053 28.38C90.852 163.721 90.146 172 96 172c5.854 0 5.148-8.279 11.136-20.476a163.723 163.723 0 0 1 20.053-28.38C143.704 102.915 148 90.841 148 74.246a52.37 52.37 0 0 0-15.23-36.943A51.88 51.88 0 0 0 96 22Z"></path>
                                <circle cx="96" cy="74" r="20" stroke="#9CA3AF" stroke-width="12"></circle>
                            </g>
                        </svg>
                        <p class="tam text-gray-400">Academia Invictus</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="flex flex-row">
            <div class="flex flex-col rounded card">
                <h1>Sabado e Domingo</h1>
                <br>
                <p class="text-gray-400">Musuculação - Yoga</p>
                <div class="flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="image" width="16" height="16" fill="#9CA3AF" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                    </svg>
                    <p class="tam text-gray-400">05:00 - 12:00</p>
                    <a href="https://www.bing.com/maps?mepi=127%7E%7EUnknown%7EAddress_Link&ty=18&q=Invictus+Academia&ss=ypid.YN7993x14742333165683499671&ppois=-23.646400451660156_-46.67100143432617_Invictus+Academia_YN7993x14742333165683499671%7E&cp=-23.646392%7E-46.670995&v=2&sV=1&FORM=MPSRPL&lvl=16.0" class="flex flex-row">
                        <svg viewBox="0 0 192 192" width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path stroke="#9CA3AF" stroke-width="12" d="M96 22a51.88 51.88 0 0 0-36.77 15.303A52.368 52.368 0 0 0 44 74.246c0 16.596 4.296 28.669 20.811 48.898a163.733 163.733 0 0 1 20.053 28.38C90.852 163.721 90.146 172 96 172c5.854 0 5.148-8.279 11.136-20.476a163.723 163.723 0 0 1 20.053-28.38C143.704 102.915 148 90.841 148 74.246a52.37 52.37 0 0 0-15.23-36.943A51.88 51.88 0 0 0 96 22Z"></path>
                                <circle cx="96" cy="74" r="20" stroke="#9CA3AF" stroke-width="12"></circle>
                            </g>
                        </svg>
                        <p class="tam text-gray-400">Academia Invictus</p>
                    </a>
                </div>
            </div>

            <div class="flex flex-col rounded card">
                <h1>Sabado e Domingo</h1>
                <br>
                <p class="text-gray-400">Funcional - Atividade Recreativa</p>
                <div class="flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="image" width="16" height="16" fill="#9CA3AF" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                    </svg>
                    <p class="tam text-gray-400">05:00 - 12:00</p>
                    <a href="https://www.bing.com/maps?mepi=127%7E%7EUnknown%7EAddress_Link&ty=18&q=Invictus+Academia&ss=ypid.YN7993x14742333165683499671&ppois=-23.646400451660156_-46.67100143432617_Invictus+Academia_YN7993x14742333165683499671%7E&cp=-23.646392%7E-46.670995&v=2&sV=1&FORM=MPSRPL&lvl=16.0" class="flex flex-row">
                        <svg viewBox="0 0 192 192" width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path stroke="#9CA3AF" stroke-width="12" d="M96 22a51.88 51.88 0 0 0-36.77 15.303A52.368 52.368 0 0 0 44 74.246c0 16.596 4.296 28.669 20.811 48.898a163.733 163.733 0 0 1 20.053 28.38C90.852 163.721 90.146 172 96 172c5.854 0 5.148-8.279 11.136-20.476a163.723 163.723 0 0 1 20.053-28.38C143.704 102.915 148 90.841 148 74.246a52.37 52.37 0 0 0-15.23-36.943A51.88 51.88 0 0 0 96 22Z"></path>
                                <circle cx="96" cy="74" r="20" stroke="#9CA3AF" stroke-width="12"></circle>
                            </g>
                        </svg>
                        <p class="tam text-gray-400">Academia Invictus</p>
                    </a>
                </div>
            </div>
        </div>

        <br>

        <div>
            <h1 class="tamTitle">Status da Academia</h1>
            <button disabled="true" class="status bg-[#CCFF33] py-2 px-4 rounded mt-5 text-[#212529]">Aberto</button>
        </div>
    </div>
</div>
@endsection