@extends('userlayout')
@section('content')
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-gradient-default">
                    <div class="card-body">
                        <div class="align-item-sm-center flex-sm-nowrap text-center">
                            <form id="paymentForm">
                                <input type="hidden" id="email-address"  value="{{$user->email}}" required />
                                <input type="hidden" id="amount"  value="{{ $paystack['amount'] }}" required />
                                <input type="hidden" id="first-name"  value="{{$user->first_name}}"/>
                                <input type="hidden" id="last-name" value="{{$user->last_name}}"/>
                                <button type="submit" class="btn btn-success my-4" onclick="payWithPaystack()"> Pay with Paystack</button>
                            </form>
                        </div>
                    <script src="https://js.paystack.co/v1/inline.js"></script>
                    <script>
                        const paymentForm = document.getElementById('paymentForm');
                        paymentForm.addEventListener("submit", payWithPaystack, false);
                        function payWithPaystack(e) {
                        e.preventDefault();

                        let handler = PaystackPop.setup({
                            key: '{{$paystack['value1']}}', // Replace with your public key
                            email: document.getElementById("email-address").value,
                            amount: document.getElementById("amount").value * 100,
                            firstname: document.getElementById("first-name").value,
                            lastname: document.getElementById("first-name").value, 
                            currency: '{{$currency->name}}', 
                            onClose: function(){
                            alert('Window closed.');
                            },
                            callback: function(response){
                                window.location.href="{{route('ipn.paystack')}}";
                            }
                        });
                        handler.openIframe();
                        }
                    </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection