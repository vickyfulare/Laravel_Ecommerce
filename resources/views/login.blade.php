@extends('master')

@section('content')
<h1><div class="text-center">Login Here </div></h1>
<div class="container d-flex justify-content-center align-items-center custom-login">  
<div class="card shadow-lg p-4" style="width: 400px; border-radius: 15px;">
        <h2 class="text-center mb-4 text-primary">Login</h2>
        <form action="login-page" method="post">
            @csrf
            <!-- Email -->
            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="fw-bold">Email Address</label>
                <input type="email" class="form-control mt-2"  name="email" id="exampleInputEmail1" placeholder="Enter your email">
            </div>

            <!-- Password -->
            <div class="form-group mb-3">
                <label for="exampleInputPassword1" class="fw-bold">Password</label>
                <input type="password" class="form-control mt-2" name="password" id="exampleInputPassword1" placeholder="Enter your password">
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn btn-primary w-100">Login</button>

            <!-- Extra Links -->
            <div class="mt-3 text-center">
                <a href="forgot" class="text-decoration-none">Forgot Password?</a>
                <br>
                <span>Don't have an account? <a href="/register" class="text-decoration-none">Sign Up</a></span>
            </div>
        </form>
    </div>
</div>
@endsection
