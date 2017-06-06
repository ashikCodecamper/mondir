@extends('layout.app')
@section('stylesheet')
<link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{asset('css/print.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="row" id="app" >
    <div class="col-md-8 col-md-offset-2" style="background:#eee">
        <div class="row">
        <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <h2 class="text-center">Sri Sri Radha govinda jew Mandir</h2>
            <h3 class="text-center">Wari,Dhaka</h3>
          </div>
          <div class="col-lg-2">
            <h3>#SFID <strong style="color:#abc">303857</strong></h3>
          </div>
        </div>
        <div class="row" style="background:#ddf">
          <div class="col-lg-4">
            <h4>Name Of Temple: <select name="" id="">
            @forecah($customers as $customer)
            <option value="{{$customer->id}}">{{$customer->name}}</option>
            @endforeach
            </select>
              
            </h4>
            <h4>Address:........</h4>
          </div>
          <div class="col-lg-4"></div>
          <div class="col-lg-offset-2">
           <div class="">
            <h3 class="text-right">INVOICE &nbsp;</h3>
            <h4 class="text-right">Date: 31/12/1995 &nbsp;</h4>
           </div>
          </div>
        </div>
        <table class="table table-bordered">
          <thead>
              <tr>
                  <th>S.L</th>
                  <th>Particulars</th>
                  <th>Unit Price</th>
                  <th>Number of PCS</th>
                  <th>Amount</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="product in form.products">
                  <td></td>
                  <td>
                  <select class="form-control">
                    <option checked disabled>Select Book Name</option>
                    @foreach($customer)
                    <option> </option>
                  </select>
                  </td>
                  <td></td>
                  <td>
                  <input type="number" class="form-control">
                  </td>
                  <td>1200</td>
              </tr>
              
              <tr>
                  <td><button>add new line</button></td>
              </tr>
             
          </tbody>        
        </table>
        <div class="row">
        <div class="col-md-6">
        <h4><i>Authorized Signeture</i></h4>
          <textarea name="" id="" cols="30" rows="2"></textarea>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3 ">
          <h4 class="text-"><strong>Subtotal:</strong> 1200</h4>
          <h4 class="text-"><strong>Discount:</strong> 200</h4>
          <h4 class="text- text-primary"><strong>Total:</strong>1000</h4>
        </div>
        </div>
        <button onclick="window.print()" class="btn btn-primary hidden-print">Print</button>
    </div>
</div>
@endsection
@section('javascript')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


@endsection
