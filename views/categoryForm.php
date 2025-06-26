<?php
    include '../controllers/admin_guard.php';
    include '../models/post.php';
    $post = new PostConfig();
    $categories = $post->fetchCategory();
?>

<?php include 'header.php' ?>
    
    <section style="min-height: 80dvh;">
        <div class="container col-md-4 p-3 shadow mt-5">
            <form action="../controllers/category.php" method="post">
                <p><?php echo $_GET['message']??'' ?></p>
                <h4 class="text-center">Add Category</h4>
                <input type="text" class="form-control mb-2" placeholder="Name" name="name">
                <textarea rows="7" name="description" id="" class="form-control mb-2" placeholder="Description"></textarea>
                <button class="btn btn-primary w-100">Submit</button>
            </form>

        </div>

        <section class="container my-3">
            <h4>Available Categories</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created by</th>
                        <th scope="col">Created at</th>                        
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php if($categories) {?>
                    <?php foreach($categories as $index => $category) {?>
                        <tr>
                            <th scope="row"><?php echo $index + 1 ?></th>
                            <td><?php echo $category['name'] ?></td>
                            <td class="col-md-4"><?php echo substr($category['description'], 0, 60) ?> ...</td>
                            <td><?php echo $category['fullname'] ?></td>
                            <td><?php echo $category['created_at'] ?></td>
                            <td><i class="bi bi-three-dots-vertical"></i></td>
                        </tr>
                    <?php } ?>
                <?php } else {?>
                    <tr>
                        <th class="border-0">No available category</th>
                    </tr>
                <?php } ?>
                
                </tbody>
            </table>
        </section>
    </section>

<?php include 'footer.php' ?>