<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Menu;
use App\Models\Product;

class ArticleDetailController extends BlogSidebarController
{
    public function index(Request $request,$slug)
    {
        $arraySlug = explode('-',$slug);
        $id = array_pop($arraySlug);

        if ($id){
            
            $article = Article::with('menu:id,mn_name','admin:id,name,email,avatar')->findOrFail($id);
               
            $viewData = [
                'article' => $article,
                'title_page' => $article->a_name,
                'productsPay' => $this->getProductTop(),
                'articleSuggests' => $this->getArticleSuggests($article->a_menu_id)
            ];

            return view('main.pages.article_detail.index',$viewData);
        }
        
        return redirect()->route('get.404');
    }

    private function getArticleSuggests($menuID){

        $article = Article::where([
            'a_active' => 1,
            'a_menu_id' => $menuID,
            ])
            ->orderByDesc('id')
            ->select('id','a_name','a_slug','a_description','a_avatar','created_at','a_view')
            ->limit(4)->get();

        return $article;
    }
}
