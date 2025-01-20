document.getElementById('appointmentForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(e.target);
    formData.append('day', selectedCell.dataset.day);

    fetch('save_appointment.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Notify the user
        closeModal();
    })
    .catch(error => console.error('Error:', error));
});
