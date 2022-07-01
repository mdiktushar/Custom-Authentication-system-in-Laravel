@extends('layout.main')

@section('content')
    <div class="container">
        <form class="login-form" action={{ route('user.login') }} enctype="multipart/form-data" method="post">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
         
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-success">Login</button>

            <a  class="form-text login-form-text" href="" style="color: red;">Don't have a account...!</a>

        </form>
    </div>
    
@endsection