document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("page-container");
    const toggle = document.getElementById("toggle-dark-mode");

    // Oldindan tanlangan holatni qo'llash
    if (localStorage.getItem("theme") === "dark") {
        container.classList.add("dark-mode", "sidebar-dark", "page-header-dark");
    }

    if (toggle) {
        toggle.addEventListener("click", function () {
            container.classList.toggle("dark-mode");
            container.classList.toggle("sidebar-dark");
            container.classList.toggle("page-header-dark");

            const isDark = container.classList.contains("dark-mode");
            localStorage.setItem("theme", isDark ? "dark" : "light");
        });
    }
});
