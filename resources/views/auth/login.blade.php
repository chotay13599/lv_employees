@extends('layouts.auth-master')


@section('content')
    {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio eum assumenda explicabo est dolorum sapiente, rerum nostrum nisi aliquam debitis ullam odit fuga, ab esse. Laborum inventore aut illo perferendis!</p> --}}
    <form action="{{route('login.loginUser')}}" method="post">
        @csrf   
        <h1>Login User</h1>
        <div class="form-group mb-3">
            <input type="text" name="name" id="" class="form-control" required placeholder="UserName">
        </div>

        <div class="form-group mb-3">
            <input type="password" name="password" id="" class="form-control" required placeholder="Password">
        </div>

        <button type="submit" class="btn btn-lg btn-primary">Login</button>
    </form>
@endsection