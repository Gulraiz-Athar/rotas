{{ Form::open(array('url' => 'contract')) }}
<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('employee', __('Employee Name'),['class' => 'col-form-label']) }}
        {{ Form::select('employee', $employee,null, array('class' => 'form-control  multi-select','id'=>'choices-multiple-employee','required'=>'required')) }}
    </div>
    
       <div class="form-group col-md-6">
          {{ Form::label('contract_name', __('Contract Name'),['class' => 'col-form-label']) }}
          {{ Form::text('contract_name', '', array('class' => 'form-control')) }}
      </div>
      <div class="form-group col-md-6">
          {{ Form::label('subject', __('Subject'),['class' => 'col-form-label']) }}
          {{ Form::text('subject', '', array('class' => 'form-control')) }}
      </div>
   
    
    <div class="form-group col-md-6">
        {{ Form::label('value', __('Salary'),['class' => 'col-form-label']) }}
        {{ Form::number('value', '', array('class' => 'form-control', 'step' => '0.01', 'min' => '0')) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('start_date', __('Start Date'),['class' => 'col-form-label']) }}
        {{ Form::date('start_date', '', array('class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('end_date', __('End Date'),['class' => 'col-form-label']) }}
        {{ Form::date('end_date', '', array('class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('type', __('Contract Type'),['class' => 'col-form-label']) }}
        {{ Form::select('type', $contractTypes,null, array('class' => 'form-control multi-select','required'=>'required')) }}
        @if (count($contractTypes) <= 0)
        <div class="text-muted text-xs">
            {{ __('Please create new contract type') }} <a
                href="{{ route('contract_type.index') }}">{{ __('here') }}</a>
        </div>
    @endif
    </div>
     {{-- <div class="form-group col-md-6">
    
        {{ Form::label('status', __('Status'),['class' => 'col-form-label']) }}
          <br>
        <div class="custom-control custom-radio d-inline-block ">
            <input type="radio" name="status" value="0" class="form-check-input" checked="" 
                >
            <label class="custom-label text-dark">{{ __('Pending') }}</label>
        </div>
{{-- 
        <div class=" custom-control custom-radio d-inline-block mx-5">
            <input type="radio" name="status" value="1"
                class="form-check-input"
                >
            <label class="custom-label text-dark">{{ __('Accept') }}</label>
        </div>
        <div class=" custom-control custom-radio d-inline-block mx-56">
            <input type="radio" name="status" value="2"
                class="form-check-input"
                >
            <label class="custom-label text-dark">{{ __('Declien') }}</label>
        </div> 
    </div> --}}
</div>
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('notes', __('Notes'),['class' => 'col-form-label']) }}
        {!! Form::textarea('notes', null, ['class'=>'form-control','rows'=>'3']) !!}
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
    {{Form::submit(__('Create'),array('class'=>'btn  btn-primary'))}}
</div>

{{ Form::close() }}
