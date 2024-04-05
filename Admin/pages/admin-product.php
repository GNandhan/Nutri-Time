<?php
 include './connect.php';
 error_reporting(0);
 session_start();
 if($_SESSION["email"]=="")
 {
    header('location:admin-login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Materials</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/icon-small.png" />
</head>
<body>
  <!-- code for getteing the subcategory as per the actegory selected -->
<script>
  function getcat()
  {
id=document.getElementById('catid').value;
//alert(id);
if(id!=0)
{
  $('#sub').html('<option value="">loading</option>');
  $.post('sub.php',{id:""+id+""},function(data){$('#sub').html(data);});
 
}
  }
</script>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <!-- including the sidebar,navbar -->
<?php
  include './topbar.php';
?>
    <?php
if(isset($_GET['pid']))
{
    $proid = $_GET['pid'];
    $p_query = mysqli_query($conn,"SELECT * FROM product WHERE pro_id = '$proid'");
    $p_row1=mysqli_fetch_array($p_query);

        $p_code1 = $p_row1['pro_code'];
        $p_name1 = $p_row1['pro_name'];
        $p_cat1 = $p_row1['pro_category']; 
        $p_sub1 = $p_row1['pro_subcategory']; 
        $p_brand1 = $p_row1['pro_brand']; 
        $p_pri1 = $p_row1['pro_price']; 
        $p_mrp1 = $p_row1['pro_mrp']; 
        $p_qua1 = $p_row1['pro_quantity']; 
        $p_img1 = $p_row1['pro_image']; 
        // $p_dis1 = $p_row1['pro_distribution'];
}
// fetching the data from the URL for deleting the subject form
if(isset($_GET['pd_id']))
{
    $dl_id = $_GET['pd_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM product WHERE pro_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $img = '../images/product/'.$dl_row1['pro_image'];
    $del = mysqli_query($conn,"DELETE FROM product WHERE pro_id='$dl_id'");
    if($del)
    {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-product.php");
    }
    else
    {
        echo "Deletion Failed";
    }    
}
?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h1 class="card-title">Product</h1>
                <p class="card-description">Add Product Details</p>
                <form method="post" class="forms-sample" enctype="multipart/form-data">
                  <input type="hidden" name="pid" value="<?php echo $proid; ?>">
                  <div class="row">
                    <!-- <div class="col-lg-6 col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" class="form-control" placeholder="#00A001" name="procode"
                          value="<?php echo $p_code1; ?>" required>
                      </div>
                    </div> -->
                    <div class="col-lg-6 col-md col-sm col-12">
    <div class="form-group">
        <label>Product Code</label>
        <select class="form-control" name="procode" required>
            <option value="">Select Product Code</option>
            <?php
            $price_query = mysqli_query($conn, "SELECT pri_id, pro_code FROM price");
            while ($price_row = mysqli_fetch_assoc($price_query)) {
                $pri_id = $price_row['pri_id'];
                $pro_code = $price_row['pro_code'];
                echo "<option value='$pro_code'>$pro_code</option>";
            }
            ?>
        </select>
    </div>
</div>

                    <div class="col-lg-6 col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" placeholder="Weight Gainer" name="proname"
                          value="<?php echo $p_name1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" name="procat" onchange="getcat();" id="catid" required>
                        <option selected>Select the categories</option>
                <?php
                      $query = mysqli_query($conn,"select * from category");
                      while ($row = mysqli_fetch_assoc($query))
                      {
                        $cate_id=$row["category_id"];
                        $cate_name=$row["category_name"];
                ?>
                      <option value="<?php echo $cate_id; ?>" <?php if($row['category_id']==$p_cat1){ echo 'selected';} ?> ><?php echo $cate_name; ?></option>
                    <?php
                      }
                    ?>
              </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleSelectGender">Subcategory</label>
                        <select class="form-control" name="subcat"   id="sub" required>
                        <option selected>Select the Subcategory</option>
                <?php
                      $data2 = "SELECT * FROM subcategory";
                      $data2_query = mysqli_query($conn,$data2);
                      while ($row2 = mysqli_fetch_assoc($data2_query))
                      {
                        $subcat_id=$row2['subcategory_id'];
                        $subcat_name=$row2['subcategory_name'];
                ?>
                      <option value="<?php echo $subcat_id; ?>" <?php if($row2['subcategory_id']==$p_sub1){ echo 'selected';} ?> ><?php echo $subcat_name; ?></option>
                    <?php
                      }
                    ?>
              </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>MRP</label>
                        <input type="number" class="form-control" name="promrp" value="<?php echo $p_mrp1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Purchased Price</label>
                        <input type="number" class="form-control" name="proprice" value="<?php echo $p_pri1; ?>"
                          required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="proquant" value="<?php echo $p_qua1; ?>"
                          required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Product Image</label>
                        <div class="input-group mb-3">
                          <input type="file" class="custom-file-input form-control file-upload-info"
                            id="inputGroupFile01" name="proimg" onchange="displaySelectedFileName(this)"
                            value="<?php echo $p_img1; ?>" required>
                          <label class="input-group-text custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        <img src="../images/material/<?php echo $p_img1; ?>" alt="" width="100">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" name="submitp">Submit</button>
                  <button type="reset" class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- PHP CODE FOR INSERTING THE DATA -->
        <?php
    if(isset($_POST["submitp"]))
    {
    $pcode= $_POST["procode"];
    $pname= $_POST["proname"];
    $pcat_id = $_POST["procat"];
    $psubcat_id = $_POST["subcat"];
    $pbrand= "Herbalife";
    $pmrp= $_POST["promrp"];
    $pprice= $_POST["proprice"];
    $pquan= $_POST["proquant"]; 
    $pimg = $_FILES['proimg']['name'];

  // Image uploading formats
  $filename = $_FILES['proimg']['name'];
  $tempname = $_FILES['proimg']['tmp_name'];

    // Fetch category and subcategory names based on their IDs
    $cat_query = mysqli_query($conn, "SELECT category_name FROM category WHERE category_id = '$pcat_id'");
    $cat_row = mysqli_fetch_assoc($cat_query); // Fetching names
    $pcat_name = $cat_row['category_name']; // Assigning names

    $subcat_query = mysqli_query($conn, "SELECT subcategory_name FROM subcategory WHERE subcategory_id = '$psubcat_id'");
    $subcat_row = mysqli_fetch_assoc($subcat_query); // Fetching names
    $psubcat_name = $subcat_row['subcategory_name']; // Assigning names

// Fetch the material ID from the URL parameters
$pro_id = $_POST["pid"];

if($pro_id==''){
  $sql = mysqli_query($conn,"INSERT INTO product (pro_code, pro_name, pro_category, pro_subcategory, pro_brand, pro_price, pro_mrp, pro_quantity, pro_curquantity, pro_image)
                                       VALUES ('$pcode','$pname','$pcat_name','$psubcat_name','$pbrand','$pprice', '$pmrp','$pquan','$pquan','$pimg')");
}else{
  // Update existing material
  if ($filename) {
      // Remove the existing image
      $imgs = '../images/product/' . $pimg;
      unlink($imgs);
      // Update material with new image
      $sql = mysqli_query($conn, "UPDATE product SET pro_code='$pcode', pro_name='$pname', pro_category='$pcat_name', pro_subcategory='$psubcat_name', pro_brand='$pbrand', pro_price='$pprice', pro_mrp='$pmrp', pro_quantity='$pquan', pro_curquantity='$pquan', pro_image='$pimg' WHERE pro_id='$pro_id'");
  } else {
      // Update material without changing the image
      $sql = mysqli_query($conn, "UPDATE product SET pro_code='$pcode', pro_name='$pname', pro_category='$pcat_name', pro_subcategory='$psubcat_name', pro_brand='$pbrand', pro_price='$pprice', pro_mrp='$pmrp', pro_quantity='$pquan', pro_curquantity='$pquan' WHERE pro_id='$pro_id'");
  }
}

if ($sql == TRUE){
// echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
move_uploaded_file($tempname, "../images/product/$filename");
echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
} 
else{
  echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
}
}
?>
        <div class="row ">
          <!-- table view -->
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Product</h4>
                <div class="row">
                  <div class="col-md-9">
                    <p class="card-description">Product Details</p>
                  </div>
                  <div class="col-md-3">
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter By:
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <p class="pl-3">Type</p>
                        <div class="dropdown-item">
                          <input type="checkbox" id="checkCategory" class="filter-checkbox" value="category">
                          <label for="checkCategory">Used Product</label>
                        </div>
                        <div class="dropdown-item">
                          <input type="checkbox" id="checkSubcategory" class="filter-checkbox" value="subcategory">
                          <label for="checkSubcategory">Unused Product</label>
                        </div>
                        <!-- Add more checkbox items for other filter options -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Slno</th>
                        <th>Product Code</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Brand</th>
                        <th>MRP</th>
                        <th>Purchased Price</th>
                        <th>Quantity</th>
                        <th>Current Quantity</th>
                        <th>MRP Total</th>
                        <th>Purchased Total</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <?php  
$sql=mysqli_query($conn,"SELECT * FROM product ORDER BY pro_id ");
$serialNo = 1;
while($row=mysqli_fetch_assoc($sql))
{
    $pro_id=$row['pro_id'];
    $pro_cod=$row['pro_code'];
    $pro_nam=$row['pro_name'];
    $pro_cat=$row['pro_category'];
    $pro_subcat=$row['pro_subcategory']; 
    $pro_bra=$row['pro_brand']; 
    $pro_mrp=$row['pro_mrp']; 
    $pro_pri=$row['pro_price']; 
    $pro_qua=$row['pro_quantity']; 
    $pro_curqua=$row['pro_curquantity']; 
    $pro_img=$row['pro_image']; 
    $pro_sta=$row['pro_status']; 

    $pro_mrptotal = $pro_mrp * $pro_qua;
    $pro_purtotal = $pro_pri * $pro_qua;
    $pro_purprofit = $pro_mrptotal - $pro_purtotal;
    // $pro_sellprofit = $pro_mrp * ($pro_qua - $pro_dis);
?>
                    <tbody>
                      <tr>
                        <td class="py-1"><?php echo $serialNo++; ?></td>
                        <td class="py-1">#<?php echo $pro_cod; ?></td>
                        <td><img src="../images/product/<?php echo $pro_img; ?>" alt="" width="50" class="rounded-circle"></td>
                        <td><?php echo $pro_nam; ?></td>
                        <td><?php echo $pro_cat; ?></td>
                        <td><?php echo $pro_subcat; ?></td>
                        <td><?php echo $pro_bra; ?></td>
                        <td><?php echo $pro_mrp; ?></td>
                        <td><?php echo $pro_pri; ?></td>
                        <td><?php echo $pro_qua; ?></td>
                        <td><?php echo $pro_curqua; ?></td>
                        <td><?php echo $pro_mrptotal; ?></td>
                        <td><?php echo $pro_purtotal; ?></td>
                        <td>
                          <a href="admin-product.php?pid=<?php echo $pro_id; ?>"
                            class="btn btn-inverse-secondary btn-icon-text p-2">Edit<i
                              class="ti-pencil-alt btn-icon-append"></i>
                          </a>
                        </td>
                        <td>
                          <a href="admin-product.php?pd_id=<?php echo $pro_id; ?>"
                            class="btn btn-inverse-danger btn-icon-text p-2">Delete<i
                              class="ti-trash btn-icon-prepend"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                    <?php
}
?>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- table view closed -->
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:../../partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.Nutri-time. All rights reserved.</span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script>
    function displaySelectedFileName(input) {
      var fileName = input.files[0].name;
      var label = input.nextElementSibling;
      label.innerText = fileName;

      // Display selected image
      var fileReader = new FileReader();
      fileReader.onload = function (e) {
        var img = document.createElement("img");
        img.src = e.target.result;
        img.style.width = "350px"; // Set width
        img.style.height = "auto"; // Maintain aspect ratio
        img.style.borderRadius = "8px"; // Border radius
        img.style.marginTop = "50px"; // Optional margin
        label.parentNode.appendChild(img);
      };
      fileReader.readAsDataURL(input.files[0]);
    }
  </script>
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/file-upload.js"></script>
  <script src="../js/typeahead.js"></script>
  <script src="../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>
</html>