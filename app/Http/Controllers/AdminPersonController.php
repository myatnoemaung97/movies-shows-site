<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminPersonController extends Controller
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

                    $details = "<a href='/admin/people/$a->id' class='btn btn-primary' style='margin-right: 10px'>Details</a>";
                    $edit = '<a href=" '.route('people.edit', $a->id).'" class="btn btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="" class="deletePersonButton btn btn-danger" data-id="'. $a->id .'">Delete</a>';

                    return '<div class="action">' . $details . $edit . $delete . '</div>';

                })->rawColumns(['action', 'image'])->make(true);
        }

        return view('admin.people.index');
    }

    public function show(Person $person) {
        return view('admin.people.show', [
            'person' => $person
        ]);
    }

    public function create() {
        return view('admin.people.create');
    }

    public function store(Request $request) {
        $attributes = $this->validatePerson($request);

        $image = $request->file('image');

        $attributes['image'] = ImageService::store($image);
        $attributes['thumbnail'] = ImageService::makeThumbnail($image, [50, 50]);
        $attributes['roles'] = implode(', ', $attributes['roles']);

        Person::create($attributes);

        return redirect(route('people.index'))->with('create', 'Person');
    }

    public function edit(Person $person) {
        return view('admin.people.edit', [
           'person' => $person
        ]);
    }

    public function update(Request $request, $id) {
        $attributes = $this->validatePerson($request);

        $person = Person::findOrFail($id);

        $image = $request->file('image');

        if ($image) {
            $attributes['image'] = ImageService::store($image);
            $attributes['thumbnail'] = ImageService::makeThumbnail($image, [50, 50]);

            ImageService::delete($person->image);
            ImageService::delete($person->thumbnail);
        }

        $attributes['roles'] = implode(', ', $attributes['roles']);

        $person->update($attributes);

        return redirect(route('people.show', $person->id))->with('update', 'Person');
    }

    public function destroy($id) {
        $person = Person::findOrFail($id);

        ImageService::delete($person->poster);
        ImageService::delete($person->thumbnail);

        $person->delete();

        return 'success';
    }

    private function validatePerson(Request $request) {
        $rules = [
            'name' => 'required|max:255',
            'birthday' => 'required',
            'country' => 'required|max:255',
            'height' => 'required',
            'roles' => 'required',
            'bio' => 'required',
            'biography' => 'required',
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
