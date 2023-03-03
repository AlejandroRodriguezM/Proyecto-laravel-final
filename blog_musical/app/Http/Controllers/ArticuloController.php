<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Comentario;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ArticuloController extends Controller
{
    public function index()
    {
        $articulos = Articulo::all();
        return view('home', compact('articulos'));
    }

    public function show($id)
    {
        try {
            $articulo = Articulo::findOrFail($id);
            $comentarios = Comentario::where('articulos_id', $id)->get();
            return view('Articulo.articulo', compact('articulo', 'comentarios'));
        } catch (ModelNotFoundException $e) {
            return view('Articulo.articulo_error', ['id' => $id]);
        }
    }

    public function show_articulo($id)
    {
        // Aquí iría la lógica para obtener el artículo con el id dado
        $articulo = Articulo::find($id);
        return view('Articulo.ver_articulo', compact('articulo'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'category' => 'required',
        //     'content' => 'required',
        //     'image' => 'image|max:2048'
        // ]);

        $categorias = Categoria::all();
        // Si no existen categorías, crear la categoría "Sin categoría"
        if ($categorias->isEmpty()) {
            $sinCategoria = new Categoria();
            $sinCategoria->nombre_categoria = 'Sin categoría';
            $sinCategoria->save();

            // Obtener nuevamente las categorías, incluyendo la nueva categoría creada
            $categorias = Categoria::all();
        }


        // Crear una instancia del modelo Articulo
        $articulo = new Articulo();
        $articulo->titulo = $request->input('titulo');
        $articulo->categoria_id = $request->input('categoria');
        $articulo->contenido = $request->input('contenido');
        $articulo->fecha = now(); // asignar fecha actual
        $articulo->usuario_id = auth()->id(); // Asignar el id del usuario autenticado

        // Guardar la imagen si se ha subido una
        if ($request->hasFile('image')) {
            $imagen = $request->file('image');
            $rutaImagen = $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $rutaImagen);
            $articulo->imagen = $rutaImagen;
        } else {
            $articulo->imagen = 'default.jpg';
        }
        $articulo->save();
        // Redirigir a la página de listado de artículos
        session()->flash('success', 'Has creado correctamente un articulo.');
        return redirect()->route('home');
    }

    public function edit($id)
    {
        // Aquí iría la lógica para obtener el artículo con el id dado
        $articulo = Articulo::find($id);
        $categorias = Categoria::all();
        return view('Articulo.modificar_articulo', compact('articulo', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $articulo = Articulo::find($id);
        $articulo->titulo = $request->input('title');
        $articulo->categoria_id = $request->input('category');
        $articulo->contenido = $request->input('content');
        // Actualizar la imagen si se ha subido una nueva
        if ($request->hasFile('image')) {
            $imagen = $request->file('image');
            $rutaImagen = $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $rutaImagen);
            $articulo->imagen = $rutaImagen;
        }
        $articulo->save();
        session()->flash('success', 'El articulo se ha actualizado de manera correcta.');
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id);

        // Eliminar los comentarios asociados al artículo
        $articulo->comentarios()->delete();

        $articulo->delete();
        session()->flash('success', 'Artículo eliminado con éxito');
        return redirect()->route('home');
    }
}
