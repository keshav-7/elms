<section class="cart-section pagenot-found">
	<div class="container" style="text-align:center; padding-top:50px;">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="cart-block cart-width cart-cont add-btn cart-empty payment-box">
					@if(!empty($error_message))
						<h2 style="padding: 20px;">{{$error_message}}</h2>
					@else
						<h1>404</h1>
						<h2>Page Not Found</h2>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>