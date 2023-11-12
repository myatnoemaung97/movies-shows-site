<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPlaylistController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $movies = Movie::query();

            return DataTables::of($movies)
                ->editColumn('created_at', function ($e) {
                    return Carbon::parse($e->created_at)->format("Y-m-d H:i:s");
                })
                ->editColumn('updated_at', function ($e) {
                    return Carbon::parse($e->updated_at)->format("Y-m-d H:i:s");
                })
                ->addColumn('action', function ($a) {

                    $details = "<a href='/admin/movies/$a->slug' class='btn btn-sm btn-primary' style='margin-right: 10px'>Details</a>";
                    $edit = '<a href=" ' . route('movies.edit', $a->slug) . '" class="btn btn-sm btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="" class="deleteMovieButton btn btn-sm btn-danger" data-id="' . $a->slug . '">Delete</a>';

                    return '<div class="action">' . $details . $edit . $delete . '</div>';

                })->rawColumns(['action'])->make(true);
        }

        return view('admin.movies.index');
    }
}
