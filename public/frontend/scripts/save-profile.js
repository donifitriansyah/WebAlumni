function saveProfile(event) {
  event.preventDefault(); // Prevent form submission

  const companyName = document.getElementById("companyName").value;
  const businessSector = document.getElementById("businessSector").value;
  const companyLogo = document.getElementById("companyLogo").files[0];
  const companyDescription =
    document.getElementById("companyDescription").value;
  const numberOfEmployees = document.getElementById("numberOfEmployees").value;
  const phoneNumber = document.getElementById("phoneNumber").value;
  const companyWebsite = document.getElementById("companyWebsite").value;

  // Validate file size (max 2 MB)
  if (companyLogo.size > 2 * 1024 * 1024) {
    alert("Ukuran file melebihi 2 MB. Silakan unggah file yang lebih kecil.");
    return;
  }

  // Save profile data
  const logoReader = new FileReader();
  logoReader.onload = function (e) {
    const companyProfile = {
      companyName,
      businessSector,
      companyLogo: e.target.result,
      companyDescription,
      numberOfEmployees,
      phoneNumber,
      companyWebsite,
    };

    localStorage.setItem("companyProfile", JSON.stringify(companyProfile));

    // Optionally save job listings (if applicable)
    const jobListings = JSON.parse(localStorage.getItem("jobListings")) || [];
    localStorage.setItem("jobListings", JSON.stringify(jobListings));

    // Redirect to profile page
    window.location.href = "company-profile.html";
  };
  logoReader.readAsDataURL(companyLogo);
}
