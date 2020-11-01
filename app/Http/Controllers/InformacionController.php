<?php

namespace App\Http\Controllers;

use App\informacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informacion = informacion::orderBy('id','ASC')->paginate();
        return view('Informacion.index',compact('informacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Informacion.create');
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
                'informacion' =>'required|string',
                'descripcion' => 'required|string',
            ]
        );

        DB::insert('INSERT INTO informacions (Informacion,Descripcion)
                            VALUES (?,?)',[$request->informacion,$request->descripcion]);
        return redirect()->route('informacion.index');
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
        $i = informacion::find($id);
        return view('Informacion.create',compact('i'));
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
        $this->validate($request, [
                'informacion' =>'required|string',
                'descripcion' => 'required|string',
            ]
        );
        DB::update('UPDATE informacions SET Informacion = ?, Descripcion = ?
                            WHERE id = ?',[$request->informacion,$request->descripcion,$id]);
        return redirect()->route('informacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM informacions WHERE id = ?',[$id]);
        return redirect()->route('informacion.index');
    }
}
