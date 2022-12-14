<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepo;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use App\Models\Package;
use App\Notifications\UserApproval;
use App\Notifications\CustomerRegistration;
use App\Notifications\UserStatus;
use App\Notifications\UserUpdates;
use App\Repositories\Setting;
use App\Libraries\SF;
class UserController extends Controller
{
    //
    protected $user, $input, $admin, $setting;
    public function __construct(UserRepo $user, Request $input, Setting $s)
    {
        $this->user     =   $user;
        $this->input    =   $input;
        $this->admin    =   User::where('id', 1)->first();
        $this->setting  =   $s;
    }

    public function index()
    {
        $data = [
            'users' =>  $this->user->active(),
            'n' =>  1,
        ];
        return view('admin.users.index', $data);
    }

    public function show_employe()
    {
        $data = [
            'users' =>  $this->user->active(),
            'n' => 1
        ];
        return view('admin.users.view_emp', $data);
    }

    public function employe_expense_check(Request $request)
    {
          $user_check = User::where('id',$request->employee_id_check)->first();
          $data['emp_salary'] = $user_check->salary;
          return response()->json($data);  
    }

    public function activeUsers()
    {
        $data = [
            'users' => $this->user->activeUsers()
        ];

        return view('admin.users.active', $data);
    }

    public function deactiveUsers()
    {
        $data = [
            'users' => $this->user->deactiveUsers()
        ];

        return view('admin.users.deactive', $data);
    }

    public function approveUser($val)
    {
        $id                 =   $this->user->decryptId($val);
        $user               =   User::findOrFail($id);
        $user->approved     =   1;
        $user->status       =   1;
        $user->save();
        $data = [
            'message'   =>  'Admin approved your approval request now you can access our app' . config('app.name')
        ];
        $user->notify(new UserApproval($data));
        return back()->with('success', $user->name . "'s Request Approved Successfully");
    }
    public function create()
    {
        $data = [
            'packages'  =>  Package::latest()->get()
        ];
        return view('admin.users.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      =>  'required',
            'phone'      =>  'required',
            'email'     =>  'required|email:rfc',
            'role'      =>  'required'
        ]);

        if (!filter_var($this->input->email, FILTER_VALIDATE_EMAIL)){
            return back()->with('error', 'Email is invalid');
        }

        $exist = User::where('email', $this->input->email)->first();

        if($exist){
            return back()->with('error', 'Email already exist please register new one');
        }

        $emp_id = '#EM'.rand(1,1000);

        $encEmail = $this->user->encryptVal($this->input->email);
        $user = new User;
        $password                   =   rand(1111111, 9999999);
        $user->name                 =   $this->input->name;
        $user->email                =   $this->input->email;
        $user->phone                =   $this->input->phone;
        $user->status               =   1;
        $user->approved             =   1;
        $user->pkg_id               =   $this->input->pkg_id;
        $user->salary               =   $this->input->salary;
        $user->employee_id               =   $emp_id;
        // $user->role                 =   $this->input->role;
        $user->save();


        $this->setting->add_user_role($user->id, $this->input->role);
        sendEmail($this->input->email, "Generate Password", 'email-temps.set_pass', ['email' => $encEmail, 'name' => $this->input->name]);
        $data   = [
            'message'   =>  'Admin registered your email at ' . config('app.name')
        ];

        $user->notify(new CustomerRegistration($data));
        
        return redirect(url('/show_employe'))->with('success','Employee has been Added.!');

        // return redirect(url('/customers'))->with('success', 'Users Added Successfully');
    }

    public function edit($val)
    {
        $id     =   $this->user->decryptId($val);
        $data = [
            'user'          =>   User::findOrFail($id),
            'packages'      =>   Package::latest()->get()
        ];
        return view('admin.users.edit', $data);
    }

    public function edit_emp($val)
    {
        $id = $this->user->decryptId($val);
        $emp = User::findorFail($id);
        $role_id = UserRole::where('user_id',$emp->id)->first();
        return view('admin.users.emp_edit',compact('emp','role_id'));
    }

    public function update_emp(Request $request)
    { 
        $request->validate([
            'name'      =>  'required',
            'phone'      =>  'required',
            'salary'      =>  'required',
            'decrypted_password'      =>  'required',
            'email'     =>  'required|email',
        ]);

        if (!filter_var($this->input->email, FILTER_VALIDATE_EMAIL)) {
            return back()->with('error', 'Email is invalid');
        }

        if(!empty($request->role)){
            $role_id = UserRole::where('user_id',$this->input->id)->first();

            $role_id->update([
                'role_id' => $request->role,                        
            ]);
        }

        $user                       =   User::findOrFail($this->input->id);
        $user->name                 =   $this->input->name;
        $user->email                =   $this->input->email;
        $user->decrypted_password   =   $this->input->decrypted_password;
        $user->password             =   Hash::make($this->input->decrypted_password);
        $user->phone                =   $this->input->phone;
        $user->salary               =   $this->input->salary;
        $user->save();
        $data = [
            'message'   =>  'Admin has updated your profile if you want to login into ' . config('app.name') . ' use this "' . $this->input->decrypted_password . '" password'
        ];

        $user->notify(new UserUpdates($data));
        return redirect(url('/show_employe'))->with('success', 'Employee Updated Successfully');
    }


    public function update(Request $request)
    {
        // dd($this->input->all());
        $request->validate([
            'name'      =>  'required',
            'email'     =>  'required|email',
        ]);

        if (!filter_var($this->input->email, FILTER_VALIDATE_EMAIL)) {
            return back()->with('error', 'Email is invalid');
        }

        $user                       =   User::findOrFail($this->input->id);
        $user->name                 =   $this->input->name;
        $user->email                =   $this->input->email;
        $user->pkg_id               =   $this->input->pkg_id;
        $user->decrypted_password   =   $this->input->decrypted_password;
        $user->password             =   Hash::make($this->input->decrypted_password);
        $user->dob                  =   $this->input->dob;
        $user->phone                =   $this->input->phone;
        $user->country              =   $this->input->country;
        $user->state                =   $this->input->state;
        $user->city                 =   $this->input->city;
        $user->address              =   $this->input->address;
        $user->postal_code          =   $this->input->postal_code;
        $user->gender               =   $this->input->gender;
        $user->save();
        $data = [
            'message'   =>  'Admin has updated your profile if you want to login into ' . config('app.name') . ' use this "' . $this->input->decrypted_password . '" password'
        ];
        $user->notify(new UserUpdates($data));
        return redirect(url('/customers'))->with('success', 'User Updated Successfully');
    }

    public function destroy($val)
    {
        $id     =   $this->user->decryptId($val);
        $user   =   User::findOrFail($id);
        $user->delete();
        return back()->with('delete', 'User deleted successfully');
    }


    public function show()
    {

        $id     =   $this->user->decryptId($this->input->id);
        $data   =   [
            'user'  =>  $this->user->row($id)
        ];
        return view('admin.users.view', $data);
    }


    public function create_password($email)
    {
        $val = $this->user->decryptId($email);
        return view('auth.custom.create-password', ['email' => $val]);
    }

    public function set_password(Request $req)
    {
        $this->input->validate([
            'email'     =>  'required',
            'password'  =>  'required|same:confirm_password'
        ]);

        $data = [
            'email'     =>  $this->input->email,
            'password'  =>  $this->input->password
        ];

        $this->user->create_pass($data);
        return redirect(url('/login'))->with('success', 'Your Password set successfully');
    }

    public function my_profile()
    {
        $data = [
            'user'  =>  $this->user->row(auth()->user()->id)
        ];

        return view('profile.setting', $data);
    }

    public function update_profile()
    {
        $this->input->validate([
            'name'      =>  'required',
            'email'     =>  'required|email:rfc',
        ]);

        $avatar = "";

        if (!filter_var($this->input->email, FILTER_VALIDATE_EMAIL)) {
            return back()->with('error', 'Email is invalid');
        }

        $user = $this->user->row($this->input->id);

        if ($user->avatar1 == NULL) {
            $avatar = uploadFile($this->input->avatar1, 'users_imgs');
        } else {
            $avatar = UpdateUploadedFile($this->input->avatar1, $this->input->ext_img, 'users_imgs');
        }

        $arr = [
            'avatar1'       =>  $avatar,
            'name'          =>  $this->input->name,
            'email'         =>  $this->input->email,
            'password'      =>  Hash::make($this->input->password),
            'dob'           =>  $this->input->dob,
            'phone'         =>  $this->input->phone,
            'country'       =>  $this->input->country,
            'state'         =>  $this->input->state,
            'city'          =>  $this->input->city,
            'address'       =>  $this->input->address,
            'postal_code'   =>  $this->input->postal_code,
            'gender'        =>  $this->input->gender
        ];
        $this->user->update($arr, $this->input->id);

        return back()->with('success', 'Profile updated successfully');
    }

    public function activeUser($val)
    {
        $id = $this->user->decryptId($val);
        $user = User::findOrFail($id);
        $user->status = 1;
        $user->save();
        $status = "";
        if ($user->status == 1) {
            $status = "Admin activated your account on " . config('app.name');
        } else {
            $status = "Admin dectivated your account on " . config('app.name');
        }
        $data = [
            'message'   =>  $status
        ];
        $user->notify(new UserStatus($data));
        return back()->with('success', 'User Activated Successfully');
    }

    public function deactiveUser($val)
    {
        $id = $this->user->decryptId($val);

        $user = User::findOrFail($id);
        $user->status = 0;
        $user->save();
        $status = "";
        if ($user->status == 1) {
            $status = "Admin activated your account on " . config('app.name');
        } else {
            $status = "Admin dectivated your account on " . config('app.name');
        }
        $data = [
            'message'   =>  $status
        ];
        $user->notify(new UserStatus($data));
        return back()->with('delete', 'User Dectivated Successfully');
    }


    public function saveUserAccountInfo()
    {

        $draft  =   $this->setting->draft();
        $exist  =   User::where('email', $this->input->form['email'])->first();
        $userInfo = [
            'name'                  =>      $this->input->form['name'],
            'email'                 =>      $this->input->form['email'],
            'gender'                =>      $this->input->form['gender'],
            'dob'                   =>      $this->input->form['dob'],
            'phone'                 =>      $this->input->form['phone'],
            'address'               =>      $this->input->form['address'],
            'city'                  =>      $this->input->form['city'],
            'country'               =>      $this->input->form['country'],
            'postal_code'           =>      $this->input->form['postal_code'],
            'company'               =>      $this->input->form['company'],
            'designer_id'           =>      $this->input->form['designer_id'],
            'password'              =>      Hash::make($this->input->form['password']),
            'members'               =>      $draft->members,
            'ownerships'            =>      $draft->ownership,
            'decrypted_password'    =>      $this->input->form['password'],
            'userType'              =>      'customer/user',
            'status'                =>      1,
            'approved'              =>      1,
            'forming'               =>      $this->input->form['forming'],
            'f_state'               =>      $this->input->form['f_state'],
        ];

        if (session()->has('visited') && !empty($exist)) {
            return response()->json(['message' =>   'Your data already exist please follow the next steps to complete the proccess']);
        } else {
            $this->user->saveUserInfo($userInfo);
        }
    }
}
