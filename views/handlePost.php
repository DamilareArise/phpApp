<?php
    include '../controllers/admin_guard.php';
    include '../models/post.php';
    $post = new PostConfig();
    $all_posts = $post->allPost();



?>

<?php include 'header.php' ?>

        <section class="container my-3" style="min-height: 80dvh;">
            <p><?php echo $_GET['message']??'' ?></p>
            <h4>Available posts</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Author</th>
                        <th scope="col">Category</th>
                        <th scope="col">Timestamp</th>                        
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php if($all_posts) {?>
                    <?php foreach($all_posts as $index => $post) {?>
                        <tr>
                            <th scope="row"><?php echo $index + 1 ?></th>
                            <td><?php echo $post['title'] ?></td>
                            <td class="col-md-4"><?php echo substr($post['content'], 0, 60) ?> ...</td>
                            <td><?php echo $post['fullname'] ?></td>
                            <td><?php echo $post['category_name'] ?></td>
                            <td><?php echo $post['created_at'] ?></td>
                            <td>
                                <?php if($post['approved']==1) { ?>
                                    <a href="../controllers/handleStatus.php/?post_id=<?php echo $post['id'] ?>" class="btn btn-sm btn-danger">Disapprove</a>
                                <?php } else { ?>
                                    <a href="../controllers/handleStatus.php/?post_id=<?php echo $post['id'] ?>" class="btn btn-sm btn-success">Approve</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else {?>
                    <tr>
                        <th class="border-0">No available post</th>
                    </tr>
                <?php } ?>
                
                </tbody>
            </table>
        </section>


<?php include 'footer.php' ?>

