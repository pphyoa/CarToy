<?php
 require_once APPROOT."/views/inc/header.php"; 
 require_once APPROOT."/views/inc/nav.php";
?>

<div class="admin">
  <div class="admin-pannel">
     <ul class="list-group">
       <h2>To Add Other Cars</h2>
       <li class="list-group-item"><a href="<?php echo URLROOT.'admin/home'; ?>">Discount Price</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'supercar/home'; ?>">Supper cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'jeepcar/home'; ?>">Jeep cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'truckcar/home'; ?>">Truck cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'policecar/home'; ?>">Police cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'buscar/home'; ?>">Bus cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'othercar/home'; ?>">Other cars</a></li>
     </ul>
     <div class="admin-page">
      <form action="<?php echo URLROOT.'othercar/home'; ?>" method="post" enctype="multipart/form-data">
        <h1>To Add Other Cars</h1>
        <div class="input-group">
           <input type="text" name="title" class="form-control <?php echo !empty($data['title_err']) ? 'is-invalid' : ''; ?>" placeholder="Title">
           <span class="invalid-feedback"><?php echo !empty($data['title_err']) ? $data['title_err'] : ''; ?></span>
        </div>
        <div class="input-group">
            <input type="text" name="price" class="form-control <?php echo !empty($data['price_err']) ? 'is-invalid' : '';?>" placeholder="Price">
            <span class="invalid-feedback"><?php echo !empty($data['price_err']) ? $data['price_err'] : ''; ?></span>
        </div>
        <div class="input-group">
            <input type="file" name="file" class="form-control <?php echo !empty($data['img_err']) ? 'is-invalid' : '';?>">
            <span class="invalid-feedback"><?php echo !empty($data['img_err']) ? $data['img_err'] : ''; ?></span>
        </div>
        <div class="finalinput">
           <button><a href="<?php echo URLROOT.'othercar/show'; ?>">Show Other Cars</a></button>
           <input type="submit" name="submit" class="inputbtn" value="Send">
        </div>
      </form>
     </div>
  </div>
</div>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
    
