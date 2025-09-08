document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    if (!form) return;

    // Create or select a message div
    let msgDiv = document.getElementById("login-message");
    if (!msgDiv) {
        msgDiv = document.createElement("div");
        msgDiv.id = "login-message";
        form.insertBefore(msgDiv, form.firstChild);
    }

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();

        if (!email || !password) {
            msgDiv.innerHTML = `<div class="alert alert-danger" role="alert">Please fill in all fields.</div>`;
            return;
        }

        const formData = new FormData();
        formData.append("email", email);
        formData.append("password", password);

        fetch("../../php/Models/MemberLogin.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                msgDiv.innerHTML = `<div class="alert alert-success" role="alert">${data.message}</div>`;
                setTimeout(() => {
                    // Redirect to member dashboard or homepage
                    window.location.href = "MemberDashboard.html";
                }, 1500);
            } else {
                msgDiv.innerHTML = `<div class="alert alert-danger" role="alert">${data.message}</div>`;
            }
        })
        .catch(() => {
            msgDiv.innerHTML = `<div class="alert alert-danger" role="alert">An error occurred. Please try again.</div>`;
        });
    });
});