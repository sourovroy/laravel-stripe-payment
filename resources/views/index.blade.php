<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body>
	
	<h1>Stripe checkout</h1>

	<h3>Amount: $25.00</h3>

	<form action="/purchases" method="POST">
		{{ csrf_field() }}
		
		<script
			src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			data-key="pk_test_oFHSMQx2cBWdJGi1a67014Fy"
			data-amount="2500"
			data-name="Sourov Roy Checkout"
			data-description="This crated for learning perpose only."
			data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
			data-locale="auto">
		</script>
	</form>

</body>
</html>
