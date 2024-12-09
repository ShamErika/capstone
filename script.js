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

const selectElement = document.getElementById('year-select');
    const graphFrame = document.getElementById('graph-frame');

    selectElement.addEventListener('change', () => {
      const selectedYear = selectElement.value;
      graphFrame.src = selectedYear;
    });


// end of testing 

$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})





//legend gis
  
  function addLegendItem(color, label) {
    const legend = document.getElementById("legend");
  
    const legendItem = document.createElement("div");
    legendItem.className = "legend-item";
  
    const legendSymbol = document.createElement("span");
    legendSymbol.className = "legend-symbol";
    legendSymbol.style.backgroundColor = color;
  
    const legendLabel = document.createElement("span");
    legendLabel.className = "legend-label";
    legendLabel.textContent = label;
  
    legendItem.appendChild(legendSymbol);
    legendItem.appendChild(legendLabel);
  
    legend.appendChild(legendItem);
  }


  // search bar
  const data = ["Dengue", "Prevention", "Signs", "Symptoms"];

document.getElementById('search-button').addEventListener('click', () => {
    const query = document.getElementById('search-input').value.toLowerCase();
    const results = data.filter(item => item.toLowerCase().includes(query));
    displayResults(results);
});

function displayResults(results) {
    const resultsContainer = document.getElementById('search-results');
    resultsContainer.innerHTML = results.length 
        ? `<ul>${results.map(item => `<li>${item}</li>`).join('')}</ul>` 
        : '<p>No results found.</p>';
}

//live search
document.getElementById('search-input').addEventListener('input', () => {
  const query = document.getElementById('search-input').value.toLowerCase();
  const results = data.filter(item => item.toLowerCase().includes(query));
  displayResults(results);
});

//ajax
document.getElementById('search-button').addEventListener('click', async () => {
  const query = document.getElementById('search-input').value;
  const response = await fetch(`/search?q=${encodeURIComponent(query)}`);
  const results = await response.json();
  displayResults(results);
});
//node.js
app.get('/search', (req, res) => {
  const query = req.query.q.toLowerCase();
  const results = data.filter(item => item.toLowerCase().includes(query));
  res.json(results);
});
