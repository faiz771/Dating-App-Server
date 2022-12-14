<?php
namespace App\Repositories;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Notifications\UserPassword;
class UserRepo{
    protected $admin;
    public function __construct()
    {
        $this->admin = User::where('id', 1)->first();
    }
    public function activeUsers()
    {
        return User::where('approved',1)->where('id','!=',1)->get();
    }

    public function deactiveUsers()
    {
        return User::where('approved',0)->where('id','!=',1)->latest()->get();
    }

    public function all()
    {
        return User::where('id','!=',1)->latest()->get();

    }

    public function saveUserInfo($array)
    {
        $arr    =   array_keys($array);

        $user   =   new User;
        foreach($arr as $key => $val){
            $user->$val = $array[$val];
        }
        $user->save();
        return true;
    }

    public function update($array,$id)
    {
        $arr                    =   array_keys($array);
        $testimonial            =   User::findOrFail($id);
        foreach($arr as $key => $val){
            $testimonial->$val = $array[$val];
        }
        $testimonial->save();
        return true;
    }

    public function active()
    {
        return User::where('id','!=',1)->where('approved',1)->latest()->get();
    }

    public function save()
    {
        return new User;
    }

    public function encrypt($val)
    {
        return Hash::make($val);
    }

    public function encryptVal($val)
    {
        return Crypt::encrypt($val);
    }
    public function decryptId($val)
    {
        return Crypt::decrypt($val);
    }

    public function row($id)
    {
        return User::findOrFail($id);
    }

    public function create_pass($array)
    {
        $email  =   $array['email'];
        $user   =   User::where('email',$email)->first();
        $pass   =   User::findOrFail($user->id);
        $pass->password             =   Hash::make($array['password']);
        $pass->decrypted_password   =   $array['password'];
        $pass->save();
        $data   =   [
            'message'   =>  $pass->name.' has successfully created his password'
        ];
        $this->admin->notify(new UserPassword($data));
        return true;
    }
}
