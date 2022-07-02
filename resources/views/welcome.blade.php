@extends('layout.main')

{{-- strting content @yield from layout\main --}}
@section('content')
    {{-- {{ $errors }} --}}
    <div class="container">
        <form class="login-form" action={{ route('user.login') }} enctype="multipart/form-data" method="post"> 
            <h3>Login</h3>        
            @csrf
            {{-- email input --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" 
                    class="form-control  
                    @error('email') is-invalid @enderror" {{-- showing error in side the input --}}
                    name="email" id="email" aria-describedby="emailHelp"
                    placeholder="selena123@email.com"
                >
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                {{-- showing error --}}
                <div>
                    @error('email')
                        <span class="form-text" style="color: red">{{$message}}</span>
                    @enderror
                <div>
            </div>
            {{-- password input --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" 
                    class="form-control 
                    @error('password') is-invalid @enderror" {{-- showing error in side the input --}}
                    name="password" id="password"
                    placeholder="******"
                >
                {{-- showing error --}}
                <div>
                    @error('password')
                      <span class="form-text" style="color: red">{{$message}}</span>
                    @enderror
                <div>
            </div>
            {{-- login button --}}
            <button style="margin-top: 10px" type="submit" class="btn btn-success">Login</button>
            {{-- signup page link --}}
            <a  class="form-text login-form-text" href={{ route('page.signup') }} style="color: red;">Don't have a account...!</a>

        </form>
    </div>
    
@endsection