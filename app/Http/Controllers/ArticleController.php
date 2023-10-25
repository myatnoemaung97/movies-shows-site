<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ImageService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $articles = Article::query();

            return DataTables::of($articles)
                ->editColumn('created_at', function($a) {
                    return Carbon::parse($a->created_at)->format("Y-m-d H:i:s");
                })

                ->editColumn('updated_at', function($a) {
                    return Carbon::parse($a->updated_at)->format("Y-m-d H:i:s");
                })

                ->addColumn('action', function ($a) {

                    $details = "<a href='/admin/articles/$a->id' class='btn btn-sm btn-primary' style='margin-right: 10px'>Details</a>";
                    $edit = '<a href=" ' . route('articles.edit', $a->id) . '" class="btn btn-sm btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="" class="deleteArticleButton btn btn-sm btn-danger" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $details . $edit . $delete . '</div>';

                })->rawColumns(['action'])->make(true);
        }

        return view('admin.articles.index');
    }

    public function show(Request $request, Article $article) {
        if ($request->ajax()) {
            $contents = $article->contents;

            return DataTables::of($contents)
                ->editColumn('body', function($c) {
                    return substr($c->body, 0, 25) . '...';
                })

                ->editColumn('image', function ($value) {
                    $image = '<img src="' . $value->image . '" alt="image" style="max-width: 100px; max-height: 300px;"';
                    return '<div class="image">' . $image . '</div>';
                })

                ->editColumn('created_at', function($c) {
                    return Carbon::parse($c->created_at)->format("Y-m-d H:i:s");
                })

                ->editColumn('updated_at', function($c) {
                    return Carbon::parse($c->updated_at)->format("Y-m-d H:i:s");
                })

                ->addColumn('action', function ($c) use ($article) {

                    $details = "<a href='/admin/articles/$article->id/contents/$c->id' class='btn btn-sm btn-primary' style='margin-right: 10px'>Details</a>";
                    $edit = "<a href='/admin/articles/$article->id/contents/$c->id/edit' class='btn btn-sm btn-success' style='margin-right: 10px;'>Edit</a>";
                    $delete = '<a href="" class="deleteContentButton btn btn-sm btn-danger" data-article_id="' . $article->id . '" data-content_id="' . $c->id . '">Delete</a>';

                    return '<div class="action">' . $details . $edit . $delete . '</div>';

                })->rawColumns(['action', 'image'])->make(true);
        }

        return view('admin.articles.show', [
            'article' => $article
        ]);
    }

    public function create() {
        return view('admin.articles.create');
    }

    public function store(Request $request) {
        $attributes = $this->validateArticle($request);

        ImageService::storeImage($request->file('image'));

        $image = $request->file('image');

        $path = public_path('/storage/');

        $filename = uniqid() . '.' . $image->getClientOriginalExtension();

        Image::make($image->getRealPath())
            ->resize(600, 400)
            ->save($path . $filename);

        $attributes['thumbnail'] = '/storage/' . $filename;

        $attributes['image'] = '/storage/' . $request->file('image')->store();

        Article::create($attributes);

        return redirect(route('articles.index'))->with('draft', 'Article');
    }

    public function edit(Article $article) {
        return view('admin.articles.edit', [
            'article' => $article
        ]);
    }

    public function update(Request $request, Article $article) {
        $attributes = $this->validateArticle($request);

        $oldImage = public_path($article->image);

        if ($request->file('image')) {
            $image = $request->file('image');

            $path = public_path('/storage/');

            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            Image::make($image->getRealPath())
                ->resize(600, 400)
                ->save($path . $filename);

            $attributes['thumbnail'] = '/storage/' . $filename;
            $attributes['image'] = '/storage/' . $request->file('image')->store();

            if (file_exists($oldImage) && basename($oldImage) !== 'image-placeholder.jpg') {
                unlink($oldImage);
            }
        }

        $article->update($attributes);

        if ($attributes['status'] === 'published') {
            return redirect(route('articles.index'))->with('publish', 'Article');
        }

        return redirect(route('articles.show', $article->id))->with('update', 'Article');
    }

    public function destroy(Article $article) {
        $path = public_path($article->image);
        if (file_exists($path) && basename($path) !== 'image-placeholder.jpg') {
            unlink($path);
        }

        $article->delete();

        return 'success';
    }

    private function validateArticle(Request $request) {
        $rules = [
            'title' => 'required',
            'body' => 'required',
            'image.*' => 'mimes:jpg,jpeg,png,bmp,svg',
            'status' => 'required'
        ];

        if ($request->isMethod('patch')) {
            unset($rules['image']);
        } else {
            $rules['image'] = 'required|image';
        }

        return $request->validate($rules);
    }
}
