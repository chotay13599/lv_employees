
@extends('layouts.app-master')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Branch</strong> Information</h1>
            <div class="row">
                <div class="col-md-2 ms-auto my-4">
                    <a href="{{route('branch.index')}} " class="btn btn-dark float-left ">Back</a>
                </div>
            </div>

                    <form action="{{route('branch.store')}}" method="post">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="branch_name" placeholder=" Name" value="{{old('branch_name')}}">
                                    <label for="floatingInput" > Name</label>
                                    @error('branch_name')
                                        <span class="text-danger">{{$message }}</span>
                                    @enderror
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