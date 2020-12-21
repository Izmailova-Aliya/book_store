
<style>
    footer {
         color:white;
    }
   
</style>
<footer class="page-footer font-small unique-color-dark" style="background-color:#383838">


  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Company name</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
          consectetur
          adipisicing elit.</p>

      </div>

      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2505.848956107339!2d71.40172061564076!3d51.09279497956914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x424585ae2786e47d%3A0x29cf12a750b86212!2sQabanbay%20Batyr%20Ave%2C%20Nur-Sultan%20020000!5e0!3m2!1sen!2skz!4v1592544937417!5m2!1sen!2skz" width="300" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          
        <p id="map">
          <i class="fas fa-envelope mr-3"></i> bookshelf@gmail.com
        </p>
       
      </div>
      <!-- Grid column -->
      <p style="float:right; margin-top:70px">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2044.7668240456917!2d76.91571799185854!3d43.2579264808476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38836e7d16c5cbab%3A0x3d44668fad986d76!2sAlmaty!5e0!3m2!1sen!2skz!4v1592546685979!5m2!1sen!2skz" width="300" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          
        </p><p id="map2" style="float:right; margin-top:280px;"></p>
    </div> 
    <script>
            var json = '{"markers": [' + 
              '{"city": "Nur-Sultan", "address": "Qabanbay Batyr Ave, 60" },'   
              +'{"city": "Almaty", "address": "Gogol, 124"}]}';
              obj = JSON.parse(json);
              document.getElementById("map").innerHTML = 
              'City: ' + obj.markers[0].city +"; </br>Address: " + obj.markers[0].address;
              document.getElementById("map2").innerHTML = 
              'City: ' + obj.markers[1].city +"; </br>Address: " + obj.markers[1].address;

    </script>

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright: BookShelf
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->