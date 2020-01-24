@extends('layouts.app1')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="{{ url("users/{$user->id}/links/{$link->id}") }}" method="post">
                @csrf
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $link->type) }}">
                    @if($errors->has('type'))
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="value" name="value" value="{{ old('value', $link->value) }}">
                    @if($errors->has('value'))
                        <span class="text-danger">{{ $errors->first('value') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>

@append

@section('scripts')

@append

