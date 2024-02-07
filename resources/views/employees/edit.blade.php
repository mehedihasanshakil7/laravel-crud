@extends('layout')


@section('page-content')
    <h2>Update Employee</h2>

    <form method="post" action="{{route('employees.update')}}" >

        @csrf
        <input type="hidden" name="id" value="{{$employee->id}}">
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name', $employee->name) }}" placeholder="Enter name">
            <div>{{ $errors->first('name') }}</div>
        </div>
    
        <div class="form-group">
            <label for="inputJobTitle">Job Title</label>
            <input type="text" class="form-control" id="inputJobTitle" name="job_title" value="{{ old('job_title', $employee->job_title) }}" placeholder="Enter job title">
            <div>{{ $errors->first('job_title') }}</div>
        </div>
    
        <div class="form-group">
            <label for="inputJoiningDate">Joining Date</label>
            <input type="date" class="form-control" id="inputJoiningDate" name="joining_date" value="{{ old('joining_date', $employee->joining_date) }}">
            <div>{{ $errors->first('joining_date') }}</div>
        </div>
    
        <div class="form-group">
            <label for="inputSalary">Salary</label>
            <input type="number" class="form-control" id="inputSalary" name="salary" value="{{ old('salary', $employee->salary) }}" placeholder="Enter salary" step="0.01" min="0">
            <div>{{ $errors->first('salary') }}</div>
        </div>
    
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email', $employee->email) }}" placeholder="Enter email">
            <div>{{ $errors->first('email') }}</div>
        </div>
    
        <div class="form-group">
            <label for="inputMobileNo">Mobile No</label>
            <input type="text" class="form-control" id="inputMobileNo" name="mobile_no" value="{{ old('mobile_no', $employee->mobile_no) }}" placeholder="Enter mobile number">
            <div>{{ $errors->first('mobile_no') }}</div>
        </div>
    
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $employee->address) }}" placeholder="Enter address">
            <div>{{ $errors->first('address') }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('employees.index')}}" class="btn btn-danger">Back</a>
    </form>


@endsection