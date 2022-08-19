@extends('layout')
 
@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a href="{{ route('fundmaster.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
         <div class="col-md-12">



            <form class="row">

                <div class="col-md-2">
                    <h1>Fund List</h1>
                </div>

                <div class="col-md-2">
                    <a href="{{ route('fundmaster.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New</a>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-10"><input type="text" class="form-control" name="search" placeholder="Search ..."></div>
                        <div class="col-md-2"><button class="btn btn-primary" type="submit" >Search</button></div>
                    </div>
                </div>

            </form>


            <table class="table">

                <thead>
                    <tr>
                        <th>Fund Code</th>
                        <th>Fund Name</th>
                        <th>Sub Type</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($fundMaster))
                        @foreach ($fundMaster as $record)
                            <tr>
                                <td>{{$record->fundCode}}</td>
                                <td>{{$record->fundName}} / {{$record->fundTHName}}</td>
                                <td>{{$record->fundSubTypeName}}</td>
                                <td><a href="{{url("fundmaster/edit/{$record->fundCode}")}}" class="btn btn-primary">Edit</a> <a href="{{url("fundmaster/delete/{$record->fundCode}")}}" class="btn btn-primary">Del</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>

            </table>


            {{ $fundMaster->links('pagination::bootstrap-4') }}
        </div>
    </div>

@endsection