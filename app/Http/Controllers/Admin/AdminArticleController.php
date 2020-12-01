<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestArticle;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Article;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class AdminArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('menu:id,mn_name')->get();

        $viewData = [
            'articles' => $articles
        ];
        return view('admin.article.index', $viewData);
    }

    public function create()
    {
        $menu = Menu::all();

        return view('admin.article.create', compact('menu'));
    }

    public function store(AdminRequestArticle $request)
    { 
        
        $data = $request->except('_token','a_avatar');
        
        $data['a_slug']     = Str::slug($request->a_name);
        $data['created_at']   = Carbon::now();
 
        if(get_data_user('admins','id')){
            $data['a_admin_id'] = get_data_user('admins','id');
        }
        
        if ($request->a_avatar) {
            $image = upload_image('a_avatar');
            if ($image['code'] == 1) 
                $data['a_avatar'] = $image['name'];
        } 
        
        $id = Article::insertGetId($data);
        
        return redirect()->route('admin.article.index')->with('success','Thêm Mới Bài Viết Thành Công');
    }

    public function active($id)
    {
        $article = Article::find($id);
        $article->a_active =! $article->a_active;
        $article->save();

        return redirect()->back()->with('success','Cập Nhật Thành Công');;
    }

    public function hot($id)
    {
        $article = Article::find($id);
        $article->a_hot =! $article->a_hot;
        $article->save();

        return redirect()->back()->with('success','Cập Nhật Thành Công');;
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $menu = Menu::all();

        return view('admin.article.update', compact('menu','article'));
    }

    public function update(AdminRequestArticle $request, $id)
    {
        $article = Article::find($id);
       
        $data = $request->except('_token','a_avatar');
        $data['a_slug'] = Str::slug($request->a_name);
        $data['updated_at'] = Carbon::now();

        if ($request->a_avatar) {
            $image = upload_image('a_avatar');
            if ($image['code'] == 1) 
                $data['a_avatar'] = $image['name'];
        } 
       
        $update = $article->update($data);

        return redirect()->route('admin.article.index')->with('success','Cập Nhật Thành Công');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        if ($article) $article->delete();

        return redirect()->back()->with('success','Xóa Bài Viết Thành Công');;
    }
}
