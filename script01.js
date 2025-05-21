document.addEventListener("DOMContentLoaded", function () {
    const backButton = document.getElementById("backbtn");
    if (backButton) {
        backButton.addEventListener("click", function (e) {
            e.preventDefault();
            window.history.back();
        });
    }

    
    if (localStorage.getItem("formSubmitted") === "1") {
        alert("Data submitted successfully");
        localStorage.removeItem("formSubmitted");
        setTimeout(() => {
            window.location.href = "Layout02.html";
        });
    }
});
