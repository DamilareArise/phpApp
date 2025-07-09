<?php include 'header.php' ?>
    
    <section style="min-height: 80dvh;">
        <div class="container col-md-4 p-3 shadow mt-5">
            <form action="/phpApp/controllers/forgot_password.php" method="post">
                <p><?php echo $_GET['message']??'' ?></p>
                <h4 class="text-center">Forgot password</h4>
                <input type="email" class="form-control mb-2" placeholder="Email" name="email">
                <button class="btn btn-primary w-100">Send mail</button>
            </form>

        </div>

    </section>

<?php include 'footer.php' ?>