document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    const resultsContainer = document.querySelector('.results');
    const paginationContainer = document.querySelector('.pagination');

    // Add these variables at the top of your app.js file to track pagination state.
    let currentPage = 1;
    let totalPages = 1;

    // Update the performSearch function to include pagination and sorting parameters.
    function performSearch(searchTerm, page, sortCriteria) {
        // Clear previous search results
        resultsContainer.innerHTML = '';

        // Make an AJAX request to the backend API with sorting and pagination parameters
        fetch(`/business/search?search_param=${searchTerm}&page=${page}&sort=${sortCriteria}`)
            .then(response => response.json())
            .then(data => {
                // Process the API response data and update the UI
                if (data.businesses.data.length > 0) {
                    data.businesses.data.forEach(result => {
                        // Create and append elements to display each search result
                        const resultElement = document.createElement('div');
                        resultElement.classList.add('result-item');
                        resultElement.innerHTML = `<h3>${result.name}</h3><p>${result.description}</p>`;
                        resultsContainer.appendChild(resultElement);
                    });

                    // Update pagination information
                    currentPage = data.businesses.current_page;
                    totalPages = data.businesses.last_page;
                    updatePaginationUI();
                } else {
                    // Display a message if no results were found
                    resultsContainer.innerHTML = '<p>No results found.</p>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Handle error, display an error message, or provide feedback to the user
            });
    }

    // Add event listeners for the "Previous" and "Next" buttons to navigate through pages.
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');

    prevButton.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            performSearch(searchInput.value.trim(), currentPage, sortCriteria);
        }
    });

    nextButton.addEventListener('click', () => {
        if (currentPage < totalPages) {
            currentPage++;
            performSearch(searchInput.value.trim(), currentPage, sortCriteria);
        }
    });

    // Function to update pagination UI elements (e.g., enable/disable buttons and display page info).
    function updatePaginationUI() {
        const pageInfo = document.getElementById('pageInfo');
        pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;

        prevButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === totalPages;
    }

    // Add an event listener for the "Sort" button.
    const sortButton = document.getElementById('sortButton');
    sortButton.addEventListener('click', () => {
        const sortCriteria = document.getElementById('sortCriteria').value;
        performSearch(searchInput.value.trim(), currentPage, sortCriteria);
    });

    // Initial search when the page loads (you can adjust this based on your requirements).
    document.addEventListener('DOMContentLoaded', function () {
        performSearch('', currentPage, 'name'); // Default sorting criteria
    });
});
