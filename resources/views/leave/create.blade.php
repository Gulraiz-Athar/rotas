{{ Form::open(['url' => 'holidays', 'enctype' => 'multipart/form-data' ]) }}
    <div class="row">
        <div class="col-sm-12 col-md-7 col-sm-7">
            <div class="form-group">
                {{ Form::label('', __('Employee'), ['class' => 'form-label']) }}
                @if(Auth::user()->acount_type == 3 || Auth::user()->acount_type == 2)
                    {!! Form::select('user_id[]', $employees_select, null, ['required' => true, 'id'=>'choices-multiple-employee' ,'class'=> 'form-control multi-select new_cutom_work']) !!}
                @else 
                {{-- {!! Form::select('user_id[]', $employees_select, null, ['required' => true, 'multiple' => 'multiple', 'id'=>'choices-multiple-location_id' ,'class'=> 'form-control multi-select']) !!} --}}
                    {!! Form::select('user_id[]', $employees_select, null, ['required' => true, 'id'=>'choices-multiple-location_id' ,'class'=> 'form-control multi-select new_cutom_work']) !!}
                @endif
                
            </div>
        </div>

        <div class="col-sm-12 col-md-5 col-lg-5">
            <div class="form-group">
                {{ Form::label('', __('Type'), ['class' => 'form-label']) }}                
                {!! Form::select('leave_type', ['1' => 'Holiday', '2' => 'Other Leave'], null, ['required' => true, 'id'=>'choices-multiple-employee' ,'class'=> 'form-control multi-select']) !!}
            </div>
        </div>
        <div class="col-md-6 date_for_hours">
            <div class="form-group">
                {{ Form::label('', __('Start Date'), ['class' => 'form-label for_days']) }} 
                {{ Form::label('', __('Date'), ['class' => 'form-label for_hours']) }}                
                {{ Form::date('start_date', null, ['class' => 'form-control leave_date_start' , 'required' => '']) }}
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 for_days">
            <div class="form-group">
                {{ Form::label('', __('End Date'), ['class' => 'form-label']) }}                
                {{ Form::date('end_date', null, ['class' => 'form-control leave_date_due', 'required' => '']) }}
            </div>
        </div>
        @if(Auth::user()->acount_type == 1)
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">                
                {{ Form::label('', __(''), ['class' => 'form-label']) }}
                <div class="form-check form-switch">
                    <input type="checkbox" name="paid_status" value="paid" class="form-check-input input-primary" id="customCheckdef4">
                    <label class="form-check-label" for="customCheckdef4">{{__('Unpaid/Paid')}}</label>
                </div>
                
            </div>
        </div>
        @endif
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                {{ Form::label('', __('Days'), ['class' => 'form-label for_days']) }}
                {{ Form::label('', __('Total Hours'), ['class' => 'form-label for_hours', 'style' => 'display:none']) }}
                {{ Form::number('days', null, ['class' => 'form-control leave_days reset_field', 'readonly' => true , 'required' => false]) }}
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
        </div>
        {{ Form::label('', __('Duration'), ['class' => 'form-control-label']) }}
        <div class="form-group">
            {{ Form::radio('duration', '1', false, ['required' => true, 'class' => 'leave_duration for_days', 'data_value' => 'full']) }}
            {{ Form::label('', __('Full'), ['class' => 'form-control-label for_days']) }}
            {{ Form::radio('duration', '0.5', false, ['required' => true, 'class' => 'leave_duration for_days', 'data_value' => 'half']) }}
            {{ Form::label('', __('AM'), ['class' => 'form-control-label for_days']) }}
            {{ Form::radio('duration', '0.5', false, ['required' => true, 'class' => 'leave_duration for_days', 'data_value' => 'half']) }}
            {{ Form::label('', __('PM'), ['class' => 'form-control-label for_days']) }}
            {{ Form::radio('duration', '0.1', false, ['required' => true, 'class' => 'leave_duration hours_check for_hours', 'data_value' => 'hour']) }}
            {{ Form::label('', __('Hour'), ['class' => 'form-control-label for_hours']) }}
            
        </div>
    </div>
        <div class="col-sm-12 col-md-12 col-lg-12 total_daily_hour_outer">
            <div class="form-group">
                <input type="hidden" name="leave_time_type" value="total">
                {{-- {{ Form::label('', __('Record Hours'), ['class' => 'form-label']) }}
                {!! Form::select('leave_time_type', ['total' => 'Total', 'daily' => 'Daily'], null, ['required' => true, 'class'=> 'form-control multi-select total_daily_hour', 'id'=>'choices-multiple-leave-type' ]) !!}   --}}              
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 for_hours" style="display: none;">
            <div class="form-group total_all_hour">
                {{ Form::label('', __('Hours'), ['class' => 'form-label']) }}
                {{ Form::number('leave_time1', null, ['class' => 'form-control hour_number forC_hours reset_field', 'required' => false]) }}                
            </div>
            <div class="form-group for_hours" style="display: none;">
                {{ Form::label('', __('Minutes'), ['class' => 'form-label']) }}
                {{ Form::number('minuts', null, ['class' => 'form-control hour_minuts reset_field']) }}                
            </div>
            {{-- <div class="form-group total_date_hour" style="display: none;">                            
                <span class="clearfix"></span>
            </div> --}}
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                {{ Form::label('', __('Message'), ['class' => 'form-label']) }}                
                {{ Form::textarea('message', null, ['class' => 'form-control autogrow' ,'rows'=>'2' ,'style'=>'resize: none']) }}                
            </div>
        </div>
        <div class="col-12">
            <div class="modal-footer border-0 p-0">
                <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" class="btn  btn-primary">{{ __('Create') }}</button>                
            </div>
        </div>
    </div>
{{ Form::close() }}



<script>
    $(document).on('keyup', '.hour_number', function(e){
        let duration = $('input[name="duration"]:checked').attr('data_value');
        let hours = $(this).val();
        if(duration !== undefined && duration == 'hour' && hours < 10){
            let update_number = (0.1*hours).toFixed(1);
            $('input[name="duration"]:checked').val(update_number);
            $('.leave_days').attr('value', update_number);
            $('.leave_days').attr('data-value',update_number);
        }
        if(duration !== undefined && duration == 'hour' && hours > 9){
            let update_number = (0.01*hours).toFixed(2);
            $('input[name="duration"]:checked').val(update_number);
            $('.leave_days').attr('value', update_number);
            $('.leave_days').attr('data-value',update_number);
        }

    });

    $(document).on('keyup', '.hour_type_user', function(e){
            let update_number = $(this).val();
            $('.leave_days').val(update_number);
            $('.leave_days').attr('data-value',update_number);
        
    });

    $(document).on('keyup', '.hour_minuts', function(e){
            let minuts = $(this).val();
            let hours = 0;
            if($('.forC_hours').val() != ''){
              hours = $('.forC_hours').val();
            }

            let min_per = minuts/60;
            update_number = parseInt(hours) + min_per;

            if(minuts != ''){
                $('.leave_days').val(update_number.toFixed(2));
                $('.leave_days').attr('data-value',update_number.toFixed(2));

            }else{
                $('.leave_days').val(hours);
                $('.leave_days').attr('data-value',hours);
            } 
        
    });

    

    $(document).on('change', '.new_cutom_work', function(){
        var user_id = $(this).val();
        $('.reset_field').val('');
        $.ajax({
            url: "{{ url('/get_user_holiday_type') }}",
            method: 'POST',
            data: {_token: '{{ csrf_token() }}', user_id: user_id},
            success: function(result){
                if(result == 'hour'){
                    $('.for_days').hide();
                    $('.for_hours').show();
                    $( ".hours_check" ).prop( "checked", true );
                    $('.forC_hours').removeClass('hour_number');
                    $('.forC_hours').addClass('hour_type_user');
                    $('.total_daily_hour_outer').hide();
                    $('.total_daily_hour').removeAttr('required');
                    $('.date_for_hours').addClass('col-md-12');
                    $('.date_for_hours').removeClass('col-md-6');
                    
                     
                }else{
                    $('.for_days').show();
                    $('.for_hours').hide();
                    $( ".hours_check" ).prop( "checked", false );
                    $('.forC_hours').addClass('hour_number');
                    $('.forC_hours').removeClass('hour_type_user');
                    $('.total_daily_hour_outer').show();
                    $('.total_daily_hour').attr('required','required');
                    $('.date_for_hours').addClass('col-md-6');
                    $('.date_for_hours').removeClass('col-md-12');
                }
               
          }
      });
    });


    var first_time_user_id = $('.new_cutom_work').val();

    $.ajax({
            url: "{{ url('/get_user_holiday_type') }}",
            method: 'POST',
            data: {_token: '{{ csrf_token() }}', user_id: first_time_user_id},
            success: function(result){
                if(result == 'hour'){
                    $('.for_days').hide();
                    $('.for_hours').show();
                    $( ".hours_check" ).prop( "checked", true );
                    $('.forC_hours').removeClass('hour_number');
                    $('.forC_hours').addClass('hour_type_user');
                    $('.total_daily_hour_outer').hide();
                    $('.total_daily_hour').removeAttr('required');
                    $('.date_for_hours').addClass('col-md-12');
                    $('.date_for_hours').removeClass('col-md-6');
                    
                     
                }else{
                    $('.for_days').show();
                    $('.for_hours').hide();
                    $( ".hours_check" ).prop( "checked", false );
                    $('.forC_hours').addClass('hour_number');
                    $('.forC_hours').removeClass('hour_type_user');
                    $('.total_daily_hour_outer').show();
                    $('.total_daily_hour').attr('required','required');
                    $('.date_for_hours').addClass('col-md-6');
                    $('.date_for_hours').removeClass('col-md-12');
                }
               
          }
      });
 
    
</script>
