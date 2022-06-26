<x-frontend-master>

<div class="main-content">

    <div class="page-content">

        <!-- Start home -->
        <section class="page-title-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center text-white">
                            <h3 class="mb-4">Blog</h3>
                            <div class="page-next">
                                <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Blog</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Blog </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!-- end home -->

        <!-- START SHAPE -->
        <div class="position-relative" style="z-index: 1">
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
                    <path fill="#FFFFFF" fill-opacity="1"
                        d="M0,192L120,202.7C240,213,480,235,720,234.7C960,235,1200,213,1320,202.7L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
                </svg>
            </div>
        </div>
        <!-- END SHAPE -->


        <!-- START BLOG-PAGE -->
        <section class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <h4>Latest & Trending Article</h4>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-7">
                        <div class="post-preview overflow-hidden rounded-3 mb-3 mb-lg-0">
                            <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/images/blog/img-04.jpg" alt="Blog" class="img-fluid blog-img" /></a>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-5">
                        @if (isset($headline))
                        @forelse ($headline as $item)
                            <article class="post position-relative">
                                <div class="post ms-lg-4">
                                    <p class="text-muted mb-2"><b>{{ $item->getCategory->name }}</b> - {{ $item->date }}</p>
                                    <h5 class="mb-3"><a href="/post/{{ $item->slug }}}" class="primary-link">{{ $item->title }}</a></h5>
                                    <p class="text-muted">
                                        {!! \Illuminate\Support\Str::words($item->content, 30) !!}
                                    </p>
                                    <div class="d-flex align-items-center mt-4">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('frontend') }}/assets/images/user/img-01.jpg" alt="" class="avatar-sm rounded-circle">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-muted mb-0">Post by</p>
                                            <a href="blog-author.html" class="primary-link"><h6 class="fs-16 mb-0">{{ $item->getUser->name }} </h6></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @empty

                        @endforelse
                        @endif
                        <!-- Post end-->
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div>
                            <h4>All Blog Post</h4>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-6">
                        <article class="post position-relative mt-4">
                            <div class="post-preview overflow-hidden mb-3 rounded-3">
                                <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/images/blog/img-06.jpg" alt="" class="img-fluid blog-img"></a>
                            </div>
                            <p class="text-muted mb-2"><b>Fashion</b> - July 29, 2021</p>
                            <h5 class="mb-3"><a href="blog-details.html" class="primary-link">A day in the of a professional fashion designer</a></h5>
                            <p class="text-muted">
                                Objectively pursue diverse catalysts for change for interoperable meta-services. Distinctively re-engineer revolutionary meta-services and premium architectures. Intrinsically incubate intuitive opportunities and real-time potentialities. Appropriately communicate one-to-one technology.
                            </p>
                            <div class="d-flex align-items-center mt-4">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('frontend') }}/assets/images/user/img-02.jpg" alt="" class="avatar-sm rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <a href="blog-author.html" class="primary-link"><h6 class="fs-16 mb-0">Rebecca Swartz</h6></a>
                                    <p class="text-muted mb-0">Fashion Designer</p>
                                </div>
                            </div>
                        </article>
                    </div><!--end col-->
                    <div class="col-lg-6">
                        <article class="post position-relative mt-lg-4 mt-5">
                            <div class="post-preview overflow-hidden mb-3 rounded-3">
                                <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/images/blog/img-05.jpg" alt="" class="img-fluid blog-img"></a>
                            </div>
                            <p class="text-muted mb-2"><b>Business</b> - July 25, 2021</p>
                            <h5 class="mb-3"><a href="blog-details.html" class="primary-link">Stack designer Olivia Murphy offers freelancing advice</a></h5>
                            <p class="text-muted">
                                Objectively pursue diverse catalysts for change for interoperable meta-services. Distinctively re-engineer revolutionary meta-services and premium architectures. Intrinsically incubate intuitive opportunities and real-time potentialities. Appropriately communicate one-to-one technology.
                            </p>
                            <div class="d-flex align-items-center mt-4">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('frontend') }}/assets/images/user/img-03.jpg" alt="" class="avatar-sm rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <a href="blog-author.html" class="primary-link"><h6 class="fs-16 mb-0">Olivia Murphy</h6></a>
                                    <p class="text-muted mb-0">Product Leader</p>
                                </div>
                            </div>
                        </article>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row">
                    <div class="col-lg-6">
                        <article class="post position-relative mt-5">
                            <div class="post-preview overflow-hidden mb-3 rounded-3">
                                <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/images/blog/img-07.jpg" alt="" class="img-fluid blog-img"></a>
                            </div>
                            <p class="text-muted mb-2"><b>Business</b> - July 25, 2021</p>
                            <h5 class="mb-3"><a href="blog-details.html" class="primary-link">Manage white space in responsive layouts ?</a></h5>
                            <p class="text-muted">
                                Objectively pursue diverse catalysts for change for interoperable meta-services. Distinctively re-engineer revolutionary meta-services and premium architectures. Intrinsically incubate intuitive opportunities and real-time potentialities. Appropriately communicate one-to-one technology.
                            </p>
                            <div class="d-flex align-items-center mt-4">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('frontend') }}/assets/images/user/img-03.jpg" alt="" class="avatar-sm rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <a href="blog-author.html" class="primary-link"><h6 class="fs-16 mb-0">Olivia Murphy</h6></a>
                                    <p class="text-muted mb-0">Product Leader</p>
                                </div>
                            </div>
                        </article>
                    </div><!--end col-->
                    <div class="col-lg-6">
                        <article class="post position-relative mt-5">
                            <div class="post-preview overflow-hidden mb-3 rounded-3">
                                <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/images/blog/img-08.jpg" alt="" class="img-fluid blog-img"></a>
                            </div>
                            <p class="text-muted mb-2"><b>Development</b> - July 29, 2021</p>
                            <h5 class="mb-3"><a href="blog-details.html" class="primary-link">How to get creative in your work ?</a></h5>
                            <p class="text-muted">
                                Objectively pursue diverse catalysts for change for interoperable meta-services. Distinctively re-engineer revolutionary meta-services and premium architectures. Intrinsically incubate intuitive opportunities and real-time potentialities. Appropriately communicate one-to-one technology.
                            </p>
                            <div class="d-flex align-items-center mt-4">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('frontend') }}/assets/images/user/img-02.jpg" alt="" class="avatar-sm rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <a href="blog-author.html" class="primary-link"><h6 class="fs-16 mb-0">Rebecca Swartz</h6></a>
                                    <p class="text-muted mb-0">Fashion Designer</p>
                                </div>
                            </div>
                        </article>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row">
                    <div class="col-lg-6">
                        <article class="post position-relative mt-5">
                            <div class="post-preview overflow-hidden mb-3 rounded-3">
                                <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/images/blog/img-09.jpg" alt="" class="img-fluid blog-img"></a>
                            </div>
                            <p class="text-muted mb-2"><b>Business</b> - July 25, 2021</p>
                            <h5 class="mb-3"><a href="blog-details.html" class="primary-link">What planning process needs ?</a></h5>
                            <p class="text-muted">
                                Objectively pursue diverse catalysts for change for interoperable meta-services. Distinctively re-engineer revolutionary meta-services and premium architectures. Intrinsically incubate intuitive opportunities and real-time potentialities. Appropriately communicate one-to-one technology.
                            </p>
                            <div class="d-flex align-items-center mt-4">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('frontend') }}/assets/images/user/img-03.jpg" alt="" class="avatar-sm rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <a href="blog-author.html" class="primary-link"><h6 class="fs-16 mb-0">Olivia Murphy</h6></a>
                                    <p class="text-muted mb-0">Product Leader</p>
                                </div>
                            </div>
                        </article>
                    </div><!--end col-->
                    <div class="col-lg-6">
                        <article class="post position-relative mt-5">
                            <div class="post-preview overflow-hidden mb-3 rounded-3">
                                <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/images/blog/img-10.jpg" alt="" class="img-fluid blog-img"></a>
                            </div>
                            <p class="text-muted mb-2"><b>Development</b> - July 29, 2021</p>
                            <h5 class="mb-3"><a href="blog-details.html" class="primary-link">How to become a best sale marketer in a year!</a></h5>
                            <p class="text-muted">
                                Objectively pursue diverse catalysts for change for interoperable meta-services. Distinctively re-engineer revolutionary meta-services and premium architectures. Intrinsically incubate intuitive opportunities and real-time potentialities. Appropriately communicate one-to-one technology.
                            </p>
                            <div class="d-flex align-items-center mt-4">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('frontend') }}/assets/images/user/img-02.jpg" alt="" class="avatar-sm rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <a href="blog-author.html" class="primary-link"><h6 class="fs-16 mb-0">Rebecca Swartz</h6></a>
                                    <p class="text-muted mb-0">Fashion Designer</p>
                                </div>
                            </div>
                        </article>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination job-pagination mb-0 justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="javascript:void(0)" tabindex="-1">
                                        <i class="mdi mdi-chevron-double-left fs-15"></i>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)">
                                        <i class="mdi mdi-chevron-double-right fs-15"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!--end col-->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- END BLOG-PAGE -->

    </div>
    <!-- End Page-content -->

    <!-- START SUBSCRIBE -->
    <section class="bg-subscribe">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <div class="text-center text-lg-start">
                        <h4 class="text-white">Get New Jobs Notification!</h4>
                        <p class="text-white-50 mb-0">Subscribe & get all related jobs notification.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mt-4 mt-lg-0">
                        <form class="subscribe-form" action="#">
                            <div class="input-group justify-content-center justify-content-lg-end">
                                <input type="text" class="form-control" id="subscribe" placeholder="Enter your email">
                                <button class="btn btn-primary" type="button" id="subscribebtn">Subscribe</button>
                            </div>
                        </form><!--end form-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
        <div class="email-img d-none d-lg-block">
            <img src="{{ asset('frontend') }}/assets/images/subscribe.png" alt="" class="img-fluid">
        </div>
    </section>
    <!-- END SUBSCRIBE -->

    <!-- START FOOTER -->
    <section class="bg-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-item mt-4 mt-lg-0 me-lg-5">
                        <h4 class="text-white mb-4">Jobcy</h4>
                        <p class="text-white-50">It is a long established fact that a reader will be of a page reader
                            will be of at its layout.</p>
                        <p class="text-white mt-3">Follow Us on:</p>
                        <ul class="footer-social-menu list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="uil uil-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="uil uil-linkedin-alt"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="uil uil-google"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="uil uil-twitter"></i></a></li>
                        </ul>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 col-6">
                    <div class="footer-item mt-4 mt-lg-0">
                        <p class="fs-16 text-white mb-4">Company</p>
                        <ul class="list-unstyled footer-list mb-0">
                            <li><a href="about.html"><i class="mdi mdi-chevron-right"></i> About Us</a></li>
                            <li><a href="contact.html"><i class="mdi mdi-chevron-right"></i> Contact Us</a></li>
                            <li><a href="services.html"><i class="mdi mdi-chevron-right"></i> Services</a></li>
                            <li><a href="blog.html"><i class="mdi mdi-chevron-right"></i> Blog</a></li>
                            <li><a href="team.html"><i class="mdi mdi-chevron-right"></i> Team</a></li>
                            <li><a href="pricing.html"><i class="mdi mdi-chevron-right"></i> Pricing</a></li>
                        </ul>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 col-6">
                    <div class="footer-item mt-4 mt-lg-0">
                        <p class="fs-16 text-white mb-4">For Jobs</p>
                        <ul class="list-unstyled footer-list mb-0">
                            <li><a href="job-categories.html"><i class="mdi mdi-chevron-right"></i> Browser Categories</a></li>
                            <li><a href="job-list.html"><i class="mdi mdi-chevron-right"></i> Browser Jobs</a></li>
                            <li><a href="job-details.html"><i class="mdi mdi-chevron-right"></i> Job Details</a></li>
                            <li><a href="bookmark-jobs.html"><i class="mdi mdi-chevron-right"></i> Bookmark Jobs</a></li>
                        </ul>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 col-6">
                    <div class="footer-item mt-4 mt-lg-0">
                        <p class="text-white fs-16 mb-4">For Candidates</p>
                        <ul class="list-unstyled footer-list mb-0">
                            <li><a href="candidate-list.html"><i class="mdi mdi-chevron-right"></i> Candidate List</a></li>
                            <li><a href="candidate-grid.html"><i class="mdi mdi-chevron-right"></i> Candidate Grid</a></li>
                            <li><a href="candidate-details.html"><i class="mdi mdi-chevron-right"></i> Candidate Details</a></li>
                        </ul>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 col-6">
                    <div class="footer-item mt-4 mt-lg-0">
                        <p class="fs-16 text-white mb-4">Support</p>
                        <ul class="list-unstyled footer-list mb-0">
                            <li><a href="contact.html"><i class="mdi mdi-chevron-right"></i> Help Center</a></li>
                            <li><a href="faqs.html"><i class="mdi mdi-chevron-right"></i> FAQ'S</a></li>
                            <li><a href="privacy-policy.html"><i class="mdi mdi-chevron-right"></i> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- END FOOTER -->

    <!-- START FOOTER-ALT -->
    <div class="footer-alt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-white-50 text-center mb-0">
                        <script>document.write(new Date().getFullYear())</script> &copy; Jobcy - Job Listing Page
                        Template by <a href="https://themeforest.net/search/themesdesign" target="_blank"
                            class="text-reset text-decoration-underline">Themesdesign</a>
                    </p>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </div>
    <!-- END FOOTER -->

    <!-- Style switcher -->
    <div id="style-switcher" onclick="toggleSwitcher()" style="left: -165px;">
        <div>
            <h6>Select your color</h6>
            <ul class="pattern list-unstyled mb-0">
                <li>
                    <a class="color-list color1" href="javascript: void(0);" onclick="setColorGreen()"></a>
                </li>
                <li>
                    <a class="color-list color2" href="javascript: void(0);" onclick="setColor('blue')"></a>
                </li>
                <li>
                    <a class="color-list color3" href="javascript: void(0);" onclick="setColor('green')"></a>
                </li>
            </ul>
            <div class="mt-3">
                <h6>Light/dark Layout</h6>
                <div class="text-center mt-3">
                    <!-- light-dark mode -->
                    <a href="javascript: void(0);" id="mode" class="mode-btn text-white rounded-3">
                        <i class="uil uil-brightness mode-dark mx-auto"></i>
                        <i class="uil uil-moon mode-light"></i>
                    </a>
                    <!-- END light-dark Mode -->
                </div>
            </div>
        </div>
        <div class="bottom d-none d-md-block" >
            <a href="javascript: void(0);" class="settings rounded-end"><i class="mdi mdi-cog mdi-spin"></i></a>
        </div>
    </div>
    <!-- end switcher-->

    <!--start back-to-top-->
    <button onclick="topFunction()" id="back-to-top">
        <i class="mdi mdi-arrow-up"></i>
    </button>
    <!--end back-to-top-->
</div>

</x-frontend-master>
