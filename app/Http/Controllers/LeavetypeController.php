<?php

namespace App\Http\Controllers;

use App\Models\Leavetype;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class LeavetypeController extends Controller
{
    public function create(){
        return view('LeavesType/create');
    }

    public function view(){
        $data = Leavetype::all();
        return view('LeavesType/view', compact('data'));
    }

    public function insertdata(Request $request){
        //dd($request->all());
        Leavetype::create($request->all());
        return redirect()->route('view')->with('success','Leave Type added successfully');
    }


    public function showdata($id){
        $data = Leavetype::find($id);
        //dd($data);
        return view('LeavesType/update', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Leavetype::find($id);
        $data->update($request->all());
        return redirect()->route('view')->with('success','Leave Type updated successfully');
    }

    public function delete($id){
        $data = Leavetype::find($id);
        $data->delete();
        return redirect()->route('view')->with('success','Leave Type has been deleted');
    }
}
