<title>{{ config('chatify.name') }}</title>

{{-- Meta tags --}}
<meta name="route" content="{{ $route }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

 <link href="{{ asset('css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />

  <link href="{{ asset('css/app.css') }}" rel="stylesheet" /> 
 
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

{{-- Messenger Color Style--}}
@include('Chatify::layouts.messengerColor')
