<style>
    /* CSS to hide elements */
    .hide {
        display: none;
    }

    /* Additional styling (optional) */
    .form-group {
        margin-bottom: 15px;
    }

    .btn-style-seven {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
    }
</style>
<section class="contact-one" style="background-image:url({{ asset('images/background/map-1.webp') }})">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="left-box">
                    <div class="sec-title_title">
                        <div id="service-title">Contact us</div>
                    </div>
                    <h2 class="sec-title_heading">Grow Your Business With <br> <span>Our Expertise</span></h2>
                </div>
                <div class="right-box">
                    <div class="sec-title_text">Succinctly conveys our commitment to helping businesses expand
                        <br>
                        and thrive through our specialized knowledge and experience.
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <!-- Info Column -->
            <div class="info-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                    <!-- Contact Block -->
                    <div class="contact-block">
                        <div class="block-inner">
                            <span class="icon"><img src="{{ asset('images/icons/contact-1.webp') }}" alt="" /></span>
                            <strong>Head Office</strong>
                            Vishnu Mahajan Nagar, Bhusawal, Maharashtra, India
                        </div>
                        <div class="block-inner" style="margin-top: 15px;">
                            <!-- <span class="icon"><img src="images/icons/contact-1.webp" alt="" /></span> -->
                            <strong>Pune Office</strong>
                            Hinjewadi Phase-1, Pune, Maharashtra, India
                        </div>
                    </div>

                    <!-- Contact Block -->
                    <div class="contact-block">
                        <div class="block-inner">
                            <span class="icon"><img src="{{ asset('images/icons/contact-2.webp') }}" alt="" /></span>
                            <strong>Telephone number</strong>
                            <a class="mmlink" href="tel:+918668367265">+91 866 - 8367 - 265</a>
                        </div>
                    </div>

                    <!-- Contact Block -->
                    <div class="contact-block">
                        <div class="block-inner">
                            <span class="icon"><img src="{{ asset('images/icons/contact-3.webp') }}" alt="" /></span>
                            <strong>Mail address</strong>
                            <a class="mmlink" href="mailto:contact@/">contact@/</a>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .mmlink {
                    color: #e6e6dd;
                    font-size: 15px;
                }
            </style>

            <!-- Form Column -->
            <div class="form-column col-lg-8 col-md-12 col-sm-12">
                <div class="inner-column">
                    <!-- Contact Form -->
                    <div class="contact-form">
        <form method="post" action="{{ route('contact.store') }}" id="contact-form" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <!-- Name Field -->
                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                    <label>Name *</label>
                    <input type="text" name="name" placeholder="Your name*" required>
                </div>

                <!-- Email Field -->
                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                    <label>Email address *</label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <!-- Phone Field -->
                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                    <label>Phone *</label>
                    <input type="text" name="phone" placeholder="Phone" required>
                </div>

                <!-- Subject Dropdown -->
                <div class="text-dark col-lg-6 col-md-12 col-sm-12 form-group">
                    <label for="subject">Subject *</label>
                    <select name="subject" id="subject" required onchange="toggleFields()">
                        <option value="" disabled selected>Select a subject</option>
                        <option value="career">Career</option>
                        <option value="quote">Get Quote</option>
                        <option value="message">Message</option>
                    </select>
                </div>

                <!-- File Upload Field (only for Job Applications) -->
                <div id="file-upload" class="col-lg-6 col-md-12 col-sm-12 form-group hide">
                    <label for="file">Choose a file</label>
                    <input type="file" name="image" id="image">
                </div>

                <!-- Job Role Field (only for Job Applications) -->
                <div id="job-role-field" class="col-lg-6 col-md-12 col-sm-12 form-group hide">
                    <label>Your Job Role</label>
                    <input type="text" name="job_role" placeholder="Your Job Profile..." readonly>
                </div>

                <!-- Message Field (for Feedback and Enquiries) -->
                <div id="message-field" class="col-lg-12 col-md-12 col-sm-12 form-group hide">
                    <label>Your message</label>
                    <textarea name="message" placeholder="Your text here..."></textarea>
                </div>

                <!-- Submit Button -->
                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                    <button class="btn-style-seven theme-btn" type="submit">
                        <span class="btn-wrap">
                            <span class="text-one">Send message</span>
                            <span class="text-two">Send message</span>
                        </span>
                    </button>
                </div>
            </div>
        </form>
        <!-- End Comment Form -->
    </div>

                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get the query parameters from the URL
                const urlParams = new URLSearchParams(window.location.search);
                const subject = urlParams.get('subject');

                if (subject) {
                    // Set the value of the subject select box
                    const subjectSelect = document.getElementById('subject');
                    subjectSelect.value = subject;

                    // Show/Hide fields based on the subject
                    toggleFields();
                }
            });
            function toggleFields() {
            const subject = document.getElementById('subject').value;
            const fileUpload = document.getElementById('file-upload');
            const jobRoleField = document.getElementById('job-role-field');
            const messageField = document.getElementById('message-field');

            if (subject === 'career') {
                fileUpload.classList.remove('hide');
                jobRoleField.classList.remove('hide');
                messageField.classList.add('hide');
            } else if (subject === 'quote' || subject === 'message') {
                fileUpload.classList.add('hide');
                jobRoleField.classList.add('hide');
                messageField.classList.remove('hide');
            } else {
                fileUpload.classList.add('hide');
                jobRoleField.classList.add('hide');
                messageField.classList.add('hide');
            }
        }

        // On page load, set the job role if available and select the subject
        document.addEventListener('DOMContentLoaded', () => {
            const jobRole = localStorage.getItem('jobRole');
            const subject = localStorage.getItem('subject');
            
            if (jobRole) {
                document.getElementById('job-role-field').querySelector('input').value = jobRole;
                localStorage.removeItem('jobRole');
            }

            if (subject) {
                document.getElementById('subject').value = subject;
                toggleFields(); // Update fields visibility based on the subject
                localStorage.removeItem('subject');
            }
        });
</script>

        </script>

</section>