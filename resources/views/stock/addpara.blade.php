@extends('layout.app')
@section('pageheader','Add New Para')
@section('content')
<form action="{{route('addpara')}}" role="form" method="POST">
{{ csrf_field() }}
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Name Of Para</label>
            <input type="text" name="para_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Purchase From</label>
            <input type="text" name="p_from" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Origin</label>
            <input type="text" name="origin" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Openning PCS</label>
            <input type="number" name="opn_pcs" class="form-control">
        </div>
        <button type="submit" class="btn btn-block btn-primary">Submit</button>
    </div>
</form>


@endsection