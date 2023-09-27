<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update_email(Request $request, $id){
        $user=User::find($id);
        $user->email=$request->email;
        $user->save();

        // $request->session()->flash('success', 'Formation créé avec succès !');

        return back()->with('success',"Email modifié avec succès!");
    }

    public function update_password(Request $request, $id){
        $request->validate([
            'old'=>'required',
            'password'=>'required|max:255',
            'confirm'=>'required|max:255|same:password'
        ]);

        $user=User::find($id);
        if(Hash::check($request->old,$user->password)){
            $user->password=Hash::make($request->password);
            $user->save();
        }else
            dd('Mauvais mot de passe');
            
        return back()->with('success',"Mot de passe modifié avec succès!");
    }
}
