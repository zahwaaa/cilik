<?php

namespace Modules\Homepage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Article;
use Modules\Article\Entities\ArticleCategory;
use Modules\Kompetisi\Entities\Competition;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $article_cats = ArticleCategory::all();
        return view('template.homepage', compact('article_cats'));
    }

    public function articlecategory(ArticleCategory $articlecategory)
    {
        // sidebars
        $article_cats = ArticleCategory::all();

        // content
        $title = $articlecategory->name;
        $products = $articlecategory->articles()->where('article_status_id', 3)->latest()->get();
        return view('template.cat_article', compact('title', 'article_cats', 'products', 'articlecategory'));
    }

    public function article(Article $article)
    {
        // sidebars
        $article_cats = ArticleCategory::all();

        // content
        $title = $article->title;
        $article->increment('views');
        return view('template.article', compact('title', 'article', 'article_cats'));
    }

    public function competitions()
    {
        // sidebars
        $article_cats = ArticleCategory::all();

        // content
        $title = "Competitions";
        $comps = Competition::where('status_id', 1)->latest()->get();
        return view('template.competitions', compact('title', 'article_cats', 'comps'));
    }

    public function competition(Competition $competition)
    {
        // sidebars
        $article_cats = ArticleCategory::all();

        // content
        $title = $competition->name;
        return view('template.competition', compact('title', 'article_cats', 'competition'));
    }

    public function cari(Request $request)
    {
        // sidebars
        $article_cats = ArticleCategory::all();

        // content
        $title = "Pencarian";
        $products = Article::where('title', 'like', '%'.$request->cari.'%')->latest()->get();
        return view('template.cari', compact('title', 'article_cats', 'products'));
    }
}
