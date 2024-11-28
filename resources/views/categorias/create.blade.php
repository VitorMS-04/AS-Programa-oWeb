@extends('layouts.base')

@section('content')

    <form class="max-w-sm mx-auto" action="{{ url('categorias') }}" method="POST">
        @csrf
        <div class="mb-5" >
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
            <input type="text" id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Criar Categoria</button>
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


<!-- enctype="multipart/form-data" -->
 <!-- caso precise hehe -->