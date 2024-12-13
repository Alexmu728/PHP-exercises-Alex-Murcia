<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolOrganizationController extends Controller
{
    public function index()
    {
        return view('school_organization.index');  // Vista para la organización escolar
    }
}
