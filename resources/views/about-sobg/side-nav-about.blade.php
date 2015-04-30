<div class="col-md-4 col-md-pull-8">
	<div class="shadow">
		<div class="side-nav">
			<div class="heading">

			</div><!-- /.heading -->
			<h3 class="sec-title">About SOBG</h3><!-- /.sec-title -->
			<ul>
				<li><a href="{{route('overview')}}" class="{{ ($sub_page_active == 'overview') ? 'select' : '' }}">Overview</a></li>
				<li><a href="{{route('salagramam')}}" class="{{ ($sub_page_active == 'salagramam') ? 'select' : '' }}">Salagramam Ashram</a>
					<ul>
						<li><a href="{{route('guidedTour')}}" class="{{ ($sub_page_active == 'guidedtour') ? 'select' : '' }}">Guided tour of Ashram</a></li>
						<li><a href="{{route('facilities')}}" class="{{ ($sub_page_active == 'facilities') ? 'select' : '' }}">Facilities for public</a></li>
					</ul>
				</li>
				<li><a href="{{route('centers')}}" class="{{ ($sub_page_active == 'centers') ? 'select' : '' }}">Centers</a></li>
				<li><a href="{{route('hisVision')}}" class="{{ ($sub_page_active == 'hisvision') ? 'select' : '' }}">His Vision</a></li>
			</ul>
		</div><!-- /.side-nav -->
	</div><!-- /.shadow -->
</div><!-- /.col-md-4 -->