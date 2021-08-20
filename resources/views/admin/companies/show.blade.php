@extends('layouts.admin.app')


@section('content')

     <div class="row mt-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $company->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="javascript:void(0);" onclick="window.history.go(-1); return false;" title="Go back"> <i class="fa fa-backward "></i> </a>
            </div>
        </div>
    </div>
    <hr/>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <img src="{{ asset('storage/'.$company->logo) }}" class="img-thumbnail" style="max-width: 150px;">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email: </strong>
                {{ $company->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Website: </strong>
                {{ $company->website }}
            </div>
        </div>
        
    </div>
@endsection