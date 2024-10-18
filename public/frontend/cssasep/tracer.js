// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get references to the forms and the next button
    const tracerStudyForm = document.getElementById('tracerStudyForm');
    const surveyForm = document.getElementById('surveyForm');
    const nextButton = document.getElementById('nextButton');

    // Add click event listener to the next button
    nextButton.addEventListener('click', function() {
        // Check if all required fields in the first form are filled
        if (tracerStudyForm.checkValidity()) {
            // Hide the first form
            tracerStudyForm.style.display = 'none';
            // Show the survey form
            surveyForm.style.display = 'block';
        } else {
            // If not all required fields are filled, trigger the browser's default validation UI
            tracerStudyForm.reportValidity();
        }
    });

    // Handle the survey form submission
    surveyForm.addEventListener('submit', function(event) {
        event.preventDefault();
        // Here you would typically send the form data to a server
        console.log('Survey submitted');
        alert('Terima kasih telah mengisi kuesioner!');
    });
});