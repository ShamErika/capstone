function performSearch() {
    const query = document.getElementById("search").value;
    if (query) {
        alert(`You searched for: ${query}`);
        // In a real app, you might redirect or use this query for an API call
        // Example: window.location.href = `/search?q=${query}`;
    } else {
        alert("Please enter a search query.");
    }
}