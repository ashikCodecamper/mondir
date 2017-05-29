@extends('layout.app')
@section('pageheader','Add New Department')
@section('content')
<form action="{{route('addbank')}}" role="form" method="POST">
{{ csrf_field() }}
    <div class="col-lg-6">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
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