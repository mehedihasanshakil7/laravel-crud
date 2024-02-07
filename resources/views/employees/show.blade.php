@extends('layout')

@section('page-content')
<h1>
    Employee Information System
</h1>
<table class="table table-striped table-bordered">
    <tr>
        <th>Id</th>
        <td>{{ $employee->id }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ $employee->name }}</td>
    </tr>
    <tr>
        <th>Job Title</th>
        <td>{{ $employee->job_title }}</td>
    </tr>
    <tr>
        <th>Joining Date</th>
        <td>{{ $employee->joining_date }}</td>
    </tr>
    <tr>
        <th>Salary</th>
        <td>{{ $employee->salary }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $employee->email }}</td>
    </tr>
    <tr>
        <th>Mobile No</th>
        <td>{{ $employee->mobile_no }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $employee->address }}</td>
    </tr>
</table>
<a class="btn btn-success" href="{{route('employees.index')}}"><i class="bi bi-arrow-left-circle"></i> Go Back</a>
<a class="btn btn-danger" href="{{route('employees.edit', $employee->id)}}"><i class="bi bi-pencil-square"></i> Edit</a>
@endsection