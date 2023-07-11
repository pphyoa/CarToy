<?php
 require_once APPROOT."/views/inc/header.php"; 
 require_once APPROOT."/views/inc/nav.php";
?>

<div class="admin">
  <div class="admin-pannel">
     <ul class="list-group">
       <h2>Edit Police Cars</h2>
       <li class="list-group-item"><a href="<?php echo URLROOT.'admin/home'; ?>">Discount Price</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'supercar/home'; ?>">Supper cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'jeepcar/home'; ?>">Jeep cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'truckcar/home'; ?>">Truck cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'policecar/home'; ?>">Police cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'buscar/home'; ?>">Bus cars</a></li>
       <li class="list-group-item"><a href="<?php echo URLROOT.'othercar/home'; ?>">Other cars</a></li>
     </ul>
     <div class="admin-page">
      <form action="<?php echo URLROOT.'policecar/edit'; ?>" method="post" enctype="multipart/form-data">
        <h1>Edit Police Cars</h1>
        <div class="form-group">
           <label for="title">Title</label>
           <input type="text" name="title" class="form-control " id="title" value="<?php echo $data['edit']->title; ?>">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control " id="price" value="<?php echo $data['edit']->price; ?>">
        </div>
        <div class="form-group">
            <input type="file" name="file" class="form-control">
            <input type="hidden" name="old_file" value="<?php echo $data['edit']->img?>">
        </div>
        <input type="submit" name="submit" class="editinput" value="Update PoliceCar">

      </form>
     </div>
  </div>
</div>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
    
