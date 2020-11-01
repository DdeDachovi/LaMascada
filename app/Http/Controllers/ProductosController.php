<?php

namespace App\Http\Controllers;

use App\producto;
use App\imagen_producto;
use App\tipo_producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //$productos = DB::select('SELECT * FROM productos p, imagen_productos ip WHERE p.imagen_id = ip.id');
        $productos = producto::all();
        $imagenes = imagen_producto::all();
        $categorias = tipo_producto::all();
        return view('Productos.index',compact('productos','categorias','imagenes',$productos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = tipo_producto::all();
        return view('Productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'imagen' =>'required|image',
                'name' => 'required|string',
                'informacion' => 'required|string',
                'precio' => 'required|integer',
            ]
        );
        //guardado de imagen y captar la direccion de esta
        $path = $request->imagen->store('productos');
        Storage::move($path,'public/'.$path);
        //$path = 'storage/app/'.$path;
        imagen_producto::create(['Imagen' => $path]);

        $imagen = DB::select('SELECT id FROM imagen_productos WHERE Imagen = ?',[$path]);
        DB::insert('INSERT INTO productos (Nombre_producto,Informacion,Precio,imagen_id,tipo_id)
                            VALUES (?,?,?,?,?)',[$request->name,$request->informacion,$request->precio,$imagen[0]->id,$request->categoria]);

        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = DB::select('SELECT * FROM productos WHERE id = ?',[$id]);
        $imagen = DB::select('SELECT * FROM imagen_productos WHERE id = ?',[$producto[0]->imagen_id]);
        DB::update('UPDATE productos SET Visitas = Visitas + 1 WHERE id = ?',[$id]);
        return view('Productos.show',compact('producto','imagen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = producto::find($id);
        $categorias = tipo_producto::all();
        return view('Productos.create', compact('p','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        DB::update('UPDATE productos SET Nombre_producto = ?, Informacion = ?, Precio = ?, tipo_id = ?
                            WHERE id = ?',[$request->name,$request->informacion,$request->precio,$request->categoria,$id]);
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM productos WHERE id = ?',[$id]);
        return redirect()->route('productos.index');
    }
}
