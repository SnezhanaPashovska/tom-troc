document.addEventListener('DOMContentLoaded', function() {
    function updateBadge() {
        console.log('Checking for new messages...');
        fetch('index.php?action=countNewMessages')
            .then(response => response.json())
            .then(data => {
                console.log('Received data:', data);
                if (data.newMessageCount !== undefined) {
                    document.querySelector('.notification-badge').textContent = data.newMessageCount;
                }
            })
            .catch(error => console.error('Error fetching new messages:', error));
    }

    // Check for new messages every 30 seconds
    setInterval(updateBadge, 30000);

    // Initial check
    updateBadge();
});




