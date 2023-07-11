<div class="container-fluid ">
<nav class="navbar navbar-expand-lg fixed-top navbar-light ">
  <div class="container">
    <img src="<?php echo URLROOT.'/assets/img/carlogo.png'; ?>" alt="">
    <h3><a class="navbar-brand" href="<?php echo URLROOT.'/'; ?>">CarToys</a></h3>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse  navbar-collapse offset-md-6" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Car Brands
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo URLROOT.'clientView/supercar'; ?>">Super cars</a></li>
            <li><a class="dropdown-item" href="<?php echo URLROOT.'clientView/jeepcar'; ?>">Jeep cars</a></li>
            <li><a class="dropdown-item" href="<?php echo URLROOT.'clientView/truckcar'; ?>">Truck cars</a></li>
            <li><a class="dropdown-item" href="<?php echo URLROOT.'clientView/policecar'; ?>">Police cars</a></li>
            <li><a class="dropdown-item" href="<?php echo URLROOT.'clientView/buscar'; ?>">Bus cars</a></li>
            <li><a class="dropdown-item" href="<?php echo URLROOT.'clientView/othercar'; ?>">Other cars</a></li>
            <li><a class="dropdown-item" href="<?php echo URLROOT.'clientView/discountcar'; ?>">Discount cars</a></li>
          </ul>
        </li>
        <?php if(getUserSession() != false):?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT.'user/logout'; ?>">Logout</a>
          </li>
        <?php else:?>
          <li class="nav-item">
             <a class="nav-link " href="<?php echo URLROOT.'user/login'; ?>" >Login</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="<?php echo URLROOT.'user/register'; ?>">Register</a>
          </li>
        <?php endif;?>
        <span>
          <i class="fa fa-cart-shopping"></i>
        </span>
      </ul>
    </div>
  </div>
</nav>
</div>