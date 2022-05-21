<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$gnl->site_name}}</title>
</head>

<body>

<form action="https://www.moneybookers.com/app/payment.pl" method="POST" id="payment_form">
    {{csrf_field()}}
    <input name="pay_to_email" value="{{$gatewayData->val1}}" type="hidden">

    <input name="transaction_id" value="{{$data->trx}}" type="hidden">

    <input name="return_url" value="{{route('user.fund')}}" type="hidden">

    <input name="return_url_text" value="Return {{$gnl->site_name}}" type="hidden">

    <input name="cancel_url" value="{{route('user.fund')}}" type="hidden">

    <input name="status_url" value="{{route('ipn.skrill')}}" type="hidden">

    <input name="language" value="EN" type="hidden">

    <input name="amount" value="{{$data->usd_amo}}" type="hidden">

    <input name="currency" value="{{$currency->name}}" type="hidden">

    <input name="detail1_description" value="{{$gnl->site_name}}" type="hidden">

    <input name="detail1_text" value="Deposit To {{$gnl->site_name}}" type="hidden">


</form>

<script type="text/javascript">
    document.getElementById("payment_form").submit();
</script>
</body>

</html>




