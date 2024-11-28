@extends('layouts.base')

@section('content')

    <form class="max-w-sm mx-auto p-3" action="{{ url('produtos') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-5" >
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="mb-5">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Preço</label>
            <input type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="mb-5">
            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900">Quantidade</label>
            <input type="number" id="quantity" name="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="mb-5">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image</label>
            <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="mb-5">
            <label for="categoria_id" class="estilização">
            <select name="categoria_id" id="categoria_id" required>
                <option value="">Selecione uma Categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Criar Produto</button>
    </form>
@endsection



<!-- modelo base de create -->

<!-- <form action="{{ url('produtos') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nome" required>
    <input type="number" name="price" placeholder="Preço" required>
    <input type="number" name="quantity" placeholder="Quantidade" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <button type="submit">Criar Produto</button>
</form> -->
