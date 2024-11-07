@extends('personal.sidebar')

@section('content')
<div class="p-20">
    <form action={{route('personal.update',$user->id)}} method="POST" class="w-full mt-6">
        @csrf
        @method('PUT')
        <label for="name" class="text-gray-500">Nome</label>
        <input type="text" name="name" id="name" value="{{$user->name}}" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Costa">

        <label for="email" class="text-gray-500">E-mail</label>
        <input type="email" name="email" id="email" value="{{$user->email}}" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Força">

        <label for="address" class="text-gray-500">Endereço</label>
        <input type="text" name="address" id="address" value="{{$user->address}}" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded" placeholder="Ex: 3 x 10">

        <label for="password" class="text-gray-500">Senha</label>
        <input type="password" name="password" id="password" required class="w-full p-2 mt-1 mb-4 bg-gray-800 text-white border border-gray-600 rounded">

        <input type="submit" value="Salvar" class="bg-[#CCFF33] py-2 px-4 rounded mt-5 w-full cursor-pointer text-[#212529]">
    </form>
    <form action={{route('personal.delete',$user->id)}} method="POST" class="w-full mt-6">
        @csrf
        @method('DELETE')

        <input type="submit" value="Excluir Conta" class="bg-[#FF3D38] text-white py-2 px-4 rounded mt-5 w-full cursor-pointer text-[#212529]">
    </form>
</div>

@endsection