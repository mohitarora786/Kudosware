@include('Layouts.Top')
<div class="page-wrapper">
@include('Layouts.Header')
<section class="page-title" style="background-image: url(images/background/7.webp)">
      <div class="auto-container">
        <h2>Blog Detail</h2>
        <ul class="bread-crumb clearfix">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Blog Detail</li>
        </ul>
      </div>
    </section>
   
</div>
@include('Blogs.BlogDetail.Data')
@include('MainPage.Footer')
@include('Layouts.Down')