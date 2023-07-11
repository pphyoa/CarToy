<?php
 require_once APPROOT."/views/inc/header.php"; 
 require_once APPROOT."/views/inc/nav.php";
?>

<div class="admin">
  <div class="admin-pannel">
     <ul class="list-group">
       <h2>Short Time Discount Price</h2>
       <li class="list-group-item"><a href="<?php echo URLROOT.'admin/home'; ?>">Discount Price</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'supercar/home'; ?>">Supper cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'jeepcar/home'; ?>">Jeep cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'truckcar/home'; ?>">Truck cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'policecar/home'; ?>">Police cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'buscar/home'; ?>">Bus cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'othercar/home'; ?>">Other cars</a></li>
     </ul>
     <div class="admin-page">
      <form action="<?php echo URLROOT.'admin/edit'; ?>" method="post" enctype="multipart/form-data">
        <h1>Short Time Discount Price Edit Page</h1>
        <div class="input-group">
           <input type="text" name="title" class="form-control " value="<?php echo $data['discount']->title; ?>">
        </div>
        <div class="input-group">
            <input type="text" name="originalprice" class="form-control " value="<?php echo $data['discount']->originalprice; ?>">
        </div>
        <div class="input-group">
            <input type="text" name="discountprice" class="form-control " value="<?php echo $data['discount']->discountprice; ?>">
        </div>
        <div class="input-group">
            <input type="file" name="file" class="form-control ">
            <input type="hidden" name="old_file" value="<?php echo $data['discount']->img; ?>"> 
        </div>
        <input type="submit" name="submit" class="editinput" value="Update Discount Price">

      </form>
     </div>
  </div>
</div>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
    
