<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;

class CrudController extends Controller
{
    function showdata(){
        //$showData = crud::all();
        $showData = crud::simplePaginate(5);
        return view('show_data', compact('showData'));
    }
    function adddata(){
        return view('add_data');
    }
    function storedata(Request $request){
        $rules = [
            'name' => 'required|max:10',
            'email' => 'required|email'
        ];
        $CM = [
            'name.required' => 'Please Enter Your Name',
            'name.max' => 'Mane Must Be 10 Characters',
            'email.required' => 'Please Enter Your Email',
            'email.max' => 'Email Must be Valid Format'
            
        ];
        $this->validate($request, $rules, $CM);

        $crud = new Crud();
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();
        $request->session()->flash('msg', 'Data Added Success');
        // Session::flash('msg', 'Data Added Succes');

        return redirect('/');
    }


    function editdata($id=null){
        $editData = Crud::find($id);
        return view('edit_data', compact('editData'));

    }
    function updatedata(Request $request, $id){
        $rules = [
            'name' => 'required|max:10',
            'email' => 'required|email'
        ];
        $CM = [
            'name.required' => 'Please Enter Your Name',
            'name.max' => 'Mane Must Be 10 Characters',
            'email.required' => 'Please Enter Your Email',
            'email.max' => 'Email Must be Valid Format'
            
        ];
        $this->validate($request, $rules, $CM);

        $crud = Crud::find($id);
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();
        $request->session()->flash('msg', 'Data Update Success');
        // Session::flash('msg', 'Data Added Succes');

        return redirect('/');
    }

    function deletedata(Request $request, $id){
        $deleteData =  Crud::find($id);
            $deleteData->delete();
            $request->session()->flash('msg', 'Data Delete Success');
            // Session::flash('msg', 'Data Added Succes');
    
            return redirect('/');

    }
}
