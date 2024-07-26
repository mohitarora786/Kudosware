@include('Layouts.Top')
<div class="page-wrapper">
@include('Layouts.Header')
<section class="page-title" style="background-image: url(images/background/7.webp)">
      <div class="auto-container">
        <h2>UI/UX Design</h2>
        <ul class="bread-crumb clearfix">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Service Detail</li>
        </ul>
      </div>
    </section>
   
</div>
@include('Designs.UI.Data')
@include('MainPage.Footer')
@include('Layouts.Down')