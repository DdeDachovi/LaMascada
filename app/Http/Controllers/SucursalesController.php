<?php

namespace App\Http\Controllers;

use App\imagen_sucursal;
use App\sucursales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = DB::select('SELECT * FROM sucursales s, imagen_sucursals im WHERE s.imagen_id = im.id');
        return view('Sucursales.index',compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sucursales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'imagen' =>'required|image',
            'name' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'required|integer',
            'horario' => 'required|string',
            ]
        );
        //guardado de imagen y captar la direccion de esta
        $path = $request->imagen->store('sucursales');
        Storage::move($path,'public/'.$path);
        imagen_sucursal::create(['Imagen' => $path]);

        $imagen = DB::select('SELECT id FROM imagen_sucursals WHERE Imagen = ?',[$path]);
        DB::insert('INSERT INTO sucursales (Nombre_sucursal,Direccion,Telefono,Horario_atencion, imagen_id)
                            VALUES (?,?,?,?,?)',[$request->name,$request->direccion,$request->telefono,$request->horario,$imagen[0]->id]);
        return redirect()->route('sucursales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $s = sucursales::find($id);
        return view('Sucursales.create',compact('s'));
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
        DB::update('UPDATE sucursales SET Nombre_sucursal = ?, Direccion = ?, Telefono = ?, Horario_atencion = ?
                            WHERE id = ?',[$request->name,$request->direccion,$request->telefono,$request->horario,$id]);
        return redirect()->route('sucursales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM sucursales WHERE id = ?',[$id]);
        return redirect()->route('sucursales.index');
    }
}
