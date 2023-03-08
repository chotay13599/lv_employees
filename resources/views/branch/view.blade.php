
@extends('layouts.app-master')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

           

            <div class="row">
                <div class="col-md-4 ms-auto">
                    <a href="{{route('branch.index')}}" class="btn btn-primary mt-3">Back</a>
                </div>
            </div>
            <div class="card content-center col-md-6">
                <div class="card-title">
                    <h2>Branch Information</h2>

                </div>
                <div class="row">
                    <div class="col-md-6">

                        <p>Branch_Name::&nbsp;{{$branch->branch_name}}</p> 
                        <br>
                       
                        
                       
                    </div>
                </div>
            </div>

            

        </div>
    </main>
@endsection



