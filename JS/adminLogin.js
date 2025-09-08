document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const form = event.target;
    const formData = new FormData(form);

    fetch('../../php/Models/admincredentials.php', { // <-- Corrected path
        method: 'POST',
        body: formData
    })
    .then(async response => {
        const text = await response.text();
        try {
            return JSON.parse(text);
        } catch (e) {
            throw new Error('Server returned invalid JSON: ' + text);
        }
    })
    .then(data => {
        const responseDiv = document.getElementById('responseMessage');
        if (data.success) {
            responseDiv.style.display = 'none';
            window.location.href = '../admin/adminDashboard.html'; // Redirect to dashboard
        } else {
            responseDiv.innerText = data.message;
            responseDiv.classList.add('alert', 'alert-danger');
            responseDiv.style.display = 'block';
        }
    })
    .catch(error => {
        const responseDiv = document.getElementById('responseMessage');
        responseDiv.innerText = 'An error occurred: ' + error;
        responseDiv.classList.add('alert', 'alert-danger');
        responseDiv.style.display = 'block';
    });
});
