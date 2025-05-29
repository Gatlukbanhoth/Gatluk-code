// Wrap the entire existing code in a function
function initMultiStepForm() {
  let currentStep = 1;
  const formStepElements = [
    document.getElementById("form-step-1"),
    document.getElementById("form-step-2"),
    document.getElementById("form-step-3"),
    document.getElementById("form-step-4"),
  ];
  const stepIndicators = [
    document.getElementById("step1-indicator"),
    document.getElementById("step2-indicator"),
    document.getElementById("step3-indicator"),
    document.getElementById("step4-indicator"),
  ];

  // Check if the form elements exist before proceeding
  // This is important because the script might run before the content is loaded
  if (!formStepElements[0] || !stepIndicators[0]) {
    // console.log("Multi-step form elements not found, skipping initialization.");
    return;
  }

  // Form elements and their IDs
  const candidateForm = document.getElementById("candidate-form");
  const positionSelect = document.getElementById("position");
  const applicationFeeInput = document.getElementById("applicationFee");

  const summaryPositionSpan = document.getElementById("summary-position");
  const summaryFeeSpan = document.getElementById("summary-fee");

  const mpesaPaymentContent = document.getElementById("mpesa-payment-content");

  const mpesaAmountSpan = document.getElementById("mpesa-amount");
  const mpesaAccountNumberSpan = document.getElementById(
    "mpesa-account-number"
  );

  const paymentProcessingAnimation = document.getElementById(
    "payment-processing-animation"
  );
  const paymentSuccessSection = document.getElementById("payment-success");
  const paymentErrorSection = document.getElementById("payment-error");

  let formData = {};
  let transactionReference = "";

  function generateReferenceNumber() {
    return "SSSAK" + Math.floor(10000 + Math.random() * 90000);
  }

  function showStep(stepNum) {
    formStepElements.forEach((step, index) => {
      if (index + 1 === stepNum) {
        step.classList.remove("hidden");
      } else {
        step.classList.add("hidden");
      }
    });

    stepIndicators.forEach((indicator, index) => {
      if (index + 1 <= stepNum) {
        indicator.classList.remove(
          "bg-gray-300",
          "dark:bg-gray-600",
          "text-gray-600",
          "dark:text-gray-300"
        );
        indicator.classList.add("bg-primary", "text-white");
      } else {
        indicator.classList.remove("bg-primary", "text-white");
        indicator.classList.add(
          "bg-gray-300",
          "dark:bg-gray-600",
          "text-gray-600",
          "dark:text-gray-300"
        );
      }
    });
    currentStep = stepNum;
  }

  // Initialize: Show the first step ONLY IF the form is currently active
  // This prevents errors if this function is called when the form isn't on screen.
  if (
    document.getElementById("form-step-1") &&
    !document.getElementById("form-step-1").classList.contains("hidden")
  ) {
    showStep(1);
  } else {
    // If the form is not visible, ensure all steps are hidden initially
    // This is important when switching between content
    formStepElements.forEach((step) => step.classList.add("hidden"));
    // And reset indicators
    stepIndicators.forEach((indicator, index) => {
      indicator.classList.remove("bg-primary", "text-white");
      indicator.classList.add(
        "bg-gray-300",
        "dark:bg-gray-600",
        "text-gray-600",
        "dark:text-gray-300"
      );
    });
    stepIndicators[0].classList.remove(
      "bg-gray-300",
      "dark:bg-gray-600",
      "text-gray-600",
      "dark:text-gray-300"
    );
    stepIndicators[0].classList.add("bg-primary", "text-white");
  }

  // --- Step 1 Logic ---
  if (positionSelect) {
    positionSelect.addEventListener("change", () => {
      const selectedOption =
        positionSelect.options[positionSelect.selectedIndex];
      const fee = selectedOption.dataset.fee
        ? parseFloat(selectedOption.dataset.fee)
        : 0;
      applicationFeeInput.value = fee > 0 ? fee.toFixed(2) : "";
    });
  }

  const nextToStep2Button = document.getElementById("next-to-step2");
  if (nextToStep2Button) {
    nextToStep2Button.addEventListener("click", () => {
      if (!candidateForm.checkValidity()) {
        candidateForm.reportValidity();
        return;
      }

      formData.fullName = document.getElementById("fullName").value;
      formData.studentId = document.getElementById("studentId").value;
      formData.email = document.getElementById("email").value;
      formData.phone = document.getElementById("phone").value;
      formData.institution = document.getElementById("institution").value;
      formData.course = document.getElementById("course").value;
      formData.position =
        positionSelect.options[positionSelect.selectedIndex].text;
      formData.applicationFee = parseFloat(applicationFeeInput.value);

      transactionReference = generateReferenceNumber();
      formData.transactionReference = transactionReference;

      summaryPositionSpan.textContent = formData.position;
      summaryFeeSpan.textContent = `KES ${formData.applicationFee.toLocaleString()}`;

      mpesaAmountSpan.textContent = `KES ${formData.applicationFee.toLocaleString()}`;
      mpesaAccountNumberSpan.innerHTML = `SSSAK<span id="ref-number">${transactionReference}</span>`;

      showStep(2);
    });
  }

  // --- Step 2 Logic ---
  formData.paymentMethod = "mpesa";

  const nextToStep3Button = document.getElementById("next-to-step3");
  if (nextToStep3Button) {
    nextToStep3Button.addEventListener("click", () => {
      showStep(3);
    });
  }

  const backToStep1Button = document.getElementById("back-to-step1");
  if (backToStep1Button) {
    backToStep1Button.addEventListener("click", () => {
      showStep(1);
    });
  }

  // --- Step 3 Logic (M-Pesa Only) ---
  const completePaymentButton = document.getElementById("complete-payment");
  if (completePaymentButton) {
    completePaymentButton.addEventListener("click", async () => {
      const mpesaNumberInput = document.getElementById("mpesaNumber");
      if (!mpesaNumberInput.checkValidity()) {
        mpesaNumberInput.reportValidity();
        return;
      }

      formData.mpesaNumber = mpesaNumberInput.value;

      showStep(4);
      paymentSuccessSection.classList.add("hidden");
      paymentErrorSection.classList.add("hidden");
      paymentProcessingAnimation.classList.remove("hidden");

      try {
        const response = await fetch("./api/initiate_mpesa_stk.php", {
          // Path relative to index.php
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            phoneNumber: formData.mpesaNumber,
            amount: formData.applicationFee,
            accountReference: formData.transactionReference,
            transactionDesc: `Election Fee for ${formData.fullName} (${formData.position})`,
            studentId: formData.studentId,
            email: formData.email,
            fullName: formData.fullName,
            position: formData.position,
          }),
        });

        const result = await response.json();

        paymentProcessingAnimation.classList.add("hidden");

        if (response.ok && result.success) {
          paymentSuccessSection.classList.remove("hidden");
          populateReceipt(result.transactionDetails);
        } else {
          console.error(
            "STK Push initiation failed:",
            result.message || result.error
          );
          paymentErrorSection.classList.remove("hidden");
        }
      } catch (error) {
        console.error("Error initiating M-Pesa STK Push:", error);
        paymentProcessingAnimation.classList.add("hidden");
        paymentErrorSection.classList.remove("hidden");
      }
    });
  }

  const backToStep2Button = document.getElementById("back-to-step2");
  if (backToStep2Button) {
    backToStep2Button.addEventListener("click", () => {
      showStep(2);
    });
  }

  // --- Step 4 Logic ---
  function populateReceipt(details) {
    document.getElementById("receipt-number").textContent =
      details.receiptNo || "N/A";
    document.getElementById("receipt-date").textContent =
      details.transactionDate
        ? new Date(details.transactionDate).toLocaleDateString("en-KE")
        : "N/A";
    document.getElementById("receipt-time").textContent =
      details.transactionDate
        ? new Date(details.transactionDate).toLocaleTimeString("en-KE", {
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit",
          })
        : "N/A";
    document.getElementById("receipt-method").textContent = "M-Pesa";
    document.getElementById("receipt-transaction").textContent =
      details.MpesaReceiptNumber || "Pending Confirmation";
    document.getElementById("receipt-name").textContent = formData.fullName;
    document.getElementById("receipt-studentid").textContent =
      formData.studentId;
    document.getElementById("receipt-institution").textContent =
      formData.institution;
    document.getElementById("receipt-position").textContent = formData.position;
    document.getElementById(
      "receipt-amount"
    ).textContent = `KES ${formData.applicationFee.toLocaleString()}`;
  }

  const tryAgainButton = document.getElementById("try-again");
  if (tryAgainButton) {
    tryAgainButton.addEventListener("click", () => {
      showStep(3);
      paymentErrorSection.classList.add("hidden");
      paymentProcessingAnimation.classList.add("hidden");
    });
  }

  const downloadReceiptButton = document.getElementById("download-receipt");
  if (downloadReceiptButton) {
    downloadReceiptButton.addEventListener("click", () => {
      alert("Download receipt functionality would be implemented here.");
    });
  }

  const emailReceiptButton = document.getElementById("email-receipt");
  if (emailReceiptButton) {
    emailReceiptButton.addEventListener("click", () => {
      alert("Email receipt functionality would be implemented here.");
    });
  }
}
