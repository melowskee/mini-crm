@extends('layouts.admin.app')

@section('content')
    <div class="row  mt-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Company</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="javascript:void(0);" onclick="window.history.go(-1); return false;" title="Go back"> <i class="fa fa-backward "></i> </a>
            </div>
        </div>
    </div>
    <hr/>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $company->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $company->email }}" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Website:</strong>
                    <input type="text" name="website" value="{{ $company->website }}" class="form-control" placeholder="Website">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Logo:</strong>
                    <img src="{{ asset('storage/'.$company->logo) }}" style="max-width: 150px;">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection