@extends('layouts.applayout')
@section('content')
<section id="login">
<div class="login-container" data-aos="fade-in">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="">
                
                <div class="card-header">
                    
                    <div   style="text-align:center">
                    
                    <h3>LOGIN FORM</h3>
                        
                    
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control  field-shadow @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" required autocomplete="user_id" autofocus placeholder="User ID">
                                
                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3"></div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control field-shadow @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3"></div>
                        </div>

                        

                        <div class="form-group row mb-0">
                        <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn-primary">
                                    {{ __('Login') }}
                                </button>

                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  </section>
@endsection
