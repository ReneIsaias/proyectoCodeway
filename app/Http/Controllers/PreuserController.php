<?php

namespace App\Http\Controllers;

use App\Models\Preuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PreuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess', 'preuser.index');

        return view('preuser.index');
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
     * @param  \App\Models\Preuser  $preuser
     * @return \Illuminate\Http\Response
     */
    public function show(Preuser $preuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Preuser  $preuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Preuser $preuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Preuser  $preuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preuser $preuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Preuser  $preuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preuser $preuser)
    {
        //
    }
}
