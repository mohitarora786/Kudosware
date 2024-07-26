<section class="slider-two">
    <div class="single-item-carousel owl-carousel owl-theme">
        <!-- Slide -->
        <div class="slide">
            <div class="slider-two_image-layer" style="background-image: url({{ asset('images/background/5.webp') }})"></div>
            <div class="slider-two_pattern-layer" style="background-image: url({{ asset('images/main-slider/pattern-1.webp') }})"></div>
            <div class="auto-container">
                <!-- Content Column -->
                <div class="slider-two-content">
                    <div class="slider-two_inner">
                        <div class="slider-two_title bg-dark">
                            We are Business Solution
                        </div>
                        <h1 class="slider-two_heading">
                            Weaving Digital Success, Crafting Innovations in IT and Film
                        </h1>
                        <div class="slider-two_text">
                            We place you at the centre of international networks to
                            <br />
                            advance your strategic interests
                        </div>
                        <!-- Button Box -->
                        <div class="slider-two_button-box">
                            <a class="btn-style-two theme-btn btn-item" href="{{ url('about') }}">
                                <div class="btn-wrap">
                                    <span class="text-one">About Us </span>
                                    <span class="text-two">About Us </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Main Slider -->

<!-- Featured One -->
<section class="featured-one">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Feature Block One -->
            @foreach ([
                ['link' => 'ui-uxDesign', 'icon' => 'feature-1.webp', 'title' => 'UI/UX Design Services'],
                ['link' => 'Blockchain', 'icon' => 'feature-2.webp', 'title' => 'Block Chain Development'],
                ['link' => 'webdevelopment', 'icon' => 'feature-3.webp', 'title' => 'Website Development'],
                ['link' => 'itSupport', 'icon' => 'feature-4.webp', 'title' => 'IT Support & Consulting'],
                ['link' => 'marketing', 'icon' => 'feature-5.webp', 'title' => 'Digital Marketing']
            ] as $feature)
                <div class="feature-block_one">
                    <div class="feature-block_one-inner">
                        <a class="overlay-link" href="{{ url($feature['link']) }}"></a>
                        <span class="color-layer"></span>
                        <span class="feature-block_one-icon">
                            <img src="{{ asset('images/icons/' . $feature['icon']) }}" alt="" />
                        </span>
                        <h5 class="feature-block_one-title">{{ $feature['title'] }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Featured One -->

<!-- Clients One -->
<section class="clients-one">
    <div class="clients-one_pattern" style="background-image: url({{ asset('images/background/3.webp') }})"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Title Column -->
            <div class="clients-one_title-column col-lg-4 col-md-12 col-sm-12">
                <div class="client-one_title">
                    Join over +150 happy clients!
                </div>
            </div>
            <!-- Carousel Column -->
            <div class="clients-one_carousel-column col-lg-8 col-md-12 col-sm-12">
                <!-- Sponsors Carousel -->
                <ul class="sponsors-carousel-two owl-carousel owl-theme">
                    @foreach (range(5, 8) as $client)
                        <li class="slide-item">
                            <figure class="client-one_image-box">
                                <a href="#"><img src="{{ asset('images/clients/' . $client . '.webp') }}" alt="" /></a>
                            </figure>
                        </li>
                    @endforeach
                    @foreach (range(5, 8) as $client)
                        <li class="slide-item">
                            <figure class="client-one_image-box">
                                <a href="#"><img src="{{ asset('images/clients/' . $client . '.webp') }}" alt="" /></a>
                            </figure>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
