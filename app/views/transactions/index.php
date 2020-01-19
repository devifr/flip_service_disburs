<form action="/flip_service_disburse/public/transactions/create" method="POST" name="form_transaction" id="form_transaction">
  <div class="form-control">
    <label>No Transaksi</label/>
    <input type="hidden" name="no_transaksi" value="<?php echo $data['no_transaksi']; ?>"/>
    <?php echo $data['no_transaksi']; ?>
  </div>
  <div class="form-control">
    <label>Kode Bank</label>
    <select name="bank_code">
      <?php foreach ($data['banks'] as $key => $bank) {
        echo "<option value=$bank>$bank</option>";
      } ?>
    </select>
  </div>
  <div class="form-control">
    <label>Account Number</label>
    <input type="text" name="account_number"/>
  </div>
  <div class="form-control">
    <label>Amount</label>
    <input type="integer" name="amount"/>
  </div>
  <div class="form-control">
    <label>Remark</label>
    <input type="text" name="remark"/>
  </div>
  <div class="form-control">
    <input type="submit" value="Create">
  </div>
</form>
