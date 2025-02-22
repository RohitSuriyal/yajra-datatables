<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = User::query();
             
            if (!empty($request->search_name)) {
                $data->where('name', 'like', "%{$request->search_name}%");
               
            }
            return Datatables::of($data)

                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                   
                    $btn = '<a href="#" href="javascript:void(0)" class="edit btn btn-primary btn-sm" >View</a>';

                    return $btn;
                })
                ->addColumn('edit', function ($row) {
                   
                    $btn = '<button id="'.$row->id.'" href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</button>';

                    return $btn;
                })
                ->addColumn('delete', function ($row) {
                   
                    $btn = '<button id="'.$row->id.'" href="javascript:void(0)" class="edit btn btn-danger btn-sm">delete</button>';

                    return $btn;
                })
                ->rawColumns(['action','edit','delete'])
                ->make(true);
        }

        return view('users');
    }
}
