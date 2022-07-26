<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Intervention\Image\Facades\Image;

class  SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // seo page show method
    public function seo()
    {
        $data = DB::table('seos')->first();
        return view('admin.setting.seo', compact('data'));
    }

    public function seoUpdate(Request $request, $id)
    {

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
        DB::table('seos')->where('id', $id)->update($data);
        $notification = array('message' => 'seo setting Updated !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function smtp()
    {
        $smtp = DB::table('smtps')->first();
        return view('admin.setting.smtp', compact('smtp'));
    }

    public function smtpUpdate(Request $request, $id)
    {
        //   return $request->all();
        $data              = array();
        $data['mailer']    = $request->mailer;
        $data['host']      = $request->host;
        $data['port']      = $request->port;
        $data['user_name'] = $request->user_name;
        $data['password']  = $request->password;


        // dd( $data);
        DB::table('smtps')->where('id', $id)->update($data);
        $notification = array('message' => 'smtp setting Updated !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // website setting

    public function website()
    {

        $setting = DB::table('settings')->first();
        return view('admin.setting.page.website_setting', compact('setting'));
    }

    public function websiteUpdate(Request $request, $id)
    {



        // $slug = Str::slug($request->brand_name, '-');

        $data = array();
        $data['currency']      = $request->currency;
        $data['phone_one']     = $request->phone_one;
        $data['phone_two']     = $request->phone_two;
        $data['main_email']    = $request->main_email;
        $data['support_email'] = $request->support_email;
        $data['address']       = $request->address;
        $data['facebook']      = $request->facebook;
        $data['instagram']     = $request->instagram;
        $data['twitter']       = $request->twitter;
        $data['linkedin']      = $request->linkedin;
        $data['youtube']       = $request->youtube;

        if ($request->logo) {

            if (File::exists($request->old_logo)) {
                unlink($request->old_logo);
            }
            $logo = $request->logo;
            $logoname = uniqid() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(320, 100)->save('public/files/setting/' . $logoname);
            $data['logo'] = 'public/files/setting/' . $logoname;
        } else {
            $data['logo'] = $request->old_logo;
        }
        if ($request->favicon) {

            if (File::exists($request->old_logo)) {
                unlink($request->old_logo);
            }
            $favicon = $request->favicon;
            $favicon_name = uniqid() . '.' . $favicon->getClientOriginalExtension();
            Image::make($favicon)->resize(32, 32)->save('public/files/favicon/' . $favicon_name);
            $data['favicon'] = 'public/files/favicon/' . $favicon_name;
        } else {
            $data['favicon'] = $request->old_favicon;
        }
        DB::table('settings')->where('id', $request->id)->update($data);

        $notification = array('messege' => 'settings updated ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);



    //     if ($request->logo) {  //jodi new logo die thake
    //         $logo=$request->logo;
    //         $logo_name=uniqid().'.'.$logo->getClientOriginalExtension();
    //         Image::make($logo)->resize(320,120)->save('public/files/setting/'.$logo_name);
    //       $data['logo']='public/files/setting/'.$logo_name;
    //   }else{   //jodi new logo na dey
    //       $data['logo']=$request->old_logo;
    //   }

    //   if ($request->favicon) {  //jodi new logo die thake
    //         $favicon=$request->favicon;
    //         $favicon_name=uniqid().'.'.$favicon->getClientOriginalExtension();
    //         Image::make($favicon)->resize(32,32)->save('public/files/setting/'.$favicon_name);
    //         $data['favicon']='public/files/setting/'.$favicon_name;
    //   }else{   //jodi new logo na dey
    //       $data['favicon']=$request->old_favicon;
    //   }

    //   DB::table('settings')->where('id',$id)->update($data);
    //   $notification=array('messege' => 'Setting Updated!', 'alert-type' => 'success');
    //   return redirect()->back()->with($notification);
    }
}
