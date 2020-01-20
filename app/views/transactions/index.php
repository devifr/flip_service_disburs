<table border="1">
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
    <?php while($row = $data['transactions']->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['transaction_id']; ?></td>
        <td><?php echo $row['bank_code']; ?></td>
        <td><?php echo $row['account_number']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><a href="/flip_service_disburse/public/transactions/refresh?trans_id=<?php echo $row['transaction_id']; ?>">Refresh</a></td>
      </tr>
     <?php } ?>
  </tbody>
</table>
