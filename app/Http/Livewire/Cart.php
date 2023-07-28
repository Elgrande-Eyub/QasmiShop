<?php

namespace App\Http\Livewire;

use App\Models\User;
use Exception;
use Illuminate\Console\View\Components\Component as ComponentsComponent;
use Livewire\Component;

class Cart extends Component
{

    public function ActiveAccount($id){
        // $userId = $request->input('productId');
        try{

            $user = User::where('id',$id)->first();

            $user->update([
                'activeAccount'=>1
            ]);

            return response()->json(['message' => 'Le compte a ete Active avec succes'], 200);

        }catch(Exception $e){
            return response()->json(['message' => 'une erreur avec lactivation de compte'], 400);
        }
    }

    public function render()
    {
        return view('admin.accounts.admins');
    }
}
