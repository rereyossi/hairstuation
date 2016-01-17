<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
     <!--SOSMET BUTTON BAR-->
        <div id="sosmethead">

            <div id="butcart">
            <a href="{{ url('cart/view') }}">
              CART&nbsp;
              <span class="glyphicon glyphicon-shopping-cart"></span>
                </a>
                <span id="cartval">&nbsp;<?php echo Cart::count();  ?>&nbsp;</span>
            </div>

          <div id="igbutton">
              <!--IG BUTTON NUNGGU KONFIRMASI-->
            </div>

            <div id="fbbutton">
              <div id="fb-root"></div>
      <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

                <div class="fb-like" data-href="https://www.facebook.com/hairsituation/" data-width=""
                data-layout="button_count" data-action="like" data-show-faces="false" data-share="true">
                </div>
            </div>

            <div id="twbutton">
              <a href="https://twitter.com/HairSituation" class="twitter-follow-button" data-show-count=
                "false" data-show-screen-name="false">Follow @HairSituation</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

              <a href="https://twitter.com/share" class="twitter-share-button" data-url=
          "http://hairsituation.com" data-text="Check out this site" data-via="HairSituation"
                data-related="HairSituation" data-count="none" data-hashtags="HairSituation">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            </div>
        </div>
        <!--END SOSMET BUTTON BAR-->
  </div>
  <div class="col-md-2"></div>
</div>
