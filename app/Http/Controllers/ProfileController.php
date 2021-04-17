<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /* Retorna la vista donde se vera el perfil del usuario */
    public function show()
    {
        return view('profile.index');
    }

    /* Retorna la vista donde se vera el departamento del usuario */
    public function departament()
    {
        return view('profile.departament');
    }

    /* Retorna la vista donde se veran los eventos del usuario */
    public function event()
    {
        return view('profile.event');
    }

    /* Retorna la vista donde se veran las vacaciones del usuario */
    public function vacation()
    {
        return view('profile.vacation');
    }
}
