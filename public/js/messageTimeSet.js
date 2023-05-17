document.addEventListener('DOMContentLoaded', function() {
    const alertElement = document.querySelector('.session-alert');

    if (alertElement) {
        setTimeout(function() {
            alertElement.remove();
        }, 5000);
    }
});