
<div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
    <label for="firstname" class="col-md-2 control-label">Firstname</label>
    <div class="col-md-10">
        <input class="form-control" name="firstname" type="text" id="firstname" value="{{ old('firstname', optional($attendance)->firstname) }}" minlength="5" placeholder="Enter firstname here...">
        {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
    <label for="lastname" class="col-md-2 control-label">Lastname</label>
    <div class="col-md-10">
        <input class="form-control" name="lastname" type="text" id="lastname" value="{{ old('lastname', optional($attendance)->lastname) }}" minlength="4" placeholder="Enter lastname here...">
        {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">
    <label for="age" class="col-md-2 control-label">Age</label>
    <div class="col-md-10">
        <input class="form-control" name="age" type="number" id="age" value="{{ old('age', optional($attendance)->age) }}" placeholder="Enter age here...">
        {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Phone</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($attendance)->phone) }}" minlength="1" placeholder="Enter phone here...">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
    <label for="gender" class="col-md-2 control-label">Gender</label>
    <div class="col-md-10">
        <select class="form-control" id="gender" name="gender">
        	    <option value="" style="display: none;" {{ old('gender', optional($attendance)->gender ?: '') == '' ? 'selected' : '' }} disabled selected>Select gender</option>
        	@foreach (['male' => 'Male',
'female' => 'Female'] as $key => $text)
			    <option value="{{ $key }}" {{ old('gender', optional($attendance)->gender) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="date" id="date" value="{{ old('date', optional($attendance)->date) }}" minlength="1" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
    <label for="file" class="col-md-2 control-label">File</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="file" id="file" class="hidden">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" readonly>
        </div>

        @if (isset($attendance->file) && !empty($attendance->file))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_file" class="custom-delete-file" value="1" {{ old('custom_delete_file', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    {{ $attendance->file }}
                </span>
            </div>
        @endif
        {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
    </div>
</div>


