{{ Form::open(['url' => 'zoom-meeting', 'enctype' => 'multipart/form-data']) }}
<div class="row">
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('', __('Title'), ['class' => 'form-label']) }}
            {{ Form::text('title', null, ['class' => 'form-control', 'required' => false]) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('', __('User'), ['class' => 'form-label']) }}
            {!! Form::select('user_id[]', $employee_option, null, ['required' => true, 'multiple' => 'multiple', 'id'=>'choices-multiple-location_id' ,'class'=> 'form-control multi-select']) !!}            
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            {{ Form::label('', __('Password'), ['class' => 'form-label']) }}            
            <input type="password" name="password" class="form-control">
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {{ Form::label('', __('Start Date'), ['class' => 'form-label']) }}
            {!! Form::date('start_date', null, ['class' => 'form-control']) !!}            
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {{ Form::label('', __('Start time'), ['class' => 'form-label']) }}
            {!! Form::time('start_time', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {{ Form::label('', __('Duration'), ['class' => 'form-label']) }}
            {!! Form::number('duration', null, ['class' => 'form-control', 'required' => true, 'min' => 0]) !!}
        </div>
    </div>
    <div class="col-12">
        <div class="modal-footer border-0 p-0">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
            <button type="submit" class="btn btn-primary rotas_cteate">{{ __('Create') }}</button>
        </div>
    </div>
</div>
{{ Form::close() }}
