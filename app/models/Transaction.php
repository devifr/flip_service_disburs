<?php
class Transaction extends Model
{

  public function lists(){
    $sql = "SELECT * from our_transaction";
    return $this->execute_qry($sql);
  }

  public function create($data,$request,$response)
  {
    $response_str = json_encode($response);
    $request_str = json_encode($request);
    $time_now = date("Y-m-d H:i:s");
    $sql = "INSERT INTO our_transaction (transaction_id, status, beneficiary_name, receipt, time_served, fee, bank_code, account_number, amount, remark, request, response, created_at, updated_at) VALUES('$data[no_transaksi]','$response[status]','$response[beneficiary_name]','$response[receipt]','$response[time_served]','$response[fee]','$data[bank_code]','$data[account_number]', '$data[amount]','$data[remark]','$request_str','$response_str', '$time_now', '$time_now' )";

    return $this->execute_qry($sql);
  }

  public function update($trans_id,$response){
    $response_str = json_encode($response);
    $time_now = date("Y-m-d H:i:s");

    $sql = "UPDATE our_transaction SET status='$response[status]', receipt='$response[receipt]', time_served='$response[time_served]',request='$trans_id',response='$response_str', updated_at='$time_now'  WHERE transaction_id='$trans_id'";

    return $this->execute_qry($sql);
  }

  public function get_by_id($id)
  {
    $sql = "SELECT * from our_transaction where id='$id'";
    return $this->execute_qry($sql);
  }

}
