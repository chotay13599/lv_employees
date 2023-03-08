<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // DB::table('employees')

        // model method
    //    $employees =  Employee::select('employees.*','branches.branch_name')
    //             ->join('branches','branches.id','=','employees.branch_id')
    //             ->get();

        // db medthod
        // $employees = DB::table('employees')
        // ->select('employees.*','branches.branch_name')
        // ->join('branches','branches.id','=','employees.branch_id')
        // ->get();

        // eloquent method
        if(auth()->user()->role == 'Branch Manager'){
            $employees = Employee::where('branch_id',auth()->user()->branch_id)->get();
        }
        else{
            $employees = Employee::all();
        }
        // dd($employees);
        return view('employee.index',['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee.create',['branches'=>Branch::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        //
        if(Employee::create($request->except('_token'))){
            return redirect()->route('employee.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        return view('employee.view',['employee'=>$employee,'branches'=>Branch::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        return view('employee.edit',['employee'=>$employee,'branches' => Branch::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        //
        if($employee->update($request->except(['_token','_method']))){
            return redirect()->route('employee.index');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
       if( $employee->delete()){
            return redirect()->route('employee.index');
       }
       
    }
}
