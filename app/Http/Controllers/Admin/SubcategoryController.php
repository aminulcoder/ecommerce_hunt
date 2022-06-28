<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $data = DB::table('sub_categories')
        ->leftJoin('categories','sub_categories.category_id','categories.id')
        ->select('sub_categories.*','categories.category_name')
        ->get();
        // return $data;
        // $category = Category::all();
        $category =DB::table('categories')->get();
        return view('admin.category.subcategory.index',compact('data','category'));
    }


    public function store(Request $request){
        // return $request->all();

        $validated = $request->validate([
            'sub_category_name' => 'required|max:55',
        ]);
        $data = array();
        $data['category_id'] = $request ->category_id;
        $data['sub_category_name'] = $request ->sub_category_name;
        $data['sub_category_slug'] = Str::slug($request ->sub_category_name, '-');
        // dd($data);
        // return $data;
        DB::table('sub_categories')->insert($data);
        $notification =array('message'=> 'Sub Category Inserted !' ,'alert-type'=> 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id){

        $data = SubCategory::find($id);
    // return $data;
    // dd($data);
        $category= DB::table('categories')->get();
        return view('admin.category.subcategory.edit',compact('category','data'));
    }

    public function update(Request $request){

        $validated = $request->validate([
            'sub_category_name' => 'required|max:55',
        ]);

        $data = array();
        // $data['id'] = $request ->id;
        $data['category_id'] = $request ->category_id;
        $data['sub_category_name'] = $request ->sub_category_name;
        $data['sub_category_slug'] = Str::slug($request ->sub_category_name, '-');
        // dd($data);
        // return $data;
        // DB::table('sub_categories')->insert($data);

        DB::table('sub_categories')->where('id',$request->id)->update($data);
        $notification =array('message'=> 'Sub Category Inserted !' ,'alert-type'=> 'success');
        return redirect()->back()->with($notification);

    }

    public function destroy($id){
        DB::table('sub_categories')->where('id',$id)->delete();
        $notification =array('message'=> 'sub_Category Deleted !' ,'alert-type'=> 'success');
        return redirect()->back()->with($notification);
    }
}
