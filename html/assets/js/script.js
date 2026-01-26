document.addEventListener("DOMContentLoaded", () => {
  const stars = document.querySelectorAll(".star");
  const ratingInput = document.getElementById("rating");

  stars.forEach((star, index) => {
    star.addEventListener("click", () => {
      // The clicked star index is the rating
      const rating = index;

      const value = index;

      ratingInput.value = value + 1;

      // Update star images
      stars.forEach((s, i) => {
        s.src =
          i <= rating
            ? "assets/img/star.png" // filled star
            : "assets/img/empty_star.png"; // empty star
      });
    });
  });

  const flightContainer = document.querySelector(".adminbox");
  const flightSettingContainer = document.querySelector(
    ".adminflightsettingcontainer",
  );

  if (
    !flightSettingContainer.hasAttribute("inert") ||
    flightSettingContainer.style.display !== "none"
  ) {
    flightSettingContainer.setAttribute("inert", "");
    flightSettingContainer.style.display = "none";
  }

  if (flightContainer) {
    flightContainer.addEventListener("click", (event) => {
      const flightElement = event.target.closest("[id^='adminflightbyid']");

      if (flightElement) {
        const flightId = flightElement.id.replace("adminflightbyid", "");

        openFlightSettingMenu(flightId);
      }
    });
  }

  function openFlightSettingMenu(id) {
    fetch(`assets/php/api/get-flight.php?id=${id}`)
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const flight = data.flight;
          const infoDiv = flightSettingContainer.querySelector('.flightsettinginfo');
          if (infoDiv) {
            infoDiv.innerHTML = `
              <h2>${flight.fromCountry}<br>↓<br>${flight.toCountry}</h2>
              <h2>Cost: ${flight.cost}$</h2>
              <h2>Duration: ${flight.duration} Hours</h2>
            `;
          }

          const costInput = document.getElementById('flightcost');
          const durationInput = document.getElementById('flightduration');
          const flightIdInput = document.getElementById('flightid');
          if (costInput) costInput.value = flight.cost;
          if (durationInput) durationInput.value = flight.duration;
          if (flightIdInput) flightIdInput.value = id;

          flightSettingContainer.removeAttribute("inert");
          flightSettingContainer.style.display = "flex";

          const closeButton = document.querySelector(".window-option-close");
          if (closeButton) {
            closeButton.addEventListener("click", (event) => {
              flightSettingContainer.setAttribute("inert", "");
              flightSettingContainer.style.display = "none";      
            });
          }
        } else {
          console.error('Failed to load flight:', data.error);
        }
      })
      .catch(error => console.error('Error fetching flight:', error));
  }
});

function changeReview(delta) {
  const params = new URLSearchParams(window.location.search);
  let index = parseInt(params.get("comment")) || 0;

  if (index + delta >= total) {
    index = 0;
    delta = 0;
  }
  if (index + delta < 0) {
    index = total;
  }

  window.location.href = `/reviews.php?comment=${index + delta}#review`;
}
