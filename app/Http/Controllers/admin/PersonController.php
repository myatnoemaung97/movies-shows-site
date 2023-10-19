<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PersonController extends Controller
{
    public function index(Request $request) {
        if($request->ajax())
        {
            $people = Person::query();

            return DataTables::of($people)

                ->editColumn('image', function ($value) {
                    $image = '<img src="' . $value->image . '" alt="image" style="max-width: 100px; max-height: 300px;"';
                    return '<div class="image">' . $image . '</div>';
                })

                ->addColumn('action', function($a) {

                    $edit = '<a href=" '.route('people.edit', $a->id).'" class="btn btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="" class="deletePersonButton btn btn-danger" data-id="'. $a->id .'">Delete</a>';

                    return '<div class="action">' . $edit . $delete . '</div>';

                })->rawColumns(['action', 'image'])->make(true);
        }

        return view('admin.people.index');
    }

    public function create() {
        return view('admin.people.create');
    }

    public function store(Request $request) {
        $attributes = $this->validatePerson($request);

        $attributes['image'] = '/storage/' . $request->file('image')->store();

        Person::create($attributes);

        return redirect(route('people.index'))->with('create', 'Person');
    }

    public function edit($id) {
        return view('admin.people.edit', [
           'person' => Person::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id) {
        $attributes = $this->validatePerson($request);

        $person = Person::findOrFail($id);

        $oldImage = public_path($person->image);

        if ($request->file('image')) {
            $attributes['image'] = '/storage/' . $request->file('image')->store();

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }

        $person->update($attributes);

        return redirect("/admin/people")->with('update', 'Person');
    }

    public function destroy($id) {
        $person = Person::findOrFail($id);

        $path = public_path($person->image);
        if (file_exists($path)) {
            unlink($path);
        }

        $person->delete();

        return 'success';
    }

    private function validatePerson(Request $request) {
        $rules = [
            'name' => 'required',
            'image.*' => 'mimes:jpg,jpeg,png,bmp,svg',
        ];

        if ($request->isMethod('patch')) {
            unset($rules['image']);
        } else {
            $rules['image'] = 'required|image';
        }

        return $request->validate($rules);
    }
}
