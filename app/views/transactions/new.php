<link rel="stylesheet" href="../css/style.css">
<div class="container">
  <div class="content">
    <h2>Create New Transaction</h2>
    <form action="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/flip_service_disburs/public/'.'/transactions/create'; ?>" method="POST" name="form_transaction" id="form_transaction">
      <div class="form-group">
        <label>No Transaksi</label/>
        <input type="hidden" name="no_transaksi" value="<?php echo $data['no_transaksi']; ?>"/>
        <?php echo $data['no_transaksi']; ?>
      </div>
      <div class="form-group">
        <label>Kode Bank</label>
        <select name="bank_code" class="form-control">
          <?php foreach ($data['banks'] as $key => $bank) {
            echo "<option value=$bank>$bank</option>";
          } ?>
        </select>
      </div>
      <div class="form-group">
        <label>Account Number</label>
        <input type="number" name="account_number" class="form-control" required/>
      </div>
      <div class="form-group">
        <label>Amount</label>
        <input type="number" name="amount" class="form-control" required/>
      </div>
      <div class="form-group">
        <label>Remark</label>
        <input type="text" name="remark" class="form-control" required/>
      </div>
      <div class="form-group">
        <input type="submit" value="Create" class="btn-primary">
        <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/flip_service_disburs/public/'.'/transactions/index'; ?>" class="btn-default">Back</a>
      </div>
    </form>
  </div>
</div>
