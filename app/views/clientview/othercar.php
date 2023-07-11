<?php
 require_once APPROOT."/views/inc/header.php"; 
 require_once APPROOT."/views/inc/nav.php";
?>

<div class="discountshow">

<?php foreach($data as $othercar): ?>
<div class="discount-body">
    <img src="<?php echo URLROOT.'/assets/uploads/'.$othercar->img; ?>">
    <h1><?php echo $othercar->title ;?></h1>
    <p class="dispag">price <?php echo $othercar->price ;?></p>
    <div class="disbtn">
      <button class="bg-primary"><a href="<?php echo URLROOT.'othercar/edit/'.$othercar->id;?>">Add</a></button>
      <button class="bg-danger"><a href="<?php echo URLROOT.'othercar/delete/'.$othercar->id;?>">Buy</a></button>
    </div>
  </div>
  <?php endforeach; ?>

</div>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
    
