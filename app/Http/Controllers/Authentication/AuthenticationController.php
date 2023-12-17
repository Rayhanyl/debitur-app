<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class AuthenticationController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }

    public function authentication(Request $request){

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            $request->session()->regenerate();
            $users = Auth::user();
            
            switch ($users->role_id) {
                case 1:
                    $role = 'SuperAdmin';
                    break;
                case 2:
                    $role = 'Supervisor';
                    break;
                case 3:
                    $role = 'Operator';
                    break;
                default:
                    break;
            }

            
            $request->session()->put('role', $role);
            $request->session()->put('role_id', $users->role_id);
            $request->session()->put('division_id', $users->division_id);
            $request->session()->put('name', $users->name);
            $request->session()->put('email', $users->email);
            $request->session()->put('phone', $users->phone);

            if($users->role_id == '1'){

                Alert::toast('Selamat Anda Berhasil login','success');
                return redirect()->route('admin.dashboard');
                
            } elseif ($users->role_id == '2'){

                Alert::toast('Selamat Anda Berhasil login '. $users->name,'success');
                return redirect()->route('supervisor.dashboard.page'); 

            }elseif ($users->role_id == '3'){

                Alert::toast('Selamat Anda Berhasil login '. $users->name,'success');
                return redirect()->route('operator.dashboard.page');

            }
                               
        }else{
            Alert::toast('Password atau email anda salah','warning');
            return redirect()->route('show.login.page')->with('Oppes! You have entered invalid credentials');

        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->flush();
        Alert::toast('Berhasil logout', 'success');
        return redirect()->route('show.login.page')->with('success','Berhasil Logout');
        
    }
}
