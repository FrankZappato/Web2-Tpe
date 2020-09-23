<?php

class AdminFormView{

    function __construct(){}
    
    function showAdminForm(){

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
                <section class="col-12 col-sm-6 col-md-6">                 
                    <form class="form-container" action="signup" method="POST">
                        <div class="form-group">
                            <input class="form-control" type="text" name="uid" placeholder="Username">
                        </div>    
                        <div class="form-group">    
                            <input class="form-control" type="text" name="mail" placeholder="E-mail">
                        </div>
                        <div class="form-group">        
                            <input class="form-control" type="password" name="pwd" placeholder="Password">
                        </div>    
                        <div class="form-group">        
                            <input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat Password">
                        </div>    
                        <div class="form-group">    
                            <button class="btn btn-primary btn-block" type="submit" name="signup-submit">SignUp</button>
                        </div>    
                    </form>                  
                </section>
            </section>
        </section>         
        </body>';
        echo $html;
    }
}