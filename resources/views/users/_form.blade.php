<div class="form-group">
    <label for="f_name">First Name</label>
    <input required type="text" class="form-control" id="f_name" name="f_name" placeholder="First Name"
           value="{{ old('f_name', $user->f_name) }}">
    @if($errors->has('f_name'))
        <span class="help-text text-danger">{{ $errors->first('f_name') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="l_name">Last Name</label>
    <input required type="text" class="form-control" id="l_name" name="l_name" placeholder="Last Name"
           value="{{ old('l_name', $user->l_name) }}">
    @if($errors->has('l_name'))
        <span class="help-text text-danger">{{ $errors->first('l_name') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input required type="text" class="form-control" id="email" name="email" placeholder="Email"
           value="{{ old('email', $user->email) }}">
    @if($errors->has('email'))
        <span class="help-text text-danger">{{ $errors->first('email') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input required type="text" class="form-control" id="password" name="password" placeholder="Password"
           value="{{ old('password', $user->password) }}">
    @if($errors->has('password'))
        <span class="help-text text-danger">{{ $errors->first('password') }}</span>
    @endif
</div>
