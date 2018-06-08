<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function getCompany(Request $request)
    {
        $keyword = $request->keyword;
        $fullUrl = $request->fullUrl();
        $pageSize = $request->pagesize == null ? 5 : $request->pagesize;
        $addPath = "";
        if (!$keyword) {
            $companys = Company::paginate($pageSize);
            $addPath .= "?pagesize=$pageSize";
        } else {
            $companys = Company::where('com_name', 'like', "%$keyword%")->orwhere('com_add', 'like', "%$keyword%")->paginate($pageSize);
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
        }
        $companys->withPath($addPath);

        return view('user.admin.company.index', compact('companys', 'keyword', 'fullUrl', 'pageSize'));
    }

    public function add()
    {
        $model = new Company();

        return view('user.admin.company.form', compact('model'));
    }

    public function checkName(Request $request)
    {
        $company = Company::where('com_name', $request->name)->first();
        if($company && $company->id == $request->id) {
            return response()->json(true);
        }
        $result = $company == false ? true : false;

        return response()->json($result);
    }

    public function save(Request $request)
    {
        if ($request->id) {
        $model = Company::find($request->id);
            if (!$model) {
                return view('user.admin.404');
            }
        } else {
            $model = new Company();
        }
        $model->fill($request->all());
        $model->save();

        return redirect()->route('company.index');
    }

    public function edit($id)
    {
     $model = Company::find($id);
        if (!$model) {
            return view('user.admin.404');
        } else {
            return view('user.admin.company.form', compact('model'));
        }

        return view('user.admin.company.form', compact('model'));
    }

    public function remove($id)
    {
     $company = Company::find($id);
        if (!$company) {
            return view('user.admin.404');
        } else {
            $company->delete();

            return redirect(route('company.index'));
        }
    }
}
