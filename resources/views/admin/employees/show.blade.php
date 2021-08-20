@extends('layouts.admin.app')


@section('content')

     <div class="row mt-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $employee->first_name }} {{ $employee->last_name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="javascript:void(0);" onclick="window.history.go(-1); return false;" title="Go back"> <i class="fa fa-backward "></i> </a>
            </div>
        </div>
    </div>
    <hr/>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email: </strong>
                {{ $employee->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone: </strong>
                {{ $employee->phone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company: </strong>
                {{ $employee->company->name }}
            </div>
        </div>
    </div>
@endsection