<div class="model">
  <!-- Login/Register Module -->
  <div id="login-modal">
    <!-- Login Modal -->
    <div class="login-form default-form">
      <div class="form-inner">
        <h3>Login to {{ config('app.name') }} Account</h3>

        <div class="form-group">
          <div class="btn-box row">
            <div class="col-lg-6 col-md-12">
              <a href="{{ route('candidate.login') }}" class="theme-btn btn-style-four"><i class="la la-user"></i> Candidate </a>
            </div>
            <div class="col-lg-6 col-md-12">
              <a href="#" class="theme-btn btn-style-two"><i class="la la-briefcase"></i> Company </a>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!--End Login Modal -->
    <!-- Register Modal -->
    <div class="login-form default-form">
      <div class="form-inner mt-2">
        <h3>Create a Free {{ config('app.name') }} Account</h3>

        <div class="form-group">
          <div class="btn-box row">
            <div class="col-lg-6 col-md-12">
              <a href="{{ route('candidate.register') }}" class="theme-btn btn-style-one"><i class="la la-user"></i> Candidate </a>
            </div>
            <div class="col-lg-6 col-md-12">
              <a href="{{ route('company.register') }}" class="theme-btn btn-style-eight"><i class="la la-briefcase"></i> Company </a>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!--End Register Modal -->
  </div>
  <!-- End Login/Register Module -->
</div>