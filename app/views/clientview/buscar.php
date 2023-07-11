<?php
 require_once APPROOT."/views/inc/header.php"; 
 require_once APPROOT."/views/inc/nav.php";
?>

<div class="discountshow">

<?php foreach($data as $buscar): ?>
<div class="discount-body">
    <img src="<?php echo URLROOT.'/assets/uploads/'.$buscar->img; ?>">
    <h1><?php echo $buscar->title ;?></h1>
    <p class="dispag">price <?php echo $buscar->price ;?></p>
    <div class="disbtn">
      <button class="bg-primary"><a href="<?php echo URLROOT.'buscar/edit/'.$buscar->id;?>">Add</a></button>
      <button class="bg-danger"><a href="<?php echo URLROOT.'buscar/delete/'.$buscar->id;?>">Buy</a></button>
    </div>
  </div>
  <?php endforeach; ?>

</div>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
    
