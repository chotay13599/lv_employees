
@extends('layouts.app-master')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Branch</strong> Edit</h1>
            <div class="row">
                <div class="col-md-2 ms-auto my-4">
                    <a href="{{route('branch.index')}} " class="btn btn-dark float-left ">Back</a>
                </div>
            </div>

{{-- 
                    @if ($errors->any()){
                        @foreach ($errors->all() as $message)
                            <p class="text-danger">{{$message}}</p>
                            
                        @endforeach
                    }
                        
                    @endif --}}

            
                
                    <form action="{{route('branch.update',$branch->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="branch_name"  value="{{($branch->branch_name)}}">
                                    <label for="floatingInput" >Branch Name</label>
                                    @error('branch_name')
                                        <span class="text-danger">{{$message }}</span>
                                    @enderror
                                </div>

                                

                                <div class="form-floating mb-3">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>

                                
                            </div>
                            
                            
                        </div>

                        
                    </form>
                
            



        </div>
    </main>
@endsection