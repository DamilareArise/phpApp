

<?php include 'header.php' ?>
    <section style="min-height: 80dvh;">
        <div class="container col-md-4 p-3 shadow mt-5">
            <form action="../controllers/signup.php" method="post">
                <p><?php echo $_GET['message']??'' ?></p>
                <h4 class="text-center">Signup</h4>
                <input type="text" class="form-control mb-2" placeholder="Fullname" name="fullname">
                <input type="email" class="form-control mb-2" placeholder="Email" name="email">
                <input type="password" class="form-control mb-2" placeholder="Password" name="password">
                <input type="password" class="form-control mb-2" placeholder="Confirm password" name="confirm_password">
                <button class="btn btn-primary w-100">Signup</button>
                <div class="d-flex justify-content-center mt-2">
                    <span>I have an account? <a href="login.php">Login</a> </span>
                </div>
            </form>

        </div>

    </section>

<?php include 'footer.php' ?>