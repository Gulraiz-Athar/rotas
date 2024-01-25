@extends('layouts.main')
@section('page-title')
    {{ __('Leave Request') }}
@endsection
@section('content')
<style>
    #commonModal .text-success{
        color: #293240 !important;
    }
</style>
    <div class="dash-container">
        <div class="dash-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Leave Request') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Leave Request') }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-right">
                            @if (Auth::user()->acount_type == 1 || Auth::user()->acount_type == 2)
                                <div class="btn-group card-option">
                                    <button type="button" class="btn btn-sm btn-primary btn-icon m-1"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti ti-dots-vertical" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="" data-bs-original-title="Menu" aria-label="Menu"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <a href="{{ url('holidays') }}" onclick="window.location.href=this;"
                                            class="dropdown-item" id="view_employee">{{ __('View All Leave') }}</a>
                                        @if (Auth::user()->acount_type == 1 || $haspermission['embargoes'] == 1)
                                            <a href="{{ url('embargoes') }}" onclick="window.location.href=this;"
                                                class="dropdown-item" id="removed_employee">{{ __('Embargoes') }}</a>
                                        @endif

                                        @if (Auth::user()->acount_type == 1)
                                            <a href="{{ url('rules') }}" onclick="window.location.href=this;"
                                                class="dropdown-item d-none"
                                                id="edit_group">{{ __('Request Rules') }}</a>
                                        @endif

                                        @if (Auth::user()->acount_type == 1 || $haspermission['leave_request'] == 1)
                                            <a href="{{ url('leave-request') }}" onclick="window.location.href=this;"
                                                class="dropdown-item" id="edit_group">{{ __('Leave Request') }}</a>
                                        @endif
                                        <a href="{{ url('holidays/monthly') }}" onclick="window.location.href=this;"
                                            class="dropdown-item " id="edit_group">{{ __('Monthly Leaves View') }}</a>
                                        <a href="{{ url('holidays/yearly') }}" onclick="window.location.href=this;"
                                            class="dropdown-item " id="edit_group">{{ __('Yearly Leaves View') }}</a>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header card-body table-border-style">
                            <h5></h5>
                            <div class="table-responsive">
                                <table class="table mb-0 pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th scope="sort">{{ __('Employee') }}</th>
                                            <th scope="sort">{{ __('Message') }}</th>
                                            <th scope="sort">{{ __('Requested') }}</th>
                                            <th scope="sort">{{ __('Used Holidays') }}</th>
                                            <th scope="sort">{{ __('Remaining Holidays') }}</th>
                                            <th scope="sort"></th>
                                            <th scope="sort" class="text-end">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($leave_requests) && count($leave_requests) > 0)
                                            @foreach ($leave_requests as $leave_request)
                                                <tr>
                                                    <td>
                                                        <h6 class="m-0">
                                                            {{ $leave_request->getUserIdName->first_name }}
                                                            {{ $leave_request->getUserIdName->last_name }}
                                                        </h6>
                                                        <small><b>{{!empty($leave_request->getRequestdateFormet())?$leave_request->getRequestdateFormet():'' }}</b></small>
                                                    </td>
                                                    <td> {{ $leave_request->message }} </td>
                                                    <td> {{ !empty($leave_request->getRequestdateFormet())?$leave_request->getRequestdateFormet():'' }} </td>
                                                    <td><span class="create_time_sheet">{!! $leave_request->getUserIdName->getUsedHoliday($leave_request->getUserIdName->id) !!}</span></td>
                                                    <td><span class="create_time_sheet">{!! $leave_request->getUserIdName->getRemaingHoliday($leave_request->getUserIdName->id) !!}</span></td>
                                                    <td> {!! $leave_request->getRequestResponse() !!} </td>
                                                    <td class="Action text-end">
                                                        <span>
                                                            {{-- Reply By Admin --}}
                                                            <div class="action-btn btn-primary ms-2 {{!empty($leave_request->getRequestdateFormet())?$leave_request->getRequestdateFormet():'' }}" >
                                                                <a href="#"
                                                                    data-url="{{ route('leave-request.reply', $leave_request->id) }}"
                                                                    data-size="lg" data-ajax-popup="true"
                                                                    data-title="{{ __('Leave Request Reply') }}"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                    <i class="ti ti-arrow-forward-up text-white"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ __('Reply') }}"></i>
                                                                </a>
                                                            </div>
                                                             @if (Auth::user()->acount_type == 1)
                                                            <div class="action-btn btn-info ms-2 {{!empty($leave_request->getRequestdateFormet())?$leave_request->getRequestdateFormet():'' }}" >
                                                                <a href="#"
                                                                    data-url="{{ route('leave-request.edit', $leave_request->id) }}"
                                                                    data-size="lg" data-ajax-popup="true"
                                                                    data-title="{{ __('Edit Request') }}"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                    <i class="ti ti-pencil text-white"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ __('Edit') }}"></i>
                                                                </a>
                                                            </div>
                                                            @endif

                                                            <div class="action-btn btn-danger ms-2 btn_delete {{!empty($leave_request->getRequestdateFormet())?$leave_request->getRequestdateFormet():'' }}" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ __('Delete') }}">
                                                                {!! Form::open(['method' => 'DELETE', 'route' => ['leave-request.destroy', $leave_request->id]]) !!}
                                                                <a href="#!"
                                                                    class="mx-3 btn btn-sm ">
                                                                    <i class="ti ti-trash text-white"></i>
                                                                </a>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </span>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4">
                                                    <div class="text-center">
                                                        <i class="fas fa-user-slash text-primary fs-40"></i>
                                                        <h2>{{ __('Opps...') }}</h2>
                                                        <h6> {!! __('No leave request found...!') !!} </h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<div class="modal fade" tabindex="-1" role="dialog" id="fire_modal">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Are You Sure?</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background: none; border: 0;">
          <span aria-hidden="true">�</span>
        </button>
      </div>
      <div class="modal-body"> This action can not be undone. Do you want to continue?
        <div id="del_form"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger rounded-pill" id="form_submit">Yes</button>
        <button type="button" class="btn btn-sm btn-secondary rounded-pill close" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
      </div>
    </div>
  </div>
</div>



@endsection

@push('pagescript')
    <script>
        $(document).ready(function() {


        $('.btn_delete').on('click', function(){

          let form = $(this).html();

          $('#fire_modal').modal('show');

          $('#del_form').html('');
          $('#del_form').html(form);


        });


        $('#form_submit').on('click', function(){

          $('#del_form form').submit();


        });

        });

    </script>
@endpush
