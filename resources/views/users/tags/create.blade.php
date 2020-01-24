@extends('layouts.app1')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="{{ url("users/{$user->id}/tags") }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Type</label>
                    <select class="form-control select2" id="name" name="name[]" multiple>
                        <option value="dance">dance</option>
                        <option value="music">music</option>
                        <option value="games">games</option>
                    </select>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>

@append

@section('scripts')
    <script>
        $(function () {
            $('.select2').select2({
            });
        });
    </script>
@append

