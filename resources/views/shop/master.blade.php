<!DOCTYPE html>
<html lang="en">
<head>
<title>Toko Bangunan Dua Putra</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
@include('shop.css')
</head>

<body>

<div class="super_container">

	<!-- Header -->
    @include('shop.header')



	@yield('content')


	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-12">
					<div class="footer_nav_container">
						<div class="cr">©2022 All Rights Reserverd. Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">TokoBangunan</a> &amp; distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>

@include('shop.js')

</body>

</html>
