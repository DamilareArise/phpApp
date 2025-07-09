<?php
    $token = $_GET['token'] ?? null;
    // echo $token;
?>


<?php include 'header.php' ?>
    
    <section style="min-height: 80dvh;">
        <div class="container col-md-4 p-3 shadow mt-5">
            <form action="/phpApp/controllers/reset_password.php" method="post">
                <p><?php echo $_GET['message']??'' ?></p>
                <h4 class="text-center">Reset Password</h4>
                <input type="hidden" name="token" value="<?php echo $token ?>">
                <input type="password" class="form-control mb-2" placeholder="New Password" name="new_password">
                <input type="password" class="form-control mb-2" placeholder="Confirm Password" name="confirm_password">
                <button class="btn btn-primary w-100">Submit</button>
            </form>

        </div>

    </section>

<?php include 'footer.php' ?>