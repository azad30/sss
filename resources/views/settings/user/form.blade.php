{!! Form::hidden('user_id', Auth::user()->id  ) !!}
<div class="form-group {{ $errors->has('region_id') ? 'has-error' : ''}}">
    {!! FORM::label('region_id', 'Region Name *', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::select('region_id', $region, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Select Region']) !!}
        {!! $errors->first('region_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('zone_id') ? 'has-error' : ''}}">
    {!! FORM::label('zone_id', 'Zone Name *', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::select('zone_id', $zone, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Select Zone']) !!}
        {!! $errors->first('zone_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('branch_id') ? 'has-error' : ''}}">
    {!! FORM::label('branch_id', 'Branch Name *', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::select('branch_id', $branch, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Select Branch']) !!}
        {!! $errors->first('branch_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-6 col-sm-offset-3">
        <hr/>
    </div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! FORM::label('name', 'Full Name *', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter user name']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! FORM::label('email', 'Email *', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::text('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter email ID']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if(!isset($user))
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! FORM::label('password', 'Password *', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter password']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('retype_password') ? 'has-error' : ''}}">
    {!! FORM::label('retype_password', 'Retype Password *', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::password('retype_password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter password']) !!}
        {!! $errors->first('retype_password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
<div class="form-group {{ $errors->has('contact') ? 'has-error' : ''}}">
    {!! FORM::label('contact', 'Contact Number', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::text('contact', null, ['class' => 'form-control', 'placeholder' => 'Enter contact no']) !!}
        {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! FORM::label('address', 'Address', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('address', null,['class'=>'form-control', 'rows' => 3, 'cols' => 40, 'placeholder' => 'Enter address']) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
    {!! FORM::label('department', 'Department Name', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::text('department', null, ['class' => 'form-control', 'placeholder' => 'Enter Department Name']) !!}
        {!! $errors->first('department', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    {!! FORM::label('designation', 'Designation', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::text('designation', null, ['class' => 'form-control', 'placeholder' => 'Enter Designation']) !!}
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pin') ? 'has-error' : ''}}">
    {!! FORM::label('pin', 'PIN', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! FORM::text('pin', null, ['class' => 'form-control', 'placeholder' => 'Enter PIN']) !!}
        {!! $errors->first('pin', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('office') ? 'has-error' : ''}}">
    {!! FORM::label('office', 'Office', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="radio radio-info radio-inline">
            {!! FORM::radio('office', 'Head Office', ['class' => 'col-sm-3 control-label']) !!}
            {!! FORM::label('Head-Office', 'Head Office', []) !!}
        </div>
        <div class="radio radio-info radio-inline">
            {!! FORM::radio('office', 'Branch Office', ['class' => 'col-sm-3 control-label']) !!}
            {!! FORM::label('Branch-Office', 'Branch Office', []) !!}
        </div>
        {!! $errors->first('contact_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('officeaddress') ? 'has-error' : ''}}">
    {!! FORM::label('officeaddress', 'Office Address', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('officeaddress', null,['class'=>'form-control', 'rows' => 3, 'cols' => 40, 'placeholder' => 'Enter Office Address']) !!}
        {!! $errors->first('officeaddress', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    {!! FORM::label('role', 'User Type *', ['class' => 'col-sm-3 control-label']) !!}

    <div class="col-sm-6">
        @if(Auth::user()->role=='admin')
        {!! FORM::select('role', ['user' => 'User'], null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Select Type']) !!}
        @elseif (Auth::user()->role=='superadmin')
            {!! FORM::select('role', ['user' => 'User', 'admin' => 'Admin'], null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Select Type']) !!}
        @endif
        {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
        {!! FORM::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary pull-right']) !!}
    </div>
</div>
