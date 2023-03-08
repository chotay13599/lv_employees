
@extends('layouts.app-master')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Employee</strong> Information</h1>
            <div class="row">
                <div class="col-md-2 ms-auto my-4">
                    <a href="{{route('employee.index')}} " class="btn btn-dark float-left ">Back</a>
                </div>
            </div>

{{-- 
                    @if ($errors->any()){
                        @foreach ($errors->all() as $message)
                            <p class="text-danger">{{$message}}</p>
                            
                        @endforeach
                    }
                        
                    @endif --}}

            
                
                    <form action="{{route('employee.store')}}" method="post">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="name" placeholder=" Name" value="{{old('name')}}">
                                    <label for="floatingInput" > Name</label>
                                    @error('name')
                                        <span class="text-danger">{{$message }}</span>
                                    @enderror
                                </div>

                                @can('isAdmin')
                                <div class="form-floating mb-3">
                                    <select name="branch_id" id="" class="form-control">
                                        <option value="0" selected hidden>Choose Branch</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="text-danger">{{$message }}</span>
                                    @enderror
                                </div>
                                @elsecan('isManager')
                                <div class="form-floating mb-3">
                                    <select name="branch_id" id="" class="form-control">
                                        <option value="0" selected hidden>Choose Branch</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="text-danger">{{$message }}</span>
                                    @enderror
                                </div>
                                @elsecan('isBranchManager')
                                <input type="text" name="branch_id" id="" value="{{ auth()->user()->branch_id}}" hidden>
                                @endcan

                                
                            </div>
                            
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </form>
                
            



        </div>
    </main>
@endsection