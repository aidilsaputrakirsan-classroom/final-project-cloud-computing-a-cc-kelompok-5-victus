(function () {
    try {
        var key = "dark-mode-enabled";
        var saved = localStorage.getItem(key);
        var prefers =
            window.matchMedia &&
            window.matchMedia("(prefers-color-scheme: dark)").matches;
        var dark = saved === null ? prefers : saved === "true";
        if (dark) {
            document.documentElement.setAttribute("data-theme", "dark");
            try {
                document.documentElement.classList.add("dark-mode");
                if (document.body) document.body.classList.add("dark-mode");
            } catch (e) {}
        }
    } catch (e) {}
})();
