<?php
 require_once APPROOT."/views/inc/header.php"; 
 require_once APPROOT."/views/inc/nav.php";
?>

<div class="discountshow">

<?php foreach($data as $jeepcar): ?>
<div class="discount-body">
    <img src="<?php echo URLROOT.'/assets/uploads/'.$jeepcar->img; ?>">
    <h1><?php echo $jeepcar->title ;?></h1>
    <p class="dispag">price <?php echo $jeepcar->price ;?></p>
    <div class="disbtn">
      <button class="bg-primary"><a href="<?php echo URLROOT.'jeepcar/edit/'.$jeepcar->id;?>">Add</a></button>
      <button class="bg-danger"><a href="<?php echo URLROOT.'jeepcar/delete/'.$jeepcar->id;?>">Buy</a></button>
    </div>
  </div>
  <?php endforeach; ?>

</div>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
    
