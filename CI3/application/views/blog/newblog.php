  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="<?php echo site_url('Login/home'); ?>">Clean Blog</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
         <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Login/home'); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Login/About'); ?>">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Login/Posts'); ?>">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Blog/Create_blog'); ?>">New Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Login/Contact'); ?>">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Login/Logout'); ?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


  <!-- Page Header -->

<header class="masthead" style="background-image: url(<?php echo base_url('assets/theme/img/bg-post.jpg'); ?>)">
  
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>New Blog</h1>
            
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
            
          </div>
        </div>
      </div>
    </div>
  </header>

   <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

     
        <!-- Home Post List -->
<?php 

	if($this->session->flashdata('message'))
{
	echo $this->session->flashdata('message');
}
		?>
        <form method="post" action="<?php echo site_url('Blog/Addblog'); ?>">
  <fieldset>
    <legend>Create new Blog</legend>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" name="btitle" id="exampleInputtitle" aria-describedby="titleHelp" placeholder="Enter title">
     
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Body</label>
      <textarea name="bbody" class="form-control" placeholder="Blog body" cols="10" rows="12"></textarea>
    </div>
    
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
</fieldset>
</form>

        </div>
    </div>
   </div>


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