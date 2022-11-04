<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = DB::table('articles')
            ->join('categories','categories.id','=','articles.category_id')
            ->select(
                'articles.id',
                'articles.title',
                'articles.publish',
                'articles.banner',
                'categories.title_cat',
                'categories.id as id_cat'
            )
            ->get();
        return view('admin.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('admin.article.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        $data['banner'] = imgSave($data['image'],"banner");
        $art = new Article();
        $art->create($data);
        return redirect()->action([ArticleController::class,'index'])->with('success','article créé');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $art = Article::findOrFail($id);
        $cats = Category::all();
        return view('admin.article.edit',compact('art','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        $art = Article::findOrFail($id);
        if($data['image'] !== null){
            unlink(public_path().'/banner/'.$art->banner);
            $data['banner'] = imgSave($data['image'],"banner");
        }
        $art->update($data);
        return redirect()->action([ArticleController::class,'index'])->with('success','article modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $art = Article::findOrFail($id);
        unlink(public_path().'/banner/'.$art->banner);
        $art->delete();
        return redirect()->action([ArticleController::class,'index'])->with('success','article supprimé');
    }
}
