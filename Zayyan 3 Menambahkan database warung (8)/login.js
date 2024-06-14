document.addEventListener('DOMContentLoaded', function() {
    const profileButton = document.querySelector('.profil');
    const loginPopup = document.querySelector('.form-popup');
    const blurOverlay = document.querySelector('.blur-bg-overlay');

    const warungButton = document.querySelector('.warung-button');
    const bookmarkButton = document.querySelector('.bookmark-button');

    // Function to toggle login popup and overlay visibility
    function toggleLoginPopup() {
        loginPopup.classList.toggle('show');
        blurOverlay.classList.toggle('show');
    }

    // Show login popup when profile button is clicked
    profileButton.addEventListener('click', toggleLoginPopup);
    warungButton.addEventListener('click', toggleLoginPopup);
    bookmarkButton.addEventListener('click', toggleLoginPopup);

    // Hide login popup when clicking outside of the form-popup
    blurOverlay.addEventListener('click', toggleLoginPopup);
});
