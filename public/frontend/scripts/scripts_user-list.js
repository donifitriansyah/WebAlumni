// Function to display user list
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('userTable')) {
        const users = JSON.parse(localStorage.getItem('users')) || [];
        const userTableBody = document.getElementById('userTable').querySelector('tbody');
        
        users.forEach((user, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${user.username}</td>
                <td>${user.password}</td>
                <td>${user.email}</td>
                <td>${user.no}</td>
                <td>${user.role}</td>
                <td>
                    <button onclick="editUser(${index})">Edit</button>
                    <button onclick="deleteUser(${index})">Delete</button>
                </td>`;
            userTableBody.appendChild(row);
        });
    }
});

function goBack() {
    window.location.href = 'index.html';
}

// Edit user function
function editUser(index) {
    const users = JSON.parse(localStorage.getItem('users')) || [];
    const user = users[index];
    
    const newUsername = prompt("Enter new username:", user.username);
    const newPassword = prompt("Enter new password:", user.password);
    const newEmail = prompt("Enter new email:", user.email);
    const newNo = prompt("Enter new no:", user.no);
    const newRole = prompt("Enter new role (jobseeker/company):", user.role);

    if (newUsername !== null && newPassword !== null && newEmail !== null && newNo !== null && newRole !== null) {
        if (!newUsername || !newPassword || !newEmail || !newNo || !newRole) {
            alert("All fields are required.");
            return;
        }
        
        users[index] = { username: newUsername, password: newPassword, email: newEmail, no: newNo, role: newRole };
        localStorage.setItem('users', JSON.stringify(users));
        window.location.reload();
    }
}

// Delete user function
function deleteUser(index) {
    if (confirm("Are you sure you want to delete this user?")) {
        const users = JSON.parse(localStorage.getItem('users')) || [];
        users.splice(index, 1);
        localStorage.setItem('users', JSON.stringify(users));
        window.location.reload();
    }
}