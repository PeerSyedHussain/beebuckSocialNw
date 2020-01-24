@extends('layouts.app')
@section('head')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">
@endsection
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.newsfeeds.store') }}" method="POST">
                    @csrf
                    <textarea class="form-control" name="content" id="post_content" rows="3"
                              placeholder="Whats on your mind..?"></textarea>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Share</button>
                        <div class="form-group">
                            <select name="visibility" id="visibility" class="form-control">
                                <option value="0">Public</option>
                                <option value="1">Friends</option>
                                <option value="2">Only Me</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection



