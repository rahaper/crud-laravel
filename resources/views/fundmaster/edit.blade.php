@extends('layout')
 
@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a href="{{ route('fundmaster.index') }}"> Back to list</a>
            </div>
        </div>
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="/fundmaster/update">
        {{ csrf_field() }}
        <div class="row mb-3">
            <label for="fund_code" class="col-sm-2 col-form-label">Fund Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" disabled value="{{ $fundMaster->fundCode }}">
                <input type="hidden" class="form-control" name="data[fund_code]" id="fund_code" value="{{ $fundMaster->fundCode }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="fund_name" class="col-sm-2 col-form-label">Fund Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="data[fund_name]" id="fund_name" value="{{ $fundMaster->fundName }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="fund_th_name" class="col-sm-2 col-form-label">Fund TH Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="data[fund_th_name]" id="fund_th_name" value="{{ $fundMaster->fundTHName }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="fund_type" class="col-sm-2 col-form-label">Fund Type</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="data[fund_type]" id="fund_type" value="{{ $fundMaster->fundType }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>

    </form>
   
 @endsection