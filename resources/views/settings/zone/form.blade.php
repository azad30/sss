{!! FORM::hidden('user_id', Auth::user()->id  ) !!}
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! FORM::label('name', 'Zone Name', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('region_id') ? 'has-error' : ''}}">
    {!! FORM::label('region_id', 'Region Name', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::select('region_id', $regions, null, ['class' => 'form-control', 'placeholder' => 'Select Region']) !!}
        {!! $errors->first('region_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
        {!! FORM::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
