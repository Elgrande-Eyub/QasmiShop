<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{
    public function getAdmins(){

        $users = User::where('role','admin')->select('id','name','email','role','telephone','activeAccount','online')->get();

        return view('admin.accounts.admins',compact('users'));
    }

    public function getUsers(){

        $users = User::where('role','user')->select('id','name','email','role','telephone','activeAccount','online')->get();

        return view('admin.accounts.users',compact('users'));
    }

    public function getProfessionals(){

        $users = User::where('role','professional')->select('id','name','email','role','telephone','activeAccount','online')->get();

        return view('admin.accounts.professionals',compact('users'));
    }

    public function ActiveAccount($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->update([
                'activeAccount' => 1
            ]);

            return redirect()->back()->with(['AccountStatus'=>true,'message'=>'Le compte a été activé avec succès','userName'=> $user->name]);
        } catch (Exception $e) {
            return redirect()->back()->with(['AccountStatus'=>true,'message'=> 'Une erreur est survenue lors de lactivation du compte','userName'=> $user->name]);
        }
    }

    public function BlockAccount($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->update([
                'activeAccount' => -1
            ]);

            return redirect()->back()->with(['AccountStatus'=>true,'message'=>'Le compte a été Blocké avec succès','userName'=> $user->name]);
        } catch (Exception $e) {
            return redirect()->back()->with(['AccountStatus'=>true,'message'=> 'Une erreur est survenue lors de lactivation du compte','userName'=> $user->name]);
        }
    }


    public function deleteAccount($id)
    {
        try {
            $user = User::findOrFail($id);

            if($user->id == auth()->user()->id){
                return redirect()->back()->with(['AccountStatus'=>false,'message'=>'vous ne pouvez pas supprimer votre compte ','userName'=> $user->name]);
            }

            $user->delete();

            return redirect()->back()->with(['AccountStatus'=>true,'message'=>'Le compte a été supprimer avec succès','userName'=> $user->name]);
        } catch (Exception $e) {
            return redirect()->back()->with(['AccountStatus'=>-1,'message'=> 'Une erreur est survenue lors de supression du compte','userName'=> $user->name]);
        }
    }

    public function editAccount($id){
        $user = User::findOrFail($id);

        return view('admin.accounts.editAccount',compact('user'));
    }

    public function updateAccount($id,Request $request){
        $user = User::findOrFail($id);

        if (Hash::check($request->password, $user->password) &&  !empty($request->Newpassword)) {

            $password = Hash::make($request->Newpassword);
        }else{
            $password = $user->password;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  $password,
            'role' => $request->role,
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
        ]);

        return redirect()->route('getAdmins')->with(['AccountStatus'=>true,'message'=>'Le compte a été mise a joure avec succès','userName'=> $user->name]);

    }
}
