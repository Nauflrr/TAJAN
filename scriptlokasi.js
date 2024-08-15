document.addEventListener('DOMContentLoaded', () => {
    fetchLocations();
});

function fetchLocations() {
    fetch('apilokasi.php?action=get_locations')
        .then(response => response.json())
        .then(data => {
            const locationSelect = document.getElementById('location');
            data.locations.forEach(location => {
                const option = document.createElement('option');
                option.value = location.id;
                option.textContent = location.name;
                locationSelect.appendChild(option);
            });
            // Fetch initial tank data for the first location
            fetchTankData();
        })
        .catch(error => console.error('Error fetching locations:', error));
}

function fetchTankData() {
    const locationId = document.getElementById('location').value;
    fetch(`apilokasi.php?action=get_tank_data&location_id=${locationId}`)
        .then(response => response.json())
        .then(data => {
            const capacity = data.capacity;
            document.getElementById('capacity').textContent =`${capacity}%`;
            const status = document.getElementById('status');
            if (capacity >= 100) {
                status.textContent = 'Penuh';
                status.style.color = '#FF0000'; // Red color
            } else if (capacity >= 81) {
                status.textContent = 'Hampir Penuh';
                status.style.color = '#FFA500'; // Orange color
            } else if (capacity >= 51) {
                status.textContent = 'Terisi Banyak';
                status.style.color = '#FFFF00'; // Yellow color
            } else if (capacity >= 1) {
                status.textContent = 'Terisi sedikit';
                status.style.color = '#00FF00'; // Green color
            } else {
                status.textContent = 'Kosong';
                status.style.color = '#808080'; // Gray color
            }
        })
        .catch(error => console.error('Error fetching tank data:', error));
}

function resetTank() {
    const locationId = document.getElementById('location').value;
    fetch('apilokasi.php?action=reset_tank', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ location_id: locationId })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                fetchTankData();
            } else {
                alert('Failed to reset tank');
            }
        })
        .catch(error => console.error('Error resetting tank:', error));
}
