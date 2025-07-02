<?php 

  include '../models/post.php';
  $post = new PostConfig();
  $all_posts = $post->PostByLimit();

?>


<?php include 'header.php'; ?>
  <style>
    .card-img-top{
      max-height: 30vh;
      object-fit: cover;
    }
  </style>
<!-- Recent Posts -->
  <section class="py-5 bg-light" style="min-height: 100dvh;">
    <div class="container">
      <h3 class="mb-4 text-center">All Posts</h3>
      <div class="row">
        <?php if ($all_posts) {?>
          <?php foreach ($all_posts as $index => $post) {?>
            <div class="col-md-4 mb-4">
              <div class="card h-100">
                <img src="../uploads/images/<?php echo $post['image_path'] ?>" alt="" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $post['title'] ?></h5>
                  <p class="card-text"><?php echo  substr($post['content'], 0, 50)?>...</p>
                  <code class='d-block'><?php $date = date_create($post['created_at']); echo $date->format('d M, Y. H:i:sa') ?></code>
                  <a href="singlePost.php/?post_id=<?php echo $post['id']?>" class="btn btn-sm btn-primary">Read</a>
                </div>
              </div>
            </div>
        <?php } ?>

        <?php } else { ?>

          <p>No post available</p>

        <?php } ?>
      </div>
    </div>

  </section>

<?php include 'footer.php'; ?>
