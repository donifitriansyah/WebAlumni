// Get the text banner elements
const textBanner = document.getElementById("text-banner");
const subTitle = document.getElementById("sub-title");

// Array of text banner messages
const messages = ["Welcome to Our Website DCareer", "Find Your Dream Job Here"];

const subTitles = [
  "Online Job Vacancy Information",
  "Discover Your Career Path",
];

// Set the initial message and sub-title
let messageIndex = 0;
textBanner.textContent = messages[messageIndex];
subTitle.textContent = subTitles[messageIndex];

// Function to update the text banner with fade-in and fade-out effect
function updateTextBanner() {
  // Fade out the current text banner
  textBanner.style.opacity = 0;
  subTitle.style.opacity = 0;

  // Update the message and sub-title
  messageIndex = (messageIndex + 1) % messages.length;
  textBanner.textContent = messages[messageIndex];
  subTitle.textContent = subTitles[messageIndex];

  // Fade in the new text banner
  setTimeout(() => {
    textBanner.style.opacity = 1;
    subTitle.style.opacity = 1;
  }, 500);
}

// Update the text banner every 3 seconds
setInterval(updateTextBanner, 8000);

function updateTextBanner() {
  // Hide the current text banner
  textBanner.style.display = "none";
  subTitle.style.display = "none";

  // Update the message and sub-title
  messageIndex = (messageIndex + 1) % messages.length;
  textBanner.textContent = messages[messageIndex];
  subTitle.textContent = subTitles[messageIndex];

  // Show the new text banner
  setTimeout(() => {
    textBanner.style.display = "block";
    subTitle.style.display = "block";
  }, 500);
}

// ini untuk bagian Pratinjau.html

document.addEventListener('DOMContentLoaded', function() {
  const applicationsContainer = document.getElementById('applications-container');
  const applications = JSON.parse(localStorage.getItem('applications')) || [];

  if (applications.length === 0) {
    applicationsContainer.innerHTML = '<p>Tidak ada lamaran yang terkirim.</p>';
  } else {
    applications.forEach(application => {
      const applicationDiv = document.createElement('div');
      applicationDiv.classList.add('job-application');
      applicationDiv.innerHTML = `
        <h3>${application.jobTitle}</h3>
        <p><strong>Posisi:</strong> ${application.jobPosition}</p>
        <p><strong>Tipe Pekerjaan:</strong> ${application.jobType}</p>
        <p><strong>Kandidat yang Dibutuhkan:</strong> ${application.candidatesNeeded}</p>
        <p><strong>Aktif Hingga:</strong> ${application.jobActiveUntil}</p>
        <p><strong>Lokasi:</strong> ${application.jobLocation}</p>
        <p><strong>Deskripsi Pekerjaan:</strong> ${application.jobDescription}</p>
        <p><strong>Rentang Gaji:</strong> ${application.salaryRange}</p>
        <p><strong>Pengalaman Kerja:</strong> ${application.experience}</p>
      `;
      applicationsContainer.appendChild(applicationDiv);
    });
  }
});
