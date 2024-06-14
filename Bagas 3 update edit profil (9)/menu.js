document.addEventListener("DOMContentLoaded", function() {
    // Restore the scroll position if available
    if (sessionStorage.getItem("scrollPosition") !== null) {
        window.scrollTo(0, sessionStorage.getItem("scrollPosition"));
    }
});

window.addEventListener("beforeunload", function() {
    // Save the current scroll position before the user navigates away
    sessionStorage.setItem("scrollPosition", window.scrollY);
});
