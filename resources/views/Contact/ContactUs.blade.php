<style>
    .hide {
        display: none;
    }

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
            <div class="info-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="contact-block">
                        <div class="block-inner">
                            <span class="icon"><img src="{{ asset('images/icons/contact-1.webp') }}" alt="" /></span>
                            <strong>Head Office</strong>
                            Vishnu Mahajan Nagar, Bhusawal, Maharashtra, India
                        </div>
                        <div class="block-inner" style="margin-top: 15px;">
                            <strong>Pune Office</strong>
                            Hinjewadi Phase-1, Pune, Maharashtra, India
                        </div>
                    </div>
                    <div class="contact-block">
                        <div class="block-inner">
                            <span class="icon"><img src="{{ asset('images/icons/contact-2.webp') }}" alt="" /></span>
                            <strong>Telephone number</strong>
                            <a class="mmlink" href="tel:+918668367265">+91 866 - 8367 - 265</a>
                        </div>
                    </div>
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
            <div class="form-column col-lg-8 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="contact-form">
                        <form method="post" action="{{ route('contact.store') }}" id="contact-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label>Name *</label>
                                    <input type="text" name="name" placeholder="Your name*" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label>Email address *</label>
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <label>Phone *</label>
                                    <input type="text" name="phone" placeholder="Phone" required>
                                </div>
                                <div class="text-dark col-lg-6 col-md-12 col-sm-12 form-group">
                                    <label for="subject">Subject *</label>
                                    <select name="subject" id="subject" required onchange="toggleFields()">
                                        <option value="" disabled selected>Select a subject</option>
                                        <option value="career">Career</option>
                                        <option value="quote">Get Quote</option>
                                        <option value="message">Message</option>
                                    </select>
                                </div>
                                <div id="file-upload" class="col-lg-6 col-md-12 col-sm-12 form-group hide">
                                    <label for="file">Upload CV (Image)*</label>
                                    <input type="file" name="file" id="file" onchange="displayFileName()" required>
                                    <p id="file-name" style="margin-top: 10px;"></p>
                                </div>
                                <div id="job-role-field" class="col-lg-6 col-md-12 col-sm-12 form-group hide">
                                    <label>Your Job Role *</label>
                                    <input type="text" name="job_role" id="job_role" placeholder="Your Job Profile..." readonly>
                                </div>
                                <div id="service-type-field" class="col-lg-6 col-md-12 col-sm-12 form-group hide">
                                    <label>Service Type *</label>
                                    <select name="service_type" id="service_type" onchange="populateTechnology()">
                                        <option value="" disabled selected>Select a service type</option>
                                        <option value="IT services">IT Services</option>
                                        <option value="Film production services">Film Production Services</option>
                                    </select>
                                </div>
                                <div id="technology-field" class="col-lg-6 col-md-12 col-sm-12 form-group hide">
                                    <label>Technology *</label>
                                    <select name="technology" id="technology">
                                        <option value="" disabled selected>Select a technology</option>
                                    </select>
                                </div>
                                <div id="message-field" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>Your message</label>
                                    <textarea name="message" placeholder="Your text here..."></textarea>
                                </div>
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
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<script>
      function toggleFields() {
                const subject = document.getElementById('subject').value;
                const fileUpload = document.getElementById('file-upload');
                const jobRoleField = document.getElementById('job-role-field');
                const messageField = document.getElementById('message-field');
                const serviceTypeField = document.getElementById('service-type-field');
                const technologyField = document.getElementById('technology-field');

                // Hide all fields by default
                fileUpload.classList.add('hide');
                jobRoleField.classList.add('hide');
                serviceTypeField.classList.add('hide');
                technologyField.classList.add('hide');

                // Show the message field by default
                messageField.classList.remove('hide');

                // Show relevant fields based on subject
                if (subject === 'career') {
                    fileUpload.classList.remove('hide');
                    jobRoleField.classList.remove('hide');
                } else if (subject === 'quote' || subject === 'message') {
                    serviceTypeField.classList.remove('hide');
                    technologyField.classList.remove('hide');
                }
            }

            function populateTechnology() {
                const serviceType = document.getElementById('service_type').value;
                const technologySelect = document.getElementById('technology');
                let options = [];

                if (serviceType === 'IT services') {
                    options = ['Web & Software development', 'Digital Marketing', 'IT Support & Consulting', 'Data Services', 'Network Attached Storage', 'Cyber Security', 'IT Governance & Compliance', 'Additional Services'];
                } else if (serviceType === 'Film production services') {
                    options = ['Pre-Production Services', 'Production Services', 'Post-Production Services', 'Distribution & Marketing', 'Video Production Services', 'Photography Services', 'Additional Services'];
                }

                technologySelect.innerHTML = '<option value="" disabled selected>Select a technology</option>';
                options.forEach(function(option) {
                    technologySelect.innerHTML += `<option value="${option}">${option}</option>`;
                });
            }
            document.addEventListener('DOMContentLoaded', function() {
                // Retrieve and set the job role if stored in localStorage
                const jobRole = localStorage.getItem('jobRole');
                if (jobRole) {
                    document.getElementById('job_role').value = jobRole;
                    localStorage.removeItem('jobRole');
                }

                // Retrieve subject from URL parameters and set the subject select box
                const urlParams = new URLSearchParams(window.location.search);
                const subject = urlParams.get('subject');
                if (subject) {
                    const subjectSelect = document.getElementById('subject');
                    subjectSelect.value = subject;
                    toggleFields();
                }
            });
            function displayFileName() {
                const fileInput = document.getElementById('file');
                const fileName = document.getElementById('file-name');

                if (fileInput.files && fileInput.files[0]) {
                    const name = fileInput.files[0].name;
                    fileName.textContent = `Selected file: ${name}`;
                } else {
                    fileName.textContent = '';
                }
            }


</script>