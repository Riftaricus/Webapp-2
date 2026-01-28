document.addEventListener("DOMContentLoaded", () => {
  const slogan = document.getElementById("slogan");

  if (Math.random() > 0.95) {
    slogan.innerText = "We Bring You to Your Nightmares";
  }

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

  const menuSection = document.querySelector(".menu-section");
  const accountToggle = document.getElementById("account-menu-toggle");
  const menuItems = document.querySelectorAll(".menu-item");
  const submenus = document.querySelectorAll(".menu-submenu");
  const menuClose = document.querySelector(".menu-close");
  const submenuBacks = document.querySelectorAll(".submenu-back");

  if (accountToggle && menuSection) {
    accountToggle.addEventListener("click", () => {
      menuSection.style.display = "flex";
      menuSection.removeAttribute("inert");
    });
  }

  menuItems.forEach((item) => {
    item.addEventListener("click", () => {
      const submenuId = item.dataset.submenu;
      const submenu = document.querySelector(`[data-submenu-id="${submenuId}"]`);
      
      submenus.forEach((sm) => sm.classList.remove("active"));
      
      if (submenu) {
        submenu.classList.add("active");
      }
    });
  });

  submenuBacks.forEach((back) => {
    back.addEventListener("click", () => {
      const submenu = back.closest(".menu-submenu");
      if (submenu) {
        submenu.classList.remove("active");
      }
    });
  });

  if (menuClose) {
    menuClose.addEventListener("click", () => {
      if (menuSection) {
        menuSection.style.display = "none";
        menuSection.setAttribute("inert", "");
        submenus.forEach((sm) => sm.classList.remove("active"));
      }
    });
  }

  if (menuSection) {
    menuSection.addEventListener("click", (e) => {
      if (e.target === menuSection) {
        menuSection.style.display = "none";
        menuSection.setAttribute("inert", "");
        submenus.forEach((sm) => sm.classList.remove("active"));
      }
    });
  }

  if (window.location.href.includes("admin.php")) {
    const flightContainer = document.querySelector(".adminboxflight");
    const userContainer = document.querySelector(".adminboxuser");
    const flightSettingContainer = document.querySelector(
      ".adminflightsettingcontainer",
    );
    const userSettingContainer = document.querySelector(
      ".adminusersettingcontainer",
    );

    if (
      !flightSettingContainer.hasAttribute("inert") ||
      flightSettingContainer.style.display !== "none"
    ) {
      flightSettingContainer.setAttribute("inert", "");
      flightSettingContainer.style.display = "none";
    }

    if (
      userSettingContainer &&
      (!userSettingContainer.hasAttribute("inert") ||
        userSettingContainer.style.display !== "none")
    ) {
      userSettingContainer.setAttribute("inert", "");
      userSettingContainer.style.display = "none";
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

    if (userContainer) {
      userContainer.addEventListener("click", (event) => {
        const userElement = event.target.closest("[id^='adminuserbyid']");

        if (userElement) {
          const userId = userElement.id.replace("adminuserbyid", "");
          openUserSettingMenu(userId);
        }
      });
    }

    function openFlightSettingMenu(id) {
      fetch(`assets/php/api/get-flight.php?id=${id}`)
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            const flight = data.flight;
            const infoDiv =
              flightSettingContainer.querySelector(".flightsettinginfo");
            if (infoDiv) {
              infoDiv.innerHTML = `
              <h2>${flight.fromCountry}<br>↓<br>${flight.toCountry}</h2>
              <h2>Cost: ${flight.cost}$</h2>
              <h2>Duration: ${flight.duration} Hours</h2>
            `;
            }

            const costInput = document.getElementById("flightcost");
            const durationInput = document.getElementById("flightduration");
            const flightIdInput = document.getElementById("flightid");
            if (costInput) costInput.value = flight.cost;
            if (durationInput) durationInput.value = flight.duration;
            if (flightIdInput) flightIdInput.value = id;

            flightSettingContainer.removeAttribute("inert");
            flightSettingContainer.style.display = "flex";

            const closeButton = document.querySelector(".closehitbox");
            if (closeButton) {
              closeButton.addEventListener("click", (event) => {
                flightSettingContainer.setAttribute("inert", "");
                flightSettingContainer.style.display = "none";
              });
            }
          } else {
            console.error("Failed to load flight:", data.error);
          }
        })
        .catch((error) => console.error("Error fetching flight:", error));
    }

    function openUserSettingMenu(id) {
      fetch(`assets/php/api/get-user.php?id=${id}`)
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            const user = data.user;
            const infoDiv =
              userSettingContainer.querySelector(".usersettinginfo");
            if (infoDiv) {
              infoDiv.innerHTML = `
              <h2>${user.username}</h2>
              <h2>Created: ${user.creationDate}</h2>
            `;
            }

            const userIdInput = document.getElementById("userid");
            const usernameInput = document.getElementById("username");
            const languageSelect = document.getElementById("userlanguage");
            const isAdminRadio = document.getElementById("isadmin");
            const isNotAdminRadio = document.getElementById("isnotadmin");

            if (userIdInput) userIdInput.value = id;

            if (usernameInput) usernameInput.value = user.username;
            if (languageSelect) languageSelect.value = user.language;
            if (user.isAdmin && isAdminRadio) {
              isAdminRadio.checked = true;
            } else if (isNotAdminRadio) {
              isNotAdminRadio.checked = true;
            }

            userSettingContainer.removeAttribute("inert");
            userSettingContainer.style.display = "flex";

            const closeButton = userSettingContainer.querySelector(".closehitbox");
            if (closeButton) {
              closeButton.addEventListener("click", (event) => {
                userSettingContainer.setAttribute("inert", "");
                userSettingContainer.style.display = "none";

                const bookedFlightsContainer = document.querySelector(
                  ".bookedflightscontainer",
                );
                if (bookedFlightsContainer) {
                  bookedFlightsContainer.style.display = "none";
                }
              });
            }
          } else {
            console.error("Failed to load user:", data.error);
          }
        })
        .catch((error) => console.error("Error fetching user:", error));
    }

    const bookedFlightsButton = document.querySelector(".bookedflightsbutton");
    const bookedFlightsContainer = document.querySelector(
      ".bookedflightscontainer",
    );
    const closeBookedFlightsButton =
      bookedFlightsContainer.querySelector(".closehitbox");

    if (bookedFlightsButton && bookedFlightsContainer) {
      bookedFlightsButton.addEventListener("click", () => {
        const userIdInput = document.getElementById("userid");
        if (!userIdInput || !userIdInput.value) {
          console.error("No user ID found");
          return;
        }

        const userId = userIdInput.value;

        fetch(`assets/php/api/get-booked-flights.php?userId=${userId}`)
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              const bookedFlightsList =
                bookedFlightsContainer.querySelector(".bookedflightslist");

              if (data.bookedFlights.length === 0) {
                bookedFlightsList.innerHTML =
                  "<p>No booked flights for this user.</p>";
              } else {
                bookedFlightsList.innerHTML = data.bookedFlights
                  .map(
                    (flight) => `
                  <div class="bookedflightitem flex flexcolumn">
                    <h3>${flight.fromCountry} → ${flight.toCountry}</h3>
                    <p>Duration: ${flight.duration} Hours</p>
                    <p>Flight ID: ${flight.flightId}</p>
                  </div>
                `,
                  )
                  .join("");
              }

              bookedFlightsContainer.style.display = "flex";
            } else {
              console.error("Failed to load booked flights:", data.error);
            }
          })
          .catch((error) =>
            console.error("Error fetching booked flights:", error),
          );
      });
    }

    if (closeBookedFlightsButton && bookedFlightsContainer) {
      closeBookedFlightsButton.addEventListener("click", () => {
        bookedFlightsContainer.style.display = "none";
      });
    }
  }
});

window.onload = () => {
  const url = window.location.href;

  const splitUrl = url.split("?");

  const splitTransaction = splitUrl[1]?.split("=") || [];

  console.log(splitUrl);

  console.log(splitTransaction);

  if (typeof splitTransaction[1] !== "undefined") {
    if (typeof splitUrl[1] !== "undefined") {
      if (splitUrl[1].includes("transaction")) {
        showTransactionMenu(parseInt(splitTransaction[1]));
      } else {
        hideTransactionMenu();
      }
    }
  }
};

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

function hideTransactionMenu() {
  const transaction = document.getElementById("transaction");

  transaction.style.display = "none";
}

function showTransactionMenu(flightId) {
  const transaction = document.getElementById("transaction");

  const hiddenFlightId = document.getElementById("flightId");

  hiddenFlightId.value = flightId;

  transaction.style.display = "flex";
}

function updateCounter() {
  const counter = document.getElementById("contactmessagecounter");

  const message = document.getElementById("contactmessage");

  let amountOfChars = message.value.length.toString();

  if (amountOfChars.includes((68 - 1).toString())) {
    amountOfChars = amountOfChars.replaceAll((68 - 1).toString(), "##");
  }

  counter.textContent = amountOfChars + "/1000";
}
