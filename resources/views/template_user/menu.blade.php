<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="row" id="header">
          <div class="col-md-1"></div>
          <div class="col-md-2" id="logo"><a href="{{ url('/') }}"></a></div>

            <!--NAVIGATION-->
            <div class="col-md-8">
              <div class="row">
                    <ul id="navstat">
                      <li>
                          <img src="{{ url('images/comingsoon_stamp.png') }}" alt="Grooming Product is Cooming Soon"
                  style="float:left; padding-left:0px; padding-top:-100px; opacity:0;"/></li>
                        <li>
                          <img src="{{ url('images/comingsoon_stamp.png') }}" alt="Grooming Product is Cooming Soon"
                  style="float:left; padding-left:29px; padding-top:-100px;"/></li>
                        <li>
                          <img src="{{ url('images/comingsoon_stamp.png') }}" alt="Grooming Product is Cooming Soon"
                  style="float:left; padding-left:0px; padding-top:-100px; opacity:0;"/></li>
                        <li>
                          <img src="{{ url('images/comingsoon_stamp.png') }}" alt="Grooming Product is Cooming Soon"
                  style="float:left; padding-left:0px; padding-top:-100px; opacity:0;"/></li>
                    </ul>
                </div>
                <div class="row">
                  <ul id="nav">
                      <li id="nav1"><a href="{{ url('product/view') }}">STYLING PRODUCTS</a></li>
                      <li id="nav2"><a href="{{ url('product/grooming') }}" title="COMING SOON">GROOMING PRODUCTS</a>
                      </li>
                      <li id="nav3"><a href="{{ url('where_buy') }}">WHERE TO BUY</a></li>
                      <li id="nav4"><a href="{{ url('about') }}">ABOUT US</a></li>
                      <li id="nav5"><a href="{{ url('contact') }}">CONTACT US</a></li>
                      @if(Auth::check())
                        <li id="nav6"><a href="{{ url('product/management') }}">ADMIN</a></li>
                      @endif
                    </ul>
                </div>
            </div>
            <!--NAVIGATION-->

            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
