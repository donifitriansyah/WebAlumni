<footer class="bg-dark text-light py-4 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>About Us</h5>
          <p>Short description about your company or website.</p>
        </div>
        <div class="col-md-4">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="{{ url('/') }}" class="text-light">Home</a></li>
            <li><a href="{{ url('/about') }}" class="text-light">About</a></li>
            <li><a href="{{ url('/services') }}" class="text-light">Services</a></li>
            <li><a href="{{ url('/contact') }}" class="text-light">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Contact Us</h5>
          <address>
            123 Main St.<br>
            City, State 12345<br>
            <abbr title="Phone">P:</abbr> (123) 456-7890
          </address>
        </div>
      </div>
      <hr>
      <div class="text-center">
        <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
      </div>
    </div>
  </footer>
