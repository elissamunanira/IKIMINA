<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Notification;
use App\Notifications\RegisterNotification;
    
class UserController extends Controller
{



    function __construct()
    {
         $this->middleware('permission:users-list|users-create|users-edit|users-delete', ['only' => ['index','store']]);
         $this->middleware('permission:users-create', ['only' => ['create','store']]);
         $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:users-delete', ['only' => ['destroy']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }




    //login

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function updateStatus($user_id,$status_code){
        try{
            $update_user = User::whereId($user_id)->update(['status'=>$status_code]);
    
            if($update_user){
                return redirect('/vermusers')->with('success','User Updated success full');
            }
    
            return redirect('/vermusers')->with('error','failed to  Updated the status');
    
        }
         catch(\Throwable $th){
             throw $th;
         }
    
    }



    public function loginForm(){
        return view('Auth.login');
    }
    public function registerForm(){
        return view('Auth.register');
    }


    public function register(Request $request){


        // validating  body request


        $formFields = $request->validate([

            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'telephone' => 'required',
            'email'     => 'required|unique:users,email',
            'password'  => 'required|confirmed',
            'password_confirmation' => 'required|same:password',



        ]);

// dd($formFields);

        // this create user
        $formFields['password']=bcrypt($formFields['password']);

        $user = User::create($formFields);


        // $user->assignRole('Admin');
        // user taking key token
        // $token = $user->createToken('myapptoken')->plainTextToken;

        // user information in response

        // $response = [
        //     'user'=>$user,
        //     'token'=>$token
        // ];

         $user->notify(new RegisterNotification($user));
         return redirect('/login');


        }



        public function login(Request $request)
        {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)){

            $request->session()->regenerate();


                return redirect()->intended('/dash');

        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');


        }


        // public function login(Request $request)
        // {
        //     $credentials = $request->validate([
        //         'email' => ['required', 'email'],
        //         'password' => ['required'],
        //     ]);
        //     if (Auth::attempt($credentials)){
        //         if(auth()->user()->hasRole('Admin')){
        //         $request->session()->regenerate();
        //         return redirect()->intended('/dashboard');
        //     } else {

        //             return redirect()->intended('/dashboard');

        //     }

        // }
            // else if(Auth::attempt($credentials))
            //   {
            //    return redirect()->intended('/bins');
            //     }
    //       else{
    //         return back()->withErrors([
    //             'email' => 'The provided credentials do not match our records.',
    //         ])->onlyInput('email');

    //     }
    // }

    public function logout(Request $request){
        // auth()->logout();

    // Auth::logout();
        session_start();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session_destroy();

    return redirect('/');
    }



}