<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // seo page show method
    public function seo(){
        $data = DB::table('seos')->first();
        return view('admin.setting.seo',compact('data'));

    }

    public function seoUpdate(Request $request , $id){

        // return $request->all();

        $data = array();
        $data['meta_title']          = $request->meta_title;
        $data['meta_author']         = $request->meta_author;
        $data['meta_tag']            = $request->meta_tag;
        $data['meta_description']    = $request->meta_description;
        $data['meta_keyword']        = $request->meta_keyword;
        $data['google_verification'] = $request->google_verification;
        $data['google_analytics']    = $request->google_analytics;
        $data['alexa_verification']  = $request->alexa_verification;
        $data['google_adsense']      = $request->google_adsense;

        // return $data;
        // dd($data);

        DB::table('seos')->insert($data);
        $notification =array('message'=> 'Sub Category Inserted !' ,'alert-type'=> 'success');
        return redirect()->back()->with($notification);
    }
}
