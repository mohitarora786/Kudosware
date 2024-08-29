@include('Layouts.Top')

@if(session('success'))
<div class="success-message">
    <strong>{{ session('success') }}</strong>
</div>
@endif
@if(session('error'))
<div class="error-message">
    <strong>{{ session('error') }}</strong>
</div>
@endif

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
        <!-- Map highlighting Kudosware in Indore, Madhya Pradesh -->
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3680.1209841651764!2d75.87432631505846!3d22.719067585097566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962fd26d599b8df%3A0x4f4f4f4f4f4f4f!2sKudosware%2C%20903%2C%20Shivom%20Apartment%2C%20578%2C%20M.G.%20Road%2C%20Manoramaganj%2C%20Indore%2C%20Madhya%20Pradesh%20452001%2C%20India!5e0!3m2!1sen!2sin!4v1718007483743!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

</div>
@include('MainPage.Footer')
@include('Layouts.Down')

<style>
    .success-message {
        background-color: #28a745;
        color: white;
        font-weight: bold;
        padding: 15px;
        position: fixed;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 5px;
        z-index: 1000;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        opacity: 0;
        animation: fadeInOut 3s forwards;
    }

    @keyframes fadeInOut {
        0% { opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { opacity: 0; }
    }
    .error-message {
        border: 1px solid #dc3545;
        background-color: #dc3545; /* Red background color */
        color: white;
        font-weight: bold;
        padding: 15px;
        position: fixed;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 5px;
        z-index: 1000;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        opacity: 0;
        animation: fadeInOut 3s forwards;
    }

    @keyframes fadeInOut {
        0% { opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { opacity: 0; }
    }
</style>

<script>
    setTimeout(function() {
        var successMessage = document.querySelector('.success-message');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 3000);

    setTimeout(function() {
        var successMessage = document.querySelector('.error-message');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 3000);
</script>
