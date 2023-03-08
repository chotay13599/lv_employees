@extends('layouts.app-master')

@section('content')
    {{-- <h1>Dashboard</h1> --}}
    <div class="bg-light">
        @auth
            <h1>Dashboard</h1>
            <p>Only authenticated users can access this section</p>

            @can('isAdmin')
                <button class="btn btn-primary">Admin Access</button>
            @elsecan('isManager')
                <button class="btn btn-primary">Manager Access</button>
            @elsecan('isBranchManager')
                <button class="btn btn-primary">Branch Manager</button>
            @endcan

            
        @endauth

        @guest
        <h1>Home Page</h1>
        <p>You are in home page</p>
        @endguest
    </div>
    
@endsection