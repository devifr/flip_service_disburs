<?php
class Transactions extends Controller
{
  public function index()
  {
    $tran = $this->model('transaction');
    $data['transactions'] = $tran->lists();
    $this->view('transactions/index',$data);
  }

  public function baru()
  {
    $data['banks'] = ['BNI','BCA','Mandiri','Cimb Niaga','Muamalat','BSM'];
    $data['no_transaksi'] = $this->generate_no_transaksi();
    $this->view('transactions/new',$data);
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
    if($response){
      $response_data = json_decode($response,true);
      $results = $tran->create($_POST,$data_dis,$response_data);
      if($results == true){
        $this->redirect('http://'.$_SERVER['HTTP_HOST'].'/flip_service_disburs/public/'.'/transactions/index?success=1');
      }else{
        $this->redirect('http://'.$_SERVER['HTTP_HOST'].'/flip_service_disburs/public/'.'/transactions/index?error=1');
      }
    }else{
      $this->redirect('http://'.$_SERVER['HTTP_HOST'].'/flip_service_disburs/public/'.'/transactions/index?error=0');  
    }
  }

  public function refresh($tran_id){
    $tran = $this->model('transaction');
    $ch = curl_init('https://nextar.flip.id/disburse/'.$tran_id);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization:' . 'Basic SHl6aW9ZN0xQNlpvTzduVFlLYkc4TzRJU2t5V25YMUp2QUVWQWh0V0tadW1vb0N6cXA0MTo=')
    );

    $response = curl_exec($ch);
    curl_close($ch);
    if($response){
      $response_data = json_decode($response,true);
      $results = $tran->update($tran_id,$response_data);
      if($results == true){
        $this->redirect('http://'.$_SERVER['HTTP_HOST'].'/flip_service_disburs/public/'.'/transactions/index?success=2');
      }else{
        $this->redirect('http://'.$_SERVER['HTTP_HOST'].'/flip_service_disburs/public/'.'/transactions/index?error=2');
      }
    }else{
      $this->redirect('http://'.$_SERVER['HTTP_HOST'].'/flip_service_disburs/public/'.'/transactions/index?error=0');
    }

  }

  public function show($id){
    $tran = $this->model('transaction');
    $data['transaction'] = $tran->get_by_id($id);
    $this->view('transactions/show',$data);
  }

  private function generate_no_transaksi()
  {
    return 'TR'.rand();
  }
}
