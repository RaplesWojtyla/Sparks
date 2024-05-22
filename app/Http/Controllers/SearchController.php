<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\History;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $query = $request->get('query');
        $user = Auth::user();

       
        $users = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('username', 'LIKE', "%{$query}%")
            ->get()
            ->map(function ($searchUser) {
                return [
                    'id_user' => $searchUser->id,
                    'name' => $searchUser->name,
                    'username' => $searchUser->username,
                    'profile_picture' => $searchUser->profile_picture,
                ];
            });

       
        $history = History::where('id_users', $user->id)
            ->limit(8)
            ->get()
            ->map(function ($historyItem) {
                $searchedUser = User::find($historyItem->id_searched);
                return [
                    'id_user' => $searchedUser->id,
                    'name' => $searchedUser->name,
                    'username' => $searchedUser->username,
                    'profile_picture' => $searchedUser->profile_picture,
                ];
            });

        return response()->json([
            'results' => $users,
            'history' => $history,
        ]);
    }

    public function history()
    {
        $user = Auth::user();

        
        $history = History::where('id_users', $user->id)
            ->limit(8)
            ->get()
            ->map(function ($historyItem) {
                $searchedUser = User::find($historyItem->id_searched);
                return [
                    'id_user' => $searchedUser->id,
                    'name' => $searchedUser->name,
                    'username' => $searchedUser->username,
                    'profile_picture' => $searchedUser->profile_picture,
                ];
            });

        return response()->json([
            'history' => $history,
        ]);
    }
}
