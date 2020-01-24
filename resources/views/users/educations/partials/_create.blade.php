<div>
    <div class="form-group">
        <label for="name">College Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name', $education->name)}}">
        @if($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="degree">Degree</label>
        <input type="text" class="form-control" id="degree" name="degree" value="{{ old('degree', $education->degree) }}">
    </div>
    <div class="form-group">
        <label for="field_of_study">Field of Study</label>
        <input type="text" class="form-control" id="field_of_study" name="field_of_study" value="{{ old('field_of_study', $education->field_of_study) }}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $education->description) }}">
    </div>
    <div class="form-group">
        <label for="sports_and_activities">Sports and Activities</label>
        <input type="text" class="form-control" id="sports_and_activities" name="sports_and_activities" value="{{ old('sports_and_activities', $education->sports_and_activities) }}">
    </div>
    <div class="form-group">
        <label for="start_year">Starting Year</label>
        <select class="form-control select2" id="start_year" name="start_year" style="height: 100%">
            <option></option>
        @for($i = 1975; $i<= 2030; $i++)
            <option value="{{$i}}" {{ old('start_year', $education->start_year) == $i ? 'selected' : '' }}>{{$i}}</option>
        @endfor
        </select>
    </div>
    <div class="form-group">
        <label for="end_year">Ending Year</label>
        <select class="form-control select2" id="end_year" name="end_year">
            <option></option>
            @for($i = 1975; $i<= 2030; $i++)
                <option value="{{$i}}" {{ old('end_year', $education->end_year) == $i ? 'selected' : '' }}>{{$i}}</option>
            @endfor
        </select>
        @if($errors->has('end_year'))
            <span class="text-danger">{{ $errors->first('end_year') }}</span>
        @endif
    </div>
</div>
