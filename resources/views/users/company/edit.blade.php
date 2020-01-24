@extends('layouts.app1')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="{{ url("users/{$user->id}/company-details/{$company->id}") }}" method="post">
                @csrf
                {{ method_field('PATCH') }}
                @include('users.company.partials._create',['company' => $company])
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>

@append

@section('scripts')
    <script>
        $('#start_year').daterangepicker({
            locale : {
                format:'YYYY',
            },
            timepicker:false,
            autoUpdateInput: false,
            autoApply: true,
            yearSelect: true
        },function (start) {
            $('#start_year').val(start.format('YYYY'));
        });

        $('#end_year').daterangepicker({
            locale : {
                format:'YYYY',
            },
            timepicker:false,
            singleDatePicker: true,
            autoUpdateInput: false,
            autoApply: true,
            viewMode:'years'
        },function (start) {
            $('#end_year').val(start.format('YYYY'));
        })
    </script>
@append

