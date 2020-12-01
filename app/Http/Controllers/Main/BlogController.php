<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Article;
use App\Models\Product;
use Carbon\Carbon;

class BlogController extends BlogSidebarController
{
    public function index()
    {
        $articles = Article::with('menu:id,mn_name')
        ->where([
            'a_active' => 1
        ])
        // ->select('id','a_name','a_slug','a_description','a_avatar','created_at','a_view')
        ->orderByDesc('id')
        ->paginate(8);

        $viewData = [
            'articles' => $articles,
            'productsPay' => $this->getProductTop(),
        ];

       
        return view('main.pages.article.index',$viewData);
    }
}
