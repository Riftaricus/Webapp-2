document.addEventListener("DOMContentLoaded", () => {
  const stars = document.querySelectorAll(".star");
  const ratingInput = document.getElementById("rating");

  stars.forEach((star, index) => {
    star.addEventListener("click", () => {
      // The clicked star index is the rating
      const rating = index;

      const value = index;

      ratingInput.value = value;

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
    flightSettingContainer.removeAttribute("inert");
    flightSettingContainer.style.display = "flex";
    flightSettingContainer.id = id;
  }
});
