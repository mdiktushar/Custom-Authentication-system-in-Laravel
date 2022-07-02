@extends('layout.main')

{{-- strting content @yield from layout\main --}}
@section('content')
    {{-- {{ $errors }} --}}
    <div class="container">
        <form class="signup-form" action={{ route('user.signup') }} enctype="multipart/form-data" method="post"> 
            <h3>Sign Up</h3>        
            @csrf
            {{-- first name --}}
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="first_name" 
                    class="form-control  
                    @error('first_name') is-invalid @enderror" {{-- showing error in side the input --}}
                    name="first_name" id="first_name"
                    placeholder="First Name"
                >
                {{-- showing error --}}
                <div>
                    @error('first_name')
                        <span class="form-text" style="color: red">{{$message}}</span>
                    @enderror
                <div>
            </div>
            {{-- last name --}}
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="last_name" 
                    class="form-control  
                    @error('last_name') is-invalid @enderror" {{-- showing error in side the input --}}
                    name="last_name" id="last_name"
                    placeholder="Last Name"
                >
                {{-- showing error --}}
                <div>
                    @error('last_name')
                        <span class="form-text" style="color: red">{{$message}}</span>
                    @enderror
                <div>
            </div>
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
            {{-- password_confirmation input --}}
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Re-enter Password</label>
                <input type="password" 
                    class="form-control 
                    @error('password') is-invalid @enderror" {{-- showing error in side the input --}}
                    name="password_confirmation" id="password_confirmation"
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
            <button style="margin-top: 10px" type="submit" class="btn btn-success">Sign Up</button>
            {{-- signup page link --}}
            <a  class="form-text login-form-text" href={{ route('page.login') }} style="color: green;">Already have an account..!</a>

        </form>
    </div>
    
@endsection