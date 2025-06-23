



<?php include 'header.php' ?>

  <!-- Hero Section -->
  <section class="py-5 text-center bg-light">
    <div class="container">
      <h1 class="display-4">Welcome to MyBlog</h1>
      <p class="lead">Insights, tutorials, and thoughts on web development, tech, and life.</p>
      <a href="#" class="btn btn-dark btn-lg mt-3">Read Latest Posts</a>
    </div>
  </section>

  <!-- Featured Post -->
  <section class="py-5">
    <div class="container">
      <h2 class="mb-4">Featured Post</h2>
      <div class="card">
        <img src="https://source.unsplash.com/800x300/?blog,code" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">How to Build a Blog with PHP & MySQL</h5>
          <p class="card-text">A practical guide to building a simple blog system using PHP and MySQL from scratch.</p>
          <a href="#" class="btn btn-outline-primary">Read More</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Recent Posts -->
  <section class="py-5 bg-light">
    <div class="container">
      <h3 class="mb-4">Recent Posts</h3>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Laravel vs Django</h5>
              <p class="card-text">Which backend framework should you choose for your next web app?</p>
              <a href="#" class="btn btn-sm btn-primary">Read</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">CSS Grid Basics</h5>
              <p class="card-text">Master layout with this modern CSS feature in under 10 minutes.</p>
              <a href="#" class="btn btn-sm btn-primary">Read</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Deploying with cPanel</h5>
              <p class="card-text">Step-by-step guide to deploying your PHP project using cPanel.</p>
              <a href="#" class="btn btn-sm btn-primary">Read</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'footer.php' ?>