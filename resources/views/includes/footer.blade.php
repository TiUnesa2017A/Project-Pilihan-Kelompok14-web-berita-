<footer class="container-fluid bg-grey py-5" style="text-align: left;">
<div class="container">
   <div class="row">
      <div class="col-md-6">
         <div class="row">
            <div class="col-md-6 ">
               <div class="logo-part">
                  <!-- <img src="https://i.ibb.co/sHZz13b/logo.png" class="w-50 logo-footer" > -->
                  <h2 class="text-grey" style="text-decoration: underline;">Netijen.id</h2>
                  <p>Surabaya, Jawa Timur, Indonesia.</p><br>
                  <p>We provide actual and trusted news</p><br>
               </div>
            </div>
            <div class="col-md-6 px-4">
               <h5> About</h5>
               <p>Local Informations Website</p>
               <a href="#" class="btn-footer"> More Info </a><br>
               <a href="#" class="btn-footer"> Contact Us</a>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="row">
            <div class="col-md-6 px-4">
               <h5> Help us</h5>
               <div class="row ">
                  <div class="col-md-6">
                     <ul>
                        <li> <a href="{{route('faqView')}}"> FAQ</a> </li>
                        <li> <a href="{{route('aboutView')}}"> About</a> </li>
                        <li> <a href="#}"> Service</a> </li>
                        <li> <a href="#"> Team</a> </li>
                        <li> <a href="{{route('contactUsView')}}"> Contact Us</a> </li>
                     </ul>
                  </div>
                  <div class="col-md-6 px-4">
                     <ul>
                        <li> <a href="{{route('home')}}"> Home</a> </li>
                        <li> <a href="#"> xxxxxx</a> </li>
                        <li> <a href="#"> xxxxxx</a> </li>
                        <li> <a href="#"> xxxxxx</a> </li>
                        <li> <a href="#"> xxxxxx</a> </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-md-6 ">
               <h5> Newsletter</h5>
               <div class="social">
                  <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-reddit" aria-hidden="true"></i></a>
               </div>
                <br>
               <form class="form-footer my-3" method="post" action="{{route('subscriberStore')}}">
                  <input type="email" placeholder="Subscribe here...." name="email">
                  <input type="button" value="Go" >
               </form>
               <p>Subscribe to get in touch more deep with US</p>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <p style="font-size: 20px; color: white;">
                ©2019 - Dagels Team
            </p>
        </div>
        </div>
    </div>
</footer>