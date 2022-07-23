<?php

namespace App\Services\User;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function search()
    {
        return User::where('user_type', '!=', User::DIRECTOR)->get();
    }

    public function store($request)
    {
        $user = new User();
        $photo = 'images/profile-empty.png';

        if (isset($request->photo)) {
            $file = $request->photo;
            $filename = time() . $request->photo->getClientOriginalName();
            $file->move(public_path() . '/images/profiles', $filename);
            $photo = 'images/profiles/' . $filename;
        }
        $user = new User();
        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->photo = $photo;
        $user->password = Hash::make($request->pwd1);
        $user->user_type = $request->user_type;
        $user->save();
        return $user;
    }

    public function find($userId)
    {
        $user = User::findOrFail($userId);
        return $user;
    }

    public function update($request, $userId)
    {
        $photo = 'images/profile-empty.png';

        $user = User::findOrFail($userId);

        if (isset($request->photo)) {
            $file = $request->photo;
            $filename = time() . $request->photo->getClientOriginalName();
            $file->move(public_path() . '/images/profiles', $filename);
            $photo = 'images/profiles/' . $filename;
        }

        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->email = $user->email;
        $user->phone = $request->phone;
        $user->photo = $photo;
        $user->password = Hash::make($request->pwd1);
        $user->user_type = $request->user_type;
        $user->save();
        return $user;

    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return $user;
    }
}
