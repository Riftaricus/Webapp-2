document.addEventListener("DOMContentLoaded", () => {
    const flightContainer = document.querySelector(".adminbox");
    const flightSettingContainer = document.querySelector(".adminflightsettingcontainer");

    if (!flightSettingContainer.hasAttribute('inert') || flightSettingContainer.style.display !== 'none') {
        flightSettingContainer.setAttribute('inert', '');
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
        flightSettingContainer.removeAttribute('inert');
        flightSettingContainer.style.display = "flex";
        flightSettingContainer.id = id;
    }
});
