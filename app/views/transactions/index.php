<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="css/style.css">
<div class="container">
  <div class="content">
    <h2>List Transactions</h2>
    <div><a href="<?php echo $GLOBALS['BASE_URL'].'/transactions/baru'; ?>">New Transaction</a></div>
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
                <a href="<?php echo $GLOBALS['BASE_URL'].'/transactions/refresh/'.$row["transaction_id"]; ?>">Refresh</a>
              <?php }else{
                echo "Done";
              } ?>
              <a href="<?php echo $GLOBALS['BASE_URL'].'/transactions/show/'.$row["id"]; ?>">Show</a>
            </td>
          </tr>
         <?php } ?>
       <?php }else{
         echo "Not Data Available";
       } ?>
      </tbody>
    </table>
  </div>
</div>
