@extends('layouts.main')
@section('page-title')
    {{ __('Settings') }}
@endsection
@php

$lang = \App\Models\Utility::getValByName('default_language');
$logo=\App\Models\Utility::get_file('uploads/logo/');

$user = Auth::user();
$file_type = config('files_types');
$setting = App\Models\Utility::settings();


$local_storage_validation    = $setting['local_storage_validation'];
$local_storage_validations   = explode(',', $local_storage_validation);

$s3_storage_validation    = $setting['s3_storage_validation'];
$s3_storage_validations   = explode(',', $s3_storage_validation);

$wasabi_storage_validation    = $setting['wasabi_storage_validation'];
$wasabi_storage_validations   = explode(',', $wasabi_storage_validation);
@endphp

@section('content')

    <div class="dash-container">
        <div class="dash-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Settings') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Settings') }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-right">
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card sticky-top" style="top:30px">
                                <div class="list-group list-group-flush" id="useradd-sidenav">

                                    <a href="#Dashbord_Setting"
                                        class="list-group-item list-group-item-action active border-0">{{ __('Dashbord Settings') }}</a>

                                    <a href="#Site_Setting"
                                        class="list-group-item list-group-item-action border-0">{{ __('Site Settings') }}</a>

                                    <a href="#Company_setting"
                                        class="list-group-item list-group-item-action active border-0">{{ __('Company Settings') }}</a>

                                    <a href="#Email_Setting" class="list-group-item list-group-item-action border-0">
                                            {{ __('Email Settings') }}</a>

                                    <a href="#Zoom_Setting"
                                        class="list-group-item list-group-item-action border-0">{{ __('Zoom Settings') }}</a>

                                    <a href="#Slack_Setting"
                                        class="list-group-item list-group-item-action border-0">{{ __('Slack Settings') }}</a>


                                    <a href="#Telegram_Setting"
                                        class="list-group-item list-group-item-action border-0  ">{{ __('Telegram Settings') }}</a>

                                    <a href="#Pusher_Setting" 
                                        class="list-group-item list-group-item-action border-0">{{ __('Pusher Settings') }}</a>

                                    <a href="#ReCaptcha_Setting" 
                                        class="list-group-item list-group-item-action border-0">{{ __('ReCaptcha Settings') }}</a>

                                    <a href="#Storage_Setting" 
                                        class="list-group-item list-group-item-action border-0">{{ __('Storage Setting') }}</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <div id="Dashbord_Setting" class="card text-white">
                                <div class="card-header">
                                    <h5>{{ __('Dashboard Settings') }}</h5>
                                    <small class="text-muted">{{ __('Edit your dashboard settings') }}</small>
                                </div>
                                <div class="card-body">
                                    {{ Form::model($profile, ['route' => ['setting.update', $profile->id], 'method' => 'PUT', 'class' => 'permission_table_information']) }}
                                    {{ Form::hidden('employee_id', $profile->user_id) }}
                                    {{ Form::hidden('form_type', 'rotas_setting') }}
                                    <input type="hidden" name="setting" value="dash">   
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <h5 class=" h6 mb-1">{{ __('Rota Settings') }}</h5>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-check form-switch d-inline-block mx-2">
                                                {!! Form::checkbox('emp_show_rotas_price', 1, !empty($company_setting['emp_show_rotas_price']) ? 1 : 0, ['required' => false, 'class' => 'custom-control-input form-check-input', 'id' => 'emp_show_rotas_price', 'role' => 'switch']) !!}
                                                {{ Form::label('emp_show_rotas_price', __('Show employee rotas wage'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-check form-switch d-inline-block mx-2">
                                                {!! Form::checkbox('emp_show_avatars_on_rota', 1, !empty($company_setting['emp_show_avatars_on_rota']) ? 1 : 0, ['required' => false, 'class' => 'custom-control-input form-check-input', 'id' => 'emp_show_avatars_on_rota', 'role' => 'switch']) !!}
                                                {{ Form::label('emp_show_avatars_on_rota', __('Show employee avatars on rota'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-check form-switch d-inline-block mx-2">
                                                {!! Form::checkbox('emp_hide_rotas_hour', 1, !empty($company_setting['emp_hide_rotas_hour']) ? 1 : 0, ['required' => false, 'class' => 'custom-control-input form-check-input', 'id' => 'emp_hide_rotas_hour', 'role' => 'switch']) !!}
                                                {{ Form::label('emp_hide_rotas_hour', __('Hide employee rotas hour'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-check form-switch d-inline-block mx-2">
                                                {!! Form::checkbox('include_unpublished_shifts', 1, !empty($company_setting['include_unpublished_shifts']) ? 1 : 0, ['required' => false, 'class' => 'custom-control-input form-check-input', 'id' => 'include_unpublished_shifts', 'role' => 'switch']) !!}
                                                {{ Form::label('include_unpublished_shifts', __('Include unpublished shifts on the dashboard and report'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-check form-switch d-inline-block mx-2">
                                                {!! Form::checkbox('emp_only_see_own_rota', 1, !empty($company_setting['emp_only_see_own_rota']) ? 1 : 0, ['required' => false, 'class' => 'custom-control-input form-check-input', 'id' => 'emp_only_see_own_rota', 'role' => 'switch']) !!}
                                                {{ Form::label('emp_only_see_own_rota', __('Employees only see themselves on the rota'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-check form-switch d-inline-block mx-2">
                                                {!! Form::checkbox('emp_can_see_all_locations', 1, !empty($company_setting['emp_can_see_all_locations']) ? 1 : 0, ['required' => false, 'class' => 'custom-control-input form-check-input', 'id' => 'emp_can_see_all_locations', 'role' => 'switch']) !!}
                                                {{ Form::label('emp_can_see_all_locations', __('Employees can view the rotas of locations they are not assigned to'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                        <br><br><br><br>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-2">
                                                    {{ Form::label('', __('Week Starts'), ['class' => 'form-label text-dark h6']) }}
                                                    {!! Form::select('company_week_start', ['monday' => __('Monday'), 'tuesday' => __('Tuesday'), 'wednesday' => __('Wednesday'), 'thursday' => __('Thursday'), 'friday' => __('Friday'), 'saturday' => __('Saturday'), 'sunday' => __('Sunday')], !empty($company_setting['company_week_start']) ? $company_setting['company_week_start'] : null, ['required' => true, 'data-placeholder' => __('Select Day'), 'class' => 'form-control js-single-select']) !!}
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-2">
                                                    {{ Form::label('', __('Time Format'), ['class' => 'form-label text-dark h6']) }}
                                                    {!! Form::select('company_time_format', ['12' => '12 ' . __('Hour'), '24' => '24 ' . __('Hour')], !empty($company_setting['company_time_format']) ? $company_setting['company_time_format'] : null, ['required' => true, 'data-placeholder' => 'Yours Time Type', 'class' => 'form-control js-single-select']) !!}
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-2">
                                                    {{ Form::label('', __('Date Format'), ['class' => 'form-label text-dark h6']) }}
                                                    {!! Form::select('company_date_format', ['Y-m-d' => date('Y-m-d'), 'm-d-Y' => date('m-d-Y'), 'd-m-Y' => date('d-m-Y'), 'M j, Y' => date('M j, Y'), 'd M Y' => date('d M Y'), 'D d F Y' => date('D d F Y')], !empty($company_setting['company_date_format']) ? $company_setting['company_date_format'] : null, ['required' => true, 'data-placeholder' => __('Select Day'), 'class' => 'form-control js-single-select']) !!}
                                                </div>
                                                <div class="col-sm-4 col-md-3">
                                                    {{ Form::label('', __('Currency Symbol'), ['class' => 'form-label text-dark h6']) }}
                                                    {{ Form::text('company_currency_symbol', !empty($company_setting['company_currency_symbol']) ? $company_setting['company_currency_symbol'] : '$', ['class' => 'form-control']) }}
                                                </div>
                                                <div class="col-sm-6 col-md-3">
                                                    {{ Form::label('', __('Currency Positiuon'), ['class' => 'form-label text-dark h6']) }}
                                                    <br>
                                                    <div class="custom-control custom-radio d-inline-block mx-2">
                                                        <input type="radio" name="company_currency_symbol_position"
                                                            value="pre" class="form-check-input"
                                                            id="company_currency_symbol_pre"
                                                            {{ $company_setting['company_currency_symbol_position'] == 'pre' ? 'checked' : '' }}>
                                                        <label class="custom-label text-dark"
                                                            for="company_currency_symbol_pre">{{ __('Pre') }}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio d-inline-block mx-2">
                                                        <input type="radio" name="company_currency_symbol_position"
                                                            value="post" class="form-check-input"
                                                            id="company_currency_symbol_post"
                                                            {{ $company_setting['company_currency_symbol_position'] == 'post' ? 'checked' : '' }}>
                                                        <label class="custom-label text-dark"
                                                            for="company_currency_symbol_post">{{ __('Post') }}</label>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            {{ Form::label('leave_year_start', __('Leave Year Starts'), ['class' => 'form-label text-dark h6']) }}
                                            {!! Form::select('leave_start_month', ['01' => __('January'), '02' => __('February'), '03' => __('March'), '04' => __('April'), '05' => __('May'), '06' => __('June'), '07' => __('July'), '08' => __('August'), '09' => __('September'), '10' => __('October'), '11' => __('November'), '12' => __('December')], !empty($company_setting['leave_start_month']) ? $company_setting['leave_start_month'] : 1, ['required' => true, 'data-placeholder' => __('Select Month'), 'class' => 'form-control js-single-select']) !!}
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-3 ">
                                            {{ Form::label('breck_paid', __('Break'), ['class' => 'form-label text-dark h6']) }}
                                            <br>
                                            <div class="custom-control custom-radio d-inline-block mx-2">
                                                <input type="radio" name="break_paid" value="paid" class="form-check-input"
                                                    @if(isset($company_setting['break_paid'])){{ $company_setting['break_paid'] == 'paid' ? 'checked' : '' }}@endif>
                                                <label class="custom-label text-dark">{{ __('Paid') }}</label>
                                            </div>

                                            <div class="custom-control custom-radio d-inline-block mx-2">
                                                <input type="radio" name="break_paid" value="unpaid"
                                                    class="form-check-input"
                                                    @if(isset($company_setting['break_paid'])){{ $company_setting['break_paid'] == 'unpaid' ? 'checked' : '' }}@endif>
                                                <label class="custom-label text-dark">{{ __('Unpaid') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            {{ Form::label('', __('Shift Notes'), ['class' => 'form-label text-dark h6']) }}
                                            {!! Form::select('see_note', ['none' => __('Only admins and managers can see shift notes'), 'self' => __('Employees can only see notes for their own shifts and open shifts'), 'all' => __('Employees can see shift notes for everybody')], !empty($company_setting['see_note']) ? $company_setting['see_note'] : null, ['required' => false, 'class' => 'form-control ']) !!}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <h5 class=" h6 mb-1">{{ __('Availability Preferences') }}</h5>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="custom-control custom-checkbox d-inline-block mx-2">
                                                {!! Form::checkbox('employees_can_set_availability', 1, !empty($company_setting['employees_can_set_availability']) ? $company_setting['employees_can_set_availability'] : 0, ['required' => false, 'class' => 'form-check-input', 'id' => 'employees_can_set_availability']) !!}
                                                {{ Form::label('employees_can_set_availability', __('Employees can set their own availability preferences'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer text-end py-0 pe-2 border-0">
                                        <input name="from" type="hidden" value="password">
                                        <input name="from" type="hidden" value="password">
                                        <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>

                            <div id="Site_Setting" class="card">
                        <div class="card-header">
                            <h5>{{ __('Site Settings   ') }}</h5>
                            <small class="text-muted">{{ __('Edit your Brand Settings') }}</small>
                        </div>
                        <div class="card-body">
                            {{ Form::model($settings, ['route' => ['setting.update', $profile->id], 'method' => 'PUT', 'class' => 'permission_table_information', 'enctype' => 'multipart/form-data']) }}
                            <input type="hidden" name="setting" value="site">   

                            <div class="row mt-3">
                                {{-- Light Logo --}}
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{ __('Light Logo') }}</h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="setting-card">
                                                <div class="logo-content mt-4">
                                                    <a href="{{$logo.(isset($light_logo) && !empty($light_logo)? $light_logo:'logo-light.png')}}" target="_blank">
                                                    <img src="{{$logo.(isset($light_logo) && !empty($light_logo)? $light_logo:'logo-light.png')}}"
                                                        class="big-logo img_setting" id="blah1" style="width: 150px"></a>
                                                </div>
                                                <div class="choose-files mt-5">
                                                    <label for="light_logo" class="form-label choose-files bg-primary "><i
                                                            class="ti ti-upload px-1"></i>{{ __('Select Image') }}</label>
                                                    <input type="file" name="light_logo" id="light_logo"
                                                        class="custom-input-file d-none" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])">
                                                </div>

                                                 @error('light_logo')
                                                <div class="row">
                                                    <span class="invalid-logo" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                </div>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Dark Logo --}}
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{ __('Dark Logo') }}</h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="setting-card">
                                                <div class="logo-content mt-4">
                                                    <a href="{{$logo.(isset($dark_logo) && !empty($dark_logo)? $dark_logo:'logo-dark.png')}}" target="_blank">
                                                    <img src="{{$logo.(isset($logo_dark) && !empty($logo_dark)? $logo_dark:'logo-dark.png')}}"
                                                        class="big-logo" id="blah" style="width: 150px"></a>
                                                </div>
                                                <div class="choose-files mt-5">
                                                    <label for="dark_logo" class="form-label choose-files bg-primary "><i
                                                            class="ti ti-upload px-1"></i>{{ __('Select Image') }}</label>
                                                    <input type="file" name="dark_logo" id="dark_logo"
                                                        class="custom-input-file d-none"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                </div>
                                                @error('dark_logo')
                                                    <div class="row">
                                                        <span class="invalid-logo" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Favicon Logo --}}
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{ __('Favicon') }}</h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="setting-card">
                                                <div class="logo-content mt-4">
                                                    <a href="{{$logo.(isset($favicon) && !empty($favicon)? $favicon :'favicon.png')}}" target="_blank">
                                                    <img src="{{$logo.(isset($favicon) && !empty($favicon)? $company_ficon :'favicon.png')}}"
                                                        width="50px" class="big-logo img_setting" id="blah2"></a>
                                                </div>
                                                <div class="choose-files mt-5">
                                                    <label for="favicon" class="form-label choose-files bg-primary ">
                                                        <i class="ti ti-upload px-1"></i>{{ __('Select Image') }}
                                                    </label>
                                                    <input type="file" name="favicon" id="favicon"
                                                        class="custom-input-file d-none"  onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                                                </div>
                                                   @error('favicon')
                                                <div class="row">
                                                    <span class="invalid-logo" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                </div>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    @error('logo')
                                        <div class="row">
                                            <span class="invalid-logo" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('title_text', __('Title Text'), ['class' => 'form-label text-dark']) }}
                                    {{ Form::text('title_text', null, ['class' => 'form-control', 'placeholder' => __('Title Text')]) }}
                                    @error('title_text')
                                        <span class="invalid-title_text" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @if (\Auth::user()->type == 'company')
                                    <div class="form-group col-md-4">
                                        {{ Form::label('footer_text', __('Footer Text'), ['class' => 'form-label text-dark']) }}
                                        {{ Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => __('Footer Text')]) }}
                                        @error('footer_text')
                                            <span class="invalid-footer_text" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-4">
                                        {{ Form::label('', __('Default Languages'), ['class' => 'form-label text-dark']) }}
                                        <div class="changeLanguage js-single-select-custom">
                                            @php
                                                $user = Auth::user();
                                                if ($user) {
                                                    $currantLang = $user->currentLanguage();
                                                    $languages = \App\Models\Utility::languages();
                                                }

                                            @endphp
                                            <select name="default_language" id="default_language"
                                                class="form-control js-single-select1" aria-hidden="true">
                                                @if (isset($languages) && !empty($languages) && count($languages))
                                                    @foreach ($languages as $language)
                                                        <option value="{{ $language }}"
                                                            {{ $settings['default_language'] == $language ? 'selected' : '' }}>
                                                            <span>{{ Str::upper($language) }} </span>
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group col-6 col-md-3">
                                    <div class="custom-control custom-switch p-0">
                                        <label class="form-label text-dark"
                                            for="gdpr_cookie">{{ __('GDPR Cookie') }}</label><br>
                                        <input type="checkbox" class="form-check-input gdpr_fulltime gdpr_type"
                                            data-toggle="switchbutton" data-onstyle="primary" name="gdpr_cookie"
                                            id="gdpr_cookie"
                                            {{ isset($settings['gdpr_cookie']) && $settings['gdpr_cookie'] == 'on' ? 'checked="checked"' : '' }}>
                                    </div>
                                </div>

                                <div class="form-group col-6 col-md-3">
                                    <div class="custom-control form-switch p-0">
                                        <label class="form-label text-dark"
                                            for="display_landing_page">{{ __('Enable Landing Page') }}</label><br>
                                        <input type="checkbox" name="display_landing_page" class="form-check-input"
                                            id="display_landing_page" data-toggle="switchbutton"
                                            {{ $settings['display_landing_page'] == 'on' ? 'checked="checked"' : '' }}
                                            data-onstyle="primary">
                                    </div>
                                </div>

                                <div class="form-group col-6 col-md-3">
                                    <div class="custom-control form-switch p-0">
                                        <label class="form-label text-dark"
                                            for="SITE_RTL">{{ __('Enable RTL') }}</label><br>
                                        <input type="checkbox" class="form-check-input" data-toggle="switchbutton"
                                            data-onstyle="primary" name="SITE_RTL" id="SITE_RTL"
                                            {{ Utility::getValByName('SITE_RTL') == 'on' ? 'checked="checked"' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group col-6 col-md-3">
                                    <div class="custom-control form-switch p-0">
                                        <label class="form-label text-dark"
                                            for="SIGNUP">{{ __('Enable Sign-Up Page') }}</label><br>
                                        <input type="checkbox" name="SIGNUP" class="form-check-input" id="SIGNUP"
                                            data-toggle="switchbutton"
                                            {{ $settings['SIGNUP'] == 'on' ? 'checked="checked"' : '' }}
                                            data-onstyle="primary">
                                    </div>
                                </div>
                                <div class="form-group col-12 GDPR_Cookie_Text">
                                    {{ Form::label('cookie_text', __('GDPR Cookie Text'), ['class' => 'form-label text-dark']) }}
                                    {!! Form::textarea('cookie_text', $settings['cookie_text'], ['class' => 'form-control', 'rows' => '4']) !!}
                                </div>
                                <h4 class="small-title">{{ __('Theme Customizer') }}</h4>
                                @php
                                    $setting = App\Models\Utility::colorset();
                                    $color = 'theme-3';
                                    if (!empty($setting['color'])) {
                                        $color = $setting['color'];
                                    }
                                @endphp
                                <div class="setting-card setting-logo-box p-3">
                                    <div class="row">
                                        <div class="col-4 my-auto">
                                            <h6 class="mt-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-credit-card me-2">
                                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                                </svg>
                                                {{ __('Primary color settings') }}
                                            </h6>
                                            <hr class="my-2">
                                            <div class="theme-color themes-color">
                                                <a href="#!"
                                                    class="{{ !empty($color) && $color == 'theme-1' ? 'active_color' : '' }}"
                                                    data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                                <input type="radio" class="theme_color d-none" name="color" value="theme-1"
                                                    {{ !empty($color) && $color == 'theme-1' ? 'checked' : '' }}>
                                                <a href="#!"
                                                    class="{{ !empty($color) && $color == 'theme-2' ? 'active_color' : '' }}"
                                                    data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                                <input type="radio" class="theme_color d-none" name="color" value="theme-2"
                                                    {{ !empty($color) && $color == 'theme-2' ? 'checked' : '' }}>
                                                <a href="#!"
                                                    class="{{ empty($color) || $color == 'theme-3' ? 'active_color' : '' }}"
                                                    data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                                <input type="radio" class="theme_color d-none" name="color" value="theme-3"
                                                    {{ empty($color) || $color == 'theme-3' ? 'checked' : '' }}>
                                                <a href="#!"
                                                    class="{{ !empty($color) && $color == 'theme-4' ? 'active_color' : '' }}"
                                                    data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                                <input type="radio" class="theme_color d-none" name="color" value="theme-4"
                                                    {{ !empty($color) && $color == 'theme-4' ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-4 my-auto">
                                            <h6>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-layout me-2">
                                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                                </svg>
                                                {{ __('Sidebar settings') }}
                                            </h6>
                                            <hr class="my-2">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" id="cust-theme-bg1"
                                                    name="cust_theme_bg"
                                                    {{ Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : '' }}>
                                                <label class="form-label text-dark f-w-600 pl-1"
                                                    for="cust-theme-bg">{{ __('Transparent layout') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-4 my-auto">
                                            <h6>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-sun me-2">
                                                    <circle cx="12" cy="12" r="5"></circle>
                                                    <line x1="12" y1="1" x2="12" y2="3"></line>
                                                    <line x1="12" y1="21" x2="12" y2="23"></line>
                                                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                                    <line x1="1" y1="12" x2="3" y2="12"></line>
                                                    <line x1="21" y1="12" x2="23" y2="12"></line>
                                                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                                </svg>
                                                {{ __('Layout settings') }}
                                            </h6>
                                            <hr class="my-2">
                                            <div class="form-check form-switch mt-2">
                                                <input type="checkbox" class="form-check-input" id="cust-darklayout1"
                                                    name="cust_darklayout"
                                                    {{ Utility::getValByName('cust_darklayout') == 'on' ? 'checked' : '' }}>
                                                <label class="form-label text-dark f-w-600 pl-1"
                                                    for="cust-darklayout">{{ __('Dark Layout') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <hr>
                                <div class="form-group col-md-6">
                                    {{ Form::label('footer_link_1', __('Footer Link Title 1'), ['class' => 'form-label text-dark']) }}
                                    {{ Form::text('footer_link_1', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link Title 1')]) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('footer_value_1', __('Footer Link href 1'), ['class' => 'form-label text-dark']) }}
                                    {{ Form::text('footer_value_1', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link 1')]) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('footer_link_2', __('Footer Link Title 2'), ['class' => 'form-label text-dark']) }}
                                    {{ Form::text('footer_link_2', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link Title 2')]) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('footer_value_2', __('Footer Link href 2'), ['class' => 'form-label text-dark']) }}
                                    {{ Form::text('footer_value_2', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link 2')]) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('footer_link_3', __('Footer Link Title 3'), ['class' => 'form-label text-dark']) }}
                                    {{ Form::text('footer_link_3', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link Title 3')]) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('footer_value_3', __('Footer Link href 3'), ['class' => 'form-label text-dark']) }}
                                    {{ Form::text('footer_value_3', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link 3')]) }}
                                </div>
                                <div class="card-footer text-end py-0 pe-2 border-0">
                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn  btn-primary']) }}
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>


                            <div id="Company_setting" class="card text-white">
                                <div class="card-header">
                                    <h5>{{ __('Company Settings') }}</h5>
                                    <small class="text-muted">{{ __('Edit your company details') }}</small>
                                </div>
                                <div class="card-body">
                                   
                                    {{ Form::model($settings, ['route' => ['setting.CompanySettings', $profile->id], 'method' => 'PUT', 'class' => 'permission_table_information', 'enctype' => 'multipart/form-data']) }}
                                    {{ Form::hidden('form_type', 'site_setting') }}
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            {{Form::label('company_email',__('System Email *'),array('class' => 'form-label text-dark')) }}
                                            {{Form::text('company_email',null,array('class'=>'form-control'))}}
                                            @error('company_email')
                                            <span class="invalid-company_email" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{Form::label('company_email_from_name',__('Email (From Name) *'),array('class' => 'form-label text-dark')) }}
                                            {{Form::text('company_email_from_name',null,array('class'=>'form-control font-style'))}}
                                            @error('company_email_from_name')
                                            <span class="invalid-company_email_from_name" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{Form::label('contract_prefix',__('Contract Prefix'),array('class' => 'form-label text-dark')) }}
                                            {{Form::text('contract_prefix',null,array('class'=>'form-control'))}}
                                            @error('contract_prefix')
                                            <span class="invalid-contract_prefix" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                       

                                      
                                    <div class="card-footer text-end border-0 p-0">
                                        <!-- <input class="btn btn-primary save_btn_signature" type="button" value="Save Changes"> -->
                                        <!-- <button class="">fvgfgvf</button> -->
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>


                        <div id="Email_Setting" class="card">
                        <div class="card-header">
                            <h5>{{ __('Email     Settings') }}</h5>
                            <small class="text-muted">{{ __('Edit email settings') }}</small>
                        </div>
                        <div class="">
                            {{ Form::model($settings, ['route' => ['email.setting'], 'method' => 'POST', 'class' => 'permission_table_information', 'enctype' => 'multipart/form-data']) }}
                            {{ Form::hidden('form_type', 'email_setting') }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {{ Form::label('mail_driver', __('Mail Driver'), ['class' => 'form-label text-dark']) }}
                                        {{ Form::text('mail_driver', env('MAIL_DRIVER'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver')]) }}
                                        @error('mail_driver')
                                            <span class="invalid-mail_driver" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('mail_host', __('Mail Host'), ['class' => 'form-label text-dark']) }}
                                        {{ Form::text('mail_host', env('MAIL_HOST'), ['class' => 'form-control ', 'placeholder' => __('Enter Mail Driver')]) }}
                                        @error('mail_host')
                                            <span class="invalid-mail_driver" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('mail_port', __('Mail Port'), ['class' => 'form-label text-dark']) }}
                                        {{ Form::text('mail_port', env('MAIL_PORT'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')]) }}
                                        @error('mail_port')
                                            <span class="invalid-mail_port" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('mail_username', __('Mail Username'), ['class' => 'form-label text-dark']) }}
                                        {{ Form::text('mail_username', env('MAIL_USERNAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')]) }}
                                        @error('mail_username')
                                            <span class="invalid-mail_username" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('mail_password', __('Mail Password'), ['class' => 'form-label text-dark']) }}
                                        <input class="form-control" placeholder="{{ __('Enter Mail Password') }}"
                                            name="mail_password" type="password" value="{{ env('MAIL_PASSWORD') }}"
                                            id="mail_password">
                                        @error('mail_password')
                                            <span class="invalid-mail_password" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('mail_encryption', __('Mail Encryption'), ['class' => 'form-label text-dark']) }}
                                        {{ Form::text('mail_encryption', env('MAIL_ENCRYPTION'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')]) }}
                                        @error('mail_encryption')
                                            <span class="invalid-mail_encryption" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('mail_from_address', __('Mail From Address'), ['class' => 'form-label text-dark']) }}
                                        {{ Form::text('mail_from_address', env('MAIL_FROM_ADDRESS'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')]) }}
                                        @error('mail_from_address')
                                            <span class="invalid-mail_from_address" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('mail_from_name', __('Mail From Name'), ['class' => 'form-label text-dark']) }}
                                        {{ Form::text('mail_from_name', env('MAIL_FROM_NAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Name')]) }}
                                        @error('mail_from_name')
                                            <span class="invalid-mail_from_name" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="form-group col-6 mb-0">
                                        {{-- <a href="#" data-url="{{ route('test.mail') }}" data-ajax-popup="true"
                                            data-title="{{ __('Send Test Mail') }}" class="btn btn-primary">
                                            {{ __('Send Test Mail') }}
                                        </a> --}}
                                        <a href="#" data-url="{{ route('test.mail') }}"
                                        data-title="{{ __('Send Test Mail') }}"
                                        class="btn btn-primary btn-submit text-white send_email">
                                        {{ __('Send Test Mail') }}
                                    </a>
                                    </div>
                                    <div class="form-group col-6 text-end mb-0">
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>


                            <div id="Zoom_Setting" class="card text-white">
                                <div class="card-header">
                                    <h5>{{ __('Zoom Settings') }}</h5>
                                    <small class="text-muted">{{ __('Edit your zoom meetings') }}</small>
                                </div>
                                <div class="card-body">
                                    
                                    {{ Form::open(['url' => route('setting.ZoomSettings', $profile->id), 'enctype' => 'multipart/form-data']) }}
                                    
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label h6">{{ __('API Key') }}</label>
                                                    <input type="text" name="zoom_api_key" class="form-control"
                                                        placeholder="Enter zoom API key"
                                                        value="{{ !empty($settings['zoom_api_key']) ? $settings['zoom_api_key'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label h6">{{ __('Secret Key') }}</label>
                                                <input type="text" name="zoom_secret_key" class="form-control"
                                                    placeholder="Enter zoom secret key"
                                                    value="{{ !empty($settings['zoom_secret_key']) ? $settings['zoom_secret_key'] : '' }}">
                                            </div>
                                        </div>
                                    
                                    <div class="card-footer border-0 p-0 text-end">
                                       
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>

                            <div id="Slack_Setting" class="card text-white">
                                <div class="card-header">
                                    <h5>{{ __('Slack Settings') }}</h5>
                                    <small class="text-muted">{{ __('Edit your Slack settings') }}</small>
                                </div>
                                <div class="card-body">
                                    
                                    {{ Form::open(['route' => 'slack.setting', 'id' => 'slack-setting', 'method' => 'post', 'class' => 'd-contents']) }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="small-title">{{ __('Slack Webhook URL') }}</h4>
                                            <div class="col-md-8">
                                                {{ Form::text('slack_webhook', isset($settings['slack_webhook']) ? $settings['slack_webhook'] : '', ['class' => 'form-control w-100', 'placeholder' => __('Enter Slack Webhook URL'), 'required' => 'required']) }}
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-4 mb-2">
                                            <h4 class="small-title">{{ __('Module Settings') }}</h4>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('New Rotas') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('rotas_notification', '1', isset($settings['rotas_notification']) && $settings['rotas_notification'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'rotas_notification']) }}
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('Cancle Rotas') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('rotas_cancle_notificaation', '1', isset($settings['rotas_cancle_notificaation']) && $settings['rotas_cancle_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'rotas_cancle_notificaation']) }}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('Rotas Time Change') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('rotas_time_change_notificaation', '1', isset($settings['rotas_time_change_notificaation']) && $settings['rotas_time_change_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'rotas_time_change_notificaation']) }}
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="text-dark"> {{ __('Days Off') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('days_off_notificaation', '1', isset($settings['days_off_notificaation']) && $settings['days_off_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'days_off_notificaation']) }}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('New Availability') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('availability_create_notificaation', '1', isset($settings['availability_create_notificaation']) && $settings['availability_create_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'availability_create_notificaation']) }}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end border-0 p-0">
                                        <input class="btn btn-primary" type="submit" value="Save Chnages">
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>

                            <div id="Telegram_Setting" class="card text-white">
                                <div class="card-header">
                                    <h5>{{ __('Telegram Settings') }}</h5>
                                    <small class="text-muted">{{ __('Edit your Telegram settings') }}</small>
                                </div>
                                <div class="card-body">
                                   
                                    {{ Form::open(['route' => 'telegram.setting', 'id' => 'telegram-setting', 'method' => 'post', 'class' => 'd-contents']) }}
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{ Form::label('telegrambot', __('Telegram Access Token'), ['class' => 'form-label h6']) }}
                                                {{ Form::text('telegrambot', isset($settings['telegrambot']) ? $settings['telegrambot'] : '', ['class' => 'form-control active telegrambot', 'placeholder' => '1234567890:AAbbbbccccddddxvGENZCi8Hd4B15M8xHV0']) }}
                                                <p class="text-dark">{{ __('Get Chat ID') }} :
                                                    https://api.telegram.org/bot-TOKEN-/getUpdates</p>
                                                @if ($errors->has('telegrambot'))
                                                    <span class="invalid-feedback d-block">
                                                        {{ $errors->first('telegrambot') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{ Form::label('telegramchatid', __('Telegram Chat Id'), ['class' => 'form-label h6']) }}
                                                {{ Form::text('telegramchatid', isset($settings['telegramchatid']) ? $settings['telegramchatid'] : '', ['class' => 'form-control active telegramchatid', 'placeholder' => '123456789']) }}
                                                @if ($errors->has('telegramchatid'))
                                                    <span class="invalid-feedback d-block">
                                                        {{ $errors->first('telegramchatid') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-4 mb-2">
                                            <h4 class="small-title">{{ __('Module Settings') }}</h4>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('New Rotas') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('telegram_rotas_notification', '1', isset($settings['telegram_rotas_notification']) && $settings['telegram_rotas_notification'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'telegram_rotas_notification']) }}
                                                        <label class="custom-control-label"
                                                            for="telegram_rotas_notification"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('Cancle Rotas') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('telegram_rotas_cancle_notificaation', '1', isset($settings['telegram_rotas_cancle_notificaation']) && $settings['telegram_rotas_cancle_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'telegram_rotas_cancle_notificaation']) }}
                                                        <label class="custom-control-label"
                                                            for="telegram_rotas_cancle_notificaation"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('Rotas Time Change') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('telegram_rotas_time_change_notificaation', '1', isset($settings['telegram_rotas_time_change_notificaation']) && $settings['telegram_rotas_time_change_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'telegram_rotas_time_change_notificaation']) }}
                                                        <label class="custom-control-label"
                                                            for="telegram_rotas_time_change_notificaation"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="text-dark"> {{ __('Days Off') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('telegram_days_off_notificaation', '1', isset($settings['telegram_days_off_notificaation']) && $settings['telegram_days_off_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'telegram_days_off_notificaation']) }}
                                                        <label class="custom-control-label"
                                                            for="telegram_days_off_notificaation"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('New Availability') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('telegram_availability_create_notificaation', '1', isset($settings['telegram_availability_create_notificaation']) && $settings['telegram_availability_create_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'telegram_availability_create_notificaation']) }}
                                                        <label class="custom-control-label"
                                                            for="telegram_availability_create_notificaation"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end border-0 p-0">
                                        <input class="btn btn-primary" type="submit" value="Save Changes">
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>


                            <div id="Pusher_Setting" class="card">
                        {{ Form::model($settings, ['route' => ['pusher.setting'], 'method' => 'POST', 'class' => 'permission_table_information', 'enctype' => 'multipart/form-data']) }}
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <h5 class="">{{ __('Pusher Settings') }}</h5>
                                    <small
                                        class="text-secondary font-weight-bold">{{ __('Edit Pusher settings') }}</small>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 text-end">
                                    <input type="hidden" name="is_mercado_enabled" value="off">
                                    <input type="checkbox" name="enable_chat" id="enable_chat" data-toggle="switchbutton"
                                        data-onstyle="primary"
                                        {{ !empty(env('ENABLE_CHAT')) && env('ENABLE_CHAT') == 'on' ? 'checked="checked"' : '' }}>
                                    <label class="custom-label form-label" for="enable_chat"></label>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {{ Form::label('', __('Pusher App Id'), ['class' => 'form-label text-dark']) }}
                                        {{ Form::text('pusher_app_id', env('PUSHER_APP_ID'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Pusher App Id')]) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('', __('Pusher App Key'), ['class' => 'form-label text-dark']) }}
                                        {{ Form::text('pusher_app_key', env('PUSHER_APP_KEY'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Pusher App Key')]) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('', __('Pusher App Secret'), ['class' => 'form-label text-dark']) }}
                                        {{ Form::text('pusher_app_secret', env('PUSHER_APP_SECRET'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Pusher App Secret')]) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('', __('Pusher App Cluster'), ['class' => 'form-label text-dark']) }}
                                        {{ Form::text('pusher_app_cluster', env('PUSHER_APP_CLUSTER'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Pusher App Cluster')]) }}
                                    </div>
                                </div>
                                <div class="card-footer text-end py-0 pe-2 border-0">
                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>

                    <div id="ReCaptcha_Setting" class="card">
                        <form method="POST" action="{{ route('recaptcha.settings.store') }}" accept-charset="UTF-8">
                            @csrf
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <h5>{{ __('ReCaptcha Settings') }}</h5>
                                        <small class="text-muted"><a
                                                href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/"
                                                target="_blank" class="text-blue">
                                                <small>({{ __('How to Get Google reCaptcha Site and Secret key') }})</small>
                                            </a> </small>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 text-end">
                                        <input type="checkbox" name="recaptcha_module" id="recaptcha_module"
                                            data-toggle="switchbutton" value="yes" data-onstyle="primary"
                                            {{ env('RECAPTCHA_MODULE') == 'yes' ? 'checked="checked"' : '' }}>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="google_recaptcha_key"
                                                class="form-label text-dark">{{ __('Google Recaptcha Key') }}</label>
                                            <input class="form-control"
                                                placeholder="{{ __('Enter Google Recaptcha Key') }}"
                                                name="google_recaptcha_key" type="text"
                                                value="{{ env('NOCAPTCHA_SITEKEY') }}" id="google_recaptcha_key">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="google_recaptcha_secret"
                                                class="form-label text-dark">{{ __('Google Recaptcha Secret') }}</label>
                                            <input class="form-control "
                                                placeholder="{{ __('Enter Google Recaptcha Secret') }}"
                                                name="google_recaptcha_secret" type="text"
                                                value="{{ env('NOCAPTCHA_SECRET') }}" id="google_recaptcha_secret">
                                        </div>
                                    </div>
                                    <div class="col-lg-12  text-end">
                                        <input type="submit" value="{{ __('Save Changes') }}" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                            <div id="Storage_Setting" class="card mb-3">
                    {{ Form::open(array('route' => 'storage.setting.store', 'enctype' => "multipart/form-data")) }}
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <h5 class="">{{ __('Storage Settings') }}</h5>
                                    <small class="text-muted">{{ __('Edit storage settings') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="pe-2">
                                
                                    <input type="radio" class="btn-check" name="storage_setting" id="local-outlined" autocomplete="off" {{  $settings['storage_setting'] == 'local'?'checked':'' }} value="local" checked>
                                    <label class="btn btn-outline-success" for="local-outlined">{{ __('Local') }}</label>
                                </div>
                                <div  class="pe-2">
                                    <input type="radio" class="btn-check" name="storage_setting" id="s3-outlined" autocomplete="off" {{  $settings['storage_setting']=='s3'?'checked':'' }}  value="s3">
                                    <label class="btn btn-outline-success" for="s3-outlined"> {{ __('AWS S3') }}</label>
                                </div>
    
                                <div  class="pe-2">
                                    <input type="radio" class="btn-check" name="storage_setting" id="wasabi-outlined" autocomplete="off" {{  $settings['storage_setting']=='wasabi'?'checked':'' }} value="wasabi">
                                    <label class="btn btn-outline-success" for="wasabi-outlined">{{ __('Wasabi') }}</label>
                                </div>
                            </div>
                            
                            <div class="local-setting row">
                                {{-- <h4 class="small-title">{{ __('Local Settings') }}</h4> --}}
                                <div class="form-group col-8 switch-width">
                                    {{Form::label('local_storage_validation',__('Only Upload Files'),array('class'=>' form-label')) }}
                                        <select name="local_storage_validation[]" class="form-control multi-select"  id="local_storage_validation"  multiple>
                                            @foreach($file_type as $f)
                                                <option @if (in_array($f, $local_storage_validations)) selected @endif>{{$f}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="local_storage_max_upload_size">{{ __('Max upload size ( In MB)')}}</label>
                                        <input type="number" name="local_storage_max_upload_size" class="form-control" value="{{(!isset($settings['local_storage_max_upload_size']) || is_null($settings['local_storage_max_upload_size'])) ? '' : $settings['local_storage_max_upload_size']}}" placeholder="{{ __('Max upload size') }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="s3-setting row {{  $settings['storage_setting']=='s3'?' ':'d-none' }}">
                                
                                <div class=" row ">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_key">{{ __('S3 Key') }}</label>
                                            <input type="text" name="s3_key" class="form-control" value="{{(!isset($settings['s3_key']) || is_null($settings['s3_key'])) ? '' : $settings['s3_key']}}" placeholder="{{ __('S3 Key') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_secret">{{ __('S3 Secret') }}</label>
                                            <input type="text" name="s3_secret" class="form-control" value="{{(!isset($settings['s3_secret']) || is_null($settings['s3_secret'])) ? '' : $settings['s3_secret']}}" placeholder="{{ __('S3 Secret') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_region">{{ __('S3 Region') }}</label>
                                            <input type="text" name="s3_region" class="form-control" value="{{(!isset($settings['s3_region']) || is_null($settings['s3_region'])) ? '' : $settings['s3_region']}}" placeholder="{{ __('S3 Region') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_bucket">{{ __('S3 Bucket') }}</label>
                                            <input type="text" name="s3_bucket" class="form-control" value="{{(!isset($settings['s3_bucket']) || is_null($settings['s3_bucket'])) ? '' : $settings['s3_bucket']}}" placeholder="{{ __('S3 Bucket') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_url">{{ __('S3 URL')}}</label>
                                            <input type="text" name="s3_url" class="form-control" value="{{(!isset($settings['s3_url']) || is_null($settings['s3_url'])) ? '' : $settings['s3_url']}}" placeholder="{{ __('S3 URL')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_endpoint">{{ __('S3 Endpoint')}}</label>
                                            <input type="text" name="s3_endpoint" class="form-control" value="{{(!isset($settings['s3_endpoint']) || is_null($settings['s3_endpoint'])) ? '' : $settings['s3_endpoint']}}" placeholder="{{ __('S3 Bucket') }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-8 switch-width">
                                        {{Form::label('s3_storage_validation',__('Only Upload Files'),array('class'=>' form-label')) }}
                                        {{-- {{ Form::label('s3_storage_validation', __('Only Upload Files'), ['class' => 'form-label']) }} --}}
                                            <select name="s3_storage_validation[]" class="form-control multi-select" id="s3_storage_validation" multiple>
                                                @foreach($file_type as $f)
                                                    <option @if (in_array($f, $s3_storage_validations)) selected @endif>{{$f}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_max_upload_size">{{ __('Max upload size ( In MB)')}}</label>
                                            <input type="number" name="s3_max_upload_size" class="form-control" value="{{(!isset($settings['s3_max_upload_size']) || is_null($settings['s3_max_upload_size'])) ? '' : $settings['s3_max_upload_size']}}" placeholder="{{ __('Max upload size') }}">
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
    
                            <div class="wasabi-setting row {{  $settings['storage_setting']=='wasabi'?' ':'d-none' }}">
                                <div class=" row ">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_key">{{ __('Wasabi Key') }}</label>
                                            <input type="text" name="wasabi_key" class="form-control" value="{{(!isset($settings['wasabi_key']) || is_null($settings['wasabi_key'])) ? '' : $settings['wasabi_key']}}" placeholder="{{ __('Wasabi Key') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_secret">{{ __('Wasabi Secret') }}</label>
                                            <input type="text" name="wasabi_secret" class="form-control" value="{{(!isset($settings['wasabi_secret']) || is_null($settings['wasabi_secret'])) ? '' : $settings['wasabi_secret']}}" placeholder="{{ __('Wasabi Secret') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_region">{{ __('Wasabi Region') }}</label>
                                            <input type="text" name="wasabi_region" class="form-control" value="{{(!isset($settings['wasabi_region']) || is_null($settings['wasabi_region'])) ? '' : $settings['wasabi_region']}}" placeholder="{{ __('Wasabi Region') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="wasabi_bucket">{{ __('Wasabi Bucket') }}</label>
                                            <input type="text" name="wasabi_bucket" class="form-control" value="{{(!isset($settings['wasabi_bucket']) || is_null($settings['wasabi_bucket'])) ? '' : $settings['wasabi_bucket']}}" placeholder="{{ __('Wasabi Bucket') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="wasabi_url">{{ __('Wasabi URL')}}</label>
                                            <input type="text" name="wasabi_url" class="form-control" value="{{(!isset($settings['wasabi_url']) || is_null($settings['wasabi_url'])) ? '' : $settings['wasabi_url']}}" placeholder="{{ __('Wasabi URL')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="wasabi_root">{{ __('Wasabi Root')}}</label>
                                            <input type="text" name="wasabi_root" class="form-control" value="{{(!isset($settings['wasabi_root']) || is_null($settings['wasabi_root'])) ? '' : $settings['wasabi_root']}}" placeholder="{{ __('Wasabi Bucket') }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-8 switch-width">
                                        {{Form::label('wasabi_storage_validation',__('Only Upload Files'),array('class'=>'form-label')) }}
    
                                        <select name="wasabi_storage_validation[]" class="form-control multi-select" id="wasabi_storage_validation" multiple>
                                            @foreach($file_type as $f)
                                                <option @if (in_array($f, $wasabi_storage_validations)) selected @endif>{{$f}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="wasabi_root">{{ __('Max upload size ( In MB)')}}</label>
                                            <input type="number" name="wasabi_max_upload_size" class="form-control" value="{{(!isset($settings['wasabi_max_upload_size']) || is_null($settings['wasabi_max_upload_size'])) ? '' : $settings['wasabi_max_upload_size']}}" placeholder="{{ __('Max upload size') }}">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                      
                        <div class="col-lg-12  text-end">
                            <input type="submit" value="{{ __('Save Changes') }}" class="btn btn-primary">
                        </div>
                    </div>
                    {{Form::close()}}
                    </div>

                    


                   

                </div>



                        </div>
                    </div>
                    <!-- [ sample-page ] end -->
                </div>
            </div>
        </div>
    </div>
@endsection



@push('pagescript')

<script>
    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '#useradd-sidenav',
        offset: 300,
    })
    $(".list-group-item").click(function(){
        $('.list-group-item').filter(function(){
            return this.href == id;
        }).parent().removeClass('text-primary');
    });

    function check_theme(color_val) {
        $('#theme_color').prop('checked', false);
        $('input[value="' + color_val + '"]').prop('checked', true);
    }

    $(document).on('change','[name=storage_setting]',function(){
    if($(this).val() == 's3'){
        $('.s3-setting').removeClass('d-none');
        $('.wasabi-setting').addClass('d-none');
        $('.local-setting').addClass('d-none');
    }else if($(this).val() == 'wasabi'){
        $('.s3-setting').addClass('d-none');
        $('.wasabi-setting').removeClass('d-none');
        $('.local-setting').addClass('d-none');
    }else{
        $('.s3-setting').addClass('d-none');
        $('.wasabi-setting').addClass('d-none');
        $('.local-setting').removeClass('d-none');
    }
});
</script>

    <script>
        $(document).ready(function() {
            $('#gdpr_cookie').trigger('change');

            var type = window.location.hash.substr(1);
            $('.list-group-item').removeClass('active');
            $('.list-group-item').removeClass('text-primary');
            if (type != '') {
                $('a[href="#' + type + '"]').addClass('active').removeClass('text-primary');
            } else {
                $('.list-group-item:eq(0)').addClass('active').removeClass('text-primary');
            }
        });

        $(document).on('click', '.list-group-item', function() {
            setTimeout(() => {
                $('.list-group-item').removeClass('text-primary');
                var scrollSpy = new bootstrap.ScrollSpy(document.body, {
                    target: '#useradd-sidenav',
                    offset: 300,
                });
            }, 100);
        });

        $(document).on('change', '#gdpr_cookie', function() {
            $('.GDPR_Cookie_Text').hide();
            if ($("#gdpr_cookie").prop('checked') == true) {
                $('.GDPR_Cookie_Text').show();
            }
        });

        function check_theme(color_val) {
            $('input[value="' + color_val + '"]').prop('checked', true);
            $('a[data-value]').removeClass('active_color');
            $('a[data-value="' + color_val + '"]').addClass('active_color');
        }
    </script>

    <script>
         $(document).on("click", '.send_email', function(e) {
            
            e.preventDefault();
            var title = $(this).attr('data-title');

            var size = 'md';
            var url = $(this).attr('data-url');
            if (typeof url != 'undefined') {
                $("#commonModal .modal-title").html(title);
                $("#commonModal .modal-dialog").addClass('modal-' + size);
                $("#commonModal").modal('show');

                $.post(url, {
                    mail_driver: $("#mail_driver").val(),
                    mail_host: $("#mail_host").val(),
                    mail_port: $("#mail_port").val(),
                    mail_username: $("#mail_username").val(),
                    mail_password: $("#mail_password").val(),
                    mail_encryption: $("#mail_encryption").val(),
                    mail_from_address: $("#mail_from_address").val(),
                    mail_from_name: $("#mail_from_name").val(),
                }, function(data) {
                    $('#commonModal .modal-body').html(data); 
                });
            }
        });

        
        $(document).on('submit', '#test_email', function(e) {
            e.preventDefault();
            $("#email_sending").show();
            var post = $(this).serialize();
            var url = $(this).attr('action');
            $.ajax({
                type: "post",
                url: url,
                data: post,
                cache: false,
                beforeSend: function() {
                    $('#test_email .btn-create').attr('disabled', 'disabled');
                },
                success: function(data) {
                    if (data.is_success) {
                        show_toastr('Success', data.message, 'success');
                    } else {
                        show_toastr('Error', data.message, 'error');
                    }
                    $("#email_sending").hide();
                    $('#commonModal').modal('hide');
                },
                complete: function() {
                    $('#test_email .btn-create').removeAttr('disabled');
                },
            });
        });
    </script>
@endpush

