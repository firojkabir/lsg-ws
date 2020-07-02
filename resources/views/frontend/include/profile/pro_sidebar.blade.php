<div class="span3">
	<div class="sidebar">
		<div class="widget">
			<div class="user-photo">
				<a href="#">
					<img src="{{ asset(Auth::guard('client')->user()->path.Auth::guard('client')->user()->thumb) }}" alt="User Photo" class="image-responsive" style="height: 200px; width: 200px; border-radius: 50%;">
				</a>
			</div>
		</div>
		<br>
		<div class="widget sidebar_menu">
			<ul class="menu-advanced" style="font-size: 17px; list-style: none;">
				<li><a href="/profile"><i class="fa fa-user"></i> My Profile</a></li>
				<li><a href="/my_products"><i class="fa fa-gift"></i> My Products</a></li>
				<li><a href="/my_order"><i class="fa fa-cart-plus"></i> My Orders</a></li>
				<li><a href="/messages"><i class="fa fa-envelope"></i> Messages</a></li>
				<li><a href="/change_pass"><i class="fa fa-key"></i> Change Password</a></li>
				<li><a href="/logout" class="exc"><i class="fa fa-sign-out"></i> Logout</a></li>
			</ul>
		</div>
	</div>
</div>