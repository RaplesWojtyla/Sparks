<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin')
        {
            $allUsers = User::where('role', '!=', 'admin')->get();

            return view('user',  [
                'users' => $allUsers,
            ]);
        }
        else return abort(403, 'Unauthorized Action.');
    }

    public function report()
    {
        if (Auth::user()->role == 'admin')
        {
            $reportedUsers = Report::all();

            return view('report', [
                'reports' => $reportedUsers,
            ]);
        }
        else return abort(403, 'Unauthorized Action.');
    }

    public function banned($idUser)
    {
        $user = User::findOrFail($idUser);
        
        $user->update([
            'status' => 'banned',
        ]);

        return back();
    }
    
    public function unbanned($idUser)
    {
        $user = User::findOrFail($idUser);

        $user->update([
            'status' => 'not banned',
        ]);

        return back();
    }
}
