@extends('layout')

@section('page-content')
<h1>
    Employee Information System
</h1>
<div class="row">
    <div class="col-lg-10">
        <form method="get" action="{{route('employees.index')}}">
            <div class="form-row">
                <div class="col-8">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search"
                           value="{{ request('search') }}">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-default">Search</button>

                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-2 ">
        <p class="text-right"><a href="{{ route('employees.create') }}" class="btn btn-primary">New Book</a></p>
    </div>
</div>
<table class="table table-striped table-bordered">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Job Title</th>
        <th>Email</th>
        <th colspan="3" style="text-align: center;">Action</th>
    </tr>
    @foreach($employees as $employee)
        <tr>
        <td>{{$employee->id}}</td>
        <td>{{$employee->name}}</td>
        <td>{{$employee->job_title}}</td>
        <td>{{$employee->email}}</td>
        <td><a href="{{route('employees.show', $employee->id)}}">View</a></td>
        <td><a href="{{ route('employees.edit', $employee->id )  }}">Edit</a></td>
        <td>
            <form  method="post" action="{{route('employees.destroy')}}" onsubmit="return confirm('Sure?')">
                @csrf
                <input type="hidden" name="id" value="{{$employee->id}}">
                <input type="submit" style="padding: 0; margin: 0" value="Delete" class="btn btn-link text-danger"/>
            </form>
        </td>
        </tr>
    @endforeach
</table>
{{$employees->links()}}
@endsection