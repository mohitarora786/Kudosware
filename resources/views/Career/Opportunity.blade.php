<section class="service-two">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <div class="sec-title_title">
                <div class="service-title">Careers</div>
            </div>
            <h2 class="sec-title_heading">
                Our reinvention starts with you.
            </h2>
        </div>
        <div class="choose-info-tabs">
            <!-- Choose Tabs -->
            <div class="choose-tabs tabs-box">
                <!-- Tab Btns -->
                <ul class="tab-btns tab-buttons clearfix"></ul>
                <div class="searchcontainer">
                    <input id="searchInput" type="text" placeholder="Search...">
                    <button type="submit" onclick="filterJobs()"><i class="fas fa-search"></i></button>
                </div>
                <div class="job-info">
                    <div id="jobCount">Total Jobs: <span id="totalJobs"></span></div>
                </div>
            </div>
            <!-- Tabs Container -->
            <section class="Jobs-list">
                <div class="search-bar">
                    <input type="text" id="jobTitle" placeholder="Job Title">
                    <select id="jobType">
                        <option value="">Job Type</option>
                        <option value="Fulltime">Full Time</option>
                        <option value="Parttime">Part Time</option>
                        <option value="Remote">Contractual</option>
                    </select>
                    <input type="text" id="location" placeholder="Location">
                    <button onclick="filterJobs()">Search</button>
                </div>
                <div id="jobListings">
                    <!-- Job Listings -->
                    <div class="job-listing" data-title="Senior Software Engineer" data-type="Fulltime" data-location="San Francisco">
                        <h2 class="job-title">Senior Software Engineer</h2>
                        <div class="job-details">
                            <span>Fulltime</span>
                            <span>Engineering</span>
                            <span>San Francisco</span>
                            <a href="/contact#contact-form" class="apply-btn" onclick="setJobRole(event, 'Senior Software Engineer')">Apply Now</a>
                        </div>
                        <div><span class="salary">₹60K-100K / Month</span></div>
                    </div>
                    <div class="job-listing" data-title="Junior UI/UX Designer" data-type="Fulltime" data-location="Remote">
                        <h2 class="job-title">Junior UI/UX Designer</h2>
                        <div class="job-details">
                            <span>Fulltime</span>
                            <span>Design</span>
                            <span>Remote</span>
                            <a href="/contact#contact-form" class="apply-btn" onclick="setJobRole(event, 'Junior UI/UX Designer')">Apply Now</a>
                        </div>
                        <div><span class="salary">₹30K-60K / Month</span></div>
                    </div>
                    <div class="job-listing" data-title="Web Designer" data-type="Fulltime" data-location="Remote">
                        <h2 class="job-title">Web Designer</h2>
                        <div class="job-details">
                            <span>Fulltime</span>
                            <span>Design</span>
                            <span>Remote</span>
                            <a href="/contact#contact-form" class="apply-btn" onclick="setJobRole(event, 'Web Designer')">Apply Now</a>
                        </div>
                        <div><span class="salary">₹30K-60K / Month</span></div>
                    </div>
                    <div class="job-listing" data-title="Web Project Manager" data-type="Parttime" data-location="Remote">
                        <h2 class="job-title">Web Project Manager</h2>
                        <div class="job-details">
                            <span>Parttime</span>
                            <span>Marketing</span>
                            <span>Remote</span>
                            <a href="/contact#contact-form" class="apply-btn" onclick="setJobRole(event, 'Web Project Manager')">Apply Now</a>
                        </div>
                        <div><span class="salary">₹30K-60K / Month</span></div>
                    </div>
                    <div class="job-listing" data-title="Full-Stack Developer" data-type="Parttime" data-location="Remote">
                        <h2 class="job-title">Full-Stack Developer</h2>
                        <div class="job-details">
                            <span>Parttime</span>
                            <span>Marketing</span>
                            <span>Remote</span>
                            <a href="/contact#contact-form" class="apply-btn" onclick="setJobRole(event, 'Full-Stack Developer')">Apply Now</a>
                        </div>
                        <div><span class="salary">₹30K-60K / Month</span></div>
                    </div>
                    <div class="job-listing" data-title="IT Sales Executive" data-type="Parttime" data-location="Remote">
                        <h2 class="job-title">IT Sales Executive</h2>
                        <div class="job-details">
                            <span>Parttime</span>
                            <span>Marketing</span>
                            <span>Remote</span>
                            <a href="/contact#contact-form" class="apply-btn" onclick="setJobRole(event, 'IT Sales Executive')">Apply Now</a>
                        </div>
                        <div><span class="salary">₹30K-60K / Month</span></div>
                    </div>
                    <div class="job-listing" data-title="Intern" data-type="Fulltime" data-location="Remote">
                        <h2 class="job-title">Intern</h2>
                        <div class="job-details">
                            <span>Full Time</span>
                            <span>React.js</span>
                            <span>Remote</span>
                            <a href="/contact#contact-form" class="apply-btn" onclick="setJobRole(event, 'Intern')">Apply Now</a>
                        </div>
                    </div>
                    <div class="job-listing" data-title="Intern" data-type="Fulltime" data-location="Remote">
                        <h2 class="job-title">Intern</h2>
                        <div class="job-details">
                            <span>Full Time</span>
                            <span>Web Designer</span>
                            <span>Remote</span>
                            <a href="/contact#contact-form" class="apply-btn" onclick="setJobRole(event, 'Intern')">Apply Now</a>
                        </div>
                    </div>
                </div>
                <div class="pagination" id="noPagination">
                    <button id="prevButton" onclick="goToPreviousPage()">Previous</button>
                    <div id="paginationControls" class="pagination-controls"></div>
                    <button id="nextButton" onclick="goToNextPage()">Next</button>
                </div>
                <div id="noResultsMessage" class="no-results">No results found</div>
            </section>
        </div>
    </div>
</section>

<script>
    const jobsPerPage = 5;
    let currentPage = 1;
    let filteredJobs = [];

    function filterJobs() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const jobTitle = document.getElementById('jobTitle').value.toLowerCase();
        const jobType = document.getElementById('jobType').value;
        const location = document.getElementById('location').value.toLowerCase();

        const allJobs = Array.from(document.getElementsByClassName('job-listing'));
        filteredJobs = allJobs.filter(job => {
            const titleMatch = job.dataset.title.toLowerCase().includes(jobTitle);
            const typeMatch = jobType === '' || job.dataset.type === jobType;
            const locationMatch = job.dataset.location.toLowerCase().includes(location);
            const searchMatch = job.dataset.title.toLowerCase().includes(searchInput);
            return titleMatch && typeMatch && locationMatch && searchMatch;
        });

        displayJobs();
    }

    function displayJobs() {
        const jobListings = document.getElementById('jobListings');
        const noResultsMessage = document.getElementById('noResultsMessage');
        const noPagination = document.getElementById('noPagination');

        jobListings.innerHTML = '';
        if (filteredJobs.length === 0) {
            noResultsMessage.style.display = 'block';
            noPagination.style.display = 'none';
        } else {
            noResultsMessage.style.display = 'none';
            noPagination.style.display = 'block';
            const totalPages = Math.ceil(filteredJobs.length / jobsPerPage);
            const start = (currentPage - 1) * jobsPerPage;
            const end = start + jobsPerPage;
            const jobsToDisplay = filteredJobs.slice(start, end);

            jobsToDisplay.forEach(job => {
                jobListings.appendChild(job);
            });

            updatePaginationControls(totalPages);
        }
    }

    function updatePaginationControls(totalPages) {
        const paginationControls = document.getElementById('paginationControls');
        paginationControls.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.innerText = i;
            pageButton.onclick = () => goToPage(i);
            if (i === currentPage) {
                pageButton.disabled = true;
            }
            paginationControls.appendChild(pageButton);
        }

        document.getElementById('prevButton').disabled = currentPage === 1;
        document.getElementById('nextButton').disabled = currentPage === totalPages;
    }

    function goToPage(page) {
        currentPage = page;
        displayJobs();
    }

    function goToPreviousPage() {
        if (currentPage > 1) {
            currentPage--;
            displayJobs();
        }
    }

    function goToNextPage() {
        const totalPages = Math.ceil(filteredJobs.length / jobsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            displayJobs();
        }
    }

    function setJobRole(event, jobTitle) {
        event.preventDefault();
        localStorage.setItem('jobRole', jobTitle);
        window.location.href = "/contact#contact-form";
    }

    document.addEventListener('DOMContentLoaded', () => {
        const allJobs = Array.from(document.getElementsByClassName('job-listing'));
        document.getElementById('totalJobs').innerText = allJobs.length;
        filterJobs();
    });
</script>
