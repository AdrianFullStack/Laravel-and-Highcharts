<?php

namespace App\Http\Controllers;

use App\User;
use DataTables;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function list_register(Request $request, User $user, DataTables $datatables)
    {
        if( $request->ajax() )
            return $datatables::of($user->with('profile')->get())->make(true);
    }

    public function view_graph()
    {
        $users  = User::with('profile')
                    ->groupBy('profile_id')
                    ->select('profile_id')
                    ->selectRaw('count(*) as count')
                    ->get('count');
        $data   = collect($users)->map(function($u){ return [ 'name' => $u->profile->name, 'y' => $u->count ]; });
        //return $data;
        return view('user.graph', compact('data'));
    }
}
