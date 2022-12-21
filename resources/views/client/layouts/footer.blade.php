@php
    $config = \App\Models\Admin\Configuration::latest()->first();
@endphp
<section class="footer">
	<div class="footer-mid">
		<div class="container">
			<div class="row">
                <div class="col-xl-3 col-md-3 d-flex justify-content-center">
					<div class="footer-widget mb-5 mb-xl-0">
						<h5 class="widget-title">Menu</h5>
                        @php
                            $menu = \App\Models\Menu::where('status', 1)->whereNot('type', 2)->orderBy('order', 'ASC')->get();
                        @endphp
						<ul class="footer-links">
                            @foreach ($menu as $item)
                                <li><a href="{{ $item->slug }}">{{ $item->name }}</a></li>
                            @endforeach
						</ul>
					</div>
				</div>

				<div class="col-xl-3 col-md-3 d-flex justify-content-center">
                    <div class="footer-widget mb-5 mb-xl-0">
                        <h5 class="widget-title">Tentang APTII</h5>
                        <div class="footer-logo mb-3">
                            <img src="{{ asset('storage') }}/assets/{{ $config->logo }}" alt="" class="img-fluid">
                        </div>
                        <div class="widget footer-widget mb-5 mb-lg-0 text-white">
                            {!! $config->address !!}
                        </div>
                    </div>
				</div>

				<div class="col-xl-3 col-md-3 d-flex justify-content-center">
					<div class="footer-widget mb-5 mb-xl-0">
						<h5 class="widget-title ">Youtube APTII</h5>
						<ul class="list-unstyled footer-links">
							<li><a href="#">SEO Business</a></li>
							<li><a href="#">Digital Marketing</a></li>
							<li><a href="#">Graphic Design</a></li>
							<li><a href="#">Social Marketing</a></li>
						</ul>
					</div>
				</div>

				<div class="col-xl-3 col-md-3 d-flex justify-content-center">
					<div class="footer-widget mb-5 mb-xl-0">
						<h5 class="widget-title">Kontak</h5>
						<ul class="list-unstyled footer-links">
							<li><h6 class="text-white">Phone</h6><a href="#">{{ $config->whatsapp }}</a></li>
							<li><h6 class="text-white">Email</h6><a href="#">{{ $config->email }}</a></li>
							<li><h6 class="text-white">Pengurus APTII</h6><a href="https://aptii.or.id/pengurus">https://aptii.or.id/pengurus</a></li>
						</ul>
						<div class="footer-socials mt-4">
							<a href="{{ $config->facebook }}"><i class="fab fa-facebook-f"></i></a>
							<a href="{{ $config->instagram }}"><i class="fab fa-instagram"></i></a>
							<a href="{{ $config->twitter }}"><i class="fab fa-twitter"></i></a>
							<a href="{{ $config->tiktok }}"><i class="fas fa-music-alt"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-btm">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-sm-12 col-lg-6">
					<p class="mb-0 copyright text-sm-center text-lg-start text-white">© {{ date('Y') }} APTII All rights reserved </p>
				</div>
				<div class="col-xl-6 col-sm-12 col-lg-6">

				</div>
			</div>
		</div>
	</div>

	<div class="fixed-btm-top">
		<a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
	</div>

</section>
