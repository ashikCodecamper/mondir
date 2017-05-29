@extends('layout.app')
@section('pageheader','Add New Department')
@section('content')
<form action="{{route('addled')}}" role="form" method="POST">
{{ csrf_field() }}
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Name Of Ledger</label>
            <input type="text" name="led_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Ledger Type</label>
                    <select name="led_type" class="form-control">
                        <option value="">Please select</option>
                        <option value="1">Income</option>
                        <option value="2">Expense</option>
                    </select>
        </div>
        <div class="form-group">
            <label for="">Openning Balance</label>
           <input type="text" name="op_bal" class="form-control">
        </div>
        <button type="submit" class="btn btn-block btn-primary">Submit</button>
    </div>
</form>


@endsection