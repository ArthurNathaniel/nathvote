document.addEventListener("DOMContentLoaded", function () {
  const eventSearchInput = document.getElementById("eventSearch");
  const eventItems = document.querySelectorAll(".eventItem");

  eventSearchInput.addEventListener("input", function () {
    const searchTerm = eventSearchInput.value.toLowerCase();

    let hasResults = false;

    eventItems.forEach(function (eventItem) {
      const eventName = eventItem.querySelector("h3").textContent.toLowerCase();
      const eventDepartment = eventItem
        .querySelector("p")
        .textContent.toLowerCase();

      if (
        eventName.includes(searchTerm) ||
        eventDepartment.includes(searchTerm)
      ) {
        eventItem.style.display = "block";
        hasResults = true;
      } else {
        eventItem.style.display = "none";
      }
    });

    // Display no results message if there are no matching items
    const noResultsMessage = document.getElementById("noResultsMessage");
    noResultsMessage.style.display = hasResults ? "none" : "block";
  });
});
