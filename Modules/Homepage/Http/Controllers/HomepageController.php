<?php

namespace Modules\Homepage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Modules\Article\Entities\Article;
use Modules\Article\Entities\ArticleCategory;
use Modules\Kompetisi\Entities\Competition;
use Modules\Kompetisi\Entities\CompetitionUser;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\ProductBuy;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Entities\ProductCheckout;
use Modules\Slider\Entities\Banner;
use Modules\Slider\Entities\Slider;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // sidebars
        $article_cats = ArticleCategory::all();
        $product_cats = ProductCategory::all();
        $product_olds = Product::oldest()->take(3)->get();
        $fav_articles = Article::where('article_status_id', 3)->orderBy('views', 'desc')->take(3)->get();

        // homepage
        $sliders = Slider::all();
        $products = Product::latest()->take(10)->get();
        $banners = Banner::latest()->take(3)->get();
        $articles = Article::where('article_status_id', 3)->latest()->take(10)->get();
        $comps = Competition::where('status_id', 1)->latest()->get();
        return view('homepage::index', compact('article_cats', 'product_cats', 'sliders', 'products', 'articles', 'product_olds', 'fav_articles', 'banners', 'comps'));
    }

    public function articlecategory(ArticleCategory $articlecategory)
    {
        // sidebars
        $article_cats = ArticleCategory::all();
        $product_cats = ProductCategory::all();
        $product_olds = Product::oldest()->take(3)->get();
        $fav_articles = Article::where('article_status_id', 3)->orderBy('views', 'desc')->take(3)->get();

        // content
        $title = $articlecategory->name;
        $products = $articlecategory->articles()->where('article_status_id', 3)->latest()->get();
        return view('homepage::cat_article', compact('title', 'article_cats', 'product_cats', 'products', 'product_olds', 'fav_articles'));
    }

    public function article(Article $article)
    {
        // sidebars
        $article_cats = ArticleCategory::all();
        $product_cats = ProductCategory::all();
        $product_olds = Product::oldest()->take(3)->get();
        $fav_articles = Article::where('article_status_id', 3)->orderBy('views', 'desc')->take(3)->get();

        // content
        $title = $article->title;
        $article->increment('views');
        return view('homepage::article', compact('title', 'article', 'article_cats', 'product_cats', 'product_olds', 'fav_articles'));
    }

    public function productcategory(ProductCategory $productcategory)
    {
        // sidebars
        $article_cats = ArticleCategory::all();
        $product_cats = ProductCategory::all();
        $product_olds = Product::oldest()->take(3)->get();
        $fav_articles = Article::where('article_status_id', 3)->orderBy('views', 'desc')->take(3)->get();

        // content
        $title = $productcategory->name;
        $products = $productcategory->products()->latest()->get();
        return view('homepage::category', compact('title', 'article_cats', 'product_cats', 'products', 'product_olds', 'fav_articles'));
    }

    public function product(Product $product)
    {
        // sidebars
        $article_cats = ArticleCategory::all();
        $product_cats = ProductCategory::all();
        $product_olds = Product::oldest()->take(3)->get();
        $fav_articles = Article::where('article_status_id', 3)->orderBy('views', 'desc')->take(3)->get();

        // content
        $title = $product->name;
        return view('homepage::detail', compact('article_cats', 'product_cats', 'product_olds', 'fav_articles', 'title', 'product'));
    }

    public function product_store(Product $product, Request $request)
    {
        $request->validate([
            'qty' => 'required|numeric'
        ]);

        // input ke productcheckout
        ProductBuy::updateOrCreate(
            ['product_id'=>$product->id, 'user_id'=>Auth::id(), 'checkout'=>'0'],
            ['harga_satuan'=>$product->price, 'jumlah'=>$request->qty, 'harga_total' => $product->price * $request->qty]
        );

        return redirect()->route('homepage.cart');
    }

    public function cart()
    {
        // sidebars
        $article_cats = ArticleCategory::all();
        $product_cats = ProductCategory::all();

        // cek cart kosong atau tidak
        $cek = ProductBuy::where('user_id', Auth::id())->where('checkout', 0)->count();
        if($cek < 1) return redirect()->route('homepage.index');

        // content
        $title = "Cart";
        $carts = ProductBuy::where('user_id', Auth::id())->where('checkout', 0)->get();
        return view('homepage::cart', compact('article_cats', 'product_cats', 'title', 'carts'));
    }

    public function cart_update(Request $request)
    {
        foreach($request->id as $i => $id){
            $data = ProductBuy::find($id);
                $product = Product::find($data->product_id);

            $data->jumlah = $_POST['qty'][$i];
            $data->harga_satuan = $product->price;
            $data->harga_total = $product->price * $_POST['qty'][$i];
            $data->save();
        }

        return redirect()->route('homepage.cart');
    }

    public function cart_hapus(ProductBuy $productbuy)
    {
        $productbuy->where('user_id', Auth::id())->where('checkout',0)->where('id', $productbuy->id)->delete();

        return redirect()->route('homepage.cart');
    }

    public function checkout()
    {
        // sidebars
        $article_cats = ArticleCategory::all();
        $product_cats = ProductCategory::all();

        // cek cart kosong atau tidak
        $cek = ProductBuy::where('user_id', Auth::id())->where('checkout', 0)->count();
        if($cek < 1) return redirect()->route('homepage.index');

        // content
        $title = "Checkout";
        $carts = ProductBuy::where('user_id', Auth::id())->where('checkout', 0)->get();
        $qty = ProductBuy::where('user_id', Auth::id())->where('checkout', 0)->sum('jumlah');
        $price = ProductBuy::where('user_id', Auth::id())->where('checkout', 0)->sum('harga_total');

        return view('homepage::checkout', compact('article_cats', 'product_cats', 'title', 'carts', 'price', 'qty'));
    }

    public function check_out(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'address_detail' => 'required',
            'zipcode' => 'required',
        ]);

        $kode = "CIL-" . Auth::id() . "-" . time();
        $price = ProductBuy::where('user_id', Auth::id())->where('checkout', 0)->sum('harga_total');

        $d = ProductBuy::where('user_id', Auth::id())->where('checkout', 0)->get();
        foreach($d as $da){
            $da->update([
                'kode' => $kode,
                'checkout' => 1
            ]);
        }

        ProductCheckout::create([
            'kode' => $kode,
            'jumlah' => $price,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'address_detail' => $request->address_detail,
            'zipcode' => $request->zipcode,
            'user_id' => Auth::id()
        ]);

        Http::post(config('app.ezpay').'transaksi', [
            'payment_code' => $kode,
            'price' => $price,
            'email' => Auth::user()->email,
            'catatan' => "Pembayaran untuk Cilik, akun: " . Auth::user()->email
        ]);

        return redirect()->route('homepage.index');

    }

    public function competitions()
    {
        // sidebars
        $article_cats = ArticleCategory::all();
        $product_cats = ProductCategory::all();
        $product_olds = Product::oldest()->take(3)->get();
        $fav_articles = Article::where('article_status_id', 3)->orderBy('views', 'desc')->take(3)->get();

        // content
        $title = "Competitions";
        $comps = Competition::where('status_id', 1)->latest()->get();
        return view('homepage::competitions', compact('title', 'article_cats', 'product_cats', 'comps', 'product_olds', 'fav_articles'));
    }

    public function competition(Competition $competition)
    {
        // sidebars
        $article_cats = ArticleCategory::all();
        $product_cats = ProductCategory::all();
        $product_olds = Product::oldest()->take(3)->get();
        $fav_articles = Article::where('article_status_id', 3)->orderBy('views', 'desc')->take(3)->get();

        // content
        $title = $competition->name;
        return view('homepage::competition', compact('title', 'article_cats', 'product_cats', 'product_olds', 'fav_articles', 'competition'));
    }

    public function competition_store(Competition $competition)
    {
        if($competition->is_paid == '0'){
            $competition->users()->sync([Auth::id() => ['is_paid' => 1]]);
        }else{

            $competition->users()->sync(Auth::id());

            $kode = "CIL-" . Auth::id() . "-" . time();

            ProductCheckout::create([
                'kode' => $kode,
                'jumlah' => $competition->price,
                'first_name' => Auth::id(),
                'last_name' => $competition->id,
                'email' => Auth::user()->email,
                'phone' => "kompetisi",
                'address' => "kompetisi",
                'address_detail' => "kompetisi",
                'zipcode' => "kompetisi",
                'user_id' => Auth::id()
            ]);

            Http::post(config('app.ezpay').'transaksi', [
                'payment_code' => $kode,
                'price' => $competition->price,
                'email' => Auth::user()->email,
                'catatan' => "Pembayaran untuk Kompetisi Cilik, akun: " . Auth::user()->email
            ]);
        }
        return redirect()->route('homepage.competition', $competition->id)->with('status', 'Anda telah mendaftar. Silahkan lakukan pembayaran.');
    }

}
