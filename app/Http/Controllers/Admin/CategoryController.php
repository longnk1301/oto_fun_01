<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCate(Request $request)
    {
        $keyword = $request->keyword;
        $fullUrl = $request->fullUrl();
        $pageSize = $request->pagesize == null ? 5 : $request->pagesize;
        $addPath = "";
        if (!$keyword) {
            $category = Category::paginate($pageSize);
            $addPath .= "?pagesize=$pageSize";
            foreach ($category as $cate) {
                $cate['parent_name'] = $cate->getParentName();
            }
        } else {
            $category = Category::where('category_name', 'like', "%$keyword%")->paginate($pageSize);
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
            foreach ($category as $cate) {
                $cate['parent_name'] = $cate->getParentName();
            }
        }
        $category->withPath($addPath);

        return view('user.admin.category.index', compact('category', 'keyword', 'fullUrl', 'pageSize'));
    }

    public function add()
    {
        $model = new Category();
        $status = 'UnPublic';
        $cates = Category::all();
        $select = [];
        $select = ['-1' => '------------------------------------------'];
            $selected = $model->parent_id;
            foreach ($cates as $element) {
                $select[$element->id] = $element->category_name;
            }

        return view('user.admin.category.form', compact('model', 'cates', 'select', 'selected', 'status'));
    }

    public function checkName(Request $request)
    {
        $cate = Category::where('category_name', $request->name)->first();
        if($cate && $cate->id == $request->id) {
            return response()->json(true);
        }
        //chua ton tai: true, ton tai: false
        $result = $cate == false ? true : false;

        return response()->json($result);
    }

    public function checkSlug(Request $request)
    {
        $cate = Category::where('slug', $request->name)->first();
        if($cate && $cate->id == $request->id){
            return response()->json(true);
        }
        $result = $cate == false ? true : false;

        return response()->json($result);
    }

    public function save(Request $request)
    {
        if ($request->id) {
    	   $model = Category::find($request->id);
            if (!$model) {
                return view('user.admin.404');
            }
        } else {
            $model = new Category();
            $model->status = $request->status;
        }
        $model->fill($request->all());

        // upload file
        if($request->hasFile('image')) {
            $file = $request->file('image');
            // $fileName = uniqid() . '-' . $file->getClientOriginalName();
            // $file->storeAs(config('mysetting.ImgCategory'), $fileName);
            $imagePath = $file->store('uploads', 'uploads');
            $url =  $imagePath;
            $model->image = $url;
        }
        $model->save();

        return redirect()->route('cate.index');
    }

    public function edit($id)
    {
    	$model = Category::find($id);
        $select = [];
        $select = ['-1' => '-----------------------------'];
        if (!$model) {
            return view('user.admin.404');
        } else {
            $cates = Category::all();
            $status = $model->status;
            $selected = $model->parent_id;
            foreach ($cates as $element) {
                $select[$element->id] = $element->category_name;
            }

            return view('user.admin.category.form', compact('model', 'cates', 'select', 'selected', 'status'));
        }

        $cates = Category::all();
        foreach ($cates as $element) {
                $select[$element->id] = $element->category_name;
            }

        return view('user.admin.category.form', compact('model', 'cates', 'select'));
    }

    public function remove($id)
    {
    	$category = Category::find($id);
        if (!$category) {
            return view('user.admin.404');
        } else {
            $category->delete();

            return redirect(route('cate.index'));
        }
    }

    public function getSlug(Request $request)
    {
        $date = date('YmdHisB');
        $result = str_slug($request->value) . '-' . $date;

        return response()->json(['data' => $result]);
    }
}
