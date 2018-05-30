<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function getPost(Request $request)
    {
        $keyword = $request->keyword;
        $fullUrl = $request->fullUrl();
        $pageSize = $request->pagesize == null ? 10 : $request->pagesize;
        $addPath = "";
        if (!$keyword) {
            $posts = Post::paginate($pageSize);
            $addPath .= "?pagesize=$pageSize";
            foreach ($posts as $p) {
                $p['category_name'] = $p->getCate();
            }
        } else {
            $posts = Post::where('title', 'like', "%$keyword%")->paginate($pageSize);
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
            foreach ($posts as $p) {
                $p['category_name'] = $p->getCate();
            }
        }
        $posts->withPath($addPath);

        return view('user.admin.post.index', compact('posts', 'keyword', 'fullUrl', 'pageSize'));
    }

    public function add()
    {
        $model = new Post();
        $categories = Category::get(['id', 'cate_name']);
        $select = [];
        $select = ['-1' => '------------------------------------------'];
        $selected = $model->cate_id;
            foreach ($categories as $category) {
                $select[$category->id] = $category->cate_name;
            }

        return view('user.admin.post.form', compact('model', 'categories', 'select', 'selected'));
    }

    public function checkName(Request $request)
    {
        $post = Post::where('title', $request->name)->first();
        if($post && $post->id == $request->id) {
            return response()->json(true);
        }
        //chua ton tai: true, ton tai: false
        $result = $post == false ? true : false;

        return response()->json($result);
    }

    public function checkSlug(Request $request)
    {
        $post = Post::where('slug', $request->name)->first();
        if($post && $post->id == $request->id){
            return response()->json(true);
        }
        $result = $post == false ? true : false;

        return response()->json($result);
    }

    public function save(Request $request)
    {
        if ($request->id) {
    	   $model = Post::find($request->id);
            if (!$model) {
                return view('user.admin.404');
            }
        } else {
            $model = new Post();
        }
        $model->fill($request->all());

        // upload file
        if($request->hasFile('image')) {
            $file = $request->file('image');
            //getClient... ham luu file name
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/posts', $fileName);
            $model->image = 'storage/posts/'.$fileName;
        }
        $model->save();

        return redirect()->route('post.index');
    }

    public function edit($id)
    {
    	$model = Post::find($id);
        $select = [];
        $select = ['-1' => '------------------------------------------'];
        if (!$model) {
            return view('user.admin.404');
        } else {
            $selected = $model->cate_id;
            $categories = Category::get(['id', 'cate_name']);
            foreach ($categories as $category) {
                $select[$category->id] = $category->cate_name;
            }

            return view('user.admin.post.form', compact('model', 'categories', 'select', 'selected'));
        }

        $categories = Category::get(['id', 'cate_name']);
            foreach ($categories as $category) {
                $select[$category->id] = $category->cate_name;
            }

        return view('user.admin.post.form', compact('model', 'categories', 'select'));
    }

    public function remove($id)
    {
    	$posts = Post::find($id);
        if (!$posts) {
            return view('user.admin.404');
        } else {
            $posts->delete();

            return redirect(route('post.index'));
        }
    }
}
