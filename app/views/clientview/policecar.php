<?php
 require_once APPROOT."/views/inc/header.php"; 
 require_once APPROOT."/views/inc/nav.php";
?>

<div class="discountshow">

<?php foreach($data as $policecar): ?>
<div class="discount-body">
    <img src="<?php echo URLROOT.'/assets/uploads/'.$policecar->img; ?>">
    <h1><?php echo $policecar->title ;?></h1>
    <p class="dispag">price <?php echo $policecar->price ;?></p>
    <div class="disbtn">
      <button class="bg-primary"><a href="<?php echo URLROOT.'policecar/edit/'.$policecar->id;?>">Add</a></button>
      <button class="bg-danger"><a href="<?php echo URLROOT.'policecar/delete/'.$policecar->id;?>">Buy</a></button>
    </div>
  </div>
  <?php endforeach; ?>

</div>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
    
