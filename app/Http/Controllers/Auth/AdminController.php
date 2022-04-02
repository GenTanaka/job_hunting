<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\StoreCompany;
use App\Http\Requests\StoreTag;
use App\Http\Requests\UpdateCompany;
use App\Http\Requests\UpdateCompanyPass;
use App\Http\Requests\UpdateTag;
use App\Models\Category;
use App\Models\Company;
use App\Models\SalaryForm;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function companyIndex()
    {
        $companies = Company::paginate(10);
        return view('admin.company.index', compact('companies'));
    }

    public function companyCreate() 
    {
        return view('admin.company.create');
    }

    public function companyStore(StoreCompany $request)
    {
        $post = $request->all();

        $post['foundation_date'] = "${post['year']}-${post['month']}-${post['day']}";

        DB::beginTransaction();
        try {
            Company::create([
                "name" => $post["name"],
                "president" => $post["president"],
                "foundation_date" => $post['foundation_date'],
                "email" => $post["email"],
                "password" => Hash::make($post["password"])
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('admin.company');
    }

    public function companyEdit($id)
    {
        $company = Company::where("id", $id)->get();
        $company = $company[0];
        $company['year'] = date("Y", strtotime($company['foundation_date']));
        $company['month'] = date("m", strtotime($company['foundation_date']));
        $company['day'] = date("d", strtotime($company['foundation_date']));

        return view("admin.company.edit",compact("company"));
    }

    public function companyUpdate(UpdateCompany $request, $id)
    {
        $post = $request->all();

        $post['foundation_date'] = "${post['year']}-${post['month']}-${post['day']}";

        DB::beginTransaction();
        try {
            Company::where(['id' => $id])->update([
                "name" => $post["name"],
                "president" => $post["president"],
                "foundation_date" => $post['foundation_date'],
                "email" => $post["email"],
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('admin.company');
    }

    public function companyEditPass($id)
    {
        return view('admin.company.editPass', compact('id'));
    }

    public function companyUpdatePass(UpdateCompanyPass $request, $id)
    {
        $post = $request->all();

        DB::beginTransaction();
        try {
            Company::where(['id' => $id])->update([
                "password" => Hash::make($post['new_pwd'])
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('admin.company.edit', $id);
    }

    public function tag()
    {
        $tags = Tag::paginate(10);
        return view('admin.tag.index', compact('tags'));
    }

    public function tagCreate()
    {
        return view('admin.tag.create');
    }

    public function tagStore(StoreTag $request)
    {
        $post = $request->all();

        DB::beginTransaction();
        try {
            Tag::create([
                "name" => $post["name"],
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
        return redirect()->route('admin.tag');
    }

    public function tagEdit($id)
    {
        $tag = Tag::where('id', $id)->get();
        return view('admin.tag.edit',compact('tag'));
    }

    public function tagUpdate(UpdateTag $request, $id)
    {
        $post = $request->all();

        DB::beginTransaction();
        try {
            Tag::where('id', $id)->update([
                'name' => $post['name']
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('admin.tag');
    }

    public function tagDelete($id)
    {
        Tag::where('id', $id)->delete();
        return redirect()->route('admin.tag');
    }

    public function category()
    {
        $categories = Category::paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function categoryCreate()
    {
        return view('admin.category.create');
    }

    public function categoryStore(StoreCategory $request)
    {
        $post = $request->all();

        DB::beginTransaction();
        try {
            Category::create([
                "name" => $post["name"],
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
        return redirect()->route('admin.category');
    }

    public function categoryEdit($id)
    {
        $category = Category::where('id', $id)->get();
        return view('admin.category.edit',compact('category'));
    }

    public function categoryUpdate(StoreCategory $request, $id)
    {
        $post = $request->all();

        DB::beginTransaction();
        try {
            Category::where('id', $id)->update([
                'name' => $post['name']
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('admin.category');
    }

    public function categoryDelete($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('admin.category');
    }

    public function salaryForm()
    {
        $salary_forms = SalaryForm::paginate(10);
        return view('admin.salaryForm.index', compact('salary_forms'));
    }

    public function salaryFormCreate()
    {
        return view('admin.salaryForm.create');
    }

    public function salaryFormStore(StoreTag $request)
    {
        $post = $request->all();

        DB::beginTransaction();
        try {
            SalaryForm::create([
                "name" => $post["name"],
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
        return redirect()->route('admin.salaryForm');
    }

    public function salaryFormEdit($id)
    {
        $salary_form = SalaryForm::where('id', $id)->get();
        return view('admin.salaryForm.edit',compact('salary_form'));
    }

    public function salaryFormUpdate(UpdateTag $request, $id)
    {
        $post = $request->all();

        DB::beginTransaction();
        try {
            SalaryForm::where('id', $id)->update([
                'name' => $post['name']
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('admin.salaryForm');
    }

    public function salaryFormDelete($id)
    {
        SalaryForm::where('id', $id)->delete();
        return redirect()->route('admin.salaryForm');
    }
    
}
