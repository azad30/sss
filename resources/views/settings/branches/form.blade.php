{!! FORM::hidden('user_id', Auth::user()->id  ) !!}
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! FORM::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! FORM::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('zone_id') ? 'has-error' : ''}}">
    {!! FORM::label('zone_id', 'Select Zone', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! FORM::select('zone_id',$zones, null, ['class' => 'form-control','placeholder' => 'Select Zone']) !!}
        {!! $errors->first('zone_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! FORM::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
