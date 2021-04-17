<?php

namespace App\Http\Controllers;

use App\Models\Vacant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class VacantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess', 'vacant.index');

        return view('vacant.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()) {
            return abort(401, "Solo aplica para nuevos aspirantes");
        } else {
            return view('vacant.create');
        }
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
     * @param  \App\Models\Vacant  $vacant
     * @return \Illuminate\Http\Response
     */
    public function show(Vacant $vacant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacant  $vacant
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacant $vacant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacant  $vacant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacant $vacant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacant  $vacant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacant $vacant)
    {
        //
    }
}
