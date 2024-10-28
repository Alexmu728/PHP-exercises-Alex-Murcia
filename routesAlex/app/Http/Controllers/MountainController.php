<?php

namespace App\Http\Controllers;

use App\Models\Mountain;
use Illuminate\Http\Request;

class MountainController extends Controller
{

    public function index()
    {
        $mountains = Mountain::orderBy('firstClimbDate', 'asc')->get();
        return view('mountains.index', ['mountains' => $mountains]);
    }
     function show($id)
    {
        $mountain = Mountain::findOrFail($id);
        return view('mountains.show', ['mountain' => $mountain]);
    }

    public function max()
    {
        $mountain = Mountain::where('continent', 'Europe')
                            ->where('belongsToRange', true)
                            ->orderBy('height', 'desc')
                            ->first();

        return view('mountains.max', ['mountain' => $mountain]);
    }
    public function customFilter()
    {
        $rangeMountainsEurope = Mountain::where('belongsToRange', true)
            ->where('firstClimbDate', '>', '2000-01-01')
            ->where('continent', 'Europe')
            ->get();

        $mountainsFilter = Mountain::where('height', '>=', 1500)
            ->orWhere(function ($query) {
                $query->where('belongsToRange', false)
                      ->whereRaw("LOWER(SUBSTRING(name, 1, 1)) NOT IN ('a', 'e', 'i', 'o', 'u')");
            })
            ->get();

        return view('mountains.customFilter', [
            'rangeMountainsEurope' => $rangeMountainsEurope,
            'mountainsFilter' => $mountainsFilter,
        ]);
    }
}
