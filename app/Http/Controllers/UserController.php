<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request){
        $user = new User;

        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = Bcrypt($request->password);

         // Image Upload
         if ($request->hasFile('thumb') && $request->file('thumb')->isValid()) {
            $requestImage = $request->thumb;

            $extension = $requestImage->extension();

            $imageName = '/img/users/'. md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $requestImage->move(public_path('img/users'), $imageName);

            $user->thumb = $imageName;
        }
        
       if( $user->save()){
        auth()->attempt(['email' => $request->email, 'password' => $request->password]);
       }

        

        return redirect('/')->with('msg', 'user criado com sucesso!');
    }
}
