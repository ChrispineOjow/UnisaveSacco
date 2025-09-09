document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".signup-form");
    const errorMessage = document.getElementById("errormessage");

    if (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const name = document.getElementById("Name").value.trim();
            const email = document.getElementById("Email").value.trim();
            const password = document.getElementById("Password").value.trim();

            if (!name || !email || !password) {
                errorMessage.innerHTML = `<div class="alert alert-danger" role="alert">Please fill in all fields.</div>`;
                return;
            }

            const formData = new FormData();
            formData.append("Name", name);
            formData.append("Email", email);
            formData.append("Password", password);

            fetch("signup.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    errorMessage.innerHTML = `<div class="alert alert-success" role="alert">${data.message}</div>`;
                    form.reset();
                    setTimeout(() => {
                        window.location.href = "../mainpage/MembershipLogin/MembershipLogin.html";
                    }, 1500); // Redirect after 1.5 seconds
                } else {
                    errorMessage.innerHTML = `<div class="alert alert-danger" role="alert">${data.message}</div>`;
                }
            })
            .catch(() => {
                errorMessage.innerHTML = `<div class="alert alert-danger" role="alert">An error occurred. Please try again.</div>`;
            });
        });
    }
});