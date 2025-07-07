<footer class="bg-dark text-white pt-5 pb-4 text-capitalize">
  <div class="container text-md-left">
    <div class="row text-md-left">

      <!-- Logo + Description -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold text-warning"><x-application-logo/></h5>
        <p>Discover top coupons, exclusive deals, and discounts from your favorite online stores.</p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Quick Links</h5>
        <p><a href="{{ url(app()->getlocale().'/') }}" class="text-white text-decoration-none">Home</a></p>
        <p><a href="{{ route('stores' ,['lang'=> app()->getlocale()]) }}" class="text-white text-decoration-none">All Stores</a></p>
        <p><a href="{{ route('category' ,['lang'=> app()->getlocale()]) }}" class="text-white text-decoration-none">Categories</a></p>
        <p><a href="{{ route('blog' ,['lang'=> app()->getlocale()]) }}" class="text-white text-decoration-none">Blog</a></p>
      </div>

      <!-- Help Links -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Support</h5>
        <p><a href="{{ route('imprint', ['lang' => app()->getLocale()]) }}" class="text-white text-decoration-none">imprint</a></p>
        <p><a href="{{ route('contact', ['lang' => app()->getLocale()]) }}" class="text-white text-decoration-none">Contact Us</a></p>
        <p><a href="{{ route('privacy', ['lang' => app()->getLocale()]) }}" class="text-white text-decoration-none">Privacy Policy</a></p>
        <p><a href="{{ route('terms', ['lang' => app()->getLocale()]) }}" class="text-white text-decoration-none">Terms & Conditions</a></p>
      </div>

      <!-- Contact Info -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
        <p><i class="bi bi-house-door me-2"></i> Karachi, Pakistan</p>
        <p><i class="bi bi-envelope me-2"></i> info@retailtosave.com</p>
        <p><i class="bi bi-phone me-2"></i> +92 300 1234567</p>
      </div>
    </div>

    <!-- Horizontal Line -->
    <hr class="mb-4">

    <!-- Social & Copyright -->
    <div class="row align-items-center">
      <div class="col-md-7 col-lg-8">
        <p>© 2025 RetailToSave. All rights reserved.</p>
      </div>

      <div class="col-md-5 col-lg-4">
        <div class="text-center text-md-end">
          <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
          <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
          <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div>
  </div>
</footer>

