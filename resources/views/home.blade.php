@extends('layouts.main')

@section('page-title')
    {{ __('Dashboard') }}
@endsection

@section('content')
    <style>
        .fc-event,
        .fc-event:not([href]) {
            border: none;
        }

    </style>
    <div class="dash-container">
        <div class="dash-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center mobile-screen justify-content-between">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Dashboard') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Dashboard') }}</li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 d-flex align-items-center  justify-content-end">
                            @if (Auth::user()->type != 'employee')
                                <div class="btn card-option w-10">
                                    <button type="button" class="btn btn-sm btn-primary btn-icon m-1"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti ti-filter" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="{{ __('Filter Role') }}"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        @if (!empty($roles))
                                            <a class="dropdown-item" data-roll="no_role" onclick="filter_role('no_role')">
                                                <i class="ti ti-circle" style="color: #8492a6;"></i>
                                                {{ __('Without Role') }}
                                            </a>
                                            @foreach ($roles as $role)
                                                <a class="dropdown-item" data-roll="{{ $role['id'] }}"
                                                    onclick="filter_role({{ $role['id'] }})">
                                                    {!! $role['name'] !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="btn card-option w-10">
                                    <button type="button" class="btn btn-sm btn-primary btn-icon m-1"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti ti-flag" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="{{ __('Filter Role') }}"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end calender_locatin_list">
                                        <a class="dropdown-item calender_location_active" data-location='0'
                                            onclick="filter_location(0)">{{ __('Select All') }}</a>
                                        @foreach ($locations as $location)
                                            <a class="dropdown-item" data-location='{{ $location['id'] }}'
                                                onclick="filter_location({{ $location['id'] }})">{{ $location['name'] }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="btn card-option">
                                <button type="button" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="ti ti-dots-vertical" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="{{ __('View') }}"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ url('year') }}"
                                        class="dropdown-item {{ Request::segment(1) == 'year' ? 'calender_active' : '' }}"
                                        onclick="window.location.href=this;">{{ __('Yearly View') }}</a>
                                    <a href="{{ url('dashboard') }}"
                                        class="dropdown-item {{ Request::segment(1) == 'dashboard' ? 'calender_active' : '' }}"
                                        onclick="window.location.href=this;">{{ __('Monthly View') }}</a>
                                    <a href="{{ url('day') }}"
                                        class="dropdown-item {{ Request::segment(1) == 'day' ? 'calender_active' : '' }}"
                                        onclick="window.location.href=this;">{{ __('Daily View') }}</a>
                                    <a href="{{ url('user-view') }}"
                                        class="dropdown-item {{ Request::segment(1) == 'user' ? 'calender_active' : '' }}"
                                        onclick="window.location.href=this;">{{ __('User View') }}</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Calendar') }}</h5>
                        </div>
                        <div class="card-body callne">
                            <div id='calendar' class='calendar' data-toggle="calendar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Current Month events') }}</h5>
                        </div>
                        <div class="card-body table-scroll" style="height: 837px; overflow:auto;">
                            <ul class="event-cards list-group list-group-flush w-100">
                                @forelse ($current_month_rotas as $item)
                                {{-- @dd($item) --}}
                                <li class="list-group-item card mb-3" data_role_id="{{ !empty($item->role_id) ? $item->role_id : 'no_role' }}">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto mb-3 mb-sm-0">
                                            <div class="d-flex align-items-center">
                                                <div class="theme-avtar bg-warning" style="background-color: {{ (!empty($item->getrotarole->color)) ? $item->getrotarole->color : '#8492a6' }} !important">
                                                    <i class="ti ti-building-bank"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="m-0">
                                                        {{-- @dd($item->getrotauser->first_name) --}}
                                                        {{ $item->getrotauser->first_name }}
                                                        <small class="text-muted text-xs">
                                                            {{ $item->getrotalocation->name }}
                                                        </small>
                                                    </h6>
                                                    <small class="text-muted">
                                                        {{ date("Y M d", strtotime($item->rotas_date)) }}
                                                        {{ date("h:i A", strtotime($item->start_time)) }}                                                        
                                                         {{ __('To') }} 
                                                        {{ date("h:i A", strtotime($item->end_time)) }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>                                    
                                @empty
                                <li class="list-group-item card mb-3">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto mb-3 mb-sm-0">
                                            <div class="d-flex align-items-center">
                                                {{ __('No Rotas Found.') }}
                                            </div>
                                        </div>
                                    </div>
                                </li>      
                                @endforelse
                            </ul>
                    </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection

@push('pagescript')
    <script src="{{ asset('assets\js\plugins\main.min.js') }}"></script>
    <script>

        var feed_calender = {!! $feed_calender !!};

        function filter_role(role_id = 0) {

            $('#calendar').find('.badge1').show();
            if (role_id != 0) {
                $('#calendar').find('.badge1').hide();
                $('#calendar').find('.badge1[data_role_id="' + role_id + '"]').show();
                $('.next-event').find('.list-group-item').hide();
                $('.next-event').find('.list-group-item[data_role_id="' + role_id + '"]').show();
            }
            $('.calender_role_list a').removeClass('calender_role_active');
            $('.calender_role_list a[data-roll="' + role_id + '"]').addClass('calender_role_active');
        }

        function filter_location(location_id = 0) {
            var data = {
                location_id: location_id,
            }

            $.ajax({
                url: '{{ route('dashboard.location_filter') }}',
                method: 'post',
                data: data,
                success: function(data) {
                    var feed_calender = data;


                    $('.calender_locatin_list a').removeClass('calender_location_active');
                    $('.calender_locatin_list a[data-location="' + location_id + '"]').addClass(
                        'calender_location_active');

                    $('#calendar').remove();
                    $('.callne').html("<div id='calendar' class='calendar' data-toggle='calendar'></div>");

                    calenderrr(feed_calender);
                }
            });
        }

        $(document).ready(function() {
            $(this).find('.fc-daygrid-block-event').removeClass("fc-daygrid-event");
            calenderrr(feed_calender)

            // $(this).find('.fc-daygrid-block-event').removeClass("fc-daygrid-event");
        });

        function calenderrr(feed_calender) {
            var etitle;
            var etype;
            var etypeclass;

            var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                buttonText: {
                    timeGridDay: "{{__('Day')}}",
                    timeGridWeek: "{{__('Week')}}",
                    dayGridMonth: "{{__('Month')}}"
                },
                themeSystem: 'bootstrap',
                slotDuration: '00:10:00',

                navLinks: false,
                droppable: false,
                selectable: false,
                selectMirror: true,
                editable: false,
                dayMaxEvents: true,
                handleWindowResize: true,
                disableDragging: true,
                eventStartEditable: false,
                events: feed_calender,
                eventContent: function(event, element, view) {
                    var customHtml = event.event._def.extendedProps.html;
                    return {
                        html: customHtml
                    }
                }


            });
            calendar.render();
        }
    </script>
@endpush
