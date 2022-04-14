<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    function read()
    {
        $article = Article::with('ukm')->get();
        return response()->success($article);
    }

    function readId($id)
    {
        $article = Article::with('ukm')->find($id);
        if (!$article) throw new NotFoundHttpException;
        return response()->success($article);
    }

    function readCategory($category)
    {
        $article = Article::whereHas('ukm', function (Builder $query) use ($category) {
            $query->where('category', $category);
        })->get();
        if ($article->isEmpty()) throw new NotFoundHttpException;
        return response()->success($article);
    }

    function readUkm($ukm_id)
    {
        $article = Article::with('ukm')->where('ukm_id', $ukm_id)->get();
        if ($article->isEmpty()) throw new NotFoundHttpException;
        return response()->success($article);
    }

    function search($key)
    {
        $article = Article::where('subject', 'LIKE', '%' . $key . '%')->orWhereHas('ukm', function (Builder $query) use ($key) {
            $query->where('category', 'LIKE', '%' . $key . '%')->orWhere('name', 'LIKE', '%' . $key . '%')->orWhere('short_name', 'LIKE', '%' . $key . '%');
        })->get();
        if ($article->isEmpty()) throw new NotFoundHttpException;
        return response()->success($article);
    }

    function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ukm_id' => ['required', 'integer'],
            'subject' => ['required', 'string', 'max:255'],
            'slug' => ['sometimes', 'nullable', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['sometimes', 'nullable', 'file', 'image', 'max:2048']
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return response()->failed($fieldsWithErrorMessagesArray, 400);
        }

        $article = new Article;

        $article->ukm_id = $request->ukm_id;
        $article->subject = $request->subject;
        $article->slug = $request->slug;
        if ($request->slug == null)
            $article->slug =  Str::slug($request->subject, '-');
        $article->content = $request->content;

        $article->save();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameSimpan = $article->id . '.'. $extension;

            $article->image = 'assets/article/' . $filenameSimpan;
            $request->file('image')->move(public_path('assets/article/'), $filenameSimpan);
        }

        $article->save();

        return response()->success($article);
    }

    function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => ['sometimes', 'nullable', 'string'],
            'slug' => ['sometimes', 'nullable', 'string'],
            'content' => ['sometimes', 'nullable', 'string'],
            'image' => ['sometimes', 'nullable', 'file', 'image', 'max:2048']
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return response()->failed($fieldsWithErrorMessagesArray, 400);
        }

        $article = Article::find($id);

        $article->subject = $request->subject ? $request->subject : $article->subject;
        $article->slug = $request->slug;
        if ($request->slug == null)
            $article->slug =  Str::slug($request->subject, '-');
        $article->content = $request->content ? $request->content : $article->content;

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameSimpan = $article->id . '.'. $extension;

            if ($article->image != null) {
                File::delete(public_path("$article->image"));
            }

            $article->image = 'assets/article/' . $filenameSimpan;
            $request->file('image')->move(public_path('assets/article/'), $filenameSimpan);
        }

        $article->save();

        return response()->success($article);
    }

    function delete($id)
    {
        $article = Article::find($id);
        if (!$article) throw new NotFoundHttpException;
        $article->delete();

        return response()->success('article with id='.$id .' has been deleted');
    }
}
