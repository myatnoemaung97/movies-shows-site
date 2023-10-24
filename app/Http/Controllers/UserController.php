<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $users = User::query();

            return DataTables::of($users)
                ->editColumn('created_at', function($u) {
                    return Carbon::parse($u->created_at)->format("Y-m-d H:i:s");
                })

                ->editColumn('updated_at', function($u) {
                    return Carbon::parse($u->updated_at)->format("Y-m-d H:i:s");
                })

                ->addColumn('action', function ($u) {

                    $delete = '<a href="" class="deleteUserButton btn btn-sm btn-danger" data-id="' . $u->id . '">Delete</a>';
                    $ban = "<a class='btn btn-sm btn-warning' style='margin-left: 10px;'>Ban</a>";

                    return '<div class="action">' . $delete . $ban . '</div>';

                })->rawColumns(['action'])->make(true);
        }

        return view('admin.users.index');
    }
}
