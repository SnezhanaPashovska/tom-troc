document.addEventListener('DOMContentLoaded', function() {
    const badge = document.querySelector('.notification-badge');

    function updateBadge() {
        fetch('countNewMessages.php')
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                } else {
                    badge.textContent = data.newMessageCount;
                }
            })
            .catch(error => console.error('Error fetching new message count:', error));
    }

    // Update badge every 30 seconds
    setInterval(updateBadge, 30000);

    // Initial call to set the badge on page load
    updateBadge();
});


