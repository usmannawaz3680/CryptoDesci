
const menuToggle = document.getElementById("menu-toggle");
const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");
const contentContainer = document.getElementById("content-container");
let sidebarCollapsed = false;

// Menu toggle for both mobile and desktop
menuToggle.addEventListener("click", () => {
  if (window.innerWidth < 768) {
    // Mobile behavior - slide in/out
    sidebar.classList.toggle("open");
    overlay.classList.toggle("hidden");
  } else {
    // Desktop behavior - collapse/expand
    sidebarCollapsed = !sidebarCollapsed;
    if (sidebarCollapsed) {
      sidebar.style.width = "80px";
      document.querySelectorAll(".sidebar-text, .dropdown-chevron").forEach((el) => {
        el.style.display = "none";
      });
    } else {
      sidebar.style.width = "18rem";
      document.querySelectorAll(".sidebar-text, .dropdown-chevron").forEach((el) => {
        el.style.display = "";
      });
    }
  }
});

// Close sidebar when clicking overlay (mobile only)
overlay.addEventListener("click", () => {
  sidebar.classList.remove("open");
  overlay.classList.add("hidden");
});

// Dropdown functionality
const dropdownButtons = document.querySelectorAll(".sidebar-nav-item > button");

dropdownButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const dropdown = button.nextElementSibling;
    const chevron = button.querySelector(".dropdown-chevron");

    // Close all other dropdowns
    document.querySelectorAll(".sidebar-dropdown.open").forEach((openDropdown) => {
      if (openDropdown !== dropdown) {
        openDropdown.classList.remove("open");
        const otherChevron = openDropdown.previousElementSibling.querySelector(".dropdown-chevron");
        otherChevron.classList.remove("open");
      }
    });

    // Toggle current dropdown
    dropdown.classList.toggle("open");
    chevron.classList.toggle("open");

    // Update aria-expanded
    const isExpanded = dropdown.classList.contains("open");
    button.setAttribute("aria-expanded", isExpanded);
  });
});

// Handle window resize
window.addEventListener("resize", () => {
  if (window.innerWidth >= 768) {
    // Reset mobile-specific states when switching to desktop
    overlay.classList.add("hidden");
    sidebar.classList.remove("open");

    // Apply collapsed state if active
    if (sidebarCollapsed) {
      sidebar.style.width = "80px";
      document.querySelectorAll(".sidebar-text, .dropdown-chevron").forEach((el) => {
        el.style.display = "none";
      });
    } else {
      sidebar.style.width = "18rem";
      document.querySelectorAll(".sidebar-text, .dropdown-chevron").forEach((el) => {
        el.style.display = "";
      });
    }
  } else {
    // Reset desktop-specific states when switching to mobile
    sidebar.style.width = "";
    document.querySelectorAll(".sidebar-text, .dropdown-chevron").forEach((el) => {
      el.style.display = "";
    });
  }
});

// Simulate page transitions for demonstration
document.querySelectorAll("a, button:not(#menu-toggle)").forEach((el) => {
  el.addEventListener("click", (e) => {
    // Prevent actual navigation
    if (el.tagName === "A") {
      e.preventDefault();
    }

    // Don't trigger for dropdown toggles
    if (el.closest(".sidebar-nav-item > button")) {
      return;
    }

    // Simulate page transition
    const contentArea = document.querySelector(".content-area");
    contentArea.style.opacity = "0";
    contentArea.style.transform = "translateY(10px)";

    setTimeout(() => {
      contentArea.style.opacity = "1";
      contentArea.style.transform = "translateY(0)";
    }, 300);

    // Close mobile menu if open
    if (window.innerWidth < 768) {
      sidebar.classList.remove("open");
      overlay.classList.add("hidden");
    }
  });
});
