@extends('userlayout')
@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <div class="card bg-gradient-default">
            <div class="card-body">
                <div class="align-item-sm-center flex-sm-nowrap text-center">
                    <form>
                        <script src="https://checkout.flutterwave.com/v3.js"></script>
                        <button type="button" class="btn btn-success my-4" onClick="makePayment()">Pay with Flutterwave</button>
                    </form>
                    <script>
                        function makePayment() {
                            FlutterwaveCheckout({
                            public_key: "{{$gatewayData->val1}}",
                            tx_ref: "{{ $flutter['track'] }}",
                            amount: "{{ $flutter['amount'] }}",
                            currency: "{{$currency->name}}",
                            payment_options: "card,mobilemoney,ussd",
                            redirect_url: // specified redirect URL
                                "{{route('ipn.flutter')}}",
                            meta: {
                                consumer_id: "{{$user->id}}",
                                consumer_mac: "92a3-912ba-1192a",
                            },
                            customer: {
                                email: "{{$user->email}}",
                                phone_number: "{{$user->mobile}}",
                                name: "{{$user->first_name}} {{$user->last_name}}",
                            },
                            callback: function (data) {
                                console.log(data);
                            },
                            customizations: {
                                title: "{{$gnl->site_name}}",
                                description: "{{$gnl->site_name}} funding",
                                logo: "{{url('/')}}/asset/{{ $logo->image_link }}",
                            },
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection