$(function () {
    "use strict";

    // Function to set the theme in local storage
    function setTheme(theme) {
        localStorage.setItem("selectedTheme", theme);
    }

    // Function to get the theme from local storage
    function getTheme() {
        return localStorage.getItem("selectedTheme") || "light-theme";
    }

    // Function to set dark mode state in local storage
    function setDarkModeState(isDarkMode) {
        localStorage.setItem("darkMode", isDarkMode);
    }

    // Function to get dark mode state from local storage
    function getDarkModeState() {
        return JSON.parse(localStorage.getItem("darkMode")) || false;
    }

    // Function to set toggle state in sessionStorage
    function setToggleState(isToggled) {
        sessionStorage.setItem("isToggled", isToggled);
    }

    // Function to get toggle state from sessionStorage
    function getToggleState() {
        return JSON.parse(sessionStorage.getItem("isToggled")) || false;
    }

    // Set the initial theme on page load
    const storedTheme = getTheme();
    const systemDarkMode =
        window.matchMedia &&
        window.matchMedia("(prefers-color-scheme: dark)").matches;
    const storedDarkMode = getDarkModeState();
    const storedToggleState = getToggleState();

    if (storedDarkMode || (systemDarkMode && !storedTheme)) {
        $("html").attr("class", "dark-theme");
        $(".dark-mode-icon i").attr("class", "bx bx-moon");
    } else {
        $("html").attr("class", storedTheme);
        $(".dark-mode-icon i").attr("class", "bx bx-sun");
    }

    // Set the initial toggle state
    if (storedToggleState) {
        $(".wrapper").addClass("toggled");
        $(".sidebar-wrapper").hover(
            function () {
                $(".wrapper").addClass("sidebar-hovered");
            },
            function () {
                $(".wrapper").removeClass("sidebar-hovered");
            }
        );
    }

    // Initialize PerfectScrollbar
    new PerfectScrollbar(".header-message-list");
    new PerfectScrollbar(".header-notifications-list");

    // Mobile search icon click event
    $(".mobile-search-icon").on("click", function () {
        $(".search-bar").addClass("full-search-bar");
    });

    // Search close click event
    $(".search-close").on("click", function () {
        $(".search-bar").removeClass("full-search-bar");
    });

    // Mobile toggle menu click event
    $(".mobile-toggle-menu").on("click", function () {
        $(".wrapper").addClass("toggled");
    });

    // Dark mode click event
    $(".dark-mode").on("click", function () {
        const isDarkMode = $("html").hasClass("dark-theme");
        if (isDarkMode) {
            $(".dark-mode-icon i").attr("class", "bx bx-sun");
            $("html").attr("class", "light-theme");
            setTheme("light-theme");
            setDarkModeState(false);
        } else {
            $(".dark-mode-icon i").attr("class", "bx bx-moon");
            $("html").attr("class", "dark-theme");
            setTheme("dark-theme");
            setDarkModeState(true);
        }
    });

    // Toggle icon click event
    $(".toggle-icon").click(function () {
        const isToggled = $(".wrapper").hasClass("toggled");
        if (isToggled) {
            $(".wrapper").removeClass("toggled");
            $(".sidebar-wrapper").unbind("hover");
            setToggleState(false);
        } else {
            $(".wrapper").addClass("toggled");
            $(".sidebar-wrapper").hover(
                function () {
                    $(".wrapper").addClass("sidebar-hovered");
                },
                function () {
                    $(".wrapper").removeClass("sidebar-hovered");
                }
            );
            setToggleState(true);
        }
    });

    // Back to top scroll event
    $(document).ready(function () {
        $(window).on("scroll", function () {
            $(this).scrollTop() > 300
                ? $(".back-to-top").fadeIn()
                : $(".back-to-top").fadeOut();
        });

        $(".back-to-top").on("click", function () {
            return (
                $("html, body").animate(
                    {
                        scrollTop: 0,
                    },
                    600
                ),
                !1
            );
        });
    });

    // Set active class based on current URL
    $(function () {
        var currentLocation = window.location;
        var activeMenuItem = $(".metismenu li a")
            .filter(function () {
                return this.href == currentLocation;
            })
            .addClass("")
            .parent()
            .addClass("mm-active");

        while (activeMenuItem.is("li")) {
            activeMenuItem = activeMenuItem
                .parent("")
                .addClass("mm-show")
                .parent("")
                .addClass("mm-active");
        }
    });

    // Initialize metisMenu
    $(function () {
        $("#menu").metisMenu();
    });

    // Chat toggle button click event
    $(".chat-toggle-btn").on("click", function () {
        $(".chat-wrapper").toggleClass("chat-toggled");
    });

    // Chat toggle button mobile click event
    $(".chat-toggle-btn-mobile").on("click", function () {
        $(".chat-wrapper").removeClass("chat-toggled");
    });

    // Email toggle button click event
    $(".email-toggle-btn").on("click", function () {
        $(".email-wrapper").toggleClass("email-toggled");
    });

    // Email toggle button mobile click event
    $(".email-toggle-btn-mobile").on("click", function () {
        $(".email-wrapper").removeClass("email-toggled");
    });

    // Compose mail button click event
    $(".compose-mail-btn").on("click", function () {
        $(".compose-mail-popup").show();
    });

    // Compose mail close click event
    $(".compose-mail-close").on("click", function () {
        $(".compose-mail-popup").hide();
    });
});
