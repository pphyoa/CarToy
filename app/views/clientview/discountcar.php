<?php
 require_once APPROOT."/views/inc/header.php"; 
 require_once APPROOT."/views/inc/nav.php";
?>

<div class="discountshow">

<?php foreach($data as $discount): ?>
<div class="discount-body">
    <img src="<?php echo URLROOT.'/assets/uploads/'.$discount->img; ?>">
    <h1><?php echo $discount->title ;?></h1>
    <p class="dispag">price <?php echo $discount->discountprice ;?></p>
    <p class="seconddispag">price <?php echo $discount->originalprice ;?></p>
    <div class="disbtn">
      <button class="bg-primary"><a href="<?php echo URLROOT.'admin/edit/'.$discount->id;?>">Add</a></button>
      <button class="bg-danger"><a href="<?php echo URLROOT.'admin/delete/'.$discount->id;?>">Buy</a></button>
    </div>
  </div>
  <?php endforeach; ?>

</div>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
    
