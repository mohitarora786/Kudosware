document.addEventListener('DOMContentLoaded', (event) => {
    filterJobs();
});
 
const jobsPerPage = 5; // Number of jobs to display per page
let currentPage = 1;   // Current page
 
function filterJobs() {
    let titleFilter = document.getElementById('jobTitle').value.toLowerCase();
    let typeFilter = document.getElementById('jobType').value.toLowerCase();
    let locationFilter = document.getElementById('location').value.toLowerCase();
    let searchInput = document.getElementById('searchInput').value.toLowerCase();
 
    let jobListings = document.querySelectorAll('.job-listing');
    let totalJobs = 0;
    let totalPages = 0;
 
    jobListings.forEach((job) => {
        let jobTitle = job.getAttribute('data-title').toLowerCase();
        let jobType = job.getAttribute('data-type').toLowerCase();
        let jobLocation = job.getAttribute('data-location').toLowerCase();
 
        let matchesTitle = titleFilter === '' || jobTitle.includes(titleFilter);
        let matchesType = typeFilter === '' || jobType.includes(typeFilter);
        let matchesLocation = locationFilter === '' || jobLocation.includes(locationFilter);
        let matchesSearchInput = searchInput === '' || jobTitle.includes(searchInput) || jobType.includes(searchInput) || jobLocation.includes(searchInput);
 
        if (matchesTitle && matchesType && matchesLocation && matchesSearchInput) {
            job.style.display = 'block';
            totalJobs++;
        } else {
            job.style.display = 'none';
        }
    });
 
    document.getElementById('totalJobs').innerText = totalJobs;
   
    // Use proper conditional assignment for style display
    if (totalJobs === 0) {
        document.getElementById('noResultsMessage').style.display = 'block';
        document.getElementById('noPagination').style.display = 'none'; // Assuming you want to hide pagination when there are no results
    } else {
        document.getElementById('noResultsMessage').style.display = 'none';
        document.getElementById('noPagination').style.display = 'flex';
    }
 
    paginateJobs(totalJobs);
}
 
function paginateJobs(totalJobs) {
    let jobListings = Array.from(document.querySelectorAll('.job-listing')).filter(job => job.style.display === 'block');
    let totalPages = Math.ceil(totalJobs / jobsPerPage);
 
    jobListings.forEach((job, index) => {
        job.style.display = (index >= (currentPage - 1) * jobsPerPage && index < currentPage * jobsPerPage) ? 'block' : 'none';
    });
 
    document.getElementById('paginationControls').innerHTML = generatePagination(totalPages);
    document.getElementById('nextButton').disabled = currentPage >= totalPages;
    document.getElementById('prevButton').disabled = currentPage <= 1;
}
 
function generatePagination(totalPages) {
    let paginationHTML = '';
    for (let i = 1; i <= totalPages; i++) {
        paginationHTML += `<button onclick="goToPage(${i})" class="${currentPage === i ? 'active' : ''}">${i}</button>`;
    }
    return paginationHTML;
}
 
function goToPage(page) {
    currentPage = page;
    filterJobs();
}
 
function goToNextPage() {
    let jobListings = document.querySelectorAll('.job-listing').length;
    let totalPages = Math.ceil(jobListings / jobsPerPage);
    if (currentPage < totalPages) {
        currentPage++;
        console.log('Going to page:', currentPage);
        filterJobs();
    }
}
 
function goToPreviousPage() {
    if (currentPage > 1) {
        currentPage--;
        filterJobs();
    }
}