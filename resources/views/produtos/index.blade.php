@extends('layouts.base')

@section('content')
    <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
        <span class="font-semibold text-xl tracking-tight">Mercado</span>
    </div>
    <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
        <a href="{{ url('produtos')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Produtos
        </a>
        <a href="{{ url('produtos')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Categorias
        </a>
        </div>
    </div>
    </nav>
    <br>
    @can('create', App\Models\Pokémon::class)
    <a type="button" href="{{url('produtos/create')}}" class="m-5 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Adiconar Produto</a>
    @endcan

    <div class="flex flex-wrap justify-center mt-10">
        @foreach($produtos as $produto)
            <div class="p-4 max-w-sm">
                <div class="flex rounded-lg h-full bg-teal-400 p-8 flex-col">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{asset($produto->image)}}" alt="{{$produto->name}}"/>
                    <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $produto->name }}</h5>
                    <span class="text-sm text-gray-500">{{ $produto->price }}</span>
                    <span class="text-sm text-gray-500">{{ $produto->quantity }}</span>
                    @if(isset($produto->categoria))
                        <span class="text-sm text-gray-500">{{ $categoria->descrição }}</span>
                    @else
                        <span class="text-sm text-gray-500">Não tem categoria</span>
                    @endif
                    <div class="flex mt-4 md:mt-6">
                        <a href="{{ url('produtos/'.$produto->id.'/edit') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Editar</a>
                        <form action="{{ url('produtos/'.$produto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Deletar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection





<!-- Modelo basico index -->

<!-- @foreach($produtos as $produto)
    <div>
        <h3>{{ $produto->name }}</h3>
        <p>{{ $produto->price }}</p>
        <p>{{ $produto->quantity }}</p>
        <a href="{{ url('produtos/'.$produto->id.'/edit') }}">Edit</a>
        <form action="{{ url('produtos/'.$produto->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach -->
