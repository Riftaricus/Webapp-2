if (window.innerWidth <= 850) {
  document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("header-menu-toggle");
    const menu = document.getElementById("popdown-menu");
    let menuOpen = false;

    if (menuToggle && menu) {
      menuToggle.addEventListener("click", function (e) {
        e.stopPropagation();
        menuOpen = !menuOpen;
        if (menuOpen) {
          menu.style.display = "block";
          setTimeout(() => {
            menu.style.opacity = 1;
          }, 10);
        } else {
          menu.style.opacity = 0;
          setTimeout(() => {
            menu.style.display = "none";
          }, 200);
        }
      });
      document.addEventListener("click", function (e) {
        if (menuOpen && !menu.contains(e.target) && e.target !== menuToggle) {
          menu.style.opacity = 0;
          setTimeout(() => {
            menu.style.display = "none";
          }, 200);
          menuOpen = false;
        }
      });
    }
  });
}

function hideMenu() {
  const popdown = document.getElementById("popdown-menu");

  popdown.style.display = "none";
}

function showMenu() {
  const popdown = document.getElementById("popdown-menu");

  popdown.style.display = "flex";
}

function toggleMenu() {
  const popdown = document.getElementById("popdown-menu");

  if (popdown.style.display == "none") {
    showMenu();
  } else {
    hideMenu();
  }
}

document.addEventListener("DOMContentLoaded", () => {
  screenWidth = window.screen.width;

  const phoneHeader = document.getElementById("small-header");

  const normalHeader = document.getElementById("big-header");

  if (screenWidth > 750) {
    phoneHeader.remove();
  } else {
    normalHeader.remove();
  }

  const searchmenu = document.getElementById("searchmenu");
  if (
    window.location.href.includes("searchmenu") &&
    window.location.href.includes("flights")
  ) {
    searchmenu.style.display = "flex";
  }

  const slogan = document.getElementById("slogan");
  if (Math.random() > 0.95 && slogan) {
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
  const accountToggle = Array.from(
    document.getElementsByClassName("account-menu-toggle"),
  );
  const menuItems = document.querySelectorAll(".menu-item");
  const submenus = document.querySelectorAll(".menu-submenu");
  const menuClose = document.querySelector(".menu-close");
  const submenuBacks = document.querySelectorAll(".submenu-back");
  accountToggle.forEach((element) => {
    if (element && menuSection) {
      element.addEventListener("click", () => {
        menuSection.style.display = "flex";
        menuSection.removeAttribute("inert");
      });
    }
  });

  menuItems.forEach((item) => {
    item.addEventListener("click", () => {
      const submenuId = item.dataset.submenu;
      const submenu = document.querySelector(
        `[data-submenu-id="${submenuId}"]`,
      );

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

  // Show/hide confirm password field based on password input
  const settingsPasswordInput = document.getElementById("settings-password");
  const confirmPasswordContainer = document.querySelector(
    ".settings-confirm-password-container",
  );

  if (settingsPasswordInput && confirmPasswordContainer) {
    settingsPasswordInput.addEventListener("input", () => {
      if (settingsPasswordInput.value.length > 0) {
        confirmPasswordContainer.style.display = "flex";
      } else {
        confirmPasswordContainer.style.display = "none";
      }
    });
  }

  if (window.location.href.includes("admin.php")) {
    const flightContainer = document.querySelector(".admin-grid");
    const userContainer = document.querySelectorAll(".admin-grid")[1];
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

    if (flightSettingContainer) {
      flightSettingContainer.addEventListener("click", (e) => {
        if (e.target === flightSettingContainer) {
          flightSettingContainer.setAttribute("inert", "");
          flightSettingContainer.style.display = "none";
        }
      });

      const flightCloseBtn =
        flightSettingContainer.querySelector(".admin-modal-close");
      if (flightCloseBtn) {
        flightCloseBtn.addEventListener("click", () => {
          flightSettingContainer.setAttribute("inert", "");
          flightSettingContainer.style.display = "none";
        });
      }
    }

    if (userSettingContainer) {
      userSettingContainer.addEventListener("click", (e) => {
        if (e.target === userSettingContainer) {
          userSettingContainer.setAttribute("inert", "");
          userSettingContainer.style.display = "none";
          const bookedFlightsContainer = document.querySelector(
            ".bookedflightscontainer",
          );
          if (bookedFlightsContainer) {
            bookedFlightsContainer.style.display = "none";
          }
        }
      });

      const userCloseBtn = userSettingContainer.querySelector(
        ".admin-modal-close:not(.booked-close)",
      );
      if (userCloseBtn) {
        userCloseBtn.addEventListener("click", () => {
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
              <div class="admin-item-header" style="text-align: center; margin-bottom: 1rem;">
                <strong>${flight.fromCountry}</strong> → <strong>${flight.toCountry}</strong>
              </div>
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
              <div class="admin-item-header" style="text-align: center; margin-bottom: 1rem;">
                <strong>${user.username}</strong>
                <div style="font-size: 0.8rem; color: #4a4a4a;">Created: ${user.creationDate}</div>
              </div>
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
      bookedFlightsContainer?.querySelector(".booked-close");

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

var reviewIndex = 0;

changeReview(1);

function changeReview(delta) {
  fetch("assets/php/api/get-reviews.php", {
    method: "GET",
    credentials: "include",
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        reviewIndex += delta;

        if (reviewIndex >= data.ratings.length) {
          reviewIndex = 0;
        } else if (reviewIndex <= 0) {
          reviewIndex = data.ratings.length - 1;
        }

        message = data.ratings[reviewIndex]["Message"];
        rating = data.ratings[reviewIndex]["Rating"];
        const reviewmessage = document.getElementById("reviewmessage");
        if (reviewmessage) {
          reviewmessage.innerText = message;

          const stars = document.querySelectorAll(".reviewstar");

          stars.forEach((star, index) => {
            if (index + 1 <= rating) {
              star.src = "assets/img/star.png";
            } else {
              star.src = "assets/img/empty_star.png";
            }
          });
        }
      } else {
        console.error(data.error);
      }
    });
}

function hideTransactionMenu() {
  const transaction = document.getElementById("transaction");

  if (transaction) {
    transaction.style.display = "none";
    transaction.setAttribute("inert", "");
  }
}

function showTransactionMenu(flightId) {
  const transaction = document.getElementById("transaction");
  const hiddenFlightId = document.getElementById("flightId");

  hiddenFlightId.value = flightId;

  if (transaction) {
    transaction.style.display = "flex";
    transaction.removeAttribute("inert");

    const firstInput = transaction.querySelector("input:not([type='hidden'])");
    if (firstInput) firstInput.focus();
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const transactionSection = document.getElementById("transaction");
  const transactionClose = document.querySelector(".transaction-close");

  if (transactionSection) {
    transactionSection.addEventListener("click", (e) => {
      if (e.target === transactionSection) {
        hideTransactionMenu();
      }
    });

    if (transactionClose) {
      transactionClose.addEventListener("click", () => {
        hideTransactionMenu();
      });
    }

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && transactionSection.style.display === "flex") {
        hideTransactionMenu();
      }
    });
  }

  const expiryInput = document.getElementById("baExpiry");
  if (expiryInput) {
    expiryInput.addEventListener("input", (e) => {
      let value = e.target.value.replace(/\D/g, "");
      if (value.length >= 2) {
        value = value.substring(0, 2) + "/" + value.substring(2, 4);
      }
      e.target.value = value;
    });
  }

  const cardInput = document.getElementById("baCaNum");
  if (cardInput) {
    cardInput.addEventListener("input", (e) => {
      let value = e.target.value.replace(/\s/g, "").replace(/\D/g, "");
      value = value.match(/.{1,4}/g)?.join(" ") || value;
      e.target.value = value;
    });
  }
});

function updateCounter() {
  const counter = document.getElementById("contactmessagecounter");

  const message = document.getElementById("contactmessage");

  let amountOfChars = message.value.length.toString();

  if (amountOfChars.includes((68 - 1).toString())) {
    amountOfChars = amountOfChars.replaceAll((68 - 1).toString(), "##");
  }

  counter.textContent = amountOfChars + "/1000";
}
