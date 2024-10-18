document.querySelector("button").addEventListener("click", function (event) {
  event.preventDefault(); // Mencegah pengiriman form default
  const name = document.querySelector('input[name="name"]').value;
  const email = document.querySelector('input[name="email"]').value;
  const phone = document.querySelector('input[name="phone"]').value;
  const message = document.querySelector('textarea[name="message"]').value;

  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

  if (name && email && phone && message) {
    if (emailPattern.test(email)) {
      const mailtoLink = `mailto:contact@example.com?subject=Contact Form Submission&body=Name: ${name}%0D%0AEmail: ${email}%0D%0APhone: ${phone}%0D%0AMessage: ${message}`;
      window.location.href = mailtoLink;
    } else {
      alert("Please enter a valid email address.");
    }
  }
  //    else {
  //     alert("Please fill in all fields.");
  //   }
});
