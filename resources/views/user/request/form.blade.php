{!! FORM::hidden('user_id', Auth::user()->id  ) !!}
<div class="form-group {{ $errors->has('region_name') ? 'has-error' : ''}}">
    {!! FORM::label('region_name', 'Region Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! FORM::text('region_name', $region, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
        <input name="region_id" type="hidden" value="{{$region_id}}">
        {!! $errors->first('region_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('zone_name') ? 'has-error' : ''}}">
    {!! FORM::label('zone_name', 'Zone Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! FORM::text('zone_name', $zone, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
        <input name="zone_id" type="hidden" value="{{$zone_id}}">
        {!! $errors->first('zone_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('branch_name') ? 'has-error' : ''}}">
    {!! FORM::label('branch_name', 'Branch Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! FORM::text('branch_name', $branch, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
        <input name="branch_id" type="hidden" value="{{$branch_id}}">
        {!! $errors->first('branch_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('branch_code') ? 'has-error' : ''}}">
    {!! FORM::label('branch_code', 'Branch id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! FORM::text('branch_code', $branch_id, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
        {!! $errors->first('branch_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('branchcode') ? 'has-error' : ''}}">
    {!! FORM::label('branchcode', 'Branch Code', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! FORM::text('branchcode', !empty($problemRequest->branchcode) ? $problemRequest->branchcode : null, ['class' => 'form-control', 'placeholder' => 'Enter Branch Code']) !!}
        {!! $errors->first('branchcode', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('contact_name') ? 'has-error' : ''}}">
    {!! FORM::label('contact_name', 'Contact name *', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! FORM::text('contact_name', !empty($problemRequest->contact_name) ? $problemRequest->contact_name : null, ['class' => 'form-control', 'placeholder' => 'Enter contact name']) !!}
        {!! $errors->first('contact_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('contact_number') ? 'has-error' : ''}}">
    {!! FORM::label('contact_number', 'Mobile number *', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! FORM::text('contact_number', !empty($problemRequest->contact_number) ? $problemRequest->contact_number : null, ['class' => 'form-control', 'placeholder' => 'Enter mobile number']) !!}
        {!! $errors->first('contact_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-6">
    {!!  FORM::file('image') !!}
</div>
<div class="form-group {{ $errors->has('problem') ? 'has-error' : ''}}">
    {!! FORM::label('problem', 'Problem *', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="radio radio-info radio-inline">
            {!! FORM::radio('problem', 'MIS', !empty($problemRequest->problem_type) && $problemRequest->problem_type ==  'MIS'? true : false, ['id' => 'mis-problem']) !!}
            {!! FORM::label('mis-problem', ' MIS ', []) !!}
        </div>
        <div class="radio radio-info radio-inline">
            {!! FORM::radio('problem', 'AIS', !empty($problemRequest->problem_type) && $problemRequest->problem_type ==  'AIS'? true : false, ['id' => 'ais-problem']) !!}
            {!! FORM::label('ais-problem', ' AIS ', []) !!}
        </div>
        <div class="radio radio-info radio-inline">
            {!! FORM::radio('problem', 'Regular-Activities', !empty($problemRequest->problem_type) && $problemRequest->problem_type ==  'Regular-Activities'? true : false, ['id' => 'regular-activities-problem']) !!}
            {!! FORM::label('regular-activities-problem', ' Regular Activities ', []) !!}
        </div>
        <div class="radio radio-info radio-inline">
            {!! FORM::radio('problem', 'Others', !empty($problemRequest->problem_type) && $problemRequest->problem_type ==  'Others'? true : false, ['id' => 'others-problem']) !!}
            {!! FORM::label('others-problem', ' Others ', []) !!}
        </div>
        {!! $errors->first('contact_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div id="blk-MIS" class="toHide" style="display:none">
    <fieldset>
        <legend >MIS Problem</legend>
        <div class="form-group {{ $errors->has('mis_problem_name') ? 'has-error' : ''}}">
            {!! FORM::label('mis_problem_name', 'Problem name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::text('mis_problem_name', !empty($problemRequest->problem_name) ? $problemRequest->problem_name : null, ['class' => 'form-control', 'placeholder' => 'Enter problem name']) !!}
                {!! $errors->first('mis_problem_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('mis_problem_member_name') ? 'has-error' : ''}}">
            {!! FORM::label('mis_problem_member_name', 'Member name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::text('mis_problem_member_name', !empty($problemRequest->problem_member_name) ? $problemRequest->problem_member_name : null, ['class' => 'form-control', 'placeholder' => 'Enter member name']) !!}
                {!! $errors->first('mis_problem_member_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('mis_problem_member_id') ? 'has-error' : ''}}">
            {!! FORM::label('mis_problem_member_id', 'Member ID', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::text('mis_problem_member_id', !empty($problemRequest->problem_member_id) ? $problemRequest->problem_member_id : null, ['class' => 'form-control', 'placeholder' => 'Enter member ID']) !!}
                {!! $errors->first('mis_problem_member_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('mis_problem_samity_code') ? 'has-error' : ''}}">
            {!! FORM::label('mis_problem_samity_code', 'Samity code', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::text('mis_problem_samity_code', !empty($problemRequest->problem_samity_code) ? $problemRequest->problem_samity_code : null, ['class' => 'form-control', 'placeholder' => 'Enter somity code']) !!}
                {!! $errors->first('mis_problem_samity_code', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('mis_problem_date') ? 'has-error' : ''}}">
            {!! FORM::label('mis_problem_date', 'Problem date', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::date('mis_problem_date', !empty($problemRequest->problem_date) ? \Carbon\Carbon::parse($problemRequest->problem_date)->format('Y-m-d') : \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                {!! $errors->first('mis_problem_date', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('mis_problem_amount') ? 'has-error' : ''}}">
            {!! FORM::label('mis_problem_amount', 'Amount', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::number('mis_problem_amount', !empty($problemRequest->problem_amount) ? $problemRequest->problem_amount : null, ['class' => 'form-control', 'placeholder' => 'Enter problem amount']) !!}
                {!! $errors->first('mis_problem_amount', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('mis_problem_details') ? 'has-error' : ''}}">
            {!! FORM::label('mis_problem_details', 'Problem Details', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::textarea('mis_problem_details', !empty($problemRequest->problem_details) ? $problemRequest->problem_details : null,['class'=>'form-control', 'rows' => 5, 'cols' => 40, 'placeholder' => 'Enter problem details']) !!}
                {!! $errors->first('mis_problem_details', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </fieldset>
    <br/>
    <fieldset>
        <legend >Solution</legend>
        <div class="form-group {{ $errors->has('mis_right_member_name') ? 'has-error' : ''}}">
            {!! FORM::label('mis_right_member_name', 'Right Member Name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::text('mis_right_member_name', !empty($problemRequest->right_member_name) ? $problemRequest->right_member_name : null, ['class' => 'form-control', 'placeholder' => 'Enter right member name']) !!}
                {!! $errors->first('mis_right_member_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('mis_right_member_id') ? 'has-error' : ''}}">
            {!! FORM::label('mis_right_member_id', 'Right Member ID', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::text('mis_right_member_id', !empty($problemRequest->right_member_id) ? $problemRequest->right_member_id : null, ['class' => 'form-control', 'placeholder' => 'Enter right member ID']) !!}
                {!! $errors->first('mis_right_member_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('mis_right_samity_code') ? 'has-error' : ''}}">
            {!! FORM::label('mis_right_samity_code', 'Right samity code', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::text('mis_right_samity_code', !empty($problemRequest->right_samity_code) ? $problemRequest->right_samity_code : null, ['class' => 'form-control', 'placeholder' => 'Enter right samity code']) !!}
                {!! $errors->first('mis_right_samity_code', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('mis_right_amount') ? 'has-error' : ''}}">
            {!! FORM::label('mis_right_amount', 'Right Amount', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::number('mis_right_amount', !empty($problemRequest->right_amount) ? $problemRequest->right_amount : null, ['class' => 'form-control', 'placeholder' => 'Enter right voucher amount']) !!}
                {!! $errors->first('mis_right_amount', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('mis_right_details') ? 'has-error' : ''}}">
            {!! FORM::label('mis_right_details', 'Solution', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::textarea('mis_right_details', !empty($problemRequest->right_details) ? $problemRequest->right_details : null,['class'=>'form-control', 'rows' => 5, 'cols' => 40, 'placeholder' => 'Enter solution details']) !!}
                {!! $errors->first('mis_right_details', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </fieldset>
</div>

<div id="blk-AIS" class="toHide" style="display:none">
    <fieldset>
        <legend >AIS Problem</legend>
        <div class="form-group {{ $errors->has('ais_problem_name') ? 'has-error' : ''}}">
            {!! FORM::label('ais_problem_name', 'Problem name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::select('ais_problem_name',['Manual Receive Voucher' => 'Manual Receive Voucher', 'Manual Payment Voucher' => 'Manual Payment Voucher', 'Manual Journal Voucher' => 'Manual Journal Voucher', 'Manual Contract Voucher' => 'Manual Contract Voucher'], !empty($problemRequest->problem_name) ? $problemRequest->problem_name : null, ['class' => 'form-control','placeholder' => 'Select Problem']) !!}
                {!! $errors->first('ais_problem_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('ais_problem_voucher_date') ? 'has-error' : ''}}">
            {!! FORM::label('ais_problem_voucher_date', 'Voucher date', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::date('ais_problem_voucher_date', !empty($problemRequest->problem_date) ? \Carbon\Carbon::parse($problemRequest->problem_date)->format('Y-m-d') : \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                {!! $errors->first('ais_problem_voucher_date', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('ais_problem_voucher_code') ? 'has-error' : ''}}">
            {!! FORM::label('ais_problem_voucher_code', 'Voucher Code', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::text('ais_problem_voucher_code', !empty($problemRequest->voucher_code) ? $problemRequest->voucher_code : null, ['class' => 'form-control', 'placeholder' => 'Enter voucher code']) !!}
                {!! $errors->first('ais_problem_voucher_code', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </fieldset>
    <br/>
    <fieldset>
        <legend >Solution</legend>
        <div class="form-group {{ $errors->has('ais_right_details') ? 'has-error' : ''}}">
            {!! FORM::label('ais_right_details', 'Solution', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::textarea('ais_right_details', !empty($problemRequest->right_details) ? $problemRequest->right_details : null,['class'=>'form-control', 'rows' => 5, 'cols' => 40, 'placeholder' => 'Enter solution details']) !!}
                {!! $errors->first('ais_right_details', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </fieldset>
</div>
<div id="blk-Regular-Activities" class="toHide" style="display:none">
    <fieldset>
        <legend >Regular Activities</legend>
        <div class="form-group {{ $errors->has('regular_activities_type') ? 'has-error' : ''}}">
            {!! FORM::label('regular_activities_type', 'Module name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::select('regular_activities_type',['MIS' => 'MIS', 'AIS' => 'AIS'], !empty($problemRequest->module_type) ? $problemRequest->module_type : null, ['class' => 'form-control']) !!}
                {!! $errors->first('regular_activities_type', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('regular_activity_name') ? 'has-error' : ''}}">
            {!! FORM::label('regular_activity_name', 'Regular activity name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::text('regular_activity_name', !empty($problemRequest->problem_name) ? $problemRequest->problem_name : null, ['class' => 'form-control', 'placeholder' => 'Enter regular activity name', 'list' => 'regular_activities']) !!}
                <datalist id="regular_activities">
                    <option value="Activities">
                    <option value="Activities">
                    <option value="Activities">
                    <option value="Activities">
                    <option value="Activities">
                </datalist>
                {!! $errors->first('regular_activity_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('regular_activity_details') ? 'has-error' : ''}}">
            {!! FORM::label('regular_activity_details', 'Activity Details', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::textarea('regular_activity_details', !empty($problemRequest->problem_details) ? $problemRequest->problem_details : null,['class'=>'form-control', 'id' => 'ais_regular_activity_details', 'data-iconlibrary' => 'fa', 'data-provide' => 'markdown', 'rows' => '9', 'placeholder' => 'Enter regular activity details']) !!}
                {!! $errors->first('regular_activity_details', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </fieldset>
</div>
<div id="blk-Others" class="toHide" style="display:none">
    <fieldset>
        <legend >Others Problem</legend>
        <div class="form-group {{ $errors->has('others_problem_name') ? 'has-error' : ''}}">
            {!! FORM::label('others_problem_name', 'Problem name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! FORM::text('others_problem_name', !empty($problemRequest->problem_name) ? $problemRequest->problem_name : null, ['class' => 'form-control', 'placeholder' => 'Enter problem name']) !!}
                {!! $errors->first('others_problem_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('others_problem_details') ? 'has-error' : ''}}">
            {!! FORM::label('others_problem_details', 'Problem Details', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::textarea('others_problem_details', !empty($problemRequest->problem_details) ? $problemRequest->problem_details : null,['class'=>'form-control', 'id' => 'others_problem_details', 'data-iconlibrary' => 'fa', 'data-provide' => 'markdown', 'rows' => '9', 'placeholder' => 'Enter problem details']) !!}
                {!! $errors->first('others_problem_details', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </fieldset>
    <br/>
    <fieldset>
        <legend >Solution</legend>
        <div class="form-group {{ $errors->has('others_right_details') ? 'has-error' : ''}}">
            {!! FORM::label('others_right_details', 'Solution', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::textarea('others_right_details', !empty($problemRequest->right_details) ? $problemRequest->right_details : null,['class'=>'form-control', 'id' => 'others_right_details', 'data-iconlibrary' => 'fa', 'data-provide' => 'markdown', 'rows' => '9', 'placeholder' => 'Enter solution details']) !!}
                {!! $errors->first('others_right_details', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </fieldset>
</div>
<br/>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! FORM::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

