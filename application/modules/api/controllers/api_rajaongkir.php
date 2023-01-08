<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Api_rajaongkir extends CI_Controller
{

  private $api_key = 'b93afe58a96608f7b01a2a4b84eadde7';


  public function provinsi()
  {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: $this->api_key"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      // echo $response;
      $array_response = json_decode($response, true);
      // echo '<pre>';
      // print_r($array_response['rajaongkir']['results']);
      // echo '</pre>';
      $data_provinsi = $array_response['rajaongkir']['results'];
      echo "<option value=''>--Pilih Provinsi--</option>";
      foreach ($data_provinsi as $key => $value) {
        echo "<option value='" . $value['province_id'] . "' id_provinsi='" . $value['province_id'] . "'>" . $value['province'] . "</option>";
      }
    }
  }

  public function kota()
  {
        $id_provinsi_terpilih = $this->input->post('id_provinsi');

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id_provinsi_terpilih,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: $this->api_key"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          $array_response = json_decode($response, true);
          $data_kota = $array_response['rajaongkir']['results'];
          echo "<option value=''>--Pilih kota--</option>";
          foreach ($data_kota as $key => $value) {
            echo "<option value='" . $value['city_id'] . "' id_kota='" . $value['city_id'] . "'>" . $value['city_name'] . "</option>";
          }
        }
      }

  function getCost()
  {
    $origin = $this->input->post('origin');
    $destination = $this->input->post('destination');
    $berat = $this->input->post('berat');
    $courier = $this->input->post('courier');

    $data = array('origin' => $origin,
            'destination' => $destination, 
            'berat' => $berat, 
            'courier' => $courier 

    );
   // echo $origin;
    $this->cost($origin, $destination, $berat, $courier);
  }

    function cost($origin, $destination, $weight, $courier) {


    $curl = curl_init();


    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: $this->api_key"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      //echo $response;
      $data = json_decode($response, true);
      //echo json_encode($k['rajaongkir']['results']);

      
      for ($k=0; $k < count($data['rajaongkir']['results']); $k++){
      
        for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
          $datas = "<option value=".$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'].">".$data['rajaongkir']['results'][$k]['costs'][$l]['service']." = ".$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']."</option>";
          echo $datas;
          //echo $data['rajaongkir']['results'][$k]['costs'][$l]['service']."=".$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']."<br>";
        }
        //echo $data['rajaongkir']['results'][$k]['code'];
      }
      
      //echo $data['rajaongkir']['results']['costs']['service'];
      //echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);
        }
      }
}
