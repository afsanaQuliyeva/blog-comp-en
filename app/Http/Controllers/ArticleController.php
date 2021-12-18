<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(Article::PAGE_COUNT);
        //latest() -> orderBy('created_at', 'desc')
        //$articles =Article::simplePaginate(4);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all('id', 'category_name');
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            //$myImage = $request->file('image');
            /*Yeni sekil adi*/
            $uniqImageName = 'image_'.time();
            //image_1555121515
            $imageExt = strtolower($request->file('image')->getClientOriginalExtension());
            $imageName = $uniqImageName.".".$imageExt;
            /*image_1555121515.png*/
            $request->image->move('uploads/', $imageName);
            $validated['image'] = $imageName;
        }

        $article = Article::create(Arr::except($validated, 'categories'));
        $article->getCategories()->attach($validated['categories']);

    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all('id', 'category_name');
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Article $article
     * @return Response
     */
    public function update(ArticleRequest $request, $id)
    {
//        $slugTest = Str::slug('Backend');
//        dd($slugTest); ->backend
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $uniqImageName = 'image_'.time();
            $imageExt = strtolower($request->file('image')->getClientOriginalExtension());
            $imageName = $uniqImageName.".".$imageExt;
            $request->image->move('uploads/', $imageName);
            $validated['image'] = $imageName;
            $oldImage = $request->old_image;
            unlink('uploads/'.$oldImage);
        }

        $article = Article::findOrFail($id);
        $article->update(Arr::except($validated, 'categories'));
        $article->getCategories()->sync($validated['categories']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
