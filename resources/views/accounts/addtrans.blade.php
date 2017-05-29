@extends('layout.app')
@section('pageheader','Add New transection')
@section('content')
<form action="{{route('addtrans')}}" role="form" method="POST">
{{ csrf_field() }}
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Name Of Bank</label>
            <input type="text" name="bank_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Openning Balance</label>
            <input type="number" name="op_bal" class="form-control">
        </div>
        <button type="submit" class="btn btn-block btn-primary">Submit</button>
    </div>
</form>


@endsection