<link rel="stylesheet" href="../../css/style.css">
<div class="container">
  <div class="content">
    <?php $row = $data['transaction']->fetch_assoc(); ?>
    <h2>Transaction No <?php echo $row['transaction_id']; ?></h2>
    <form action="<?php echo $GLOBALS['BASE_URL'].'/transactions/create'; ?>" method="POST" name="form_transaction" id="form_transaction">
      <div class="form-group">
        <label>No Transaksi : </label/>
        <span class="form-control"><?php echo $row['transaction_id']; ?></span>
      </div>
      <div class="form-group">
        <label>Kode Bank : </label>
        <span class="form-control"><?php echo $row['bank_code']; ?></span>
      </div>
      <div class="form-group">
        <label>Account Number : </label>
        <span class="form-control"><?php echo $row['account_number']; ?></span>
      </div>
      <div class="form-group">
        <label>Amount : </label>
        <span class="form-control"><?php echo $row['amount']; ?></span>
      </div>
      <div class="form-group">
        <label>Remark : </label>
        <span class="form-control"><?php echo $row['amount']; ?></span>
      </div>
      <div class="form-group">
        <label>Status : </label>
        <span class="form-control"><?php echo $row['status']; ?></span>
      </div>
      <div class="form-group">
        <label>Beneficiary Name : </label>
        <span class="form-control"><?php echo $row['beneficiary_name']; ?></span>
      </div>
      <div class="form-group">
        <label>Time Served : </label>
        <span class="form-control"><?php echo $row['time_served']; ?></span>
      </div>
      <div class="form-group">
        <label>Created At : </label>
        <span class="form-control"><?php echo $row['created_at']; ?></span>
      </div>
      <div class="form-group">
        <label>Updated At : </label>
        <span class="form-control"><?php echo $row['updated_at']; ?></span>
      </div>
      <div class="form-group">
        <label>Fee : </label>
        <span class="form-control"><?php echo $row['fee']; ?></span>
      </div>
      <?php if($row['receipt'] != ''){ ?>
        <div class="form-group">
          <img src="<?php echo $row['receipt'] ?>" size="100" />
        </div>
      <?php } ?>
      <div class="form-group">
        <a href="<?php echo $GLOBALS['BASE_URL'].'/transactions/index'; ?>" class="btn-default">Back</a>
      </div>
    </form>
  </div>
</div>
