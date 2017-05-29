@extends('layout.app')
@section('pageheader','Sale Books')
@section('stylesheet')
<link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<form action="" role="form">
    <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="">Name Of Temple</label>
                    <select name="" id="" class="form-control">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select>
                </div>
            </div>
        
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Invoice Number</label>
                    <input type="text" class="form-control" placeholder="Input Manually">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Name Of Book</label>
            <select name="" id="" class="form-control">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
                <option value="">5</option>
            </select>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                <label for="">Number Of Pcs</label>
                <input type="number" class="form-control">
            </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                <label for="">Price</label>
                <input type="number" class="form-control">
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Discount</label>
                    <input type="number" class="form-control" placeholder="Sale Price Per Unit">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Price(<span class="text-primary">with discount</span>)</label>
                    <input type="number" class="form-control" placeholder="Sale Price Per Unit">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Recieved Amount</label>
                    <input type="number" class="form-control" placeholder="Sale Price Per Unit">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Payment Type</label>
                    <select name="" id="payType" class="form-control" onchange="showDiv(this)">
                        <option value="">Please select</option>
                        <option value="cash">Cash</option>
                        <option value="bank">Bank</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="hidden_div" style="display:none;">
                 <div class="form-group">
                    <label for="">Cheque Number</label>
                    <input type="number" class="form-control" placeholder="Sale Price Per Unit">
                </div>
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
  function showDiv(select){
   if(select.value=='bank'){
    document.getElementById('hidden_div').style.display = "block";
   } else{
    document.getElementById('hidden_div').style.display = "none";
   }
} 
  </script>
@endsection
