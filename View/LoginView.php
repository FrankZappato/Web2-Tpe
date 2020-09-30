<?php
    require_once "../libs/smarty/Smarty.class.php";

<<<<<<< HEAD
class LoginView{
<<<<<<< HEAD


    function __construct(){}
=======
class LoginView
{
    public function __construct()
    {
    }
>>>>>>> mariano

    public function showLoginForm($code, $extra_param)
    {
        $smarty = new Smarty();
        $smarty->assign('error_code', $code);
        $smarty->assign('extra_param', $extra_param);
        $smarty->display('../templates/loginform.tpl');
=======
    
    function __construct(){}

    function showLoginForm($paramst){

 $html = '<!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="styles/login.css">
 </head>
 
 <body>
     <section class="container-fluid bg">
         <section class="row justify-content-center">
             <section class="col-12 col-sm-6 col-md-3">
                 <form class="form-container" action="login" method="POST">
                     <div class="form-group">
                         <label for="exampleInputEmail1">Email address</label>
                         <input type="text" class="form-control" name="emailuid" aria-describedby="emailHelp">
                         <small id="emailHelp" class="form-text text-muted">We´ll never share your email with anyone
                             else</small>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputPassword1">Password</label>
                         <input type="password" class="form-control" name="password">
                     </div>                     
                     <button type="submit" class="btn btn-primary btn-block">Submit</button>  
                     <div class="'.$paramst.'">                            
                     </div>                   
                 </form>
             </section>
         </section>
     </section>
 
 </body>
 
 </html>';
    echo $html;
>>>>>>> b75be5a87d48ac7532ca15875707be68869dfb63
    }

    public function showSignUpForm($code)
    {
        $smarty = new Smarty();
        $smarty->assign('error_code', $code);
        $smarty->display('../templates/signup.tpl');
    }
}
