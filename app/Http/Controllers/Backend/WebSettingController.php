<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\WebSetting;
use Spatie\Permission\Models\Permission;



class WebSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websetting=WebSetting::OrderBy('id' , 'asc')->first();
     //   dd($websetting);
        $data=['page_title' => 'Web Setting - Relationship App' , 'websetting' => $websetting];
        return view('backend.pages.websetting.edit' , $data);
    }

    
 
    public function update($id,Request $request, WebSetting $webSetting)
    {
   
        $dashboard_icon_name="";
        if($request->hasFile('dashboard_icon')){

          $dashboard_icon_name=time().'.'.$request->dashboard_icon->extension();
          $request->dashboard_icon->move(public_path('WebSetting'),$dashboard_icon_name);

        }
        else{

            $dashboard_icon_name=$request->dashboard_icon;
        }

        $dashboard_fav_icon_name="";
        if($request->hasFile('dashboard_fav_icon')){

          $dashboard_fav_icon_name=time().'.'.$request->dashboard_fav_icon->extension();
          $request->dashboard_fav_icon->move(public_path('WebSetting'),$dashboard_fav_icon_name);

        }
        else{

            $dashboard_fav_icon_name=$request->dashboard_fav_icon;
        }

        $websetting=WebSetting::find($id);
        $websetting->dashboard_icon=$dashboard_icon_name;
        $websetting->dashboard_fav_icon=$dashboard_fav_icon_name;
        $websetting->name=$request->name;
        $websetting->defaultcurrency=$request->defaultcurrency;
        $websetting->servicefee=$request->servicefee;
         $websetting->currencysign=$request->currencysign;
        
        $websetting->save();
      //  dd($websetting);
        return redirect(url('/websetting'))->with('success' , 'Setting Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebSetting  $webSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebSetting $webSetting)
    {
        //
    }
}
