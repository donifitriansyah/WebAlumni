// Register function
function register() {
  const username = document.getElementById("regUsername").value;
  const password = document.getElementById("regPassword").value;
  const email = document.getElementById("regEmail").value;
  const no = document.getElementById("regNo").value;
  const role = document.getElementById("regRole").value;

  if (!username || !password || !email || !no || !role) {
    alert("All fields are required.");
    return;
  }

  let users = JSON.parse(localStorage.getItem("users")) || [];

  if (users.some((user) => user.username === username)) {
    alert("Username already exists.");
    return;
  }

  users.push({ username, password, email, no, role });
  localStorage.setItem("users", JSON.stringify(users));
  alert("Registration successful. Redirecting to login page.");

  // Redirect to login page
  window.location.href = "index.html";
}

// Login function
function login() {
  const username = document.getElementById("loginUsername").value;
  const password = document.getElementById("loginPassword").value;
  const role = document.getElementById("loginRole").value;

  if (!username || !password || !role) {
    alert("All fields are required.");
    return;
  }

  // Ambil daftar pengguna dari localStorage
  let users = JSON.parse(localStorage.getItem("users")) || [];

  // Cari pengguna yang sesuai dengan kredensial dan peran
  const user = users.find(
    (user) =>
      user.username === username &&
      user.password === password &&
      user.role === role
  );

  if (!user) {
    alert("Invalid credentials or role.");
    return;
  }

  // Simpan pengguna yang masuk saat ini
  localStorage.setItem("currentUser", JSON.stringify(user));

  // Arahkan pengguna ke halaman yang sesuai berdasarkan peran
  if (role === "jobseeker") {
    window.location.href = "jobseeker-profile.html"; // Ganti dengan halaman dashboard jobseeker
  } else if (role === "company") {
    window.location.href = "company-profile2.html"; // Ganti dengan halaman dashboard company
  }
}


// Logout function
function logout() {
  localStorage.removeItem("loggedInUser");
  window.location.href = "index.html";
}
