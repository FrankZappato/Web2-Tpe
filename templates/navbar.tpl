 <div class="nav-bar">
     <nav class="navbar navbar-expand-lg">
         <a class="navbar-brand" href="#"><img src="./images/the_cave_logo7.png"></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <i class="fas fa-bars"></i>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ml-auto">
                 <li class="nav-item active">
                     <a class="nav-link" href="home">HOME</a>
                 </li>
                 {if !isset($smarty.session.isLogged)}
                     <li class="nav-item active">
                         <a class="nav-link" href="signup">SIGNUP</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="login">LOGIN</a>
                     </li>
                 {/if}
                 <li class="nav-item">
                     <a class="nav-link" href="products">PRODUCTS</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="contact">CONTACT</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="logout">LOGOUT</a>
                 </li>
             </ul>
         </div>
     </nav>
 </div>