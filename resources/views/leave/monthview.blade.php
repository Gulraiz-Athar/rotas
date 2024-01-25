@extends('layouts.main')

@section('page-title')
    {{ __('Monthly View') }}
@endsection

@section('content')
<style>
    .badge {
        display: block;
        padding-left: 0;
        padding-right: 0;
        width: 100%;
    }
    .badge-soft-info, div.badge-soft-warning{
        color: #000;
    }
    .fc .fc-toolbar.fc-header-toolbar{
        display: none;
    }
    .fc-event:has(> div.badge-soft-warning) { 
         border-color: orange !important;
     }

</style>
@php
$setting = App\Models\Utility::colorset();
$color = 'theme-3';
if (!empty($setting['color'])) {
    $color = $setting['color'];
    
}
@endphp

@if($color=="theme-1")
<style>
    .fc-widget-header{
         background: linear-gradient(141.55deg, rgba(81, 69, 157, 0) 3.46%, rgba(255, 58, 110, 0.6) 99.86%), #51459d !important;
     }
     
     .fc-event:has(> div.badge-soft-info) { 
         border-color:#51459d  !important;
     }
</style>
@elseif($color=="theme-2")
<style>
    .fc-widget-header{
        background: linear-gradient(141.55deg, rgba(81, 69, 157, 0) 3.46%, #4ebbd3 99.86%), #1f3996 !important;
     }
     
      .fc-event:has(> div.badge-soft-info) { 
         border-color:#1f3996 !important;
     }
</style>

@elseif($color=="theme-3")
<style>
    .fc-widget-header{
         background: linear-gradient(141.55deg, #6fd943 3.46%, #6fd943 99.86%), #6fd943 !important;
     }
     
      .fc-event:has(> div.badge-soft-info) { 
         border-color:#6fd943 !important;
     }
</style>

@elseif($color=="theme-4")
<style>
    .fc-widget-header{
         background: linear-gradient(141.55deg, rgba(104, 94, 229, 0) 3.46%, #685ee5 99.86%), #584ed2 !important;
     }
     .fc-event:has(> div.badge-soft-info) { 
         border-color:#584ed2 !important;
     }
</style>
@endif

<div class="dash-container">
    <div class="dash-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h4 class="m-b-10">{{ __('Monthly View') }}</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item">{{ __('Monthly View') }}</li>
                        </ul>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end text-right"></div>
                </div>
            </div>
        </div>
        

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-8">
                                
                                <h5 class="fullcalendar-title h4 d-inline-block font-weight-400 mb-0 text-black">{{ _('Calendar') }}
                    </h5> &nbsp;&nbsp;
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="#" class="fullcalendar-btn-prev btn btn-sm btn-neutral">
                                <i class="fa fa-caret-left weak-prev-left weak-prev1 weak_go1 bg-primary"></i>
                            </a>
                            <a href="#" class="fullcalendar-btn-next btn btn-sm btn-neutral">
                                <i class="fa fa-caret-right weak-prev-left weak-left1 weak_go1 bg-primary"></i>
                            </a>
                        </div>

                            </div>                            
                            <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-end">
                                <div class="rotas_filter_main_div">                                                                                                     
                                    
                    <div class="btn-group card-option">
                        <button type="button" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti ti-dots-vertical" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Menu" aria-label="Menu"></i>
                        </button>
                            <div class="dropdown-menu dropdown-menu-end" style="">

                                <a href="{{ url('holidays') }}" onclick="window.location.href=this;"
                                    class="dropdown-item" id="view_employee">{{ __('View All Leave') }}</a>
                                @if (Auth::user()->acount_type == 2 || Auth::user()->acount_type == 1)
                                    <a href="{{ url('embargoes') }}" onclick="window.location.href=this;"
                                        class="dropdown-item" id="removed_employee">{{ __('Embargoes') }}</a>
                                @endif

                                @if (Auth::user()->acount_type == 1)
                                    <a href="{{ url('rules') }}" onclick="window.location.href=this;"
                                        class="dropdown-item d-none" id="edit_group">{{ __('Request Rules') }}</a>
                                @endif

                                @if (Auth::user()->acount_type == 2 ||Auth::user()->acount_type == 1 )
                                    <a href="{{ url('leave-request') }}" onclick="window.location.href=this;"
                                        class="dropdown-item" id="edit_group">{{ __('Leave Request') }}</a>
                                @endif

                                    <a href="{{ url('holidays/monthly') }}" onclick="window.location.href=this;"
                                        class="dropdown-item " id="edit_group">{{ __('Monthly Leaves View') }}</a>
                                    <a href="{{ url('holidays/yearly') }}" onclick="window.location.href=this;"
                                        class="dropdown-item " id="edit_group">{{ __('Yearly Leaves View') }}</a>

                            
                            </div>
                            </div>

                            <div class="btn btn-sm btn-primary btn-icon m-1">
                                <a href="#" data-size="lg" data-ajax-popup="true" data-title="{{ __('Add Employee Leave') }}" data-url="{{ route('holidays.create') }}">
                                    <i class="ti ti-plus text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Add New Leave') }}" data-bs-original-title="{{ __('Add New Leave') }}" aria-label="{{ __('Add New Leave') }}"></i>
                                </a>
                            </div>       
                                </div>
                            </div>
                                                            
                        </div>
                    </div>
                </div>
            </div>            
        </div>


        <div class="page-content">
        
        <div class="row">
            <div class="col">
                <!-- Fullcalendar -->
                <div class="card overflow-hidden">
                    @if (!empty($employees) && count($employees) > 0)
                    <?php dd($employees);  ?>
                        @foreach ($employees as $employee)
                            <div class="text-center" data-id="{{ $employee->id }}">
                                {!! $employee->getHasLeave($employee->id, 0) !!}
                            </div>
                        @endforeach
                    @endif
                    <div class="calendar" data-toggle="calendar1" id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    </div>

    </div>
    
@endsection

{{-- {{ $feed_calender }} --}}
@push('pagescript')
<link rel="stylesheet" href="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.css') }}">
    <script src="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.js') }}"></script>
    <script>
        var feed_calender = {!! $feed_calendar !!};

        function filter_role(role_id = 0) {
            $('#calendar').find('.badge1').show();
            if (role_id != 0) {
                $('#calendar').find('.badge1').hide();
                $('#calendar').find('.badge1[data_role_id="' + role_id + '"]').show();
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
                    feed_calender = data;
                    $('[data-toggle="calendar1"]').fullCalendar('removeEvents');
                    $('[data-toggle="calendar1"]').fullCalendar('addEventSource', feed_calender);
                    $('[data-toggle="calendar1"]').fullCalendar('rerenderEvents');
                    $('.calender_locatin_list a').removeClass('calender_location_active');
                    $('.calender_locatin_list a[data-location="' + location_id + '"]').addClass(
                        'calender_location_active');
                }
            });
        }

        // #Full calendar
        var Fullcalendar = function() {
            var e, t, a = $('[data-toggle="calendar1"]');
            a.length && (t = {
                header: {
                    right: "",
                    center: "",
                    left: ""
                },
                buttonIcons: {
                    prev: "calendar--prev",
                    next: "calendar--next"
                },
                theme: !1,
                selectable: !0,
                firstDay: 1,
                selectHelper: !0,
                editable: !0,
                events: feed_calender,
                eventRender: function(event, element, view) {
                    $('[data-toggle="tooltip"]').tooltip();
                    var new_description = event.html;
                    element.html(new_description);
                },
                dayClick: function(e) {
                    var t = moment(e).toISOString();
                    $("#new-event").modal("show"), $(".new-event--title").val(""), $(".new-event--start")
                        .val(t), $(".new-event--end").val(t)
                },
                viewRender: function(t) {
                    e.fullCalendar("getDate").month(), $(".fullcalendar-title").html(t.title)
                },
                eventClick: function(e, t) {
                    $("#edit-event input[value=" + e.className + "]").prop("checked", !0), $("#edit-event")
                        .modal("show"), $(".edit-event--id").val(e.id), $(".edit-event--title").val(e
                            .title), $(".edit-event--description").val(e.description)
                }
            }, (e = a).fullCalendar(t), $("body").on("click", ".new-event--add", function() {
                var t = $(".new-event--title").val(),
                    a = {
                        Stored: [],
                        Job: function() {
                            var e = Date.now().toString().substr(6);
                            return this.Check(e) ? this.Job() : (this.Stored.push(e), e)
                        },
                        Check: function(e) {
                            for (var t = 0; t < this.Stored.length; t++)
                                if (this.Stored[t] == e) return !0;
                            return !1
                        }
                    };
                "" != t ? (e.fullCalendar("renderEvent", {
                    id: a.Job(),
                    title: t,
                    start: $(".new-event--start").val(),
                    end: $(".new-event--end").val(),
                    allDay: !0,
                    className: $(".event-tag input:checked").val()
                }, !0), $(".new-event--form")[0].reset(), $(".new-event--title").closest(
                    ".form-group").removeClass("has-danger"), $("#new-event").modal("hide")) : ($(
                    ".new-event--title").closest(".form-group").addClass("has-danger"), $(
                    ".new-event--title").focus())
            }), $("body").on("click", "[data-calendar]", function() {
                var t = $(this).data("calendar"),
                    a = $(".edit-event--id").val(),
                    n = $(".edit-event--title").val(),
                    o = $(".edit-event--description").val(),
                    i = $("#edit-event .event-tag input:checked").val(),
                    s = e.fullCalendar("clientEvents", a);
                "update" === t && ("" != n ? (s[0].title = n, s[0].description = o, s[0].className = [i],
                    console.log(i), e.fullCalendar("updateEvent", s[0]), $("#edit-event").modal(
                        "hide")) : ($(".edit-event--title").closest(".form-group").addClass(
                    "has-error"), $(".edit-event--title").focus())), "delete" === t && ($("#edit-event")
                    .modal("hide"), setTimeout(function() {
                        swal({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            type: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonClass: "btn btn-danger",
                            confirmButtonText: "Yes, delete it!",
                            cancelButtonClass: "btn btn-secondary"
                        }).then(function(t) {
                            t.value && (e.fullCalendar("removeEvents", a), swal({
                                title: "Deleted!",
                                text: "The event has been deleted.",
                                type: "success",
                                buttonsStyling: !1,
                                confirmButtonClass: "btn btn-primary"
                            }))
                        })
                    }, 200))
            }), $("body").on("click", "[data-calendar-view]", function(t) {
                t.preventDefault(), $("[data-calendar-view]").removeClass("active"), $(this).addClass(
                    "active");
                var a = $(this).attr("data-calendar-view");
                e.fullCalendar("changeView", a)
            }), $("body").on("click", ".fullcalendar-btn-next", function(t) {
                t.preventDefault(), e.fullCalendar("next")
            }), $("body").on("click", ".fullcalendar-btn-prev", function(t) {
                t.preventDefault(), e.fullCalendar("prev")
            }))
        }();
        
        $(document).on('click','.edit_leavex', function () {
            // alert('dsad');
            $('#commonModal').modal('toggle');
            setTimeout(() => {
                $('.edit_leavex_popup').click();            
            }, 100);
        });
            
        $(document).ready(function() {
        
            $('body').on('click', '.delete_leave_ppp', function() {
                //$( ".delete_leave_form" ).submit();
                loadConfirm();
            });
            $(document).on('click', '.weak_go1', function() {
                ajaxLeaveTimesheetTableView();
            });
        });

        function ajaxLeaveTimesheetTableView() {
            var start_date = $('.week_last_daye1').attr('data-start');
            var end_date = $('.week_last_daye1').attr('data-end');
            var week = $('.week_add_sub1').val();
            var created_by = $('.week_add_sub1').attr('data-created-by');
            var data = {
                start_date: start_date,
                end_date: end_date,
                week: week,
                created_by: created_by,
            }

            $.ajax({
                url: '{{ route('holidays.leave_sheet') }}',
                method: 'post',
                data: data,
                success: function(data) {
                    $('.ajax-table').html(data.table);
                    $('.weak_go_html1').html(data.title);
                }
            });
        }

        function callleaveweekfunction(week = 0) {
            var created_by = $('.week_add_sub1').attr('data-created-by');
            var data = {
                week: week,
                created_by: created_by,
            }

            $.ajax({
                url: '{{ route('holidays.leave_sheet') }}',
                method: 'post',
                data: data,
                success: function(data) {
                    $('.ajax-table').html(data.table);
                    $('.weak_go_html1').html(data.title);
                }
            });
        }
        $(function () {
            $('body').tooltip({
                selector: '[data-bs-toggle="tooltip"]'
            }).click(function () {
                $('[data-bs-toggle="tooltip"]').tooltip("hide");
            });
        });
    </script>
@endpush
