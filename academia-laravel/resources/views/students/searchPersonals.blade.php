@extends('students.sidebar')

@section('content')
<div class="flex flex-col items-center p-5 min-h-screen ml-[10rem]">
    <p class="mt-5 mb-5 text-xl font-bold">Meus professores</p>
    
    <form action="{{ route('student.searchPersonal') }}" method="GET" class="flex flex-col md:flex-row items-center space-x-3 mb-10">
        <input
            type="text"
            name="query"
            placeholder="Digite o nome"
            value="{{ request('query') }}"
            class="px-4 py-2 border border-gray-300 rounded-lg w-80 focus:outline-none focus:ring-2 focus:ring-green-500 bg-transparent text-white"
        >
        <button type="submit" class="px-5 py-2 bg-[#CCFF33] text-[#212529] font-semibold rounded-lg hover:bg-[#86B201] transition-colors duration-300">
            Pesquisar
        </button>
    </form>

    <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mb-5">
        @if(isset($users) && $users->count() > 0)
            @foreach($users as $user)
                <div class="bg-[#212529] border border-[#343a40] rounded-lg shadow-md p-5 flex flex-col items-center text-center">
                    <h3 class="text-xl font-bold text-white mb-3">{{ $user->name }}</h3>
                    <a
                        href="https://wa.me/{{ $user->phone }}"
                        target="_blank"
                        title="Enviar mensagem para {{ $user->name }} no WhatsApp"
                        class="flex items-center justify-center mt-3 text-green-500 transition-text duration-300 hover:text-green-600"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.52 3.48a11.57 11.57 0 0 0-16.36 0A11.48 11.48 0 0 0 1.8 8.57a11.39 11.39 0 0 0 1.54 9.52L1 23.05a.68.68 0 0 0 .85.85l4.96-2.32a11.39 11.39 0 0 0 9.52 1.54 11.48 11.48 0 0 0 5.09-2.36 11.57 11.57 0 0 0 0-16.37ZM12 21.29a9.28 9.28 0 0 1-4.67-1.26l-.33-.2-3.71 1.73.79-4.15-.22-.34A9.27 9.27 0 0 1 12 2.7h.01a9.28 9.28 0 0 1 9.27 9.27c0 5.12-4.15 9.26-9.27 9.26Zm5.23-6.95c-.28-.15-1.67-.82-1.93-.92s-.45-.14-.65.14c-.2.29-.74.92-.9 1.1s-.33.22-.61.07a7.65 7.65 0 0 1-2.25-1.39 8.43 8.43 0 0 1-1.55-1.92c-.16-.28 0-.42.14-.56.14-.14.28-.34.42-.5.13-.17.19-.28.29-.46.1-.18.05-.34-.02-.49-.08-.14-.65-1.57-.9-2.18-.24-.57-.5-.5-.68-.51-.17 0-.37-.01-.57-.01a1.1 1.1 0 0 0-.8.37c-.27.29-1.04 1.02-1.04 2.5 0 1.47 1.07 2.9 1.22 3.1.15.2 2.12 3.23 5.16 4.32.72.25 1.29.4 1.74.51.73.17 1.4.15 1.93.09.59-.06 1.67-.68 1.91-1.34.24-.65.24-1.22.17-1.34-.07-.11-.26-.18-.54-.33Z" />
                        </svg>
                        Enviar mensagem
                    </a>
                </div>
            @endforeach
        @else
            <p class="text-gray-500">
                @if (!isset($query))
                    Digite o nome para buscar professores.
                @else
                    Nenhum usuário encontrado para "{{ $query }}"
                @endif
            </p>
        @endif
    </div>

    @if(isset($users) && $users->count() > 0)
        <div class="mt-5">
            {{ $users->appends(request()->query())->links() }}
        </div>
    @endif
</div>
@endsection
