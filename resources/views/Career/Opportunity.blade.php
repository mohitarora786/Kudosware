<style>
   .search-bar {
    margin-bottom: 20px;
}

.search-bar input,
.search-bar select {
    margin-right: 10px;
}

.job-listing {
    margin-bottom: 20px;
    padding: 20px;
    border: 1px solid #ddd;
}

.job-title {
    font-size: 20px;
    font-weight: bold;
}

.job-details span {
    margin-right: 10px;
}

.apply-btn {
    color: #fff;
    background-color: #007bff;
    padding: 5px 10px;
    text-decoration: none;
}

.salary {
    font-size: 18px;
    color: green;
}

#no-jobs-message {
    color: red;
    font-weight: bold;
}

/* Pagination Styles */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.pagination button {
    margin: 0 5px;
    padding: 10px 20px;
    border: 1px solid #ddd;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

.pagination button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}

.pagination-controls {
    display: flex;
    align-items: center;
}

.pagination-controls button {
    margin: 0 5px;
    padding: 10px 20px;
    border: 1px solid #ddd;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

.pagination-controls button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}


</style>
<script>
    function setJobRole(event, jobTitle) {
        event.preventDefault();
        const form = document.getElementById('contact-form');
        form.job_role.value = jobTitle;
        form.scrollIntoView();
    }
</script>

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
                    <input type="text" id="job_title" placeholder="Job Title">
                    <select id="tenure">
                        <option value="">Job Type</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                        <option value="Internship">Internship</option>
                        <option value="Contract">Contract</option>
                    </select>
                    <input type="text" id="job_location" placeholder="Location">
                    <button onclick="filterJobs()">Search</button>
                </div>
                <div id="no-jobs-message" style="display: none;">
                    No jobs found.
                </div>
                <div id="jobListings">
                    <!-- Job Listings -->
                    <div class="job-listings">
                        @php
                        use Illuminate\Support\Facades\DB;
                        $jobs = DB::table('jobs')->get();
                        @endphp

                        @foreach($jobs as $job)
                        <div class="job-listing" data-title="{{ $job->job_title }}" data-type="{{ $job->tenure }}" data-location="{{ $job->job_location }}">
                            <h2 class="job-title">{{ $job->job_title }}</h2>
                            <div class="job-details">
                                <span>{{ $job->tenure }}</span>
                                <span>{{ $job->job_domain }}</span>
                                <span>{{ $job->job_location }}</span>
                                <a href="/contact#contact-form" class="apply-btn" onclick="setJobRole(event, '{{ $job->job_title }}')">Apply Now</a>
                            </div>
                            <div><span class="salary">₹{{ number_format($job->salary, 0, '.', ',') }} / Month</span></div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Pagination Controls -->
                <div class="pagination">
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
    const title = document.getElementById('job_title').value.toLowerCase();
    const type = document.getElementById('tenure').value.toLowerCase();
    const location = document.getElementById('job_location').value.toLowerCase();

    const jobListings = Array.from(document.querySelectorAll('.job-listing'));
    filteredJobs = jobListings.filter(job => {
        const jobTitle = job.getAttribute('data-title').toLowerCase();
        const jobType = job.getAttribute('data-type').toLowerCase();
        const jobLocation = job.getAttribute('data-location').toLowerCase();

        return (
            (title === '' || jobTitle.includes(title)) &&
            (type === '' || jobType.includes(type)) &&
            (location === '' || jobLocation.includes(location))
        );
    });

    const jobCount = filteredJobs.length;
    const totalJobs = document.getElementById('totalJobs');
    totalJobs.textContent = jobCount;

    const noJobsMessage = document.getElementById('no-jobs-message');
    if (jobCount > 0) {
        noJobsMessage.style.display = 'none';
    } else {
        noJobsMessage.style.display = 'block';
    }

    currentPage = 1; // Reset to the first page
    displayJobs();
}

function displayJobs() {
    const jobListings = document.getElementById('jobListings');
    const noResultsMessage = document.getElementById('noResultsMessage');
    const pagination = document.querySelector('.pagination');

    jobListings.innerHTML = '';
    if (filteredJobs.length === 0) {
        noResultsMessage.style.display = 'block';
        pagination.style.display = 'none';
    } else {
        noResultsMessage.style.display = 'none';
        pagination.style.display = 'flex';
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
    filterJobs(); // Initialize filtering and job count on page load
});

</script>