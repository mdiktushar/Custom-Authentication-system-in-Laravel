@extends('layout.main')

@section('content')
    {{-- {{ $errors }} --}}
    <div class="container">
        <form class="login-form" action={{ route('user.login') }} enctype="multipart/form-data" method="post"> 
            <h3>Login</h3>        
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" 
                    class="form-control  @error('email') is-invalid @enderror" 
                    name="email" id="email" aria-describedby="emailHelp"
                    placeholder="selena123@email.com"
                >
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                <div>
                    @error('email')
                        <span class="form-text" style="color: red">{{$message}}</span>
                    @enderror
                <div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    name="password" id="password"
                    placeholder="******"
                >
                <div>
                    @error('password')
                      <span class="form-text" style="color: red">{{$message}}</span>
                    @enderror
                <div>
            </div>
            <button style="margin-top: 10px" type="submit" class="btn btn-success">Login</button>

            <a  class="form-text login-form-text" href="" style="color: red;">Don't have a account...!</a>

        </form>
    </div>
    
@endsection