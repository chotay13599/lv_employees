
@extends('layouts.app-master')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Branch</strong> Information</h1>
            <div class="row">
                <div class="col-md-2 ms-auto my-4">
                    <a href="{{route('branch.create')}} " class="btn btn-dark float-left ">Add New Branch</a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Branch Name</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            

                            @foreach ($branches as $branch)
                            <form action="{{route('branch.destroy',$branch->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <tr>
                                    <td>{{$loop->iteration}} </td>
                                    <td>{{$branch->branch_name }}</td>
                                    
                                    
                                    @can('isAdmin')
                                        <td><a href="{{route('branch.show',$branch->id)}}" class="btn btn-success mx-2">View</a>
                                        <a href="{{route('branch.edit',$branch->id)}}" class="btn btn-warning mx-2">Edit</a>
                                        <button class="btn btn-danger" type="submit">Delete</button></td>
                                        
                                    @elsecan('isManager')
                                        <td><a href="{{route('branch.show',$branch->id)}}" class="btn btn-success mx-2">View</a>
                                        <a href="{{route('branch.edit',$branch->id)}}" class="btn btn-warning mx-2">Edit</a>
                                        

                                    @elsecan('isBranchManager')
                                        <td><a href="{{route('branch.show',$branch->id)}}" class="btn btn-success mx-2">View</a>
                                        <a href="{{route('branch.edit',$branch->id)}}" class="btn btn-warning mx-2">Edit</a>
                                        {{-- <button class="btn btn-danger" type="submit">Delete</button></td> --}}
                                      
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