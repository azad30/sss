{{--<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">--}}
    {{--{!! FORM::label('region_name', 'Region Name', ['class' => 'col-md-4 control-label']) !!}--}}
    {{--<div class="col-md-6">--}}
        {{--{!! FORM::text('region_name', $region, ['class' => 'form-control', 'readonly' => 'readonly']) !!}--}}
        {{--{!! $errors->first('region_name', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="form-group {{ $errors->has('zone_name') ? 'has-error' : ''}}">--}}
    {{--{!! FORM::label('zone_name', 'Zone Name', ['class' => 'col-md-4 control-label']) !!}--}}
    {{--<div class="col-md-6">--}}
        {{--{!! FORM::text('zone_name', $zone, ['class' => 'form-control', 'readonly' => 'readonly']) !!}--}}
        {{--{!! $errors->first('zone_name', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="form-group {{ $errors->has('branch_name') ? 'has-error' : ''}}">--}}
    {{--{!! FORM::label('branch_name', 'Branch Name', ['class' => 'col-md-4 control-label']) !!}--}}
    {{--<div class="col-md-6">--}}
        {{--{!! FORM::text('branch_name', $branch, ['class' => 'form-control', 'readonly' => 'readonly']) !!}--}}
        {{--{!! $errors->first('branch_name', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="form-group {{ $errors->has('branch_code') ? 'has-error' : ''}}">--}}
    {{--{!! FORM::label('branch_code', 'Branch Code', ['class' => 'col-md-4 control-label']) !!}--}}
    {{--<div class="col-md-6">--}}
        {{--{!! FORM::text('branch_code', $branch_id, ['class' => 'form-control', 'readonly' => 'readonly']) !!}--}}
        {{--{!! $errors->first('branch_code', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="form-group {{ $errors->has('contact_name') ? 'has-error' : ''}}">--}}
    {{--{!! FORM::label('contact_name', 'Contact name *', ['class' => 'col-md-4 control-label']) !!}--}}
    {{--<div class="col-md-6">--}}
        {{--{!! FORM::text('contact_name', !empty($problemRequest->contact_name) ? $problemRequest->contact_name : null, ['class' => 'form-control', 'placeholder' => 'Enter contact name']) !!}--}}
        {{--{!! $errors->first('contact_name', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="form-group {{ $errors->has('contact_number') ? 'has-error' : ''}}">--}}
    {{--{!! FORM::label('contact_number', 'Mobile number *', ['class' => 'col-md-4 control-label']) !!}--}}
    {{--<div class="col-md-6">--}}
        {{--{!! FORM::text('contact_number', !empty($problemRequest->contact_number) ? $problemRequest->contact_number : null, ['class' => 'form-control', 'placeholder' => 'Enter mobile number']) !!}--}}
        {{--{!! $errors->first('contact_number', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
{{--<br/>--}}

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! FORM::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

