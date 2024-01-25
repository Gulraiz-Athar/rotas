<html>

<head>
</head>

<body>
    <div style="max-width: 500px;background-color:#f8f8f8">
        <h4 style="text-align: center"> {{ __('Leave Request Form.') }} </h4>
        <div style="margin:auto; max-width: 80%">
            <div>
                <div style="border: 1px solid black; padding: 5px">
                    <h4 style="display:inline-block; margin:0%">Employee: </h4>
                    <div style="float:right; display:inline-block;">{{ App\Models\User::find($leave->user_id)->first_name.' '.App\Models\User::find($leave->user_id)->last_name }}</div>
                </div>
                <div style="border: 1px solid black; padding: 5px">
                    <h4 style="display:inline-block; margin:0%">Type: </h4>
                    <div style="float:right; display:inline-block;">{{ ($leave->leave_type == 1)? 'Holiday': 'Other' }}</div>
                </div>
                <div style="border: 1px solid black; padding: 5px">
                    <h4 style="display:inline-block; margin:0%">Start Date: </h4>
                    <div style="float:right; display:inline-block;">{{ $leave->start_date }}</div>
                </div>
                <div style="border: 1px solid black; padding: 5px">
                    <h4 style="display:inline-block; margin:0%">End Date: </h4>
                    <div style="float:right; display:inline-block;">{{ $leave->end_date }}</div>
                </div>
                <div style="border: 1px solid black; padding: 5px">
                    <h4 style="display:inline-block; margin:0%">Paid: </h4>
                    <div style="float:right; display:inline-block;">{{ $leave->paid_status }}</div>
                </div>
                @php
                $profileData = \App\Models\Profile::select('annual_holiday')->where('user_id',$leave->user_id)->first();
                $leave_type_new = __('Days');

                if(!empty($profileData) && !empty($profileData['annual_holiday']))  {
                    $annual_holiday_data_new = json_decode($profileData['annual_holiday'],true);
                    if(!empty($annual_holiday_data_new) && !empty($annual_holiday_data_new['time'])) 
                    {
                        $leave_type_new = ($annual_holiday_data_new['type'] == 'day') ? __('Days') : __('Hours') ;
                    }
                }
                @endphp
                <div style="border: 1px solid black; padding: 5px">
                    <h4 style="display:inline-block; margin:0%">{{ $leave_type_new }}: </h4>
                    <div style="float:right; display:inline-block;">
                        {{ $leave->duration }}
                        {{-- {{ (Carbon\Carbon::parse($leave->start_date)->diffInDays($leave->end_date)+1)*$leave->duration }} --}}
                    </div>
                    {{-- <div style="float:right; display:inline-block;">{{ (Carbon\Carbon::parse($leave->start_date)->diffInDays($leave->end_date)+1)*($leave->duration==1?1:0.5) }}</div> --}}
                </div>
                <div style="border: 1px solid black; padding: 5px">
                    <h4 style="display:inline-block; margin:0%">Duration: </h4>
                    <div style="float:right; display:inline-block;">
                        {{ $leave_type_new }}
                        @php
                         // if($leave->duration == 1 || $leave->duration > 1){
                         //   $show_day = 'Full Day';
                         // }
                         // elseif($leave->duration == 0.5){
                         //    $show_day = 'Half Day('.$leave->duration.')';
                         // }else{
                         //    $show_day = 'Hour ('.$leave->duration.')';
                         // }
                        @endphp
                        {{-- {{ $show_day }} --}}
                        {{-- {{ ($leave->duration==1)?'Full Day':'Half Day('.$leave->duration.')' }} --}}
                    </div>
                </div>
                <div style="border: 1px solid black; padding: 5px">
                    <h4 style="display:inline-block; margin:0%">Created by: </h4>
                    <div style="float:right; display:inline-block;">{{ App\Models\User::find($leave->issue_by)->first_name.' '.App\Models\User::find($leave->issue_by)->last_name }}</div>
                </div>
                <div style="border: 1px solid black; padding: 5px;height:100px">
                    <h4 style="display:inline-block; margin:0%">Message: </h4>
                    <div style="float:right; display:inline-block;">{{ $leave->message }}</div>
                </div>
            </div>
        </div>
    </div>
    <p>
    </p>
    <p>Thanks,</p>
   <p>{{ env('MAIL_FROM_NAME','Admin') }}</p>
</body>

</html>
