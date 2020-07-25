<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
//use  App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::get();
        return view('employee.list')->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'password'=>'required',
            'address'=>'required',
            'designation'=>'required',
            'image'=>'required|file|image',
            'role'=>'required'

        ]);
        try {


            $employee=[
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'designation'=>$request->designation,
                'role'=>$request->role,
                'password'=>bcrypt($request->password),
                'address'=>$request->address,
                'image'=>$request->image
            ];
            $image=$request->file('image');
            $image_name=rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'),$image_name);

//            dd($employee);
            Employee::create($employee);
            Mail::to('ringku.swe@gmail.com')->send(new ContactMail());
            session()->flash('type', 'success');
            session()->flash('message', 'Successfully Employee Added...!');
            return redirect()->back();
        }catch (\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went to Wrong!!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee=Employee::find($id);
        return view('employee.show')->with('employee',$employee);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee=Employee::Where('id',$id)->first();
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $edit_category=$this->validate($request,[
                'name'=>'required',
                'phone'=>'required',
                'email'=>'required',
                'password'=>'required',
                'address'=>'required',
            ]);

            $employee=Employee::where('id',$id)->first();
            if ($employee) {
                $employee->name = $request->name;
                $employee->role = $request->role;
                $employee->email = $request->email;
                $employee->image = $request->image;
                $employee->password = $request->password;
                $employee->address = $request->address;
                $employee->save();
                session()->flash('type', 'success');
                session()->flash('message', 'Employee Successfully Updated');

                return redirect()->back();
            }

        }catch (\Exception $e){
            session()->flash('type','danger');
            session()->flash('message','Something went to Wrong');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Employee::where('id',$id)->delete();
            session()->flash('type','success');
            session()->flash('message','Employee Successfully Deleted');
            return redirect()->back();
        }catch (\Exception $e){
            session()->flash('type','Danger');
            session()->flash('message','Something Wrong');
            return redirect()->back();
        }
    }

}
