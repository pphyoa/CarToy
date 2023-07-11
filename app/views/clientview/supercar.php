<?php
 require_once APPROOT."/views/inc/header.php"; 
 require_once APPROOT."/views/inc/nav.php";
?>

<div class="discountshow">

<?php foreach($data as $supercar): ?>
<div class="discount-body">
    <img src="<?php echo URLROOT.'/assets/uploads/'.$supercar->img; ?>">
    <h1><?php echo $supercar->title ;?></h1>
    <p class="dispag">price <?php echo $supercar->price ;?></p>
    <div class="disbtn">
      <button class="bg-primary"><a href="<?php echo URLROOT.'supercar/edit/'.$supercar->id;?>">Add</a></button>
      <button class="bg-danger"><a href="<?php echo URLROOT.'clientview/buy/'.$supercar->id;?>">Buy</a></button>
    </div>
  </div>
  <?php endforeach; ?>

</div>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
    
