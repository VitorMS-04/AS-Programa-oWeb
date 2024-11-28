@extends('layouts.base')

@section('content')
    <form class="max-w-sm mx-auto p-3" action="{{ url('produtos/'.$produto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
            <input type="text" id="name" name="name" value="{{$produto->name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="mb-5">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Preço</label>
            <input type="number" id="price" name="price" value="{{$produto->price}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="mb-5">
            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900">Quantidade</label>
            <input type="number" id="quantity" name="quantity" value="{{$produto->quantity}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="mb-5">
            <img src="{{asset($produto->image)}}" alt="{{$produto->name}}">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Imagem</label>
            <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        @if($categoria->id === $produto->coach->id)
            <option value="{{$categoria->id}}" selected="{{$categoria->name}}">{{$categoria->name}}</option>
        @else
            <option value="{{$coach->id}}">{{$categoria->name}}</option>
        @endif
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Editar Produto</button>
    </form>
@endsection




<!-- modelo base edit -->

<!-- <form action="{{ url('produtos/'.$produto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="Nome" required value="{{ $produto->name}}">
        <input type="number" name="price" placeholder="Preço" required value="{{ $produto->price}}">
        <input type="number" name="quantity" placeholder="Quantidade" required value="{{ $produto->quantity}}">
        <button type="submit">Editar Produto</button>
</form> -->