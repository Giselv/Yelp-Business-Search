<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Search App</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>Business Search</h1>
    </header>
    <main>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Enter search term">
            <select id="sortCriteria">
                <option value="name">Sort by Name</option>
                <option value="description">Sort by Description</option>
                <!-- Add more sorting criteria options if needed -->
            </select>
            <button id="searchButton">Search</button>
            <button id="sortButton">Sort</button>
        </div>
        <div class="results">
            <!-- Search results will be displayed here -->
        </div>
    </main>
    <div class="pagination">
        <button id="prevButton">Previous</button>
        <span id="pageInfo">Page 1 of 1</span>
        <button id="nextButton">Next</button>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
