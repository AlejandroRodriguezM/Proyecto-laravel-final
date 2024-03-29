<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Comentario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;


class ArticuloController extends Controller
{
    public function index()
    {
        $articulos = Articulo::all();
        if (count($articulos) < 1) {
            session()->flash('error', 'No existen articulos.');
        }
        return view('home', compact('articulos'));
    }

    public function index_vista()
    {

        $articulos = Articulo::all();
        if (count($articulos) < 1) {
            session()->flash('error', 'No existen articulos.');
        }
        return view('Articulo.articulos', compact('articulos'));
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
        return view('Articulo.articulos', compact('articulo'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|max:255',
            'categoria' => 'required',
            'contenido' => 'required',
            'image' => 'image|max:2048'
        ], [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título no puede tener más de :max caracteres.',
            'categoria.required' => 'La categoría es obligatoria.',
            'contenido.required' => 'El contenido es obligatorio.',
            'image.image' => 'El archivo subido no es una imagen.',
            'image.max' => 'La imagen no puede tener más de :max kilobytes.'
        ]);

        if ($validator->fails()) {
            return redirect('/escribir_articulo')->withErrors($validator);
        }

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
        $articulo->estado = 0;

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
        return redirect()->back();
    }

    public function estado($id)
    {
        $articulo = Articulo::findOrFail($id);
        if ($articulo->estado == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function activar($id)
    {
        // Aquí iría la lógica para activar el articulo con el id dado de la base de datos
        $articulo = Articulo::find($id);
        $articulo->estado = 1;
        $articulo->save();
        session()->flash('success', 'El articulo se ha activado de manera correcta.');
        return redirect()->back();
    }
}
