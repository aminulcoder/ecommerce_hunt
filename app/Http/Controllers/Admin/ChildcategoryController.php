<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
class ChildcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = DB::table('child_categories')
                ->leftJoin('categories', 'child_categories.category_id', 'categories.id')
                ->leftJoin('sub_categories', 'child_categories.subcategory_id', 'sub_categories.id')
                ->select('categories.category_name', 'sub_categories.sub_category_name', 'child_categories.*')
                ->get();

            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionbtn =   '<a href="#"class="btn btn-info btn-sm edit" data-bs-toggle="modal"data-id="'.$row->id.'"
                                    data-bs-target="#editCategory"> <i class="fas fa-edit"></i class=></a>
                                    <a href="'.route('childcategory.delete',[$row->id]).'"class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $category = DB::table('categories')->get();
        return view('admin.category.childcategory.index',compact('category'));
    }

    public function store(Request $request){

        // dd( $request->all());
        $categoryid = DB::table('sub_categories')->where('id', $request->subcategory_id)->first();
        $data = array();
        $data['category_id'] = $categoryid->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_slug'] = Str::slug($request ->childcategory_name, '-');
        $data['childcategory_name'] = $request->childcategory_name;

        DB::table('child_categories')->insert($data);
        $notification =array('message'=> 'Child Category Inserted !' ,'alert-type'=> 'success');
        return redirect()->back()->with($notification);

        // dd($data);
    }


    public function edit($id){

        $category= DB::table('categories')->get();
        $data= DB::table('child_categories')->where('id',$id)->first();
        return view('admin.category.childcategory.edit',compact('category','data'));
    }

    public function update(Request $request){

        $categoryid = DB::table('sub_categories')->where('id', $request->subcategory_id)->first();
        $data = array();
        $data['category_id'] = $categoryid->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_slug'] = Str::slug($request ->childcategory_name, '-');
        $data['childcategory_name'] = $request->childcategory_name;

        DB::table('child_categories')->where('id',$request->id)->update($data);
        $notification =array('message'=> 'Child Category Updated !' ,'alert-type'=> 'success');
        return redirect()->back()->with($notification);
    }
    public function destroy($id){

        DB::table('child_categories')->where('id',$id)->delete();
        $notification =array('message'=> 'Child Category Deleted !' ,'alert-type'=> 'success');
        return redirect()->back()->with($notification);
    }



}
