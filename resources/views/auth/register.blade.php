@extends('layouts.frontend.master')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class='active'>Register</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div style="margin-bottom: 20px;" class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-12">
                        @include('layouts.frontend.partial.messages')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="">Create a new account</h4>
                        <hr>
                    </div>
                </div>
                <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('register') }}">
                    <div class="row">
                    @csrf
                        <div class="col-md-6 col-sm-6 create-new-account">
                            <div class="form-group">
                                <label class="info-title" for="first_name">First Name <span>*</span></label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror unicase-form-control text-input" id="first_name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus >
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="username">Username <span>*</span></label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror unicase-form-control text-input" id="username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus >
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Password <span>*</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror unicase-form-control text-input" id="password" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="division">Division <span>*</span></label>
                                <select class="form-control @error('division') is-invalid @enderror unicase-form-control text-input" id="division_id" name="division" required autocomplete="division">
                                    <option value="" selected>Select Division</option>
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
                                @error('division')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="street_address">Street Address <span>*</span></label>
                                <textarea id="about" name="street_address" class="form-control @error('street_address') is-invalid @enderror unicase-form-control text-input" rows="1" required autocomplete="street_address" autofocus>{{ old('street_address') }}</textarea>
                                @error('street_address')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>


                        </div>


                        <div class="col-md-6 col-sm-6 create-new-account">
                            <div class="form-group">
                                <label class="info-title" for="name">Last Name <span>*</span></label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror unicase-form-control text-input" id="last_name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus >
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror unicase-form-control text-input" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password-confirm">Confirm Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="district">District <span>*</span></label>
                                <select class="form-control @error('district') is-invalid @enderror unicase-form-control text-input" id="district_id" name="district" required autocomplete="district">
                                    <option value="" selected>Select District</option>
                                    @foreach($districts as $district)
                                        <option value="{{$district->id}}">{{$district->name}}</option>
                                    @endforeach
                                </select>
                                @error('district')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">Phone Number <span>*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror unicase-form-control text-input" id="phone" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus >
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                    <!-- create a new account -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="info-title" for="about">About (optional)</label>
                                <textarea id="about" name="about" class="form-control @error('about') is-invalid @enderror unicase-form-control text-input" rows="3" autocomplete="about" autofocus>{{ old('about') }}</textarea>
                                @error('about')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

@endsection

@push('js')
    <script>
        $("#division_id").change(function(){
            var division  = $("#division_id").val();
            $("#district_id").html("");
            var option = ""

            $.get( "{{URL('get-districts')}}/"+division, function( data ) {

                data = JSON.parse(data);
                data.forEach(function(element){
                    option += "<option value='"+element.id+"'>"+element.name+"</option>";
                });

                $("#district_id").html(option);

            });
        });
    </script>
@endpush
