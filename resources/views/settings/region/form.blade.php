{!! Form::hidden('user_id', Auth::user()->id  ) !!}
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! FORM::label('name', 'Region Name *', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
        {!! FORM::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary pull-right']) !!}
    </div>
</div>

