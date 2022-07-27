<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class WarehouseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('warehouses')->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                        $actionbtn =   '<a href="#"class="btn btn-info btn-sm edit" data-bs-toggle="modal"data-id="' . $row->id . '"
                        data-bs-target="#editModal"> <i class="fas fa-edit"></i class=></a>
                        <a href="' . route('warehouse.delete', [$row->id]) . '"class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.category.warehouse.index');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'warehouse_name' => 'required|unique:warehouses|max:55',
        ]);

        $data = array();
        $data['warehouse_name']    = $request->warehouse_name;
        $data['warehouse_address'] = $request->warehouse_address;
        $data['warehouse_phone']   = $request->warehouse_phone;
        DB::table('warehouses')->insert($data);
        $notification = array('messege' => 'warehouses Added ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        DB::table('warehouses')->where('id', $id)->delete();
        $notification = array('messege' => 'warehouses Deleted ', 'alert-type' => 'error');
        return redirect()->back()->with($notification);
    }


    public function edit($id)
    {
        $warehouse = DB::table('warehouses')->where('id', $id)->first();
        return view('admin.category.warehouse.edit', compact('warehouse'));
    }


    public function update(Request $request)
    {
        $data = array();
        $data['warehouse_name']    = $request->warehouse_name;
        $data['warehouse_address'] = $request->warehouse_address;
        $data['warehouse_phone']   = $request->warehouse_phone;
        // dd( $data);
        DB::table('warehouses')->where('id', $request->id)->update($data);
        $notification = array('messege' => 'warehouses Updated ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
