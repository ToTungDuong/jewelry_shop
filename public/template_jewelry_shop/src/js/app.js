// Get all the navigation links
var navLinks = document.querySelectorAll(".navbar-nav .nav-link");
// Loop through each link and add click event listeners
for (var i = 0; i < navLinks.length; i++) {
  navLinks[i].addEventListener("click", function () {
    // Remove the 'active' class from all links
    for (var j = 0; j < navLinks.length; j++) {
      navLinks[j].classList.remove("active");
    }

    // Add the 'active' class to the clicked link
    this.classList.add("active");
  });
}

// Get all the pagination links
var pageLinks = document.querySelectorAll(".pagination .page-link");

// Loop through each link and add click event listeners
for (var i = 0; i < pageLinks.length; i++) {
  pageLinks[i].addEventListener("click", function (event) {
    event.preventDefault();
    // Remove the 'active' class from all links
    for (var j = 0; j < pageLinks.length; j++) {
      pageLinks[j].classList.remove("active");
    }

    // Add the 'active' class to the clicked link
    this.classList.add("active");

    event.preventDefault();

    // Get the target ID from the data-target attribute
    const targetId = this.dataset.target;

    // Hide all list_top divs
    const listTopDivs = document.querySelectorAll(".list_top");
    listTopDivs.forEach((div) => div.classList.add("d-none"));

    // Show the corresponding list_top div based on the target ID
    const targetDiv = document.getElementById(targetId);
    targetDiv.classList.remove("d-none");
  });
}
