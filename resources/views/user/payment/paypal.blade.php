<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$gnl->site_name}}</title>
</head>

<body>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="payment_form">
    <input type="hidden" name="cmd" value="_xclick"/>
    <input type="hidden" name="business" value="{{$paypal['sendto']}}"/>
    <input type="hidden" name="cbt" value="{{$gnl->site_name}}"/>
    <input type="hidden" name="currency_code" value="{{$currency->name}}"/>
    <input type="hidden" name="quantity" value="1"/>
    <input type="hidden" name="item_name" value="Add Money To {{$gnl->site_name}} Account"/>
    <input type="hidden" name="custom" value="{{$paypal['track']}}"/>
    <input type="hidden" name="amount" value="{{$paypal['amount']}}"/>
    <input type="hidden" name="return" value="{{route('user.fund')}}"/>
    <input type="hidden" name="cancel_return" value="{{route('user.fund')}}"/>
    <input type="hidden" name="notify_url" value="{{route('ipn.paypal')}}"/>

</form>

<script>
    document.getElementById("payment_form").submit();
</script>
</body>

</html>

