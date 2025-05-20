
document.addEventListener("DOMContentLoaded", function () {
    const backButton = document.getElementById("backbtn");

    if (backButton) {
        backButton.addEventListener("click", function (e) {
            e.preventDefault();
            window.history.back();
        });
    }
});
