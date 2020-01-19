<?php
class Transactions extends Controller
{
  public function index()
  {
    $data['banks'] = ['BNI','BCA','Mandiri','Cimb Niaga','Muamalat','BSM'];
    $data['no_transaksi'] = $this->generate_no_transaksi();
    $this->view('transactions/index',$data);
  }

  public function create()
  {
    $tran = $this->model('transaction');
    $data_dis = array("bank_code" => $_POST['bank_code'], "account_number" => $_POST['account_number'], "amount" => $_POST['amount'], "remark" => $_POST['remark']);
    $ch = curl_init('https://nextar.flip.id/disburse');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization:' . 'Basic SHl6aW9ZN0xQNlpvTzduVFlLYkc4TzRJU2t5V25YMUp2QUVWQWh0V0tadW1vb0N6cXA0MTo=')
    );

    $response = curl_exec($ch);
    curl_close($ch);
    $response_data = json_decode($response,true);
    $results = $tran->create($_POST,$data_dis,$response_data);
    if($results == true){
      $this->redirect('/flip_service_disburse/public/transactions/index');
    }else{
      print_r($results);
    }
  }

  private function generate_no_transaksi()
  {
    return 'TR'.rand();
  }
}
