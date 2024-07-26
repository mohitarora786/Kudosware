{{-- testimonials.blade.php --}}
<section class="testimonial-section" style="background-image: url({{ asset('images/background/5.webp') }})">
    <div class="pattern-layer-one" style="background-image: url({{ asset('images/background/pattern-25.webp') }})"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Title Column -->
            <div class="title-column col-lg-5 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <!-- Sec Title -->
                    <div class="sec-title_two">
                        <div class="sec-title_two-title">~ Testimonials ~</div>
                        <h2 class="sec-title_two-heading">
                            Here's what our <br />
                            <span>customers</span> have said.
                        </h2>
                        <div class="sec-title_two-text">
                            "Here's What Our Customers Have Said" provides direct insights from our valued clients, highlighting
                            their satisfaction and the positive impact of our solutions.
                        </div>
                    </div>
                    <!-- Button Box -->
                    <div class="button-box">
                        <a class="btn-style-three theme-btn btn-item" href="{{ url('service') }}">
                            <div class="btn-wrap">
                                <span class="text-one">Our Services </span>
                                <span class="text-two">Our Services </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Carousel Column -->
            <div class="carousel-column col-lg-7 col-md-12 col-sm-12">
                <div class="inner-column" style="background-image: url({{ asset('images/background/pattern-26.webp') }})">
                    <div class="authors-outer">
                        <div class="author-one">
                            <img src="{{ asset('images/resource/author-2.webp') }}" alt="" />
                        </div>
                        <div class="author-two">
                            <img src="{{ asset('images/resource/author-3.webp') }}" alt="" />
                        </div>
                        <div class="author-three">
                            <img src="{{ asset('images/resource/author-4.webp') }}" alt="" />
                        </div>
                        <div class="author-four">
                            <img src="{{ asset('images/resource/author-5.webp') }}" alt="" />
                        </div>
                    </div>
                    <div class="single-item-carousel owl-carousel owl-theme">
                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="rating">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <div class="text">
                                    “Working with ByteCraft Studios was a game-changer for our company. Their creativity and technical
                                    expertise brought our vision to life in ways we hadn't imagined. Highly recommend their services!”
                                </div>
                            </div>
                            <div class="author-box">
                                <div class="box-inner">
                                    <span class="author-image">
                                        <img src="{{ asset('images/resource/mreview.webp') }}" alt="" />
                                    </span>
                                    <h5>Aakash Sharma</h5>
                                    <div class="designation">CEO of Poonam Enterprises</div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="rating">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <div class="text">
                                    “Collaborating with ByteCraft Studios on our latest project was a breeze. Their team's
                                    professionalism and attention to detail ensured a smooth production process from start to finish.
                                    Looking forward to future projects together!”
                                </div>
                            </div>
                            <div class="author-box">
                                <div class="box-inner">
                                    <span class="author-image">
                                        <img src="{{ asset('images/resource/mreview.webp') }}" alt="" />
                                    </span>
                                    <h5>Mr. Jayant Patil</h5>
                                    <div class="designation">Founder of Finesse Overseas Education</div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="rating">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <div class="text">
                                    “ByteCraft Studios transformed our website with their custom animations and interactive design
                                    elements. Our online presence has never looked better! Thank you for your creativity and
                                    dedication.”
                                </div>
                            </div>
                            <div class="author-box">
                                <div class="box-inner">
                                    <span class="author-image">
                                        <img src="{{ asset('images/resource/mreview.webp') }}" alt="" />
                                    </span>
                                    <h5>Rohin Aggarwal</h5>
                                    <div class="designation">Founder of Idukki</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

