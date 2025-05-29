document.addEventListener("DOMContentLoaded", () => {
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

  // Form elements and their IDs
  const candidateForm = document.getElementById("candidate-form");
  const positionSelect = document.getElementById("position");
  const applicationFeeInput = document.getElementById("applicationFee");

  const summaryPositionSpan = document.getElementById("summary-position");
  const summaryFeeSpan = document.getElementById("summary-fee");

  const mpesaPaymentContent = document.getElementById("mpesa-payment-content"); // This will now always be visible on step 3

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
  let transactionReference = ""; // Will be generated when moving to step 2

  // Function to generate a simple reference number
  function generateReferenceNumber() {
    return "SSSAK" + Math.floor(10000 + Math.random() * 90000); // SSSAK + 5 random digits
  }

  // Function to show a specific step
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

  // Initialize: Show the first step
  showStep(1);

  // --- Step 1 Logic ---
  positionSelect.addEventListener("change", () => {
    const selectedOption = positionSelect.options[positionSelect.selectedIndex];
    const fee = selectedOption.dataset.fee
      ? parseFloat(selectedOption.dataset.fee)
      : 0;
    applicationFeeInput.value = fee > 0 ? fee.toFixed(2) : "";
  });

  document.getElementById("next-to-step2").addEventListener("click", () => {
    if (!candidateForm.checkValidity()) {
      candidateForm.reportValidity();
      return;
    }

    // Collect data from Step 1
    formData.fullName = document.getElementById("fullName").value;
    formData.studentId = document.getElementById("studentId").value;
    formData.email = document.getElementById("email").value;
    formData.phone = document.getElementById("phone").value;
    formData.institution = document.getElementById("institution").value;
    formData.course = document.getElementById("course").value;
    formData.position =
      positionSelect.options[positionSelect.selectedIndex].text;
    formData.applicationFee = parseFloat(applicationFeeInput.value);

    // Generate transaction reference here, before showing step 2
    transactionReference = generateReferenceNumber();
    formData.transactionReference = transactionReference; // Store in formData

    // Update summary on Step 2
    summaryPositionSpan.textContent = formData.position;
    summaryFeeSpan.textContent = `KES ${formData.applicationFee.toLocaleString()}`;

    // Update M-Pesa details on Step 3
    mpesaAmountSpan.textContent = `KES ${formData.applicationFee.toLocaleString()}`;
    mpesaAccountNumberSpan.innerHTML = `SSSAK<span id="ref-number">${transactionReference}</span>`;

    showStep(2);
  });

  // --- Step 2 Logic ---
  // Since only M-Pesa, we can set it directly
  formData.paymentMethod = "mpesa"; // Explicitly set M-Pesa as the method

  document.getElementById("next-to-step3").addEventListener("click", () => {
    // No explicit form to validate on Step 2, as method is fixed.
    showStep(3);
  });

  document.getElementById("back-to-step1").addEventListener("click", () => {
    showStep(1);
  });

  // --- Step 3 Logic (M-Pesa Only) ---
  document
    .getElementById("complete-payment")
    .addEventListener("click", async () => {
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

      // --- START M-PESA BACKEND INTEGRATION ---
      // Replace this with your actual AJAX call to initiate M-Pesa STK Push
      try {
        const response = await fetch("/api/initiate_mpesa_stk.php", {
          // Your backend endpoint
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            phoneNumber: formData.mpesaNumber,
            amount: formData.applicationFee,
            accountReference: formData.transactionReference, // Unique reference for the transaction
            transactionDesc: `Election Fee for ${formData.fullName} (${formData.position})`,
            // You might also send other form data here if needed for record-keeping
            studentId: formData.studentId,
            email: formData.email,
            fullName: formData.fullName,
            position: formData.position,
          }),
        });

        const result = await response.json();

        paymentProcessingAnimation.classList.add("hidden");

        if (response.ok && result.success) {
          // M-Pesa STK Push initiated successfully
          // The user will receive an STK push on their phone.
          // You will need a separate webhook endpoint for Safaricom to confirm payment.
          // For now, we'll display success, but real confirmation happens via webhook.
          paymentSuccessSection.classList.remove("hidden");
          populateReceipt(result.transactionDetails); // Populate receipt with actual backend data
        } else {
          // Failed to initiate STK push
          console.error(
            "STK Push initiation failed:",
            result.message || result.error
          );
          paymentErrorSection.classList.remove("hidden");
          // Optionally show specific error message from result.message
        }
      } catch (error) {
        console.error("Error initiating M-Pesa STK Push:", error);
        paymentProcessingAnimation.classList.add("hidden");
        paymentErrorSection.classList.remove("hidden");
      }
      // --- END M-PESA BACKEND INTEGRATION ---
    });

  document.getElementById("back-to-step2").addEventListener("click", () => {
    showStep(2);
  });

  // --- Step 4 Logic ---
  function populateReceipt(details) {
    // Use details from the backend response to populate the receipt
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
      details.MpesaReceiptNumber || "Pending Confirmation"; // MpesaReceiptNumber from Safaricom callback
    // Status is 'PAID' if this section is shown, but confirm with backend logic
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

  document.getElementById("try-again").addEventListener("click", () => {
    showStep(3); // Go back to payment processing step
    paymentErrorSection.classList.add("hidden");
    paymentProcessingAnimation.classList.add("hidden"); // Ensure processing is hidden
  });

  document.getElementById("download-receipt").addEventListener("click", () => {
    alert("Download receipt functionality would be implemented here.");
  });

  document.getElementById("email-receipt").addEventListener("click", () => {
    alert("Email receipt functionality would be implemented here.");
  });
});
