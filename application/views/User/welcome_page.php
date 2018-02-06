<?php include_once('Lib/layout/header.php');?>

<!--Carousel-->
  <div id="myCarousel" class="carousel slide" dataride="carousel">
    
    <!--<ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>-->

    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php echo base_url('Lib/imgs/meal-slide1.jpg')?>"/>
        <div class="container">
          <div class="jumbotron">
            <div class="carousel-caption">
                <h1>Welcome</h1>
                <p>Take the liver risk assessment now</p>
                <!--<p><a class="btn btn-large btn-primary" href="<?php echo base_url('index.php/home/register')?>">Signup</a></p>-->
            </div>
          </div>
        </div>
      </div>

      <div class="item">
        <img src="<?php echo base_url('Lib/imgs/sleep6.jpg')?>"/>
        <div class="container">
          <div class="jumbotron">
            <div class="carousel-caption">
                <h1>Create an Account</h1>
                <p>This is the description of the slide.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="item">
        <img src="<?php echo base_url('Lib/imgs/water6.jpg')?>"/>
        <div class="container">
          <div class="jumbotron">
            <div class="carousel-caption">
                <h1>Use Liver-O</h1>
                <p>This is the description of the slide.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  
  <!--For Carousel Navigation
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  -->
  </div>
<!--End of Carousel-->

<!--Content1-->
  <div class="container-fluid introduction-custom">
    <div class="row">
      <div class="col-lg-12">
        <center><h1 class="blue-text-content">Liver-O /Liver Optimizer/</h1>
        <h4>Your very own online liver care assistant</h4>
      </div></center>
    </div>
  </div>
<!--End of Content1-->

<!--Content1-->
  <div class="container-fluid content1-custom">
    <div class="row">
      <div class="col-lg-6">
        <img class="fit center-block" src="<?php echo base_url('Lib/imgs/WaterIntakeReminder.png')?>" alt="waterIntake"/>
      </div>
      <div class="col-lg-6">
        <h1>Drinking Water</h1>
        <h3>Water is important, keep track of your water intake, drink smarter</h3>
      </div>
    </div>
  </div>
<!--End of Content1-->

<!--Content2-->
  <div class="container-fluid content2-custom">
    <div class="row">
      <div class="col-lg-6">
        <h1>Corrected Meal Plans</h1>
        <h3>A well balanced meal is indeed a big deal</h3>
      </div>
      <div class="col-lg-6">
        <img class="fit center-block" src="<?php echo base_url('Lib/imgs/MealPlanner.png')?>" alt="mealRecommendations"/>
      </div>
    </div>
  </div>
<!--End of Content2-->

<!--Content3-->
  <div class="container-fluid content3-custom">
    <div class="row">
      <div class="col-lg-6">
        <img class="fit center-block" src="<?php echo base_url('Lib/imgs/SleepTracker.png')?>" alt=""/>
      </div>
      <div class="col-lg-6">
        <h1>Getting Enough Sleep</h1>
        <h3>Lack of sleep makes our liver weep. Take care of your liver and sleep deep</h3>
      </div>
    </div>
  </div>
<!--End of Content3-->

<!--About-->
  <div class="container-fluid" id="about">
    <div class="pageheader">
      <h1><center>DEVELOPERS</center></h1>
    </div>
    <div class="row">

      <div class="col-lg-3 about-custom">
        <center><img class="img-circle" src="<?php echo base_url('Lib/imgs/developers/dev.jpg')?>"/>
          <h3>Franz P. Licañel</h3>
          <h4>Project Leader</h4>
        </center>
        
      </div>
      <div class="col-lg-3 about-custom">
        <center><img class="img-circle" src="<?php echo base_url('Lib/imgs/developers/dev.jpg')?>"/>
          <h3>Keir Jeffrey Velez</h3>
          <h4>Lead Programmer</h4>
        </center>
      </div>
      <div class="col-lg-3 about-custom">
        <center><img class="img-circle" src="<?php echo base_url('Lib/imgs/developers/dev.jpg')?>"/>
          <h3>Steven Vincent C. Saludares</h3>
          <h4>Lead Researcher</h4>
        </center>
      </div>
      <div class="col-lg-3 about-custom">
        <center><img class="img-circle" src="<?php echo base_url('Lib/imgs/developers/dev.jpg')?>"/>
          <h3>Zyra Vince Montalvo</h3>
          <h4>Documentation Manager</h4>
        </center>
      </div>

    </div>
  </div>
<!--End of About-->

<!--FOOTER-->
  <div class="container-fluid foot-custom" id="footer">
    <div class="pageheader">
      <h1><center>Like what you see?</center></h1></br>
    </div>

    <div class="row">

      <div class="col-lg-12">
        <center>
          <h4>Then give us a call we'll give you extra support and additional information</h4>
        </center>
      </div>

    </div>

    <div class="row">

      <div class="col-lg-12">
        <center>
          <h4>Contact information and e-mail for technical support</h4>
        </center>
      </div>

    </div>

    <div class="row">

      <div class="col-lg-12">
        <center>
          <h4>University of Negros Occidental - Recoletos</h4>
          <br>
        </center>
      </div>

    </div>

   <!-- <hr color="white" width="100%"></hr>--> <!-- white bar -->

    <div class="row">

      <div class="col-lg-12">
        <center>
            <hr color="white" width="100%"></hr>
          <h3>Contact us via</h3>
          <br>
        </center>
      </div>

    </div>

    <div class="row">
      
      <div class = "col-lg-4">
        <center><p> &copy; 2017 - <?php echo date("Y"); ?> LIVER-O </p></center>
      </div>

      <div class = "col-lg-4">
        <div class = "col-lg-4">
          <center>
            <a class="btn btn-block btn-social btn-facebook">
              <span class="fa fa-facebook"></span> Sign in with Facebook
            </a>
          </center>
        </div>

        <div class = "col-lg-4">
          <center>
            <a class="btn btn-block btn-social btn-twitter">
              <span class="fa fa-twitter"></span> Sign in with Twitter
            </a>
          </center>
        </div>

        <div class = "col-lg-4">
          <center>
            <a class="btn btn-block btn-social btn-google">
              <span class="fa fa-google"></span> Sign in with Instagram
            </a>
          </center>
        </div>
      </div>

      <div class = "col-lg-4">
        <center>
          <p>Privacy&Policy | Sitemap | Support</p>
        </center>
      </div>

    </div>

  </div>
<!--End of footer-->

<!--Scripts-->
  <script type="text/javascript" src="<?php echo base_url('Lib/js/jquery.min.js')?>" ></script>
  <script type="text/javascript" src="<?php echo base_url('Lib/js/bootstrap.js')?>" ></script>
  <script type="text/javascript" src="<?php echo base_url('Lib/js/carousel.js')?>" ></script>
<!--End of Scripts-->



</body>
</html>