<div>
    <div class="form-group">
        <label for="name">Company Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $company->name)}}">
        @if($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="employment_type">Employment Type</label>
        <input type="text" class="form-control" id="employment_type" name="employment_type" value="{{ old('employment_type', $company->employment_type)}}">
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $company->location)}}">
    </div>
    <div class="form-group">
        <label for="job_title">Job Title</label>
        <input type="text" class="form-control" id="job_title" name="job_title" value="{{ old('job_title', $company->job_title) }}" >
    </div>
    <div class="form-group">
        <label for="job_description">Job Description</label>
        <input type="text" class="form-control" id="job_description" name="job_description" value="{{ old('job_description', $company->job_description) }}">
    </div>
    <div class="form-group">
        <label for="start_year">Starting Year</label>
        <select class="form-control select2" id="start_year" name="start_year">
            <option></option>
            @for($i = 1975; $i<= 2030; $i++)
                <option value="{{$i}}" {{ old('start_year', $company->start_year) == $i ? 'selected' : '' }}>{{$i}}</option>
            @endfor
        </select>
    </div>
    <div class="form-group">
        <label for="end_year">Ending Year</label>
        <select class="form-control select2" id="end_year" name="end_year">
            <option></option>
            @for($i = 1975; $i<= 2030; $i++)
                <option value="{{$i}}" {{ old('end_year', $company->end_year) == $i ? 'selected' : '' }}>{{$i}}</option>
            @endfor
        </select>
        @if($errors->has('end_year'))
            <span class="text-danger">{{ $errors->first('end_year') }}</span>
        @endif
    </div>
</div>
