document.addEventListener('DOMContentLoaded', function() {
    const profileButton = document.querySelector('.profil');
    const loginPopup = document.querySelector('.form-popup');
    const blurOverlay = document.querySelector('.blur-bg-overlay');

    // Function to toggle login popup and overlay visibility
    function toggleLoginPopup() {
        loginPopup.classList.toggle('show');
        blurOverlay.classList.toggle('show');
    }

    // Show login popup when profile button is clicked
    profileButton.addEventListener('click', toggleLoginPopup);

    // Hide login popup when clicking outside of the form-popup
    blurOverlay.addEventListener('click', toggleLoginPopup);
    
});

document.addEventListener("DOMContentLoaded", function() {
    const buatAkunLink = document.querySelectorAll('.buat-akun');
    const loginAkunLink = document.querySelector('.login-akun');
    const loginPopup = document.querySelector('.login-popup');
    const registerPopup = document.querySelector('.register-popup');
    const blurBgOverlay = document.querySelector('.blur-bg-overlay');

    buatAkunLink.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            loginPopup.classList.remove('show');
            registerPopup.classList.add('show');
            blurBgOverlay.classList.add('show');
        });
    });

    if (loginAkunLink) {
        loginAkunLink.addEventListener('click', function(event) {
            event.preventDefault();
            registerPopup.classList.remove('show');
            loginPopup.classList.add('show');
            blurBgOverlay.classList.add('show');
        });
    }

    blurBgOverlay.addEventListener('click', function() {
        loginPopup.classList.remove('show');
        registerPopup.classList.remove('show');
        blurBgOverlay.classList.remove('show');
    });
});