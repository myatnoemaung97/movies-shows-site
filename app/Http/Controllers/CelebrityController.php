<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class CelebrityController extends Controller
{
    public function show(Person $person) {
        $movies = $person->movies;
        $shows = $person->shows;


        return view('people.show', [
            'person' => $person
        ]);
    }
}
