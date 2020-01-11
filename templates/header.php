 <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed py-2">
     <a class="navbar-brand text-primary text-uppercase font-weight-bold" href="#">
         <h3>Inventory</h3>
     </a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
     </button>


     
     <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
             <li class="nav-item ">
                 <a class="nav-link text-light text-uppercase font-weight-bold px-3" href="index.php"> <i class="fas fa-home text-primary"></i> Home <span class="sr-only">(current)</span></a>
             </li>
             <?php
             if(isset($_SESSION["userid"]))
             {
                 ?>
              <li class="nav-item">
                 <a class="nav-link text-light text-uppercase font-weight-bold px-3" href="logout.php"> <i class="fas fa-sign-out-alt text-danger"></i> Logout</a>
             </li>
                 <?php
             }
             ?>
         

         </ul>
     </div>
 </nav>