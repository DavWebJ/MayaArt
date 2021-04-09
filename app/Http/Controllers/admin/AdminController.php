<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Order;

class AdminController extends Controller
{
    use PasswordValidationRules;
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function index()
    {
        $admin = DB::table('users')->
            where('role_id','=','1')
            ->get();

        if(Auth::user()->role_id == 2)
        {

            return view('admin.index',compact('admin'));

        }
        else
        {
           return abort(404);
        }
    }

        public function create()
    {

         return view('admin.action.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        Validator::make($request->all(), [
            'prenom' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role_id' => ['required','exists:App\Models\Role,id']
        ])->validate();

        $admin = User::create([
            'prenom' => $request['prenom'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
        ]);
        
        $request->session()->flash('success', 'L\'admin a été créé avec succès');
        return redirect()->to('admin/list');





    }

    public function changestatus(Request $request)
    {
        if($request->ajax())
        {

            $status = $request->input('status');
            $order = Order::find($request->id);
            $order->status = $status;
        
            if($order)
            {
                $order->save();
                return response()->json(['success'=>'status updater']);
            }else{
                return response()->json(['error'=>'status non updater, pas de order']);
            }
            
        }
    }


}
