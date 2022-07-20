<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use File;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = DB::table('brands')->get();

            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionbtn =   '<a href="#"class="btn btn-info btn-sm edit" data-toggle="modal"data-id="' . $row->id . '"
                                    data-target="#editModal"> <i class="fas fa-edit"></i class=></a>
                                    <a href="' . route('brand.delete', [$row->id]) . '"class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.category.brand.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands'
        ]);
        $slug = Str::slug($request->brand_name, '-');

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_slug'] = Str::slug($request->brand_name, '-');

        $photo = $request->brand_logo;
        $photoname = $slug . '.' . $photo->getClientOriginalExtension();
        // $photo->move('public/files/brand/',$photoname);
        Image::make($photo)->resize(240, 100)->save('public/files/brand/' . $photoname);

        $data['brand_logo'] = 'public/files/brand/' . $photoname;

        DB::table('brands')->insert($data);

        $notification = array('messege' => 'Brand Inserted', 'alert-type' => 'success');
        return redirect()->route('brand.index')->with($notification);
    }


    public function edit($id)
    {
        $data = DB::table('brands')->where('id', $id)->first();
        return view('admin.category.brand.edit', compact('data'));
    }

    public function update(Request $request)
    {

        $slug = Str::slug($request->brand_name, '-');

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_slug'] = Str::slug($request->brand_name, '-');

        if ($request->brand_logo) {

            if (File::exists($request->old_logo)) {
                unlink($request->old_logo);
            }

            $photo = $request->brand_logo;
            $photoname = $slug . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(240, 100)->save('public/files/brand/' . $photoname);
            $data['brand_logo'] = 'public/files/brand/' . $photoname;
            DB::table('brands')->where('id',$request->id)->update($data);
            $notification = array('messege' => 'Brand updated', 'alert-type' => 'success');
            return redirect()->route('brand.index')->with($notification);
        } else {
            $data['brand_logo'] = $request->old_logo;
            DB::table('brands')->where('id',$request->id)->update($data);
            $notification = array('messege' => 'Brand updated ', 'alert-type' => 'success');
            return redirect()->route('brand.index')->with($notification);
        }
    }


    public function destroy($id)
    {

        $data = DB::table('brands')->where('id', $id)->first();
        $image = $data->brand_logo;
        // dd($image);
        if (File::exists($image)) {
            unlink($image);
        }
        DB::table('brands')->where('id', $id)->delete();

        $notification = array('messege' => 'Brand deleted', 'alert-type' => 'success');
        return redirect()->route('brand.index')->with($notification);
    }
}
