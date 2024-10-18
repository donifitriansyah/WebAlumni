// Reset Password function
function resetPassword() {
    const email = document.getElementById('resetEmail').value;

    if (!email) {
        alert("Email is required.");
        return;
    }

    let users = JSON.parse(localStorage.getItem('users')) || [];

    const user = users.find(user => user.email === email);

    if (!user) {
        alert("Email not found.");
        return;
    }

    const newPassword = prompt("Enter your new password:");

    if (!newPassword) {
        alert("Password is required.");
        return;
    }

    user.password = newPassword;
    localStorage.setItem('users', JSON.stringify(users));
    alert("Password reset successful. Redirecting to login page.");

    // Redirect to login page
    window.location.href = 'index.html';
}