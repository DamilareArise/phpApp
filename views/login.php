

<?php include 'header.php' ?>
    
    <section style="min-height: 80dvh;">
        <div class="container col-md-4 p-3 shadow mt-5">
            <form action="../controllers/login.php" method="post">
                <p><?php echo $_GET['message']??'' ?></p>
                <h4 class="text-center">Login</h4>
                <input type="email" class="form-control mb-2" placeholder="Email" name="email">
                <input type="password" class="form-control mb-2" placeholder="Password" name="password">
                <button class="btn btn-primary w-100">Login</button>
                <div class="d-flex justify-content-between">
                    <span>Forgot password?</span>
                    <span>Don't have account? <a href="signup.php">Signup</a> </span>
                </div>
            </form>

        </div>

    </section>

<?php include 'footer.php' ?>