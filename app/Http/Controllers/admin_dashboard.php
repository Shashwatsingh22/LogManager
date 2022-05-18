<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importing Model
use App\Models\Admin;
use App\Models\Dev;


class admin_dashboard extends Controller
{
    public function dashboard(Request $req)
   {
       $data = ['LoggedAdminData'=> Admin :: where('admin_id','=',session('LoggedAdmin'))->first()];
       
       $data1=Admin :: where('admin_id','=',session('LoggedAdmin'))->first();
       
       $devlopers= Dev :: where('teamkey','=',$data1->teamkey)->get();
       $dat = compact('devlopers');
       
       return view("admin/home",$data)->with($dat);
   }

   public function deleteDev($dev_id)
   {
     $dev =  Dev :: where('dev_id','=',$dev_id);  //it look for primary key
     
     //Might be we are not able to find the data in data base so working on errors
     if(!is_null($dev))
     {
         $dev->delete();
         //this delete function only executed when we found the data
     }
     return redirect('/admin/dashboard'); //beter to use correct route url
   }

   public function deleteDevByUsername(Request $req)
   {
     $dev = Dev :: where('username','=',$req['username']);
     
     if(!is_null($dev))
     {
         $dev->delete();
         //this delete function only executed when we found the data
     }

     return redirect('/admin/dashboard');
   }

   public function editDevProfile($dev_id,Request $req)
   {  
     $dev = Dev :: where('dev_id','=',$dev_id);
     
     if(is_null($dev))
     {
       //Not Found the Dev Profile
       return redirect('/admin/dashboard');
     }
     else
     {
        //  $dev->serverip = $req['serverip'];
        //  $dev->mail = $req['email'];
        //  $dev->logaccesskey= $req['logaccesskey'];
        //  $dev->projectname= $req['projectname'];
        //  $dev->repolink= $req['repolink'];
         
         $dev->update(['dev_id'=>$dev_id,'serverip'=>$req['serverip'],'email'=>$req['email'],'logaccesskey'=>$req['logaccesskey'],'projectname'=>$req['projectname'],'repolink'=>$req['repolink']]);
     }

     return redirect('/admin/dashboard');
   }

//For Server Configuration
   public function serverNameInput()
   {
    $data = ['LoggedAdminData'=> Admin :: where('admin_id','=',session('LoggedAdmin'))->first()];
    
    return view("admin/serverInputName")->with($data);
   }

   public function serverConfig(Request $req)
   {
    $data = ['LoggedAdminData'=> Admin :: where('admin_id','=',session('LoggedAdmin'))->first()];
    
    $req->validate([
      'servername' => 'required|alpha_dash'
    ]);

    return view("admin/serverConfigStatus")->with($data);
   }

   //For Updating the File of plugin 
   public function serverIPinput()
   {
    $data = ['LoggedAdminData'=> Admin :: where('admin_id','=',session('LoggedAdmin'))->first()];    
    return view("admin/serverInputIP")->with($data);
   }

   public function serverFileEditor()
   {
    $data = ['LoggedAdminData'=> Admin :: where('admin_id','=',session('LoggedAdmin'))->first()];
    // $admin = Admin :: where('admin_id','=',session('LoggedAdmin'))->first();
    $req->validate([
      'servername' => 'required|ip'
    ]);
    
    // $res = Http::post('http://'.$req->serverip.':3000/editConfig/read', [
    //   'accessKey' => env('ADMIN_ACCESS_KEY')
    //   ]);
      
    //$res=$res->collect();
    
    return view("admin/dashboard/fileEditor",['LoggedDevData'=> $dev, 'apicall'=> $res]);
  }
}