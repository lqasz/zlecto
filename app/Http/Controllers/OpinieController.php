<?php

namespace App\Http\Controllers;

use App\Opinie;
use Illuminate\Http\Request;
use \DB;

class OpinieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $z_bazy = DB::connection()->getSchemaBuilder()->getColumnListing('opinie');
        return view('widoki_z_bazy.opinie', ['kolumny' => $z_bazy]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Opinie  $opinie
     * @return \Illuminate\Http\Response
     */
    public function show(Opinie $opinie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Opinie  $opinie
     * @return \Illuminate\Http\Response
     */
    public function edit(Opinie $opinie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Opinie  $opinie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opinie $opinie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Opinie  $opinie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opinie $opinie)
    {
        //
    }
}
