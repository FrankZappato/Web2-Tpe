<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-25 00:25:28
  from 'C:\xampp\htdocs\web2-tp\templates\loginform.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6d1cd8d39178_46679876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90ac417b9a07cd5fe296361efc58ded1eaedd4c0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2-tp\\templates\\loginform.tpl',
      1 => 1600985964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6d1cd8d39178_46679876 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
                 </form>
             </section>
         </section>
     </section>
 
 </body>
 
 </html>

<?php }
}
