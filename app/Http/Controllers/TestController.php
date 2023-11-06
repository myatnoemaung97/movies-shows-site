<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function store(Request $request) {
        dd($request->all());
    }

    public function destroy(Request $request) {
        dd($request->all());
    }

    public function patch(Request $request) {
        dd($request->all());
    }

}
