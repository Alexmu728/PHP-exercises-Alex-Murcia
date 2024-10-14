<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function showVariable()
    {
        $variableFunction = function() {
            $variable = "This is a variable inside an anonymous function.";
            return view('example.variable', ['variable' => $variable]);
        };

        return $variableFunction();
    }

    public function showArray()
    {
        $arrayFunction = function() {
            $array = ['Laravel', 'PHP', 'Blade', 'Controllers'];
            return view('example.array', ['array' => $array]);
        };

        return $arrayFunction();
    }
    public function showArrayElement($id)
    {
        $elementFunction = function($id) {
            $array = ['Laravel', 'PHP', 'Blade', 'Controllers'];

            if (isset($array[$id])) {
                return view('example.element', ['element' => $array[$id]]);
            }

            return view('example.element', ['element' => 'Element not found']);
        };

        return $elementFunction($id);
    }
    public function showStyledArray()
    {
        $styledArrayFunction = function() {
            $array = ['Laravel', 'PHP', 'Blade', 'Controllers', 'Routes', 'Middleware'];
            return view('example.styled_array', ['array' => $array]);
        };

        return $styledArrayFunction();
    }
}
