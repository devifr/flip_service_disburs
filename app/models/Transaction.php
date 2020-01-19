<?php
class Transaction extends Model
{

  public function lists(){
    $sql = "SELECT * from our_transaction";
    $lists = $this->execute_qry($sql);
  }

  public function create($data,$response)
  {
    $sql = 'INSERT INTO our_transaction (transaction_id, status, beneficiary_name, receipt, time_served, fee, bank_code, account_number, amount, remark) VALUES("'.$data[no_transaksi].'","'.$response[status].'","'.$response[beneficiary_name].'","'.$response[receipt].'","'.$response[time_served].'","'.$response[fee].'","'.$data[bank_code].'","'.$data[account_number].'","'.$data[amount].'","'.$data[remark].'")';

    return $this->execute_qry($sql);
  }
}
