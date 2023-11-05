<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class CelebrityController extends Controller
{
    public function show(Person $person) {
        return view('people.show', [
            'medias' => $person->movies->mergeRecursive($person->shows),
            'person' => $person
        ]);
    }
}
