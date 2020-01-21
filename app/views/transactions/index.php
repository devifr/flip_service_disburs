<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="css/style.css">
<div class="container">
  <?php if(isset($_GET['success']) && $_GET['success'] == '1'){ ?>
    <div class="alert-success">Your Transaction Have Created</div>
  <?php }else if(isset($_GET['success']) && $_GET['success'] == '2'){ ?>
    <div class="alert-success">Your Transaction Have Updated</div>
  <?php }else if(isset($_GET['error']) && $_GET['error'] == '0'){ ?>
    <div class="alert-error">Dont Get Response</div>
  <?php }else if(isset($_GET['error']) && $_GET['error'] == '1'){ ?>
    <div class="alert-error">Your Transaction Failed to Create</div>
  <?php }else if(isset($_GET['error']) && $_GET['error'] == '2'){ ?>
    <div class="alert-error">Your Transaction Failed to Update</div>
  <?php } ?>
  <div class="content">
    <h2>List Transactions</h2>
    <div><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/flip_service_disburs/public/'.'/transactions/baru'; ?>">New Transaction</a></div>
    <table class="table">
      <thead>
        <tr>
          <td>No Transaksi</td>
          <td>Bank</td>
          <td>Account Number</td>
          <td>Status</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php if ($data['transactions']->num_rows > 0) {
        while($row = $data['transactions']->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['transaction_id']; ?></td>
            <td><?php echo $row['bank_code']; ?></td>
            <td><?php echo $row['account_number']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
              <?php if($row['status'] != "SUCCESS"){ ?>
                <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/flip_service_disburs/public/'.'/transactions/refresh/'.$row["transaction_id"]; ?>">Refresh</a>
              <?php }else{
                echo "Done";
              } ?>
              <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/flip_service_disburs/public/'.'/transactions/show/'.$row["id"]; ?>">Show</a>
            </td>
          </tr>
         <?php } ?>
       <?php }else{ ?>
         <tr>
           <td colspan="5">Not Data Available</td>
       <?php } ?>
      </tbody>
    </table>
  </div>
</div>
