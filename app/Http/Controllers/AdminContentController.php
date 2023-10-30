<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Content;
use Illuminate\Http\Request;

class AdminContentController extends Controller
{

    public function show(Article $article, Content $content) {
        return view('admin.contents.show', [
            'article' => $article,
            'content' => $content
        ]);
    }

    public function create(Article $article) {
        return view('admin.contents.create', [
            'article' => $article
        ]);
    }

    public function store(Request $request, Article $article) {
        $attributes = $this->validateContent($request);

        $attributes['image'] = '/storage/' . $request->file('image')->store();

        $article->contents()->save(new Content($attributes));

        return redirect(route('articles.show', $article->id))->with('create', 'Content');
    }

    public function edit(Article $article, Content $content) {
        return view('admin.contents.edit', [
            'article' => $article,
            'content' => $content
        ]);
    }

    public function update(Request $request, Article $article, Content $content) {
        $attributes = $this->validateContent($request);

        $oldImage = public_path($content->image);

        if ($request->file('image')) {
            $attributes['image'] = '/storage/' . $request->file('image')->store();

            if (file_exists($oldImage) && basename($oldImage) !== 'image-placeholder.jpg') {
                unlink($oldImage);
            }
        }

        $content->update($attributes);

        return redirect(route('contents.show', [$article->id, $content->id]))->with('update', 'Content');
    }

    public function destroy(Article $article, Content $content) {
        $path = public_path($content->image);
        if (file_exists($path) && basename($path) !== 'image-placeholder.jpg') {
            unlink($path);
        }

        $content->delete();

        return 'success';
    }


    private function validateContent(Request $request) {
        $rules = [
            'body' => 'required',
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
