@extends('layout.app')
@section('pageheader','Add New Customer')
@section('content')
<form action="{{route('addcustomer')}}" role="form" method="POST">
   {{ csrf_field() }}
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Name Of Temple</label>
            <input type="text" name="temple_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Phone Number</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Contact Person's Name</label>
            <input type="text" name="contact_person" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Openning Balance</label>
            <input type="text" name="openning_bal" class="form-control">
        </div>
        <button type="submit" class="btn btn-block btn-primary">Submit</button>
    </div>
</form>


@endsection