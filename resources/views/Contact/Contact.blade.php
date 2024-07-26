@include('Layouts.Top')
<div class="page-wrapper">
@include('Layouts.Header')
<section class="page-title" style="background-image:url(images/background/7.webp)">
			<div class="auto-container">
				<h2>Contact Us</h2>
				<ul class="bread-crumb clearfix">
					<li><a href="{{url('/')}}">Home</a></li>
					<li>Contact Us</li>
				</ul>
			</div>
		</section>
@include('Contact.ContactUs')        
<section class="map-one">
    <div class="map-outer">
        <!-- Uncomment the line below to include a different map -->
        <!--
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805184.6331292129!2d144.49266890254142!3d-37.97123689954809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2s!4v1574408946759!5m2!1sen!2s" allowfullscreen></iframe>
        -->
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15125.503167812145!2d73.7239814!3d18.6021598!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bb81a4150415%3A0x46db5640a9ee0f41!2sByteCraft%20Studios!5e0!3m2!1sen!2sin!4v1718007483743!5m2!1sen!2sin"
            allowfullscreen></iframe>
    </div>
</section>

</div>
@include('MainPage.Footer')
@include('Layouts.Down')