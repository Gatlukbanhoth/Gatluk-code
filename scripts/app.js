document.addEventListener("DOMContentLoaded", () => {
  const mainContentArea = document.getElementById("main-content-area");
  const navHomeLink = document.getElementById("nav-home");
  const navRegisterCandidateLink = document.getElementById(
    "nav-register-candidate"
  );

  // Function to load content dynamically
  async function loadContent(contentId) {
    let filePath = "";
    let reinitializeMultiStepForm = false;

    if (contentId === "home") {
      filePath = "./pages/home_content.php";
    } else if (contentId === "register-candidate") {
      filePath = "./pages/register_candidate_form_wrapper.php";
      reinitializeMultiStepForm = true; // Flag to re-run multi-step form logic
    } else {
      console.error("Unknown content ID:", contentId);
      return;
    }

    try {
      const response = await fetch(filePath);
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      const content = await response.text();
      mainContentArea.innerHTML = content;

      // If the loaded content is the registration form, re-initialize its JS
      if (reinitializeMultiStepForm) {
        // Since multi_step_form.js is already loaded, we need to run its DOMContentLoaded logic again.
        // A common pattern is to wrap the multi-step logic in a function and call it.
        // Assuming multi_step_form.js has a global function like `initMultiStepForm()`
        // OR you can dispatch a custom event to re-trigger its logic.
        // For simplicity, I'll recommend wrapping multi-step logic in a function.
        if (typeof initMultiStepForm === "function") {
          // Check if the function exists
          initMultiStepForm();
        } else {
          console.warn(
            "initMultiStepForm function not found. Ensure multi_step_form.js is properly structured."
          );
          // Fallback: If not structured as a function, you might need to
          // manually re-attach event listeners here, which is less ideal.
          // Or simply reload multi_step_form.js script (less efficient)
          // const script = document.createElement('script');
          // script.src = './scripts/multi_step_form.js';
          // mainContentArea.appendChild(script);
        }

        // Add event listener for the "Apply to Register as Candidate" button on the home page
        // This needs to be attached AFTER the home_content.php is loaded.
        const homeRegisterButton = document.getElementById(
          "load-register-candidate"
        );
        if (homeRegisterButton) {
          homeRegisterButton.addEventListener("click", (event) => {
            event.preventDefault();
            loadContent("register-candidate");
          });
        }
      }
    } catch (error) {
      console.error("Error loading content:", error);
      mainContentArea.innerHTML =
        '<p class="text-red-500">Failed to load content. Please try again.</p>';
    }
  }

  // Add event listeners for navigation links
  if (navHomeLink) {
    navHomeLink.addEventListener("click", (event) => {
      event.preventDefault(); // Prevent default link behavior
      loadContent(navHomeLink.dataset.contentId);
    });
  }

  if (navRegisterCandidateLink) {
    navRegisterCandidateLink.addEventListener("click", (event) => {
      event.preventDefault(); // Prevent default link behavior
      loadContent(navRegisterCandidateLink.dataset.contentId);
    });
  }
  const initialHomeRegisterButton = document.getElementById(
    "load-register-candidate"
  );
  if (initialHomeRegisterButton) {
    initialHomeRegisterButton.addEventListener("click", (event) => {
      event.preventDefault();
      loadContent("register-candidate");
    });
  }
});
