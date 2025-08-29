@extends('master')

@section('content')
<div class="container mt-5 forgot-pass" style="max-width: 500px;">
    <h2 class="text-center">Forgot Password</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/forgot" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="email">Registered Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter your registered email" required>
        </div>

        <div class="form-group mb-3">
            <label for="password">New Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter new password" required>
        </div>

        <div class="form-group mb-3">
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Update Password</button>
        <a href="{{ url('/login') }}" class="btn btn-secondary w-100 mt-2">Back to Login</a>
    </form>
</div>
@endsection
