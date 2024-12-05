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





document.addEventListener("DOMContentLoaded", () => {
    const loginBtn = document.getElementById("loginBtn");
    const modal = document.getElementById("loginModal");
    const closeBtn = document.querySelector(".close");
    const loginForm = document.getElementById("adminLoginForm");
  
    // Open modal
    loginBtn.addEventListener("click", (e) => {
      e.preventDefault();
      modal.style.display = "flex";
    });
  
    // Close modal
    closeBtn.addEventListener("click", () => {
      modal.style.display = "none";
    });
  
    // Close modal when clicking outside the content
    window.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.style.display = "none";
      }
    });
  
    // Handle form submission
    loginForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const username = document.getElementById("username").value;
      const password = document.getElementById("password").value;
  
      // Perform authentication logic (e.g., API call)
      console.log(`Username: ${username}, Password: ${password}`);
  
      // Close modal and reset form
      modal.style.display = "none";
      loginForm.reset();
    });
  });
  
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
