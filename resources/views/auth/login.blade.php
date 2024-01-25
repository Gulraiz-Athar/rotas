@extends('layouts.auths1')

@section('page-title')
    {{ __('Login') }}
@endsection

@push('custom-scripts')
@if(env('RECAPTCHA_MODULE') == 'yes')
        {!! NoCaptcha::renderJs() !!}
@endif
@endpush
@section('lang-selectbox')
<style>
    .custom_cl{
        background-color: #6FD943 !important;
        border-color: #6FD943 !important;
         box-shadow: 0 0 0 0.2rem rgb(249 250 250 / 25%);
    }

    body.theme-3 .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgb(95 113 223 / 50%);
}
    body.theme-3 .btn-primary:focus {
         box-shadow: 0 0 0 0.2rem rgb(95 113 223 / 50%);
}
    


    body.theme-3 .form-check-input:focus, body.theme-3 .form-select:focus, body.theme-3 .form-control:focus, body.theme-3 .custom-select:focus, body.theme-3 .dataTable-selector:focus, body.theme-3 .dataTable-input:focus {
    border-color: #6FD943;
     box-shadow: 0 0 0 0.2rem rgb(95 113 223 / 30%);
}
</style>
<select class="btn  btn-primary ms-2 me-2 language_option_bg" name="language" id="language"
    onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
    @foreach(\App\Models\Utility::languages() as $language)
    <option @if($lang == $language) selected @endif value="{{ route('login', $language) }}">{{Str::upper($language)}}</option>
    @endforeach
</select>
@endsection

@section('content')
<div  style="text-align: center" class="logo">
    @if (!empty($darklayout) && $darklayout == 'on')
                <img src="{{ asset(Storage::url('uploads/logo/logo-light.png')) }}" alt="logo" class="logo logo-lg" />
            @else
                <img src="{{ asset(Storage::url('uploads/logo/logo-dark.png')) }}" alt="logo" class="logo logo-lg" />
            @endif   </div>
    <div class="card">
        <div class="row align-items-center text-start">
            <div class="col-12">
                <div class="card-body">
                    <div class="">
                        <h2 class="mb-3 f-w-600">{{ __('Login') }}</h2>
                    </div>
                    <form method="POST" id="form_data" action="{{ route('login') }}">
                        @csrf
                        <div class="">
                            <div class="form-group mb-3">
                                <label class="form-label">{{ __('Email') }}</label>
                                {{-- <input type="email" class="form-control" placeholder="Email address"> --}}
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="{{ __('Email address') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <!-- DIT
                                @if (Route::has('password.request'))
                                <div class="my-2">
									<a href="{{ route('password.request',$lang) }}" class="small text-muted  border-primary">
										{{ __('Forgot Your Password?') }}
                                    </a>
								</div>
                                @endif
                                -->
                            </div>

                            @if(env('RECAPTCHA_MODULE') == 'yes')
                                <div class="form-group mt-3">
                                    {!! NoCaptcha::display() !!}
                                    @error('g-recaptcha-response')
                                    <span class="small text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            @endif
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block mt-2">{{ __('Login') }}</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
           
        </div>
    </div>
@endsection

@push('pagescript')
<script>
    $(document).ready(function () {
    $("#form_data").submit(function (e) {
        $("#login_button").attr("disabled", true);
        return true;
         });
    });
</script>    
@endpush
