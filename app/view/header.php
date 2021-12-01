
<?php
        @session_start();
        if(!isset($_SESSION['user'])){
          
            echo'<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="">diverjugue@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="">telf: 67899987654</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>';
          
            echo'<nav class="navbar navbar-expand-lg navbar-light shadow">
           <div class="container d-flex justify-content-between align-items-center">
   
               <a class="navbar-brand text-success logo h1 align-self-center" href="'.URL.'main">
                   DiverJugue
               </a>
   
               <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>
   
               <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                   <div class="flex-fill">
                       <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                           <li class="nav-item">
                               <a class="nav-link" href="'.URL.'main">INICIO</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="'.URL.'shopcontroller/index">Tienda</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="'.URL.'registercontroller/index">Registro</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="'.URL.'contactcontroller/index">Contacto</a>
                           </li>
                    
                       </ul>
                   </div>
                   <div class="navbar align-self-center d-flex">
                       <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                           <div class="input-group">
                               <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                               <div class="input-group-text">
                                   <i class=""></i>
                               </div>
                           </div>
                       </div>          
                       <a class="nav-icon position-relative text-decoration-none" href="'.URL.'cartcontroller/index">
                           <i class="fas fa-cart-plus"></i>
                       </a>
                   </div>
               </div>
   
           </div>
       </nav>';
        }else{
            echo '<div>';
            if($_SESSION['user_group']==1){
                echo '<p>Bienvenido '.$_SESSION['user'].'</p>';
                
            echo'<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
            <div class="container text-light">
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <i class="fa fa-envelope mx-2"></i>
                        <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                        <i class="fa fa-phone mx-2"></i>
                        <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                    </div>
                    <div>
                        <a class="text-light" href="" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                        <a class="text-light" href="" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                        <a class="text-light" href="" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                        <a class="text-light" href="" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                    </div>
                </div>
            </div>
        </nav>';
              
                echo'<nav class="navbar navbar-expand-lg navbar-light shadow">
               <div class="container d-flex justify-content-between align-items-center">
       
                   <a class="navbar-brand text-success logo h1 align-self-center" href="'.URL.'main">
                       DiverJugue
                   </a>
       
                   <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                   </button>
       
                   <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                       <div class="flex-fill">
                           <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                               <li class="nav-item">
                                   <a class="nav-link" href="'.URL.'main">INICIO</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="'.URL.'shopcontroller/index">Tienda</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="'.URL.'admincontroller/index">ADMINPANEL</a>
                               </li>
                               
                               <li class="nav-item">
                                   <a class="nav-link" href="'.URL.'contactcontroller/index">Contacto</a>
                               </li>
                        
                           </ul>
                       </div>
                       <div class="navbar align-self-center d-flex">
                           <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                               <div class="input-group">
                                   <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                                   <div class="input-group-text">
                                       <i class=""></i>
                                   </div>
                               </div>
                           </div>
                          
                        
                           <a class="nav-icon position-relative text-decoration-none" href="'.URL.'cartcontroller/index">
                               <i class="fas fa-cart-plus"></i>
                           </a>
                           <button type="button" id="logoutbtn" class="btn btn-danger">Log out</button>

                       </div>
                   </div>
       
               </div>
           </nav>';
            }else{

              echo '<p>Bienvenido '.$_SESSION['user'].'</p>';

            
              echo'<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
              <div class="container text-light">
                  <div class="w-100 d-flex justify-content-between">
                      <div>
                          <i class="fa fa-envelope mx-2"></i>
                          <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                          <i class="fa fa-phone mx-2"></i>
                          <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                      </div>
                      <div>
                          <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                          <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                          <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                          <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                      </div>
                  </div>
              </div>
          </nav>';
                
                  echo'<nav class="navbar navbar-expand-lg navbar-light shadow">
                 <div class="container d-flex justify-content-between align-items-center">
         
                     <a class="navbar-brand text-success logo h1 align-self-center" href="'.URL.'main">
                         DiverJugue
                     </a>
         
                     <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                     </button>
         
                     <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                         <div class="flex-fill">
                             <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                                 <li class="nav-item">
                                     <a class="nav-link" href="'.URL.'main">INICIO</a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" href="'.URL.'shopcontroller/index">Tienda</a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" href="'.URL.'contactcontroller/index">Contacto</a>
                                 </li>
                          
                             </ul>
                         </div>
                         <div class="navbar align-self-center d-flex">
                             <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                                 <div class="input-group">
                                     <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                                     <div class="input-group-text">
                                         <i class=""></i>
                                     </div>
                                 </div>
                             </div>
                        
          
                             <a class="nav-icon position-relative text-decoration-none" href="'.URL.'cartcontroller/index">
                                 <i class="fas fa-cart-plus"></i>
                             </a>
                             

                             <button type="button" id="logoutbtn" class="btn btn-danger">Log out</button>

                         </div>
                     </div>
         
                 </div>
             </nav>';

            }


            echo '</div>';
        }
    ?>








</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo URL?>app/javascript/login/login.js"></script>
</header>
