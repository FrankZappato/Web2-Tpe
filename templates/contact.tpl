{include file="./head.tpl"}

<body class="contact_body">
    {include file="./navbar.tpl"}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <div class="container" id="contact_container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 pb-5">
                <form action="contact" method="post">
                    <div class="card border-secondary rounded-0">
                        <div class="card-header p-0">
                            <div class="bg-secondary text-white text-center py-2">
                                <h3><i class="fa fa-envelope"></i> Contact us</h3>
                                <p class="m-0">We will be glad to help you!</p>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-user text-secondary"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your complete name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope text-secondary"></i></div>
                                    </div>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-comment text-secondary"></i></div>
                                    </div>
                                    <textarea class="form-control" placeholder="Leave us you message here" required></textarea>
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" value="Send" class="btn btn-secondary btn-block rounded-0 py-2">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>