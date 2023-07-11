<?php
 require_once APPROOT."/views/inc/header.php"; 
 require_once APPROOT."/views/inc/nav.php";
?>

<div class="discountshow">

<?php foreach($data as $truckcar): ?>
<div class="discount-body">
    <img src="<?php echo URLROOT.'/assets/uploads/'.$truckcar->img; ?>">
    <h1><?php echo $truckcar->title ;?></h1>
    <p class="dispag">price <?php echo $truckcar->price ;?></p>
    <div class="disbtn">
      <button class="bg-primary"><a href="<?php echo URLROOT.'truckcar/edit/'.$truckcar->id;?>">Add</a></button>
      <button class="bg-danger"><a href="<?php echo URLROOT.'truckcar/delete/'.$truckcar->id;?>">Buy</a></button>
    </div>
  </div>
  <?php endforeach; ?>

</div>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
    
