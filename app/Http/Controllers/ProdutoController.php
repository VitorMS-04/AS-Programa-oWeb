<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {   
        if(!Gate::authorize('create', Post::class))
        {
            return redirect('produtos')->with('success', 'Produto created successfully.');
        }

        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        Produto::create($request->all());

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'categoria_id' => 'required'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $produto = new Produto();
        $produto->name = $request->name;
        $produto->price = $request->price;
        $produto->quantity = $request->quantity;
        $produto->image = 'images/'.$imageName;
        $produto->categoria() = $request->categoria_id;

        $produto->save();
    
        return redirect('produtos')->with('success', 'Produto created successfully.');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        Gate::authorize('update', Post::class);


        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return redirect('produtos')->with('success', 'Produto updated successfully.');
    }

    public function destroy($id)
    {
        Gate::authorize('delete', Post::class);
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect('produtos')->with('success', 'Produto deleted successfully.');
    }
}
