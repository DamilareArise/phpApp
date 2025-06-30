<?php
    include '../models/post.php';
    $post = new PostConfig();
    $categories = $post->fetchCategory();
    // print_r($categories);

?>



<?php include 'header.php' ?>
    
    <section style="min-height: 80dvh;">
        <div class="container col-md-4 p-3 shadow mt-5">
            <form action="../controllers/post.php" method="post" enctype="multipart/form-data">
                <p><?php echo $_GET['message']??'' ?></p>
                <h4 class="text-center">Add Post</h4>
                <input type="text" class="form-control mb-2" placeholder="Title" name="title">
                <label for="">Attach Image</label>
                <input type="file" name="image" id="" class="form-control mb-2" accept="image/*">
                <select class="form-select mb-2" aria-label="Default select example" name="category">

                    <option selected>Select category</option>
                    <?php if ($categories){ ?>
                        <?php foreach($categories as $index => $category) { ?>
                            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                           
                        <?php } ?>
                    <?php } ?>
                </select>
                <textarea rows="7" name="content" id="" class="form-control mb-2" placeholder="Content"></textarea>
                <button class="btn btn-primary w-100">Submit</button>
            </form>

        </div>
    </section>

<?php include 'footer.php' ?>