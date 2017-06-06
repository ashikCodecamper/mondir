@extends('layout.app')
@section('pageheader','Sale Books')
@section('stylesheet')
<link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<form action="{{route('addsalebook')}}" role="form" method="POST">
{{ csrf_field() }}
    <div class="col-lg-8" id="sale">
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="">Name Of Temple</label>
                    <select name="customer_id" id="" class="form-control input-large">
                        <option value="" selected disabled>Please Select</option>
                        @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->temple_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Invoice Number</label>
                    @if(empty($inv))
                    <input name="inv_num" readonly type="text" class="form-control" value="INVC0{{1}}">
                    @else
                    <input name="inv_num" type="text" class="form-control" value="INVC0{{$inv+1}}">
                    @endif
                </div>
            </div>
        </div>
       
        <div class="row" v-for="n in products">
            <div class="col-lg-4">
             <div class="form-group">
            <label for="">Name Of Book</label>
            <select name="book_id[]" class="form-control"  v-model="n.price">
                <option value="0" selected>Please select...</option>
                 @foreach($books as $book)
                        <option value="{{$book->sales_price}}|{{$book->id}}">{{$book->book_name}}</option>
                        
                @endforeach
            </select>
        </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="">Number Of Pcs</label>
                <input type="number" name="pcs[]" class="form-control" v-model="n.pcs">
            </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="">Price</label>
                <input name="price[]" readonly class="form-control" :value="parseInt(n.price) * n.pcs">
            </div>
            </div>
        </div>
        <p style="display:inline-block;color:green" @click="addline"><i class="fa fa-check"></i> Add new line</p>
        <p style="display:inline-block;color:red;font-size:16px" @click="remove"><i class="fa fa-times"></i> remove new line</p>
        <div class="row">
            <div class="col-lg-6">
                
            </div>
            <div class="col-lg-6">
                <div class="">
                    <label for="">Subtotal</label>
                    <input  readonly class="form-control" :value="subTotal">
                </div>
                <div class="">
                    <label for="">Discount</label>
                    <input type="number" class="form-control" v-model="discount">
                </div>
                <div class="form-group">
                    <label for="">TOTAL(<span class="text-primary">after discount</span>)</label>
                    <input name="total_amount" type="number" readonly class="form-control" :value="grandTotal">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Recieved Amount</label>
                    <input name="rcv_amount" type="number" class="form-control">
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
                    <input name="cheque_num" type="number" class="form-control" placeholder="Sale Price Per Unit">
                </div>
        </div>
        <p  id="createInvoice"class="btn  btn-success">Create Invoice</p>
        <button type="submit" class="btn  btn-primary">Submit</button>
    </div>
</form>


@endsection
@section('javascript')
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/pdfmake.min.js')}}"></script>
<script src="{{asset('js/vfs_fonts.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
//vue js 
var sale = new Vue({
    el:'#sale',
    data: {
        discount: 0,
        products:[],
    },
    methods:{
        addline: function() {
      this.products.push({ price: 0, pcs: 1});
     },

    remove: function() {
      this.products.pop();
    }
    },
   computed: {
    subTotal: function() {
      return this.products.reduce(function(carry, product) {
        return carry + (product.pcs * parseInt(product.price));
      }, 0);
    },
    grandTotal: function() {
      return this.subTotal - this.discount;
    }
  }
});

//pdf invoice
var dd = {
	content: [
		{text: 'Sri Sri Radha Govinda Jew Mandir', style: 'header'},
		{text: 'Wari,Dhaka', style: 'subheader'},
		{text:'Invoice/Bill',fontSize:16,margin:[210,0]},
		'\n \n',
		{
			columns: [
				{
				    width: 130,
					fontSize: 19,
					text:'Temple Name:'
				},
				{
					width: 280,
					fontSize:18,
					text: 'Temple !'
				},
				{
					width: 'auto',
					fontSize:18,
					text: 'Date:'
				},
				{
					width: 'auto',
					fontSize:18,
					text: '31/121995'
				},
			]
		},
		'\n \n',

		{
			style: 'tableExample',
			table: {
			    widths: [ 30, 'auto', 50, 150 ],
				body: [
					['SL', 'Particulars', 'Rate','Total Amount'],
					['1', 'Another one here  hjkhkjh', 3,200],
					['1', 'Another one here  hjkhkjh', 3,200],
					['1', 'Another one here  hjkhkjh', 3,200],
                   
					['','','',' '],
					['', 'Subtotal', '', 200],
					['', 'Discount', '', 20],
					['', 'Total', '', 180],
				]
			}
		},
	],
	styles: {
		header: {
			fontSize: 30,
			bold: true,
			margin: [30, 0]
		},
		anotherStyle: {
       italic: true,
       alignment: 'right'
     },
		subheader: {
			fontSize: 20,
			bold: true,
			margin: [200,0]
		},
		tableExample: {
			fontSize:18,
		},
		tableHeader: {
			bold: true,
			fontSize: 20,
			color: 'black'
		},
		heading : {
		    fontSize: 16,
		}
	},
	defaultStyle: {
		alignment: 'justify'
	}
	
};

var createInvoice = document.getElementById('createInvoice');
createInvoice.addEventListener('click', function(){
    pdfMake.createPdf(dd).download('optionalName.pdf');
});

  </script>
@endsection
