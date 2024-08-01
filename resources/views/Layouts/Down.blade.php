<div class="scroll-to-top scroll-to-target" data-target="html">
    <span class="fa fa-angle-double-up"></span>
</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/appear.js') }}"></script>
<script src="{{ asset('js/owl.js') }}"></script>
<script src="{{ asset('js/wow.js') }}"></script>
<script src="{{ asset('js/odometer.js') }}"></script>
<script src="{{ asset('js/mixitup.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/parallax.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/tilt.jquery.min.js') }}"></script>
<script src="{{ asset('js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/modernizr.js') }}"></script> <!-- Modernizr -->
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/jquery-2.1.1.js') }}"></script> <!--mega menu -->
<script src="{{ asset('js/jquery.menu-aim.js') }}"></script> <!-- menu aim -->
<script src="{{ asset('js/Mega-menu.js') }}"></script> <!--mega menu -->
</body>
<script>
      
        document.addEventListener('DOMContentLoaded', function() {
            const tocLinks = document.querySelectorAll('.toc-link');
            const sections = Array.from(tocLinks).map(link => document.querySelector(link.getAttribute('href')));
            
            function onScroll() {
                let index = sections.length;
                
                while(--index && window.scrollY + 50 < sections[index].offsetTop) {}
                
                tocLinks.forEach((link) => link.classList.remove('active'));
                tocLinks[index].classList.add('active');
            }
            
            window.addEventListener('scroll', onScroll);
            onScroll(); // Call on scroll to highlight the right link on page load
        });
    </script>
</html>
