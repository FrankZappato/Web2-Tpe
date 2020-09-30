{include file="./head.tpl"}

<body class="login">
    {include file="./navbar.tpl"}
    <section class="container-fluid bg">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form class="form-container" action="login" method="POST">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="text" class="form-control" name="email" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We´ll never share your email with anyone
                            else</small>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-secondary btn-block">Submit</button>
                    {if $error_code != null}
                        <div class="alert alert-danger" role="alert">
                            {$error_code}
                        </div>
                    {/if}
                </form>
            </section>
        </section>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>