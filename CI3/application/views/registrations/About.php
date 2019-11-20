    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="<?php echo site_url('Login/allpost'); ?>">Clean Blog</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
          <?php    
     if( $this->session->userdata('logged_in'))
      { 
        ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Login/home'); ?>">Home</a>
        </li>
         <?php   } else { ?>
       <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Login/allpost'); ?>">Home</a>
        </li>

         <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Login/About'); ?>">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Login/Posts'); ?>">Posts</a>
        </li>
         <?php    
     if( $this->session->userdata('logged_in'))
      { 
        ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Blog/Create_blog'); ?>">New Blog</a>
        </li>

      <?php   } ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Login/Contact'); ?>">Contact</a>
        </li>
        <?php    
     if( $this->session->userdata('logged_in'))
      { 
        ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Login/Logout'); ?>">Logout</a>
        </li>
           <?php   } ?>
      </ul>
    </div>
  </div>
</nav>


  <!-- Page Header -->

<header class="masthead" style="background-image: url(<?php echo base_url('assets/theme/img/bg-about.jpg'); ?>)">
  
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>About Me</h1>
            
            <span class="subheading">This is what I do.</span>
            
          </div>
        </div>
      </div>
    </div>
  </header>
 <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quisquam ut perspiciatis, repudiandae nulla animi iste vel, praesentium repellendus molestias aliquid consequatur, earum rem qui error voluptates eius enim consequuntur!</p>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex alias, earum consectetur quia natus ducimus voluptate explicabo, hic porro reprehenderit, quasi? Tenetur ipsum distinctio laboriosam perspiciatis officiis dolore, architecto id.</p>

<p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam inventore aspernatur repellendus incidunt adipisci modi voluptates recusandae iste eligendi, repudiandae corporis quod aut, optio! Explicabo quaerat unde voluptatem! Itaque, eum!</p>


      </div>
    </div>
  </div>


  <!-- Footer -->

<hr>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <ul class="list-inline text-center">
          
          <li class="list-inline-item">
            <a href="mailto:your-email@example.com">
              <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="far fa-envelope fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          
          
          <li class="list-inline-item">
            <a href="https://twitter.com/SBootstrap">
              <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          
          
          <li class="list-inline-item">
            <a href="https://www.facebook.com/StartBootstrap">
              <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          
          
          
          <li class="list-inline-item">
            <a href="https://github.com/BlackrockDigital">
              <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          
        </ul>
        <p class="copyright text-muted">Copyright &copy; Start Bootstrap 2019</p>
      </div>
    </div>
  </div>
</footer>