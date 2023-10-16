<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Show;

class ShowController extends Controller
{
    public function index() {
        return view('admin.shows.index', [
            'shows' => Show::latest()->get()
        ]);
    }
}
