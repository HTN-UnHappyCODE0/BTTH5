<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Author;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ArticleFormRequest;



class musicController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ??  "";




        if ($search !== "") {
            //Cách 1 Raw data
            // $articles = DB::select("SELECT * FROM baiviet WHERE ma_tgia LIKE (select ma_tgia from tacgia where ten_tgia like'%$search%')");

            //Cách 2 Query Builder
            // $articles = DB::table('baiviet')
            //     ->join('tacgia', 'baiviet.ma_tgia', '=', 'tacgia.ma_tgia')
            //     ->where('tacgia.ten_tgia', 'LIKE', '%' . $search . '%')
            //     ->select('baiviet.*')
            //     ->get();

            //Cách 3 Eloquent ORM
            $authors = Author::where("ten_tgia", "LIKE", "%$search%")->value('ma_tgia');

            $articles = Article::where("ma_tgia", $authors)->get();
        } else {
            //Cách 1 Raw data
            //$articles = DB::select('SELECT * FROM baiviet');

            //Cách 2 Query Builder
            //$articles = DB::table('baiviet')->get();

            //Cách 3 Eloquent ORM
            $articles = Article::all();
        }

        $NoArticlesCategory = Category::select('ma_tloai')
            ->selectRaw('COUNT(*) as total_articles')
            ->groupBy('ma_tloai')
            ->orderByDesc('total_articles')
            ->first();

        if ($NoArticlesCategory) {
            $tenTheloai = Category::where('ma_tloai', $NoArticlesCategory->ma_tloai)->value('ten_tloai');
        } else {
            $tenTheloai = null;
        }

        $topAuthors = Article::select('ma_tgia')
            ->selectRaw('COUNT(*) as total_articles')
            ->groupBy('ma_tgia')
            ->orderByDesc('total_articles')
            ->limit(2)
            ->get();

        $authorsIds = $topAuthors->pluck('ma_tgia');
        $authorTops = Author::whereIn('ma_tgia', $authorsIds)->get();

        $articleMixs = Article::with('Author', 'Category')->get();


        $keywords = ['an', 'ba', 'aa'];

        $articleSongs = Article::where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->orWhere('tieude', 'LIKE', "%$keyword%")
                    ->orWhere('ten_bhat', 'LIKE', "%$keyword%");
            }
        })->get();
        $categories = Category::all();


        $selectedCategory = $request->query('category');

        if ($selectedCategory) {
            $articleCa = Article::where('ma_tloai', $selectedCategory)->get();
        } else {
            $articleCa = Article::all();
        }


        // $tenTheLoai = 'enim';
        // $result = DB::select('CALL sp_DSbaiviet(?)', [$tenTheLoai]);


        return view("index", compact("articles", "search", "tenTheloai", "authorTops", "articleMixs", "articleSongs", "selectedCategory", "categories", "articleCa"));
    }

    public function create()
    {

        $articles = Article::all();
        return view("create", compact("articles"));
    }

    public function edit(Article $article)
    {
        $articles = Article::all();
        $categories = Category::all();
        $authors = Author::all();

        return view('edit', compact('article', "articles", "categories", "authors"));
    }

    public function store(ArticleFormRequest $request)
    {

        $validated = $request->validated();

        $article = new Article();
        $article->ma_tgia = $validated['ma_tgia1'];
        $article->ma_tloai = $validated['ma_tloai1'];

        $article->tieude = $validated['tieude1'];
        $article->ten_bhat = $validated['ten_bhat1'];



        $article->hinhanh = $validated['hinhanh1'];
        $article->tomtat = $validated['tomtat1'];
        $article->noidung = $validated['noidung1'];
        $article->ngayviet = date('Y-m-d h:i:s', strtotime($validated['ngayviet1']));
        $article->save();

        return redirect('/articles')->with('message', ' added successfully');
    }
    public function update(ArticleFormRequest $request, Article $article)
    {
        //dd($request);
        $validated = $request->validated();
        $article = Article::find($article->ma_bviet);

        $article->tieude = $validated['tieude1'];
        $article->ten_bhat = $validated['ten_bhat1'];
        $article->hinhanh = $validated['hinhanh1'];
        $article->tomtat = $validated['tomtat1'];
        $article->noidung = $validated['noidung1'];
        $article->ma_tgia = $validated['ma_tgia1'];
        $article->ma_tloai = $validated['ma_tloai1'];
        $article->ngayviet = date('Y-m-d h:i:s', strtotime($validated['ngayviet1']));
        $article->update();

        return redirect('/articles')->with('message', ' updated successfully');
    }
}
