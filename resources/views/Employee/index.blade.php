
@extends('layouts.app-master')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Employee</strong> Information</h1>
            <div class="row">
                <div class="col-md-2 ms-auto my-4">
                    <a href="{{route('employee.create')}} " class="btn btn-dark float-left ">Add New Employee</a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            

                            @foreach ($employees as $emp)
                            <form action="{{route('employee.destroy',$emp->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <tr>
                                    <td>{{$loop->iteration}} </td>
                                    <td>{{$emp->name }}</td>
                                    <td>{{$emp->branch->branch_name}}</td>

                                    @can('isAdmin')
                                        <td><a href="{{route('employee.show',$emp->id)}}" class="btn btn-success mx-2">View</a>
                                        <a href="{{route('employee.edit',$emp->id)}}" class="btn btn-warning mx-2">Edit</a>
                                        <button class="btn btn-danger" type="submit">Delete</button></td>
                                        
                                    @elsecan('isManager')
                                        <td><a href="{{route('employee.show',$emp->id)}}" class="btn btn-success mx-2">View</a>
                                        <a href="{{route('employee.edit',$emp->id)}}" class="btn btn-warning mx-2">Edit</a>
                                        

                                    @elsecan('isBranchManager')
                                        <td><a href="{{route('employee.show',$emp->id)}}" class="btn btn-success mx-2">View</a>
                                        <a href="{{route('employee.edit',$emp->id)}}" class="btn btn-warning mx-2">Edit</a>
                                        {{-- <button class="btn btn-danger" type="submit">Delete</button></td> --}}
                                    
                                    @else
                                        <td><a href="{{route('employee.show',$emp->id)}}" class="btn btn-success mx-2">View</a>
                                        
                                    @endcan
                                   

                                </tr>
                            </form>
                            
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>



        </div>
    </main>
@endsection