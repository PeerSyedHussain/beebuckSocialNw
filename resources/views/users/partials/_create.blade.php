<div>
    <div class="form-group">
        <label for="salutation">Salutation</label>
        <select  class="form-control" id="name" name="salutation">
            @foreach(salutations() as $salutation)
                <option value="{{$salutation}}" @if(old('salutation',$user->salutation) == $salutation) selected @endif>{{$salutation}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" class="form-control" id="f_name" name="f_name" value="{{old('f_name', $user->f_name)}}">
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" class="form-control" id="l_name" name="l_name" value="{{ old('l_name', $user->l_name)}}">
    </div>
    <div class="form-group">
        <label for="nick_name">Nick Name</label>
        <input type="text" class="form-control" id="nick_name" name="nick_name" value="{{ old('nick_name', $user->nick_name)}}">
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob" value="{{ old('dob',!is_null($user->dob))  ? old('dob', parseDMY($user->dob)) : null}}" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email)}}">

        @if($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone',$user->phone)}}">
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select  class="form-control" id="gender" name="gender">
            <option value="male" {{ old('gender', $user->gender) == 'male'? 'selected':'' }}>Male</option>
            <option value="female" {{ old('gender', $user->gender )== 'female' ? 'selected' : '' }}>Female</option>
            <option value="others" {{ old('gender',$user->gender) == 'others' ? 'selected' : '' }}>Others</option>
        </select>
    </div>
    <div class="form-group">
        <label for="marital_status">Marital Status</label><br>
        <input type="radio" name="marital_status" value="single" @if(old('marital_status', $user->marital_status == 'single')) checked @endif> Single<br>
        <input type="radio" name="marital_status" value="married" @if(old('marital_status', $user->marital_status == 'married')) checked @endif> Married<br>
    </div>

    <div class="form-group">
        <label for="address">Address</label><br>
        <textarea name="address" id="address" cols="40" rows="5">
            {{ old('address', $user->address)}}
        </textarea>
    </div>
    <div class="form-group">
        <label for="bio">Bio</label><br>
        <textarea name="bio" id="bio" cols="40" rows="5">
            {{old('bio', $user->bio) }}
        </textarea>
    </div>
</div>
