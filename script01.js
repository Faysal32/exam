document.addEventListener("DOMContentLoaded", function () {
    // Cancel button
    const backButton = document.getElementById("backbtn");
    if (backButton) {
        backButton.addEventListener("click", function (e) {
            e.preventDefault();
            window.history.back();
        });
    }

    // Check if data was just submitted
    if (localStorage.getItem("formSubmitted") === "1") {
        alert("Data submitted successfully");
        localStorage.removeItem("formSubmitted"); // clear the flag
        setTimeout(() => {
            window.location.href = "Layout02.html";
        }); // Redirect after 2 seconds
    }
});
