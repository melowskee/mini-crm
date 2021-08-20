@extends('layouts.admin.app')

@section('content')
    <div class="row mt-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Companies</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('companies.create') }}" title="Add New Company"> <i class="fa fa-plus "></i> </a>
            </div>
        </div>
    </div>
    <hr>
    <table class="table table-bordered table-responsive-lg">
        <tr>
            <!-- <th>No</th> -->
            <th>Name</th>
            <th>Email</th>
            <th>Website</th>
            <th>No of Employees</th>
            <th>Logo</th>
            <th>Actions</th>
        </tr>
        @foreach ($companies as $company)
            <tr>
                <!-- <td></td> -->
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->website }}</td>
                <td><span class="badge {{ $company->employees->count() > 0 ? 'badge-success' : 'badge-danger' }} ">{{ $company->employees->count() }}</span></td>
                <td><img src="{{ asset('storage/'.$company->logo) }}" style="max-width: 150px;"></td>
                <td>
                    <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                        <a href="{{ route('companies.show', $company->id) }}" title="show">
                            <i class="fa fa-eye text-success fa-lg"></i>
                        </a>
                        <a href="{{ route('companies.edit', [$company->id]) }}" class="ml-2">
                            <i class="fa fa-edit fa-lg"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fa fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
                
            </tr>
        @endforeach
    </table>

    {!! $companies->links() !!}

@endsection
