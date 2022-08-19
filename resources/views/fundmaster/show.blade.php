@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('fundmaster.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{-- $fundMaster->fundCode --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{-- $fundMaster->fundName --}}
            </div>
        </div>
    </div>
    @if (($fundMaster))
        <table>
        @foreach ($fundMaster as $record)
            <tr>
                <td>{{$record->fundCode}}</td>
                <td>{{$record->fundName}}</td>
                <td>{{$record->fundSubTypeName}}</td>
            </tr>
        @endforeach
        </table>
    @endif
@endsection