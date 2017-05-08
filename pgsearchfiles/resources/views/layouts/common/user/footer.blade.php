<footer id="footer" class="footer" data-bg-img="{{ asset('assets/user/images/footer-bg.png') }}" data-bg-color="#25272e">
  <div class="container pt-70 pb-40">
    <div class="row border-bottom-black">
      <div class="col-sm-6 col-md-4">
        <div class="widget dark">
          <img class="mt-10 mb-20" alt="" src="{{ asset('assets/images/logo-wide-white-footer.png') }}">
          
          <ul class="list-inline mt-5">
            <li class="m-0 pl-10 pr-10"> <i class="fa fa-map-marker text-theme-colored mr-5" aria-hidden="true"></i> <a class="text-gray" href="#">{{ getCMScontents('location')->content }}</a> </li>
            <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a class="text-gray" href="#">{{ getCMScontents('phone_number')->content }}</a> </li>
            <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a class="text-gray" href="mailto:enrollspace@gmail.com">enrollspace@gmail.com</a> </li>
            <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored mr-5"></i> <a class="text-gray" href="http://www.enrollspace.com">www.enrollspace.com/</a> </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="widget dark">
          <h5 class="widget-title line-bottom">Enrollspace</h5>
          <ul class="list angle-double-right list-border">
            <li><a href="#">Support</a></li>
            <li><a href="{{ route('cms_view', 'about-us') }}">About Us</a></li>
            <li><a href="#">Team</a></li>
            <li><a href="#">Careers</a></li>
                  
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="widget dark">
          <h5 class="widget-title line-bottom">LEGAL</h5>
          <ul class="list angle-double-right list-border">
            <li><a href="{{ route('cms_view', 'privacy-policy') }}">Privacy Policy</a></li>
            <li><a href="{{ route('cms_view', 'guest-policies') }}" >Guest Policies</a></li>
            <li><a href="{{ route('cms_view', 'terms-and-conditions') }}">Terms & Conditions</a></li>
          
                   
          </ul>
        </div>
      </div>
    </div>
    <div class="row mt-10">
      <div class="col-md-5">
        <div class="widget dark">
          <h5 class="widget-title mb-10">Subscribe Us</h5>
          <!-- Mailchimp Subscription Form Starts Here -->
          <form id="mailchimp-subscription-form-footer" class="newsletter-form">
            <div class="input-group">
              <input type="email" value="" name="EMAIL" placeholder="Your Email" class="form-control input-lg font-16" data-height="45px" id="mce-EMAIL-footer" style="height: 45px;">
              <span class="input-group-btn">
                <button data-height="45px" class="btn btn-colored btn-theme-colored btn-xs m-0 font-14" type="submit">Subscribe</button>
              </span>
            </div>
          </form>
          <!-- Mailchimp Subscription Form Validation-->
          <script type="text/javascript">
            $('#mailchimp-subscription-form-footer').ajaxChimp({
                callback: mailChimpCallBack,
                url: '//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e'
            });

            function mailChimpCallBack(resp) {
                // Hide any previous response text
                var $mailchimpform = $('#mailchimp-subscription-form-footer'),
                    $response = '';
                $mailchimpform.children(".alert").remove();
                console.log(resp);
                if (resp.result === 'success') {
                    $response = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                } else if (resp.result === 'error') {
                    $response = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                }
                $mailchimpform.prepend($response);
            }
          </script>
          <!-- Mailchimp Subscription Form Ends Here -->
        </div>
      </div>
      <div class="col-md-3 col-md-offset-1">
        <div class="widget dark">
          <h5 class="widget-title mb-10">Call Us Now</h5>
          <div class="text-gray">
            {{ getCMScontents('phone_number')->content }}
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="widget dark">
          <h5 class="widget-title mb-10">Connect With Us</h5>
          <ul class="styled-icons icon-dark icon-theme-colored icon-circled icon-sm">
            <li><a href="https://www.facebook.com/enrollspace" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.twitter.com/enrollspace"><i class="fa fa-twitter"></i></a></li>
            <!-- <li><a href="#"><i class="fa fa-skype"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li> -->
            <li><a href="https://urlgeni.us/instagram/Yb6H"><i class="fa fa-instagram"></i></a></li>
            <!-- <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom bg-black-333">
    <div class="container pt-15 pb-10">
      <div class="row">
        <div class="col-md-6">
          <p class="font-11 text-black-777 m-0">Copyright &copy;2017 enroll space. All Rights Reserved. Powered by Web.Com (India) Pvt. Ltd.</p>
        </div>
        <div class="col-md-6 text-right">
          <div class="widget no-border m-0">
            <ul class="list-inline sm-text-center mt-5 font-12">
              <li>
                <a href="#">FAQ</a>
              </li>
              <li>|</li>
              <li>
                <a href="#">Help Desk</a>
              </li>
              <li>|</li>
              <li>
                <a href="{{ route('user.add_feedback') }}">Feedback</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>