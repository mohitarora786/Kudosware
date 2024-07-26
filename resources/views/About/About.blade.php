@include('Layouts.Top')
<div class="page-wrapper">
@include('Layouts.Header')
<section class="page-title" style="background-image: url('{{ asset('images/background/7.webp') }}')">
    <div class="auto-container">
        <h2>About Us</h2>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>About Us</li>
        </ul>
    </div>
</section>
@include('About.Hero')
@include('About.Journey')
@include('About.TeamMember')
@include('About.TeamMember2')
</div>
@include('MainPage.Footer')
@include('Layouts.Down')