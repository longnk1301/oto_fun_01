<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\ImagePost;
use App\Models\Tag;

class PostController extends Controller
{
    public function getPost(Request $request)
    {
        $keyword = $request->keyword;
        $fullUrl = $request->fullUrl();
        $pageSize = $request->pagesize == null ? 5 : $request->pagesize;
        $addPath = "";
        if(!$keyword) {
            $posts = Post::paginate($pageSize);
            $addPath .= "?pagesize=$pageSize";
            foreach ($posts as $p) {
                $p['category_name'] = $p->getCate();
                $p['images'] = $p->getImagePost()->first();
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

    public function show($id)
    {
        $detail_post = Post::find($id);
        if (!$detail_post) {
            return view('user.admin.404');
        } else {
            $detail_post['tags'] = $detail_post->tags()->get();
            $images = ImagePost::where('post_id', $id)->get();
            $category = Category::where('id', $detail_post->category_id)->first();
            }
        return view('user.admin.post.details_post', compact('detail_post', 'images', 'category'));
    }

    public function add()
    {
        $model = new Post();
        $status = 'UnPublic';
        $categories = Category::all();
        $tags = null;
        $select = [];
        $select = ['-1' => '------------------------------------------'];
        $selected = $model->category_id;
            foreach ($categories as $category) {
                $select[$category->id] = $category->category_name;
            }

        return view('user.admin.post.form', compact('model', 'categories', 'select', 'selected', 'status', 'tags'));
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

    public function checkTag(Request $request)
    {
        $tag = Tag::where('tag', $request->name)->first();
        if($tag && $tag->id == $request->id) {
            return response()->json(true);
        }
        //chua ton tai: true, ton tai: false
        $result = $tag == false ? true : false;

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
        $model->title = $request->title;
        $model->slug = $request->slug;
        $model->category_id = $request->category_id;
        $model->summary = $request->summary;
        $model->content = $request->content;
        $model->status = $request->status;
        $model->save();

        $tags = explode(',', $request->tags);
        foreach ($tags as $detail_tag) {
            $tag = Tag::create(['tag' => $detail_tag]);
            $model->tags()->attach($tag);
        }
        // upload file
        if($request->hasFile('image')) {
            $files = $request->file('image');
            foreach ($files as $file) {
                $images = new ImagePost();
                $fileName = uniqid() . '-' . $file->getClientOriginalName();
                $file->storeAs(config('mysetting.ImgPost'), $fileName);
                $images->image = config('mysetting.GetImgePost') . $fileName;
                $images->post_id = $model->id;
                $images->save();
            }
        }

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
            $model['tags'] = $model->tags()->get();
            $arrTags = [];
            foreach ($model['tags'] as $tag) {
                array_push($arrTags, $tag->tag);
                }
            }
            $tags = implode(',', $arrTags);
            $images = ImagePost::where('post_id', $id)->get();
            $selected = $model->category_id;
            $categories = Category::get(['id', 'category_name']);
            $status = $model->status;
            foreach ($categories as $category) {
                $select[$category->id] = $category->category_name;
            }

            return view('user.admin.post.form', compact('model', 'categories', 'select', 'selected', 'images', 'status', 'tags'));

        $categories = Category::get(['id', 'cate_name']);
            foreach ($categories as $category) {
                $select[$category->id] = $category->category_name;
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
