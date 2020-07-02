<div id="sidebar" class="span3">
	<h4>Categories</h4>
	<hr>
	<ul id="sideManu" class="nav nav-tabs nav-stacked">
		<li><a href="/category-search/all">All</a></li>
		@foreach(SiteHelper::category() as $c)
		<li><a href="/category-search/{{ $c->id }}">{{ $c->name }}</a></li>
		@endforeach
	</ul>
	<br/>
</div>