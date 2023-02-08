var filtersButton = document.getElementById("filters");
var filtersContainer = document.getElementById("filters-container");
function toggleFilters() {
    if(filtersContainer.style.display === "flex")
        filtersContainer.style.display = "none";
    else
        filtersContainer.style.display = "flex"
}