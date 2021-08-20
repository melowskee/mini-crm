@extends('layouts.admin.app')

@section('content')
    <div class="row mt-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employees</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.create') }}" title="Add New Employee"> <i class="fa fa-plus "></i> </a>
            </div>
        </div>
    </div>
    <hr>
    <table class="table table-bordered table-responsive-lg">
        <tr>
            <!-- <th>No</th> -->
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Actions</th>
        </tr>
        @foreach ($employees as $employee)
            <tr>
                <!-- <td></td> -->
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->company->name }}</td>
                <td>
                    <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                        <a href="{{ route('employees.show', $employee->id) }}" title="show">
                            <i class="fa fa-eye text-success fa-lg"></i>
                        </a>
                        <a href="{{ route('employees.edit', [$employee->id]) }}" class="ml-2">
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

    {!! $employees->links() !!}

@endsection
