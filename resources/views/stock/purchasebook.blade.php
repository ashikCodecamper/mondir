
@extends('layout.app')
@section('pageheader','Purchase Book')
@section('stylesheet')
<link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<form action="{{route('addpurchasebook')}}" role="form" method="POST">
{{ csrf_field() }}
    <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                <label for="">Date</label>
                <input type="text" name="date" class="form-control today" id="datepicker" placeholder="Click For Select">    
            </div>
        </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Challan Number</label>
                    <input type="text" name="challan_no" class="form-control" placeholder="Input Manually">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Name Of Book</label>
            <select name="book_id" id="" class="form-control">
                <option value="">Please select a book</option>
            @foreach ($books as $book)
                <option value="{{$book->id}}">{{$book->book_name}}</option>
             @endforeach   
            </select>
            
        </div>
        <div class="form-group">
            <label for="">Number Of Pcs</label>
            <input type="number" name="pcs" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Purchase Price</label>
            <input type="number" name="purchases_price" class="form-control" placeholder="Purchase Price Per Unit">
        </div>
        <div class="form-group">
            <label for="">Sales Price</label>
            <input type="number" name="sales_price" class="form-control" placeholder="Sale Price Per Unit">
        </div>
        <button type="submit" class="btn btn-block btn-primary">Submit</button>
    </div>
</form>


@endsection
@section('javascript')
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script>
 $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'dd/mm/yy',
      
    });
  } );
  </script>
  </script>
@endsection