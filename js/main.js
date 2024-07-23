document.addEventListener("DOMContentLoaded", function() {
    const themeToggle = document.getElementById("theme-toggle");
    const body = document.body;
    const themeIcon = document.getElementById("theme-icon");
    const logoImage = document.getElementById("logo-image");

    // Guarda a última opção de cor
    if (localStorage.getItem("dark-mode") === "enabled") {
        body.classList.add("dark-mode");
        themeToggle.checked = true;
        themeIcon.src = "img/moon.png";
        logoImage.src = "img/ropelato_white.png"; // Corrigido para o logo branco
        console.log("Dark mode enabled from localStorage");
    } else {
        themeIcon.src = "img/sun.png";
        logoImage.src = "img/ropelato_dark.png";
        console.log("Light mode enabled from localStorage");
    }

    themeToggle.addEventListener("change", function() {
        if (themeToggle.checked) {
            body.classList.add("dark-mode");
            themeIcon.src = "img/moon.png";
            logoImage.src = "img/ropelato_white.png";
            localStorage.setItem("dark-mode", "enabled");
            console.log("Dark mode enabled");
        } else {
            body.classList.remove("dark-mode");
            themeIcon.src = "img/sun.png";
            logoImage.src = "img/ropelato_dark.png";
            localStorage.setItem("dark-mode", "disabled");
            console.log("Light mode enabled");
        }
    });

    // Enviar para 404.php em caso de tentativa de injeção
    if (window.location.href.includes("'") || window.location.href.includes("\"")) {
        window.location.href = "404.php";
    }
});
