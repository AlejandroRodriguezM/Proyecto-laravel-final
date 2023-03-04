<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class CategoriaController extends Controller
{
    public function index_categorias()
    {
        $categorias = Categoria::all();
        // Si no existen categorías, crear la categoría "Sin categoría"
        if ($categorias->isEmpty()) {
            $sinCategoria = new Categoria();
            $sinCategoria->nombre_categoria = 'Sin categoría';
            $sinCategoria->save();

            // Obtener nuevamente las categorías, incluyendo la nueva categoría creada
            $categorias = Categoria::all();
        }
        return view('Articulo.escribir_articulo', compact('categorias'));
    }

    public function index_comprobar()
    {
        $categorias = Categoria::all();

        // Si no existen categorías, crear la categoría "Sin categoría"
        if ($categorias->isEmpty()) {
            $sinCategoria = new Categoria();
            $sinCategoria->nombre_categoria = 'Sin categoría';
            $sinCategoria->save();

            // Obtener nuevamente las categorías, incluyendo la nueva categoría creada
            $categorias = Categoria::all();
        } elseif ($categorias->count() < 2) {
            DB::statement('ALTER TABLE categorias AUTO_INCREMENT = 1');
        }
        if (count($categorias) < 2) {
            session()->flash('success', 'Solamente existe la categoria predeterminada.');
        }
        return view('Categoria.ver_categorias', compact('categorias'));
    }

    public function index_categoria()
    {
        $categorias = Categoria::all();
        return view('Categoria.ver_categorias', compact('categorias'));
    }

    public function store(Request $request)
    {
        // Aquí iría la lógica para guardar la categoría en la base de datos
        $categoria = new Categoria();
        $categoria->nombre_categoria = $request->input('nombre');
        $categoria->save();
        session()->flash('success', 'La categoria se ha creado de manera correcta.');
        return redirect()->route('ver_categorias');
    }

    public function edit($id)
    {
        try {
            $categorias = Categoria::all();
            return view('Categoria.modificar_categoria', compact('categorias'));
        } catch (ModelNotFoundException $e) {
            return view('Articulo.categoria_error', ['id' => $id]);
        }
    }

    public function update(Request $request, $id)
    {


        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->nombre_categoria = $request->input('nombre');
            $categoria->save();
            session()->flash('success', 'La categoria se ha actualizado de manera correcta.');
            return redirect()->route('ver_categorias');
        } catch (ModelNotFoundException $e) {
            return view('Categoria.categoria_error');
        }
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);

        // Si la categoría a eliminar es la categoría por defecto, no permitir su eliminación

        // Buscar los artículos que tengan la categoría a eliminar y asignarles la categoría por defecto
        $articulos = Articulo::where('categoria_id', $categoria->id)->get();
        $categoriaPorDefecto = Categoria::firstOrCreate(['nombre_categoria' => 'Sin categoría']);

        foreach ($articulos as $articulo) {
            $articulo->categoria_id = $categoriaPorDefecto->id;
            $articulo->save();
        }

        // Eliminar la categoría
        $categoria->delete();
        session()->flash('success', 'La categoría se ha eliminado de manera correcta.');

        return redirect()->route('ver_categorias');
    }
}
