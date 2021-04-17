<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess', 'class.index');

        return view('class.index');
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
     * @param  \App\Models\Clas  $clas
     * @return \Illuminate\Http\Response
     */
    public function show(Clas $clas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clas  $clas
     * @return \Illuminate\Http\Response
     */
    public function edit(Clas $clas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clas  $clas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clas $clas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clas  $clas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clas $clas)
    {
        //
    }
}
