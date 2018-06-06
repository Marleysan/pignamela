<!DOCTYPE html>


<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminPanel</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/global.css">
</head>

<body>
  
  <div class="row" style="margin: 0 auto; margin-top: 20px;">
    <h1 style="text-align: center;">AdminPanel<br>
    <small>From this page, you can add quantity for products in store.</small>
    <!--<small>You are logged as: <?php echo $admin_data['admin_username'];?>TODO </small>--></h1>
    <div class="buttonHolder" style="text-align: center;">
    <form action="<?php echo base_url(); ?>admin/logout">
    <button type="submit" class="btn btn-primary" style="width: 10%;">Logout</button>
    </form>
    </div>
  </div>
      
<?php foreach ($products as $product_item): ?>
 <form action="/admin/change_quantity/<?php echo $product_item['detail_id']; ?>" method="post">
  <div class="panel panel-default" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 70%; margin: 10px auto;">
    <div class="panel-body" style="height: 110px;">
     <img src="<?php echo base_url(); ?>assets/img/products/<?php echo $product_item['product_id']; ?>.png" style="height: 80px;">
    <label style="margin: 30px;"><?php echo $product_item['product_name']; ?></label>
    <label style="margin: 30px;">Size: <?php echo $product_item['detail_size']; ?></label>
    <label style="margin: 30px;">Quantity in Store: <?php echo $product_item['detail_quantity']; ?></label>
     <button type="submit" class="btn btn-primary" style="float: right; margin: 25px;">Add</button>
     <input type="number" min='1' name="quantity" style="float: right; width: 50px; margin: 30px;">
   </div>
 </div>
    </form>
 <?php endforeach; ?>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>