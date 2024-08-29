<style>
  /* Add your CSS here */
  .toc-link.active {
    color: #007bff;
    /* Highlight color */
    font-weight: bold;
  }

  .toc-link {
    transition: color 0.3s ease;
  }
</style>
<header class="main-header header-style-two bg-dark">
  <!-- Header Top -->
  <div class="header-top_two border-bottom">
    <div class="auto-container">
      <div class="d-flex justify-content-center align-items-center flex-wrap">
        <!-- Info List -->
        <ul class="info-list">
          <li>
            <a href="tel:+91 XXX-XXX-XXX"><span class="icon fa-solid fa-phone fa-fw"></span><span>+91
                XXXXXXXXX</span></a>
          </li>
          <li>
            <a href="mailto:mohit.joshi@kudosware.com">
              <span class="icon fa-solid fa-envelope fa-fw"></span>
              <span>mohit.joshi@kudosware.com</span>
            </a>

          </li>
          <li>
            <a href=""><span class="icon fa-solid fa-map fa-fw"></span><span> M.G. Road, Manoramaganj, , INDORE, Madhya Pradesh, India - 452001.
            </span></a>
          </li>
        </ul>

        <!-- Social Box -->
        <ul class="header-social_box">
    <li>
        <a href="https://www.linkedin.com/company/kudosware/" class="fa-brands fa-linkedin fa-fw"></a>
    </li>
    <li>
        <a href="" class="fa-solid fa-instagram fa-fw"></a>
    </li>
    <li>
        <a href="https://www.facebook.com/" class="fa-brands fa-facebook fa-fw"></a>
    </li>
    <li>
        <a href="https://www.youtube.com/" class="fa-brands fa-youtube fa-fw"></a>
    </li>
</ul>


      </div>
    </div>
  </div>
  <!-- End Header Top -->

  <!-- Header Upper -->
  <div class="header-upper">
    <div class="auto-container">
      <div class="inner-container d-flex">
        <!-- Logo Box -->
        <div class="logo">
        <a href="/">
    <img src="images/logo.jpg" alt="" title="" style="height: 50px; width: 200px; background-color: grey;" />
</a>

        </div>

        <!-- Upper Right -->
        <div class="upper-right">
          <div class="nav-outer d-flex justify-content-between align-items-center flex-wrap">


            <!-- Mega Menu -->

            <mega class="main-menu show navbar-expand-md">
              <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>

              <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                <ul class="navigation clearfix">

                  <li>
                    <a href="{{ url('/') }}">Home</a>
                  </li>
                  <li>
                    <a href="{{ url('/abouts') }}">About Us</a>
                  </li>

                  <li class="dropdown" id="dispaly-none-screen">

                    <a href="{{url('/service')}}">Services</a>

                    <ul>
                      <!-- this for Services  -->
                      <li class="dropdown">

                        <a href="{{url('/service')}}">Services</a>

                        <ul class="Ul-mobile-view">
                          <li>
                            <a class="background-icon icon-1" href="{{url('/service#prod-mission')}}">
                              <a class="icon-for-mobile " href="{{url('/service')}}" style='line-height:1px'>IT
                                Services</a>
                              <p class="discription-mobile"> IT solutions for seamless operations.</p>
                            </a>
                          </li>
                          <li>
                            <a class="background-icon icon-2" href="{{url('/service#prod-winner')}}">
                              <a class="icon-for-mobile " href="{{url('/service')}}" style='line-height:1px'>Film
                                Production Services</a>
                              <p class="discription-mobile">Facilitating every Filmmaking need seamlessly</p>
                            </a>
                          </li>
                        </ul>
                      </li>

                      <li class="dropdown">

                        <a href="{{url('/service')}}">IT Services</a>

                        <ul class="Ul-mobile-view">
                          <li>
                            <a class="background-icon icon-1" href="{{url('/webdevelopment')}}">
                              <a class="icon-for-mobile " href="{{url('/webdevelopment')}}" style='line-height:1px'>Web &
                                Software Development</a>
                              <p class="discription-mobile">Innovating digital solutions with expert precision</p>
                            </a>
                          </li>
                          <li>
                            <a class="background-icon icon-2" href="{{url('/digitalmarketing')}}">
                              <a class="icon-for-mobile " href="{{url('/digitalmarketing')}}" style='line-height:1px'>Digital Marketing</a>
                              <p class="discription-mobile">Promoting brands online with strategic precision</p>
                            </a>
                          </li>
                          <li>
                            <a class="background-icon icon-3" href="{{url('/itSupport')}}">
                              <a class="icon-for-mobile " href="{{url('/itSupport')}}" style='line-height:1px'>IT Support & Consulting</a>
                              <p class="discription-mobile">Managing tech needs with expert guidance</p>
                            </a>
                          </li>
                          <li>
                            <a class="background-icon icon-4" href="{{url('/dataService')}}">
                              <a class="icon-for-mobile " href="{{url('/dataService')}}" style='line-height:1px'>Data
                                Services</a>
                              <p class="discription-mobile">Managing and analyzing digital information efficiently
                              </p>
                            </a>
                          </li>
                          <li>
                            <a class="background-icon icon-5" href="{{url('/NAS')}}">
                              <a class="icon-for-mobile " href="{{url('/NAS')}}" style='line-height:1px'>Network Attached
                                Storage NAS</a>
                              <p class="discription-mobile">Centralized data storage for network convenience</p>
                            </a>
                          </li>
                          <li>
                            <a class="background-icon icon-6" href="{{url('/cybersecurity')}}">
                              <a class="icon-for-mobile " href="{{url('/cybersecurity')}}" style='line-height:1px'>Cyber
                                Seurity</a>
                              <p class="discription-mobile">Protecting digital systems from threats</p>
                            </a>
                          </li>
                          <li>
                            <a class="background-icon icon-8" href="{{url('/Itgoverance')}}">
                              <a class="icon-for-mobile " href="{{url('/Itgoverance')}}" style='line-height:1px'>IT Governance & Compilance</a>
                              <p class="discription-mobile">Regulatory Adherence and organizational alignment</p>
                            </a>
                          </li>
                          <li>
                            <a class="background-icon icon-9" href="{{url('/AdditionalServices')}}">
                              <a class="icon-for-mobile " href="{{url('/AdditionalServices')}}" style='line-height:1px'>Additional Services</a>
                              <p class="discription-mobile">Enhancing capabilities with specialized solutions</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      

                      <li class="dropdown">

                        <a href="#">Projects</a>

                        <ul class="Ul-mobile-view">
                          <li>
                            <a class="background-icon icon-1" href="{{url('/project')}}">
                              <a class="icon-for-mobile " href="{{url('/project')}}" style='line-height:1px'>Portfolio</a>
                              <p class="discription-mobile">Showcase of IT and film works</p>
                            </a>
                          </li>
                          <!-- <li>
                                <a class="background-icon icon-2" href="./project-detail.html">
                                  <a class="icon-for-mobile " href="./project-detail.html"
                                    style='line-height:1px'>Project Details</a>
                                  <p class="discription-mobile">This is the item description</p>
                                </a>
                              </li> -->

                        </ul>
                      </li>


                  </li>
                  @if(request()->is('admin.*') || request()->is('admin.laravel.bytecraftstudios.in/*'))
                  @php
                  $currentHost = request()->getHost();
                  if ($currentHost === 'admin.laravel.bytecraftstudios.in') {
                  // Redirect to the desired URL
                  header('Location: ' . url('/admin/login'));
                  exit;
                  }
                  @endphp
                  <li>
                    <a href="{{ url('/admin/login') }}">Admin</a>
                  </li>
                  @endif

                </ul>
                </li>

                <style>
                  p.discription-mobile {
                    line-height: 18px;
                  }
                </style>

                <li class="dropdown-1 remove-class" style='align-items: center;'>
                  <a class="mega-drop" href="{{url('/service')}}">Services</a>

                  <nav class="cd-dropdown">
                    <!-- <h2>Title</h2> -->
                    <!-- <a href="#0" class="cd-close">Close</a> -->

                    <ul class="cd-dropdown-content">


                      <li class="has-children ">
                        <a href="# " class="option-1" id="active-tab">Services </a>

                        <p class="tab-discription">Offering diverse, essential business solutions globally</p>


                        <ul class="cd-dropdown-icons is-hidden">

                          <li class="see-all"><a href="{{url('/service')}}">Browse Services</a></li>
                          <li>
                            <a class="cd-dropdown-item item-1" href="{{url('/service#prod-mission')}}">
                              <h3 class="icon-name-M">IT Services</h3>
                              <p> IT solutions for seamless operations.</p>
                            </a>
                          </li>


                        </ul>
                      </li> <!-- .has-children -->

                      <li class="has-children">
                        <a href="#" class='option-1'>IT Services</a>
                        <p class="tab-discription"> IT solutions for seamless operations.</p>

                        <ul class="cd-dropdown-icons is-hidden">

                          <li class="see-all"><a href="{{url('/service#prod-mission')}}">Browse IT Services</a></li>

                          <li>
                            <a class="cd-dropdown-item item-1" href="{{url('/webdevelopment')}}">
                              <h3 class="icon-name-M">Web & Software Development</h3>
                              <p>Innovating digital solutions with expert precision</p>
                            </a>
                          </li>

                          <li>
                            <a class="cd-dropdown-item item-2" href="{{url('/digitalmarketing')}}">
                              <h3 class="icon-name-M">Digital Marketing</h3>
                              <p>Promoting brands online with strategic precision</p>
                            </a>
                          </li>

                          <li>
                            <a class="cd-dropdown-item item-3" href="{{url('/itSupport')}}">
                              <h3 class="icon-name-M" class="icon-name-M">IT Support & Consulting</h3>
                              <p>Managing tech needs with expert guidance</p>
                            </a>
                          </li>

                          <li>
                            <a class="cd-dropdown-item item-4" href="{{url('/dataService')}}">
                              <h3 class="icon-name-M">Data Services</h3>
                              <p>Managing and analyzing digital information efficiently</p>
                            </a>
                          </li>

                          <li>
                            <a class="cd-dropdown-item item-5" href="{{url('/NAS')}}">
                              <h3 class="icon-name-M">Network Attached Storage NAS</h3>
                              <p>Centralized data storage for network convenience</p>
                            </a>
                          </li>

                          <li>
                            <a class="cd-dropdown-item item-6" href="{{url('/cybersecurity')}}">
                              <h3 class="icon-name-M">Cyber Security</h3>
                              <p>Protecting digital systems from threats</p>
                            </a>
                          </li>

                          <li>
                            <a class="cd-dropdown-item item-8" href="{{url('/Itgoverance')}}">
                              <h3 class="icon-name-M">IT Governance & Compilance</h3>
                              <p>Regulatory Adherence and organizational alignment</p>
                            </a>
                          </li>

                          <li>
                            <a class="cd-dropdown-item item-9" href="{{url('/AdditionalServices')}}">
                              <h3 class="icon-name-M">Additional Services</h3>
                              <p>Enhancing capabilities with specialized solutions</p>
                            </a>
                          </li>



                        </ul>
                      </li>



                      <li class="has-children">
                        <a href="#" class="option-1">Projects</a>
                        <p class="tab-discription">Creative endeavors in IT and film.</p>
                        <ul class="cd-dropdown-icons is-hidden">

                          <li class="see-all"><a href="{{url('/project')}}">Browse Services</a></li>
                          <li>
                            <a class="cd-dropdown-item item-1" href="{{url('/project')}}">
                              <h3 class="icon-name-M">Portfolio</h3>
                              <p>Showcase of IT and film works</p>
                            </a>
                          </li>

                          <!-- <li>
                                <a class="cd-dropdown-item item-2" href="./project-detail.html">
                                  <h3 class="icon-name-M">Project Details</h3>
                                  <p>This is the item description</p>
                                </a>
                              </li> -->


                        </ul>
                      </li>


                    </ul> <!-- .cd-dropdown-content -->

                  </nav>

                </li>
                <li>
                  <a href="{{url('/contact')}}">Contact</a>
                </li>

                @if(request()->is('admin.*') || request()->is('admin.laravel.bytecraftstudios.in/*'))
                @php
                $currentHost = request()->getHost();
                if ($currentHost === 'admin.laravel.bytecraftstudios.in') {
                // Redirect to the desired URL
                header('Location: ' . url('/admin/login'));
                exit;
                }
                @endphp
                <li>
                  <a href="{{ url('/admin/login') }}">Admin</a>
                </li>
                @endif

                </ul>
              </div>
            </mega>
            <!-- Main Menu End-->

            <div class="outer-box d-flex align-items-center">
              <!-- Search Box -->
              <div class="search-box" style="position: relative; width: 300px;">
                <form id="search-form" style="margin: 0;">
                  <div class="form-group" style="position: relative;">
                    <input type="search" name="search-field" id="search-field" placeholder="SEARCH HERE" required style="width: 100%; padding: 10px 10px 10px 40px; border: 1px solid #ddd; border-radius: 50px; background-color: #fff; color: #000; font-weight: bold; box-sizing: border-box; position: relative;" />
                    <button type="submit" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer;">
                      <span class="fa fa-search" style="font-size: 16px; color: #000;"></span>
                    </button>
                  </div>

                  <div id="suggestion-box" style="
            background-color: #fff; 
            border: 1px solid #ddd; 
            border-radius: 4px; 
            width: 100%; 
            margin-top: 5px; 
            display: none; 
            position: absolute; 
            z-index: 1000;">
                  </div>
                </form>
              </div>




              <!-- Language -->
              <!-- <div class="language dropdown">
          <button
            class="btn dropdown-toggle"
            
            type="button"
            id="dropdownMenu1"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <i
            class="fa-solid fa-globe fa-fw"
            
            ></i
            >English &nbsp;<span
            class="fa fa-angle-down"
            
            ></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">English Branch</a></li>
            <li><a href="#">German Branch</a></li>
            <li><a href="#">UAE Branch</a></li>
            <li><a href="#">Qatar Branch</a></li>
          </ul>
          </div> -->

              <div class="button-box">
                <a class="btn-style-three get-btn theme-btn btn-item" href="{{ url('/contact?subject=quote#contact-form') }}">
                  <div class="btn-wrap">
                    <span class="text-one">Get a quote now</span>
                    <span class="text-two">Get a quote now</span>
                  </div>
                </a>
              </div>


              <!-- Mobile Navigation Toggler -->
              <div class="mobile-nav-toggler">
                <span class="icon fa-solid fa-bars fa-fw fs-1"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Sticky Header  -->

  <!-- End Sticky Menu -->

  <!-- Mobile Menu  -->
  <div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn">
      <span class="icon flaticon-020-x-mark"></span>
    </div>
    <nav class="menu-box">
      <div class="nav-logo">
        <a href="/"><img src="images/Bytecraft Logo HOG1.png" alt="" title="" /></a>
      </div>
      <!-- Search -->
      <div class="search-box">
        <form action="/search" method="GET">
          <div class="form-group">
            <input type="search" name="search-field" value="" placeholder="SEARCH HERE" required />
            <button type="submit">
              <span class="icon flaticon-001-loupe"></span>
            </button>
          </div>

          <div id="suggestion-box" style="
            background-color: #fff; 
            border: 1px solid #ddd; 
            border-radius: 4px; 
            width: 100%; 
            margin-top: 5px; 
            display: none; 
            position: absolute; 
            z-index: 1000;">
          </div>
        </form>
      </div>



      <div class="menu-outer">
        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
      </div>
    </nav>
  </div>
  <!-- End Mobile Menu -->
</header>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchField = document.getElementById('search-field');
    const suggestionBox = document.getElementById('suggestion-box');
    const searchForm = document.getElementById('search-form');

    // Define a map of keywords to routes
    const services = [{
        keyword: 'web',
        text: 'Web Development',
        route: '/webdevelopment'
      },
      {
        keyword: 'mobile',
        text: 'Mobile Development',
        route: '/mobiledevelopment'
      },
      {
        keyword: 'software',
        text: 'Software Development',
        route: '/softwaredevelopment'
      },
      {
        keyword: 'photography',
        text: 'Photography Services',
        route: '/photography'
      },
      {
        keyword: 'video',
        text: 'Video Services',
        route: '/video'
      },
      {
        keyword: 'distribution',
        text: 'Distribution Services',
        route: '/marketing'
      },
      {
        keyword: 'marketing',
        text: 'Marketing Services',
        route: '/marketing'
      },
      {
        keyword: 'portfolio',
        text: 'Portfolio',
        route: '/project'
      }
    ];

    searchField.addEventListener('input', function() {
      const query = searchField.value.toLowerCase();
      suggestionBox.innerHTML = ''; // Clear previous suggestions

      // Generate suggestions based on query
      services.forEach(service => {
        if (query && service.keyword.toLowerCase().includes(query)) {
          const suggestionItem = document.createElement('a');
          suggestionItem.href = service.route;
          suggestionItem.textContent = service.text;
          suggestionItem.style.display = 'block';
          suggestionItem.style.padding = '10px';
          suggestionItem.style.textDecoration = 'none';
          suggestionItem.style.color = '#333';
          suggestionItem.style.cursor = 'pointer';
          suggestionBox.appendChild(suggestionItem);
        }
      });

      // Show or hide the suggestion box
      suggestionBox.style.display = suggestionBox.children.length > 0 ? 'block' : 'none';
    });

    suggestionBox.addEventListener('click', function(event) {
      if (event.target.tagName === 'A') {
        window.location.href = event.target.getAttribute('href');
      }
    });

    searchForm.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form submission

      const query = searchField.value.toLowerCase();

      // Redirect based on query
      const matchedService = services.find(service => service.keyword.toLowerCase().includes(query));
      if (matchedService) {
        window.location.href = matchedService.route;
      } else {
        alert('No results found');
      }
    });
  });
</script>