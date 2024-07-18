document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll(".expandable");

    sections.forEach(section => {
        const formSection = section.querySelector(".form-section");

        section.addEventListener("click", function() {
            // Toggle active class to expand or collapse the form section
            formSection.classList.toggle("active");
        });

        formSection.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            // Optionally, you can add form validation logic here
            // Example: Check if all required fields are filled

            // Show a success message or redirect to another page
            alert("Form submitted successfully!"); // Example alert

            // Reset the form after submission
            formSection.querySelector("form").reset();
        });
    });
});

