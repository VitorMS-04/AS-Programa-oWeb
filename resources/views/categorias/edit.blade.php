@extends('layouts.base')

@section('content')
    <form class="max-w-sm mx-auto" action="{{ url('categorias/'.$categoria->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
            <input type="text" id="description" name="description" value="{{$categoria->description}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
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