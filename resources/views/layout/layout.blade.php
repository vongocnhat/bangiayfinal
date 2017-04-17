<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>

		<base href="{{ asset("/") }}">
		<title>Spike shoes Website Template | Home :: w3layouts</title>		
		<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="customer_assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="customer_assets/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="customer_assets/css/slippry.css">
<link rel="stylesheet" type="text/css" href="customer_assets/css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="customer_assets/css/font-awesome.min.css">
<link rel="stylesheet" href="customer_assets/css/nhat.css">
{{-- detail --}}
    <link href="customer_assets/css/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="customer_assets/css/etalage.css">
@yield('css')

	</head>
	<body>
		@include('layout.header')
		@yield('content')
		@include('layout.footer')
@include('layout.quickcart_quicklogin_quickproduct')
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="customer_assets/js/jquery.min.js"></script>
<script type="text/javascript" src="customer_assets/js/jquery.easy-ticker.js"></script>
<script type="text/javascript" src="customer_assets/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="customer_assets/js/menu_jquery.js"></script>
<script src="customer_assets/js/jquery-ui.js" type="text/javascript"></script>
<script src="customer_assets/js/scripts-f0e4e0c2.js" type="text/javascript"></script>
<script type="text/javascript" src="customer_assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="customer_assets/js/move-top.js"></script>
<script type="text/javascript" src="customer_assets/js/easing.js"></script>
<script type="text/javascript" src="customer_assets/js/nhat.index.js"></script>
<script type="text/javascript" src="customer_assets/js/nhat.pay.js" ></script>

{{-- product details --}}


@include('layout.script')
@yield('script')
	</body>
</html>