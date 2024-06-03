<?php
class Registrasi  extends CI_Controller{

  function __construct(){
    parent::__construct();    
    $this->load->model('model_global');
 
  }

  function index(){
    $this->load->view('Layouts/registrasi');
      $this->load->helper('rupiah_helper');
  }

  function DetailVessel($id_vessel){

      $query = $this->db->get_where('ref_vessel_detail', array('id_vessel_activity' => $id_vessel));
      $data = "<option value=''>- Select -</option>";

      foreach ($query->result() as $value) {
        $data .= "<option value='".$value->id."'>".$value->nama."</option>";
      }

      echo $data;
    }

  public function add_activity() {

    $created_at = addslashes(date("Y-m-d H:i:s"));


    $nama = addslashes($this->input->post('nama'));
    $email = addslashes($this->input->post('email'));
    $kode_telepon = addslashes($this->input->post('kode_telepon'));
    $no_wa = addslashes($this->input->post('no_wa'));
    $vessel_name = addslashes($this->input->post('vessel_name'));
    $gross_register = preg_replace("/[^0-9]/", "", addslashes($this->input->post('gross_register')));
    $net_register =  preg_replace("/[^0-9]/", "", addslashes($this->input->post('net_register')));
    $dead_weight = preg_replace("/[^0-9]/", "", addslashes($this->input->post('dead_weight')));
    $lenght_over = preg_replace("/[^0-9]/", "", addslashes($this->input->post('lenght_over')));
    $vessel_type = addslashes($this->input->post('vessel_type'));
    $company_name = addslashes($this->input->post('company_name'));
    $vessel_activity = addslashes($this->input->post('vessel_activity'));
    $va_detail = addslashes($this->input->post('va_detail'));
    if(empty($this->input->post('cargo_mt'))){
      $cargo_mt ="0";
    }else{
      $cargo_mt = preg_replace("/[^0-9]/", "", addslashes($this->input->post('cargo_mt')));
     }
      $cargo_type = addslashes($this->input->post('cargo_type'));
    //$mfp = addslashes($this->input->post('mfp'));
    $mfp = preg_replace("/[^0-9]/", "", addslashes($this->input->post('mfp')));

    $arrival_date = addslashes($this->input->post('arrival_date'));
    $departure_date = addslashes($this->input->post('departure_date'));
    $arrival_time = addslashes($this->input->post('arrival_time'));
    $departure_time = addslashes($this->input->post('departure_time'));

    //Durasi
    // $tgl1 = strtotime($arrival_date);
    // $tgl2 = strtotime($departure_date);
    // $days = $tgl2 - $tgl1;
    // $jarak = floor($days / (60 * 60 * 24)+1) ;

     $start =   ($arrival_date.' '.$arrival_time);
     $end   =   ($departure_date.' '.$departure_time);
      // $start =  "2021-10-25 20:00";
      // $end   =  "2021-10-26 19:00";

      $awal  = date_create($start);
      $akhir = date_create($end);
          $diff  = date_diff( $awal,$akhir);

      // $selisih =   $diff->days + 1 .' Days '. "<br>" . $diff->h  .  ' Hours, ' ."<br>" . $diff->i . ' Minute ';
      //  $jarak =   $diff->days + 1;

      $hari = $diff->days;

      if($hari == 0){
          $selisih =   $diff->days + 1 . ' Days '. "<br>" . $diff->h  .  ' Hours, ' ."<br>" . $diff->i . ' Minute ';
          $jarak =   $diff->days + 1;
      }else{
        $selisih =   $diff->days . ' Days '. "<br>" . $diff->h  .  ' Hours, ' ."<br>" . $diff->i . ' Minute ';
        $jarak =   $diff->days ;

      }


    //Kurs
    $qry_kurs = $this->db->query("SELECT * from ref_kurs order by id_kurs ASC limit 1 ")->row();
    //Pilotage
    $qry_pilotage = $this->db->query("SELECT * from ref_tarif_pilotage where  nilai_akhir >= '$gross_register' order by id_tarif_pilotage ASC limit 1 ")->row();
    if($qry_pilotage->tarif == ""){ $result_pilotage = ""; }else{ $result_pilotage = ($qry_pilotage->tarif * 2); }

    //ISPS
    $qry_isps = $this->db->query("SELECT * from ref_tarif_isps_code_compliance where  nilai_akhir >= $gross_register order by id_tarif_isps_code_compliance ASC limit 1 ")->row();
    if($qry_isps->rate == ""){ $result_isps = ""; }else{ $result_isps = $qry_isps->rate ; }

    $qry_isps_wo = $this->db->query("SELECT * from ref_tarif_isps_wo where  nilai_akhir >= $gross_register and type = 'wo/bunkering' order by id_tarif_isps_wo ASC limit 1 ")->row();
     if($qry_isps_wo->rate == ""){ $result_isps_wo = ""; }else{ $result_isps_wo = $qry_isps_wo->rate ; }


    //STS
    $qry_sts_services = $this->db->query("SELECT * from ref_tarif_shiptoship_services order by id_tarif_shiptoship_services ASC limit 1 ")->row();
    if($qry_sts_services->rate == ""){ $result_sts = ""; }else{ $result_sts =$gross_register*$qry_sts_services->rate*$jarak; }

    //ALM
    $qry_sts_alm = $this->db->query("SELECT * from ref_tarif_shiptoship_alm where nilai_akhir >= '$gross_register' order by id_tarif_shiptoship_alm ASC limit 1 ")->row();
    if($qry_sts_alm->tarif == ""){ $result_sts_alm = ""; }else{ $result_sts_alm = $qry_sts_alm->tarif; }

    //STS Package
    $qry_sts_package = $this->db->query("SELECT * from ref_tarif_shiptoship_package where nilai_akhir >= '$gross_register' order by id_tarif_shiptoship_package ASC limit 1 ")->row();
    if($qry_sts_package->tarif == ""){ $result_sts_package = ""; }else{ $result_sts_package = $qry_sts_package->tarif; }

    //Cargo Transfer
    $qry_tarif_cargo_transfer = $this->db->query("SELECT * from ref_tarif_cargo_transfer_shipment_charges order by id_tarif_cargo_transfer_shipment_charges ASC limit 1 ")->row();
    if($qry_tarif_cargo_transfer->rate == ""){ $result_cargo_transfer = ""; }else{ $result_cargo_transfer = $qry_tarif_cargo_transfer->rate * $cargo_mt; }

    if($va_detail == '2' || $va_detail == '3' || $va_detail == '4' ){
    //Cargo Type / OSR
    $qry_tarif_cargo_type = $this->db->query("SELECT * from ref_tarif_cargo_type where nilai_akhir >= '$gross_register' and id_cargo_type = '$cargo_type'  order by id_tarif_cargo_type ASC limit 1 ")->row();
    if($qry_tarif_cargo_type->tarif == ""){ $result_osr = ""; }else{ $result_osr = $qry_tarif_cargo_type->tarif; }
    }
    // WO
    $qry_anchorage = $this->db->query("SELECT * from ref_tarif_shiptoship_services order by id_tarif_shiptoship_services DESC limit 1 ")->row();
    if($qry_anchorage->rate == ""){ $result_wo = ""; }else{ $result_wo = ($qry_anchorage->rate * $jarak) * $gross_register; }

    /////////////PNBP//////////////
    //Labuh
    $qry_labuh = $this->db->query("SELECT * from ref_tarif_labuh order by id_tarif_labuh ASC limit 1 ")->row();
    if($qry_labuh->tarif== ""){ $result_labuh = ""; }else{ $result_labuh = (($qry_labuh->tarif * $jarak)*$gross_register)/$qry_kurs->kurs; }

    //Rambu
    $qry_rambu = $this->db->query("SELECT * from ref_tarif_rambu order by id_tarif_rambu ASC limit 1 ")->row();
    if($qry_rambu->tarif == ""){ $result_rambu = ""; }else{ $result_rambu = (($qry_rambu->tarif * $jarak)* $gross_register); }
    //VTS
    $qry_vts = $this->db->query("SELECT * from ref_tarif_vts where  nilai_range >= '$gross_register' order by id_tarif_vts ASC limit 1 ")->row();
    if($qry_vts->tarif == ""){ $result_vts = ""; }else{ $result_vts = $qry_vts->tarif; }

    //PUP
    $qry_cargo_type = $this->db->query("SELECT * from ref_cargo_type order by id_cargo_type ASC limit 1 ")->row();
    if($qry_cargo_type->rate == ""){ $result_pup = ""; }else{ $result_pup = ($qry_cargo_type->rate*$cargo_mt)/$qry_kurs->kurs; }

    //Cargo Transfer PNBP
    $qry_cargo_transfer_fee = $this->db->query("SELECT * from ref_cargo_transfer_fee order by id_cargo_transfer_fee DESC limit 1 ")->row();
    if($qry_cargo_transfer_fee->rate == ""){ $result_cargo_transfer_pnbp = ""; }else{ $result_cargo_transfer_pnbp = ($qry_cargo_transfer_fee->rate/$qry_kurs->kurs ) * $cargo_mt; }



    //Total
    if($va_detail == '1') {
      $total_sts_mother =  ($result_pilotage+$result_isps+round($result_sts) + round($result_labuh) + round($result_rambu) + round($result_vts));
    }else if($va_detail == '2' || $va_detail == '3' || $va_detail == '4' ){
      $total_sts_feeder_FSO =  ($result_pilotage + $result_isps + round($result_sts) + $result_sts_alm  + $result_cargo_transfer + $result_osr+ round($result_labuh) + round($result_rambu) + round($result_vts)+ round($result_pup)+ round($result_cargo_transfer_pnbp)) ;
    }else if($va_detail == '7'){
      $total_barge_oil =  ($result_pilotage+$result_isps_wo+round($result_sts) + round($result_labuh) + round($result_rambu) + round($result_vts));
    }else{
      $total_wo =  ($result_pilotage + $result_isps_wo + $result_wo  + round($result_labuh) + round($result_rambu) + round($result_vts));
  }

     // echo $result_osr;
     // echo "<br/>";
    //  echo $gross_register;
    //  echo "<br/>";
    // echo $net_register;
    // echo "<br/>";
    // echo $dead_weight;
    // echo "<br/>";
    // echo $lenght_over;
    // echo "<br/>";
    // echo $vessel_type;
    // echo "<br/>";
    // echo $company_name;
    // echo "<br/>";
    //echo $vessel_activity;
    // echo "<br/>";
    // echo $va_detail;
    // echo "<br/>";
    // echo $cargo_mt;
    // echo "<br/>";
    // echo $cargo_type;
    // echo "<br/>";
    // echo $mfp;
    // echo "<br/>";
    // echo $arrival;
    // echo "<br/>";
    // echo $departure;
    // echo "<br/>";
    //die();

    if ($vessel_type == 1) {
      $nama_vessel_type = 'VLCC';
    }else if($vessel_type == 2){
      $nama_vessel_type = 'Suez';
    }else if($vessel_type == 3){
      $nama_vessel_type = 'LR 2';
    }else if($vessel_type == 4){
      $nama_vessel_type = 'LR 1';
    }else if($vessel_type == 5){
      $nama_vessel_type = 'MR';
    }else if($vessel_type == 6){
      $nama_vessel_type = 'Handy';
    }

    if ($cargo_type == 1) {
      $nama_cargo_type = 'Oil/Chemical/Liquid';
    }else if($cargo_type == 2){
      $nama_cargo_type = 'Gas/Condesate/LPG';
    }else if($cargo_type == 3){
      $nama_cargo_type = 'Cargo Bulk';
    }

    $Data = $this->db->query("SELECT * FROM ref_vessel_activity WHERE id_vessel_activity = '$vessel_activity' ")->row();
    $DataDetail = $this->db->query("SELECT * FROM ref_vessel_detail WHERE id = '$va_detail' ")->row();

    $view_arrival = date('d-M-Y', strtotime($arrival_date));
    $view_departure = date('d-M-Y', strtotime($departure_date));

    $strr = $no_wa;
    // First typecast to int and 
    // then to string
    $strr = (string)((int)($strr));

    $nodisatukan = $kode_telepon.$strr;

    // $qry_tarif_cargo_transfer = $this->db->query("SELECT * from ref_tarif_cargo_transfer_shipment_charges order by id_tarif_cargo_transfer_shipment_charges DESC limit 1 ")->row();
    // //  $result_cargo_transfer1 = ($qry_tarif_cargo_transfer->rate * $mfp);
    // $result_cargo_transfer1 = ($qry_tarif_cargo_transfer->rate * $mfp);

    // $qry_tarif__osr_bunker_activity = $this->db->query("SELECT * from ref_tarif_osr_bunker_activity where nilai_akhir >= '$gross_register'  order by id_tarif_osr_bunker_activity ASC limit 1 ")->row();
    // $result_osr = ($qry_tarif__osr_bunker_activity->tarif);

    // $total =  ($result_pilotage + $result_isps + $result_wo + $result_cargo_transfer1 + $result_osr + $result_labuh + $result_rambu + $result_vts + $result_pup + $result_cargo_transfer);

    if ($vessel_activity == "1" && $va_detail =="1") {

      $set = '123456789WijayakaryabetontbkabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code = substr(str_shuffle($set), 0, 12);

      //set up email
      $config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'tls://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'smartsystem@asinusa.com', // change it to yours
    'smtp_pass' => 'orhqaifyjoknznjt', // change it to yours
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'validate' => FALSE,
    'wordwrap' => TRUE
 

      );

      $message =  "<html>
                    <head>
                      <title>Asinusa Marketing [Estimate Asinusa Port Cost Calculator]</title>
                    </head>
                    <body>

                      <div align='center'>
                          <table border='0' cellpadding='0' width='100%' style='width:100.0%;background:#dcdcdc;word-spacing:0px'>
                            <tbody>
                              <tr>
                                <td style='padding:30.0pt .75pt 30.0pt .75pt'>
                                  <div>
                                    <div align='center'>
                                      <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:white;border-collapse:collapse;border-spacing:0px'>
                                        <tbody>
                                          <tr>
                                            <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                              <h1 style='margin:0cm'><span style='font-size:18.0pt;font-family:Arial,sans-serif;color:white;font-weight:normal'>Asinusa Port Cost Calculator</span></h1>
                                            </td>
                                          </tr>
                                        <tr>
                                          <td style='background:#eef2f3;padding:0cm 0cm 15.0pt 0cm'>
                                            <div align='center'>
                                              <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:#eef2f3;border-collapse:collapse;border-spacing:0px'>
                                                <tbody>
                                                  <tr>
                                                    <td style='padding:15.75pt 18.75pt 7.5pt 18.75pt'>
                                                      <table border='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr>
                                                            <td style='border:none; padding:0cm 7.5pt 15.0pt 0cm'>
                                                              <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Dear Sir/Madam, ".$nama."<u></u><u></u></span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>
                                                              <p class='MsoNormal'>
                                                                <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>
                                                                  Thank you for your inquiry on our Port Cost. The calculation below is indicative tariffs based on your provided data and information.
                                                                  <br>
                                                                  The provided Total Port Cost consists of our Port Cost and the applicable Non-Revenue Government Tax.
                                                                </span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='padding:7.5pt 0cm 0cm 0cm'>
                                                              <div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                  <tbody>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:0pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Information</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Name</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Email</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$email."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>WhatsApp Number</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nodisatukan."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:5.75pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Vessel</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$vessel_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Gross Register Ton (GRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$gross_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Net Register Tonnage (NRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$net_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Dead Weight Tonnage (DWT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$dead_weight."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Length Overall (LOA)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$lenght_over."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama_vessel_type."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Company Name (Shipping Company/Ship Charterer/Cargo Owner/Agent)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$company_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$Data->activity." - ".$DataDetail->nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Cargo MT</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$cargo_mt."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Cargo Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama_cargo_type."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Arrival Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_arrival." ".$arrival_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Departure Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_departure." ".$departure_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity Days</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$jarak."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top; font-weight:bold;'>Indicative Exchange Rate US$ 1</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top; font-weight:bold;'> Rp 14.600</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:14.75pt 7.5pt 0pt 0cm; text-align: center;'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Total Port Cost : USD ".$total_sts_mother."</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;padding:15.75pt 7.5pt 0pt 0cm'>
                                                                        <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>For further details and business inquiries, please do not hesitate to contact us by e-mail at marketing@asinusa.com</span></p>
                                                                      </td>
                                                                    </tr>
                                                                  </tbody>
                                                                </table>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style='background:#346f9b;padding:0cm 0cm 0cm 0cm'>
                                            <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;border-collapse:collapse'>
                                              <tbody>
                                                <tr>
                                                  <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                                    <p class='MsoNormal' align='center' style='text-align:center'><span style='font-size:9.0pt;font-family:Arial,sans-serif;color:white'>*) This email was generated by Asinusa System</span></p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                    </body>
                    </html>
                    ";

      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($config['smtp_user']);
      $this->email->to($email);
      $this->email->cc('marketing@asinusa.com');
      $this->email->subject('Asinusa Marketing [Estimate Asinusa Port Cost Calculator]');  
      $this->email->message($message);

      //sending email
      if($this->email->send()){
        $this->session->set_flashdata('message','Notifikasi persetujuan email berhasil di kirimkan');
      }
      else{
        $this->session->set_flashdata('message', $this->email->print_debugger());

      }

      $data = array('contents' => 'Layouts/activity/1',
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
            'jarak' => $jarak,
            'result_pilotage' => $result_pilotage,
            'result_isps' => $result_isps,
            'result_sts' => $result_sts,
            'result_labuh' => $result_labuh,
            'result_rambu' => $result_rambu,
            'result_vts' => $result_vts,
            'total_sts_mother' => $total_sts_mother,

          );

      $data1 = array(
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
            'jarak' => $jarak,
            'result_pilotage' => $result_pilotage,
            'result_isps' => $result_isps,
            'result_sts' => $result_sts,
            'result_labuh' => $result_labuh,
            'result_rambu' => $result_rambu,
            'result_vts' => $result_vts,
            'total_sts_mother' => $total_sts_mother,
            'created_at' => $created_at,
            'kode_telepon' => $kode_telepon
          );


      $this->model_global->input_data($data1,'ref_registrasi');

      $this->db->query("
                        INSERT INTO outbox (wa_mode, wa_no, wa_text, wa_media, wa_file)
                        VALUES(0, '".$nodisatukan."', 'Asinusa Smart system

                                Total the port cost based on your provided data is ".$total_sts_mother."

                                Total port cost consist of Port Charges and Port Dues (Non Tax Revenue Government)

                                The detail of Port Cost please contact us at: marketing@asinusa.com', '', '' )");

      // echo "<pre>"; print_r($this->db->last_query()); die();
      //$this->load->view('Layouts/activity/1', $data);
      $this->session->set_flashdata('success', 'To see the result of port cost calculator, please check your email : '.$email);
      $this->load->view('Layouts/activity/info');

    }elseif($vessel_activity == "1" && $va_detail =="2"){

      $set = '123456789WijayakaryabetontbkabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code = substr(str_shuffle($set), 0, 12);

      //set up email
      $config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'tls://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'smartsystem@asinusa.com', // change it to yours
    'smtp_pass' => 'orhqaifyjoknznjt', // change it to yours
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'validate' => FALSE,
    'wordwrap' => TRUE
      );

      $message =  "<html>
                    <head>
                      <title>Asinusa Marketing [Estimate Asinusa Port Cost Calculator]</title>
                    </head>
                    <body>

                      <div align='center'>
                          <table border='0' cellpadding='0' width='100%' style='width:100.0%;background:#dcdcdc;word-spacing:0px'>
                            <tbody>
                              <tr>
                                <td style='padding:30.0pt .75pt 30.0pt .75pt'>
                                  <div>
                                    <div align='center'>
                                      <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:white;border-collapse:collapse;border-spacing:0px'>
                                        <tbody>
                                          <tr>
                                            <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                              <h1 style='margin:0cm'><span style='font-size:18.0pt;font-family:Arial,sans-serif;color:white;font-weight:normal'>Asinusa Port Cost Calculator</span></h1>
                                            </td>
                                          </tr>
                                        <tr>
                                          <td style='background:#eef2f3;padding:0cm 0cm 15.0pt 0cm'>
                                            <div align='center'>
                                              <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:#eef2f3;border-collapse:collapse;border-spacing:0px'>
                                                <tbody>
                                                  <tr>
                                                    <td style='padding:15.75pt 18.75pt 7.5pt 18.75pt'>
                                                      <table border='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr>
                                                            <td style='border:none; padding:0cm 7.5pt 15.0pt 0cm'>
                                                              <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Dear Sir/Madam, ".$nama."<u></u><u></u></span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>
                                                              <p class='MsoNormal'>
                                                                <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>
                                                                  Thank you for your inquiry on our Port Cost. The calculation below is indicative tariffs based on your provided data and information.
                                                                  <br>
                                                                  The provided Total Port Cost consists of our Port Cost and the applicable Non-Revenue Government Tax.
                                                                </span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='padding:7.5pt 0cm 0cm 0cm'>
                                                              <div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                  <tbody>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:0pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Information</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Name</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Email</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$email."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>WhatsApp Number</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nodisatukan."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:5.75pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Vessel</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$vessel_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Gross Register Ton (GRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$gross_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Net Register Tonnage (NRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$net_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Dead Weight Tonnage (DWT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$dead_weight."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Length Overall (LOA)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$lenght_over."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama_vessel_type."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Company Name (Shipping Company/Ship Charterer/Cargo Owner/Agent)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$company_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$Data->activity." - ".$DataDetail->nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Cargo MT</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$cargo_mt."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Cargo Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama_cargo_type."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>MFP/Oil Bunker MT</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$mfp."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Arrival Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_arrival." ".$arrival_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Departure Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_departure." ".$departure_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity Days</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$jarak."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top; font-weight:bold;'>Indicative Exchange Rate US$ 1</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top; font-weight:bold;'> Rp 14.600</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:14.75pt 7.5pt 0pt 0cm; text-align: center;'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Total Port Cost : USD ".$total_sts_feeder_FSO."</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;padding:15.75pt 7.5pt 0pt 0cm'>
                                                                        <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>For further details and business inquiries, please do not hesitate to contact us by e-mail at marketing@asinusa.com</span></p>
                                                                      </td>
                                                                    </tr>
                                                                  </tbody>
                                                                </table>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style='background:#346f9b;padding:0cm 0cm 0cm 0cm'>
                                            <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;border-collapse:collapse'>
                                              <tbody>
                                                <tr>
                                                  <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                                    <p class='MsoNormal' align='center' style='text-align:center'><span style='font-size:9.0pt;font-family:Arial,sans-serif;color:white'>*) This email was generated by Asinusa System</span></p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                    </body>
                    </html>
                    ";

                    

      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($config['smtp_user']);
      $this->email->to($email);
      $this->email->cc('marketing@asinusa.com');
      $this->email->subject('Asinusa Marketing [Estimate Asinusa Port Cost Calculator]');  
      $this->email->message($message);

      //sending email
      if($this->email->send()){
        $this->session->set_flashdata('message','Notifikasi persetujuan email berhasil di kirimkan');
      }
      else{
        $this->session->set_flashdata('message', $this->email->print_debugger());

      }

      $data = array('contents' => 'Layouts/activity/2',
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
            'jarak' => $jarak,
            'result_pilotage' => $result_pilotage,
            'result_isps' => $result_isps,
            'result_sts' => $result_sts,
            'result_sts_alm' => $result_sts_alm,
            'result_cargo_transfer' => $result_cargo_transfer,
            'result_osr' => $result_osr,
            'result_labuh' => $result_labuh,
            'result_rambu' => $result_rambu,
            'result_vts' => $result_vts,
            'result_pup' => $result_pup,
            'result_cargo_transfer_pnbp' => $result_cargo_transfer_pnbp,
            'total_sts_feeder_FSO' => $total_sts_feeder_FSO,

          );
      $data1 = array(
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
            'jarak' => $jarak,
            'result_pilotage' => $result_pilotage,
            'result_isps' => $result_isps,
            'result_sts' => $result_sts,
            'result_sts_alm' => $result_sts_alm,
            'result_cargo_transfer' => $result_cargo_transfer,
            'result_osr' => $result_osr,
            'result_labuh' => $result_labuh,
            'result_rambu' => $result_rambu,
            'result_vts' => $result_vts,
            'result_pup' => $result_pup,
            'result_cargo_transfer_pnbp' => $result_cargo_transfer_pnbp,
            'total_sts_feeder_FSO' => $total_sts_feeder_FSO,
            'created_at' => $created_at,
            'kode_telepon' => $kode_telepon
          );
      $this->model_global->input_data($data1,'ref_registrasi');

      $this->db->query("
                        INSERT INTO outbox (wa_mode, wa_no, wa_text, wa_media, wa_file)
                        VALUES(0, '".$nodisatukan."', 'Asinusa Smart system

                                Total the port cost based on your provided data is ".$total_sts_mother."

                                Total port cost consist of Port Charges and Port Dues (Non Tax Revenue Government)

                                The detail of Port Cost please contact us at: marketing@asinusa.com', '', '' )");
      // echo "<pre>"; print_r($this->db->last_query()); die();
      // $this->load->view('Layouts/activity/2', $data);
      $this->session->set_flashdata('success', 'To see the result of port cost calculator, please check your email : '.$email);
      $this->load->view('Layouts/activity/info');

    }elseif($vessel_activity == "2" && $va_detail =="3"){

      $set = '123456789WijayakaryabetontbkabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code = substr(str_shuffle($set), 0, 12);

      //set up email
      $config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'tls://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'smartsystem@asinusa.com', // change it to yours
    'smtp_pass' => 'orhqaifyjoknznjt', // change it to yours
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'validate' => FALSE,
    'wordwrap' => TRUE
      );

      $message =  "<html>
                    <head>
                      <title>Asinusa Marketing [Estimate Asinusa Port Cost Calculator]</title>
                    </head>
                    <body>

                      <div align='center'>
                          <table border='0' cellpadding='0' width='100%' style='width:100.0%;background:#dcdcdc;word-spacing:0px'>
                            <tbody>
                              <tr>
                                <td style='padding:30.0pt .75pt 30.0pt .75pt'>
                                  <div>
                                    <div align='center'>
                                      <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:white;border-collapse:collapse;border-spacing:0px'>
                                        <tbody>
                                          <tr>
                                            <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                              <h1 style='margin:0cm'><span style='font-size:18.0pt;font-family:Arial,sans-serif;color:white;font-weight:normal'>Asinusa Port Cost Calculator</span></h1>
                                            </td>
                                          </tr>
                                        <tr>
                                          <td style='background:#eef2f3;padding:0cm 0cm 15.0pt 0cm'>
                                            <div align='center'>
                                              <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:#eef2f3;border-collapse:collapse;border-spacing:0px'>
                                                <tbody>
                                                  <tr>
                                                    <td style='padding:15.75pt 18.75pt 7.5pt 18.75pt'>
                                                      <table border='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr>
                                                            <td style='border:none; padding:0cm 7.5pt 15.0pt 0cm'>
                                                              <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Dear Sir/Madam, ".$nama."<u></u><u></u></span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>
                                                              <p class='MsoNormal'>
                                                                <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>
                                                                  Thank you for your inquiry on our Port Cost. The calculation below is indicative tariffs based on your provided data and information.
                                                                  <br>
                                                                  The provided Total Port Cost consists of our Port Cost and the applicable Non-Revenue Government Tax.
                                                                </span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='padding:7.5pt 0cm 0cm 0cm'>
                                                              <div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                  <tbody>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:0pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Information</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Name</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Email</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$email."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>WhatsApp Number</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nodisatukan."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:5.75pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Vessel</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$vessel_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Gross Register Ton (GRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$gross_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Net Register Tonnage (NRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$net_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Dead Weight Tonnage (DWT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$dead_weight."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Length Overall (LOA)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$lenght_over."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama_vessel_type."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Company Name (Shipping Company/Ship Charterer/Cargo Owner/Agent)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$company_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$Data->activity." - ".$DataDetail->nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Cargo MT</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$cargo_mt."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Cargo Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama_cargo_type."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>MFP/Oil Bunker MT</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$mfp."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Arrival Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_arrival." ".$arrival_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Departure Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_departure." ".$departure_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity Days</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$jarak."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top; font-weight:bold;'>Indicative Exchange Rate US$ 1</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top; font-weight:bold;'> Rp 14.600</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:14.75pt 7.5pt 0pt 0cm; text-align: center;'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Total Port Cost : USD ".$total_sts_feeder_FSO."</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;padding:15.75pt 7.5pt 0pt 0cm'>
                                                                        <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>For further details and business inquiries, please do not hesitate to contact us by e-mail at marketing@asinusa.com</span></p>
                                                                      </td>
                                                                    </tr>
                                                                  </tbody>
                                                                </table>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style='background:#346f9b;padding:0cm 0cm 0cm 0cm'>
                                            <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;border-collapse:collapse'>
                                              <tbody>
                                                <tr>
                                                  <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                                    <p class='MsoNormal' align='center' style='text-align:center'><span style='font-size:9.0pt;font-family:Arial,sans-serif;color:white'>*) This email was generated by Asinusa System</span></p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                    </body>
                    </html>
                    ";

                    

      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($config['smtp_user']);
      $this->email->to($email);
      $this->email->cc('marketing@asinusa.com');
      $this->email->subject('Asinusa Marketing [Estimate Asinusa Port Cost Calculator]');  
      $this->email->message($message);

      //sending email
      if($this->email->send()){
        $this->session->set_flashdata('message','Notifikasi persetujuan email berhasil di kirimkan');
      }
      else{
        $this->session->set_flashdata('message', $this->email->print_debugger());

      }

      $data = array('contents' => 'Layouts/activity/sts_fso_disc',
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
            'jarak' => $jarak,
            'result_pilotage' => $result_pilotage,
            'result_isps' => $result_isps,
            'result_sts' => $result_sts,
            'result_sts_alm' => $result_sts_alm,
            'result_cargo_transfer' => $result_cargo_transfer,
            'result_osr' => $result_osr,
            'result_labuh' => $result_labuh,
            'result_rambu' => $result_rambu,
            'result_vts' => $result_vts,
            'result_pup' => $result_pup,
            'result_cargo_transfer_pnbp' => $result_cargo_transfer_pnbp,
            'total_sts_feeder_FSO' => $total_sts_feeder_FSO,
          );
      $data1 = array(
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
            'jarak' => $jarak,
            'result_pilotage' => $result_pilotage,
            'result_isps' => $result_isps,
            'result_sts' => $result_sts,
            'result_sts_alm' => $result_sts_alm,
            'result_cargo_transfer' => $result_cargo_transfer,
            'result_osr' => $result_osr,
            'result_labuh' => $result_labuh,
            'result_rambu' => $result_rambu,
            'result_vts' => $result_vts,
            'result_pup' => $result_pup,
            'result_cargo_transfer_pnbp' => $result_cargo_transfer_pnbp,
            'total_sts_feeder_FSO' => $total_sts_feeder_FSO,
            'created_at' => $created_at,
            'kode_telepon' => $kode_telepon
          );
      $this->model_global->input_data($data1,'ref_registrasi');

      $this->db->query("
                        INSERT INTO outbox (wa_mode, wa_no, wa_text, wa_media, wa_file)
                        VALUES(0, '".$nodisatukan."', 'Asinusa Smart system

                                Total the port cost based on your provided data is ".$total_sts_mother."

                                Total port cost consist of Port Charges and Port Dues (Non Tax Revenue Government)

                                The detail of Port Cost please contact us at: marketing@asinusa.com', '', '' )");
      // echo "<pre>"; print_r($this->db->last_query()); die();
      // $this->load->view('Layouts/activity/sts_fso_disc', $data);
      $this->session->set_flashdata('success', 'To see the result of port cost calculator, please check your email : '.$email);
      $this->load->view('Layouts/activity/info');

    }elseif($vessel_activity == "2" && $va_detail =="4"){

      $set = '123456789WijayakaryabetontbkabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code = substr(str_shuffle($set), 0, 12);

      //set up email
      $config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'tls://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'smartsystem@asinusa.com', // change it to yours
    'smtp_pass' => 'orhqaifyjoknznjt', // change it to yours
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'validate' => FALSE,
    'wordwrap' => TRUE
      );

      $message =  "<html>
                    <head>
                      <title>Asinusa Marketing [Estimate Asinusa Port Cost Calculator]</title>
                    </head>
                    <body>

                      <div align='center'>
                          <table border='0' cellpadding='0' width='100%' style='width:100.0%;background:#dcdcdc;word-spacing:0px'>
                            <tbody>
                              <tr>
                                <td style='padding:30.0pt .75pt 30.0pt .75pt'>
                                  <div>
                                    <div align='center'>
                                      <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:white;border-collapse:collapse;border-spacing:0px'>
                                        <tbody>
                                          <tr>
                                            <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                              <h1 style='margin:0cm'><span style='font-size:18.0pt;font-family:Arial,sans-serif;color:white;font-weight:normal'>Asinusa Port Cost Calculator</span></h1>
                                            </td>
                                          </tr>
                                        <tr>
                                          <td style='background:#eef2f3;padding:0cm 0cm 15.0pt 0cm'>
                                            <div align='center'>
                                              <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:#eef2f3;border-collapse:collapse;border-spacing:0px'>
                                                <tbody>
                                                  <tr>
                                                    <td style='padding:15.75pt 18.75pt 7.5pt 18.75pt'>
                                                      <table border='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr>
                                                            <td style='border:none; padding:0cm 7.5pt 15.0pt 0cm'>
                                                              <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Dear Sir/Madam, ".$nama."<u></u><u></u></span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>
                                                              <p class='MsoNormal'>
                                                                <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>
                                                                  Thank you for your inquiry on our Port Cost. The calculation below is indicative tariffs based on your provided data and information.
                                                                  <br>
                                                                  The provided Total Port Cost consists of our Port Cost and the applicable Non-Revenue Government Tax.
                                                                </span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='padding:7.5pt 0cm 0cm 0cm'>
                                                              <div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                  <tbody>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:0pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Information</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Name</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Email</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$email."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>WhatsApp Number</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nodisatukan."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:5.75pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Vessel</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$vessel_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Gross Register Ton (GRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$gross_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Net Register Tonnage (NRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$net_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Dead Weight Tonnage (DWT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$dead_weight."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Length Overall (LOA)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$lenght_over."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama_vessel_type."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Company Name (Shipping Company/Ship Charterer/Cargo Owner/Agent)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$company_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$Data->activity." - ".$DataDetail->nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Cargo MT</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$cargo_mt."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Cargo Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama_cargo_type."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>MFP/Oil Bunker MT</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$mfp."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Arrival Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_arrival." ".$arrival_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Departure Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_departure." ".$departure_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity Days</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$jarak."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top; font-weight:bold;'>Indicative Exchange Rate US$ 1</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top; font-weight:bold;'> Rp 14.600</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:14.75pt 7.5pt 0pt 0cm; text-align: center;'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Total Port Cost : USD ".$total_sts_feeder_FSO."</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;padding:15.75pt 7.5pt 0pt 0cm'>
                                                                        <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>For further details and business inquiries, please do not hesitate to contact us by e-mail at marketing@asinusa.com</span></p>
                                                                      </td>
                                                                    </tr>
                                                                  </tbody>
                                                                </table>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style='background:#346f9b;padding:0cm 0cm 0cm 0cm'>
                                            <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;border-collapse:collapse'>
                                              <tbody>
                                                <tr>
                                                  <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                                    <p class='MsoNormal' align='center' style='text-align:center'><span style='font-size:9.0pt;font-family:Arial,sans-serif;color:white'>*) This email was generated by Asinusa System</span></p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                    </body>
                    </html>
                    ";
                    
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($config['smtp_user']);
      $this->email->to($email);
      $this->email->cc('marketing@asinusa.com');
      $this->email->subject('Asinusa Marketing [Estimate Asinusa Port Cost Calculator]');  
      $this->email->message($message);

      //sending email
      if($this->email->send()){
        $this->session->set_flashdata('message','Notifikasi persetujuan email berhasil di kirimkan');
      }
      else{
        $this->session->set_flashdata('message', $this->email->print_debugger());

      }

      $data = array('contents' => 'Layouts/activity/sts_fso_load',
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
            'jarak' => $jarak,
            'result_pilotage' => $result_pilotage,
            'result_isps' => $result_isps,
            'result_sts' => $result_sts,
            'result_sts_alm' => $result_sts_alm,
            'result_cargo_transfer' => $result_cargo_transfer,
            'result_osr' => $result_osr,
            'result_labuh' => $result_labuh,
            'result_rambu' => $result_rambu,
            'result_vts' => $result_vts,
            'result_pup' => $result_pup,
            'result_cargo_transfer_pnbp' => $result_cargo_transfer_pnbp,
            'total_sts_feeder_FSO' => $total_sts_feeder_FSO,
          );
      $data1 = array(
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
            'jarak' => $jarak,
            'result_pilotage' => $result_pilotage,
            'result_isps' => $result_isps,
            'result_sts' => $result_sts,
            'result_sts_alm' => $result_sts_alm,
            'result_cargo_transfer' => $result_cargo_transfer,
            'result_osr' => $result_osr,
            'result_labuh' => $result_labuh,
            'result_rambu' => $result_rambu,
            'result_vts' => $result_vts,
            'result_pup' => $result_pup,
            'result_cargo_transfer_pnbp' => $result_cargo_transfer_pnbp,
            'total_sts_feeder_FSO' => $total_sts_feeder_FSO,
            'created_at' => $created_at,
            'kode_telepon' => $kode_telepon
          );
      $this->model_global->input_data($data1,'ref_registrasi');
      // echo "<pre>"; print_r($this->db->last_query()); die();
      // $this->load->view('Layouts/activity/sts_fso_load', $data);
      $this->db->query("
                        INSERT INTO outbox (wa_mode, wa_no, wa_text, wa_media, wa_file)
                        VALUES(0, '".$nodisatukan."', 'Asinusa Smart system

                                Total the port cost based on your provided data is ".$total_sts_mother."

                                Total port cost consist of Port Charges and Port Dues (Non Tax Revenue Government)

                                The detail of Port Cost please contact us at: marketing@asinusa.com', '', '' )");

      $this->session->set_flashdata('success', 'To see the result of port cost calculator, please check your email : '.$email);
      $this->load->view('Layouts/activity/info');

    }elseif($vessel_activity == "3"){

      $set = '123456789WijayakaryabetontbkabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code = substr(str_shuffle($set), 0, 12);

      //set up email
      $config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'tls://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'smartsystem@asinusa.com', // change it to yours
    'smtp_pass' => 'orhqaifyjoknznjt', // change it to yours
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'validate' => FALSE,
    'wordwrap' => TRUE
      );

      $message =  "<html>
                    <head>
                      <title>Asinusa Marketing [Estimate Asinusa Port Cost Calculator]</title>
                    </head>
                    <body>

                      <div align='center'>
                          <table border='0' cellpadding='0' width='100%' style='width:100.0%;background:#dcdcdc;word-spacing:0px'>
                            <tbody>
                              <tr>
                                <td style='padding:30.0pt .75pt 30.0pt .75pt'>
                                  <div>
                                    <div align='center'>
                                      <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:white;border-collapse:collapse;border-spacing:0px'>
                                        <tbody>
                                          <tr>
                                            <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                              <h1 style='margin:0cm'><span style='font-size:18.0pt;font-family:Arial,sans-serif;color:white;font-weight:normal'>Asinusa Port Cost Calculator</span></h1>
                                            </td>
                                          </tr>
                                        <tr>
                                          <td style='background:#eef2f3;padding:0cm 0cm 15.0pt 0cm'>
                                            <div align='center'>
                                              <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:#eef2f3;border-collapse:collapse;border-spacing:0px'>
                                                <tbody>
                                                  <tr>
                                                    <td style='padding:15.75pt 18.75pt 7.5pt 18.75pt'>
                                                      <table border='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr>
                                                            <td style='border:none; padding:0cm 7.5pt 15.0pt 0cm'>
                                                              <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Dear Sir/Madam, ".$nama."<u></u><u></u></span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>
                                                              <p class='MsoNormal'>
                                                                <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>
                                                                  Thank you for your inquiry on our Port Cost. The calculation below is indicative tariffs based on your provided data and information.
                                                                  <br>
                                                                  The provided Total Port Cost consists of our Port Cost and the applicable Non-Revenue Government Tax.
                                                                </span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='padding:7.5pt 0cm 0cm 0cm'>
                                                              <div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                  <tbody>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:0pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Information</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Name</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Email</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$email."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>WhatsApp Number</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nodisatukan."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:5.75pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Vessel</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$vessel_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Gross Register Ton (GRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$gross_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Net Register Tonnage (NRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$net_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Dead Weight Tonnage (DWT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$dead_weight."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Length Overall (LOA)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$lenght_over."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama_vessel_type."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Company Name (Shipping Company/Ship Charterer/Cargo Owner/Agent)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$company_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$Data->activity." - ".$DataDetail->nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Arrival Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_arrival." ".$arrival_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Departure Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_departure." ".$departure_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity Days</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$jarak."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top; font-weight:bold;'>Indicative Exchange Rate US$ 1</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top; font-weight:bold;'> Rp 14.600</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:14.75pt 7.5pt 0pt 0cm; text-align: center;'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Total Port Cost : USD ".$total_wo."</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;padding:15.75pt 7.5pt 0pt 0cm'>
                                                                        <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>For further details and business inquiries, please do not hesitate to contact us by e-mail at marketing@asinusa.com</span></p>
                                                                      </td>
                                                                    </tr>
                                                                  </tbody>
                                                                </table>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style='background:#346f9b;padding:0cm 0cm 0cm 0cm'>
                                            <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;border-collapse:collapse'>
                                              <tbody>
                                                <tr>
                                                  <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                                    <p class='MsoNormal' align='center' style='text-align:center'><span style='font-size:9.0pt;font-family:Arial,sans-serif;color:white'>*) This email was generated by Asinusa System</span></p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                    </body>
                    </html>
                    ";
      
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($config['smtp_user']);
      $this->email->to($email);
      $this->email->cc('marketing@asinusa.com');
      $this->email->subject('Asinusa Marketing [Estimate Asinusa Port Cost Calculator]');  
      $this->email->message($message);

      //sending email
      if($this->email->send()){
        $this->session->set_flashdata('message','Notifikasi persetujuan email berhasil di kirimkan');
      }
      else{
        $this->session->set_flashdata('message', $this->email->print_debugger());

      }

      $data = array('contents' => 'Layouts/activity/3',
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
            'jarak' => $jarak,
            'result_pilotage' => $result_pilotage,
            'result_isps_wo' => $result_isps_wo,
            'result_wo' => $result_wo,
            'result_labuh' => $result_labuh,
            'result_rambu' => $result_rambu,
            'result_vts' => $result_vts,
            'total_wo' => $total_wo,
          );
      $data1 = array(
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
            'jarak' => $jarak,
            'result_pilotage' => $result_pilotage,
            'result_isps_wo' => $result_isps_wo,
            'result_wo' => $result_wo,
            'result_labuh' => $result_labuh,
            'result_rambu' => $result_rambu,
            'result_vts' => $result_vts,
            'total_wo' => $total_wo,
            'created_at' => $created_at,
            'kode_telepon' => $kode_telepon
          );
      $this->model_global->input_data($data1,'ref_registrasi');
      // echo "<pre>"; print_r($this->db->last_query()); die();
      //$this->load->view('Layouts/activity/3', $data);
      $this->db->query("
                        INSERT INTO outbox (wa_mode, wa_no, wa_text, wa_media, wa_file)
                        VALUES(0, '".$nodisatukan."', 'Asinusa Smart system

                                Total the port cost based on your provided data is ".$total_sts_mother."

                                Total port cost consist of Port Charges and Port Dues (Non Tax Revenue Government)

                                The detail of Port Cost please contact us at: marketing@asinusa.com', '', '' )");
      $this->session->set_flashdata('success', 'To see the result of port cost calculator, please check your email : '.$email);
      $this->load->view('Layouts/activity/info');

    }elseif($vessel_activity == "4"  && $va_detail =="6"){

      $set = '123456789WijayakaryabetontbkabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code = substr(str_shuffle($set), 0, 12);

      //set up email
      $config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'tls://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'smartsystem@asinusa.com', // change it to yours
    'smtp_pass' => 'orhqaifyjoknznjt', // change it to yours
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'validate' => FALSE,
    'wordwrap' => TRUE
      );

      $message =  "<html>
                    <head>
                      <title>Asinusa Marketing [Estimate Asinusa Port Cost Calculator]</title>
                    </head>
                    <body>

                      <div align='center'>
                          <table border='0' cellpadding='0' width='100%' style='width:100.0%;background:#dcdcdc;word-spacing:0px'>
                            <tbody>
                              <tr>
                                <td style='padding:30.0pt .75pt 30.0pt .75pt'>
                                  <div>
                                    <div align='center'>
                                      <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:white;border-collapse:collapse;border-spacing:0px'>
                                        <tbody>
                                          <tr>
                                            <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                              <h1 style='margin:0cm'><span style='font-size:18.0pt;font-family:Arial,sans-serif;color:white;font-weight:normal'>Asinusa Port Cost Calculator</span></h1>
                                            </td>
                                          </tr>
                                        <tr>
                                          <td style='background:#eef2f3;padding:0cm 0cm 15.0pt 0cm'>
                                            <div align='center'>
                                              <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:#eef2f3;border-collapse:collapse;border-spacing:0px'>
                                                <tbody>
                                                  <tr>
                                                    <td style='padding:15.75pt 18.75pt 7.5pt 18.75pt'>
                                                      <table border='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr>
                                                            <td style='border:none; padding:0cm 7.5pt 15.0pt 0cm'>
                                                              <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Dear Sir/Madam, ".$nama."<u></u><u></u></span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>
                                                              <p class='MsoNormal'>
                                                                <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>
                                                                  Thank you for your inquiry on our Port Cost. The calculation below is indicative tariffs based on your provided data and information.
                                                                  <br>
                                                                  The provided Total Port Cost consists of our Port Cost and the applicable Non-Revenue Government Tax.
                                                                </span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='padding:7.5pt 0cm 0cm 0cm'>
                                                              <div>Vessel Type
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                  <tbody>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:0pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Information</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Name</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Email</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$email."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>WhatsApp Number</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nodisatukan."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:5.75pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Vessel</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$vessel_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Gross Register Ton (GRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$gross_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Net Register Tonnage (NRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$net_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Dead Weight Tonnage (DWT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$dead_weight."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Length Overall (LOA)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$lenght_over."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama_vessel_type."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Company Name (Shipping Company/Ship Charterer/Cargo Owner/Agent)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$company_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$Data->activity." - ".$DataDetail->nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Cargo MT</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$cargo_mt."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Cargo Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama_cargo_type."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>MFP/Oil Bunker MT</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$mfp."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Arrival Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_arrival." ".$arrival_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Departure Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_departure." ".$departure_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity Days</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$jarak."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top; font-weight:bold;'>Indicative Exchange Rate US$ 1</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top; font-weight:bold;'> Rp 14.600</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:14.75pt 7.5pt 0pt 0cm; text-align: center;'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Total Port Cost : USD ".$total."</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;padding:15.75pt 7.5pt 0pt 0cm'>
                                                                        <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>For further details and business inquiries, please do not hesitate to contact us by e-mail at marketing@asinusa.com</span></p>
                                                                      </td>
                                                                    </tr>
                                                                  </tbody>
                                                                </table>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style='background:#346f9b;padding:0cm 0cm 0cm 0cm'>
                                            <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;border-collapse:collapse'>
                                              <tbody>
                                                <tr>
                                                  <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                                    <p class='MsoNormal' align='center' style='text-align:center'><span style='font-size:9.0pt;font-family:Arial,sans-serif;color:white'>*) This email was generated by Asinusa System</span></p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                    </body>
                    </html>
                    ";
                    
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($config['smtp_user']);
      $this->email->to($email);
      $this->email->cc('marketing@asinusa.com');
      $this->email->subject('Asinusa Marketing [Estimate Asinusa Port Cost Calculator]');  
      $this->email->message($message);

      //sending email
      if($this->email->send()){
        $this->session->set_flashdata('message','Notifikasi persetujuan email berhasil di kirimkan');
      }
      else{
        $this->session->set_flashdata('message', $this->email->print_debugger());

      }

      $data = array('contents' => 'Layouts/activity/bunker_oil',
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
          );
      $data1 = array(
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
            'created_at' => $created_at,
            'kode_telepon' => $kode_telepon
          );
      $this->model_global->input_data($data1,'ref_registrasi');
      // echo "<pre>"; print_r($this->db->last_query()); die();
      // $this->load->view('Layouts/activity/bunker_oil', $data);
      $this->db->query("
                        INSERT INTO outbox (wa_mode, wa_no, wa_text, wa_media, wa_file)
                        VALUES(0, '".$nodisatukan."', 'Asinusa Smart system

                                Total the port cost based on your provided data is ".$total_sts_mother."

                                Total port cost consist of Port Charges and Port Dues (Non Tax Revenue Government)

                                The detail of Port Cost please contact us at: marketing@asinusa.com', '', '' )");
      $this->session->set_flashdata('success', 'To see the result of port cost calculator, please check your email : '.$email);
      $this->load->view('Layouts/activity/info');

    }elseif($vessel_activity == "5"){

      $set = '123456789WijayakaryabetontbkabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code = substr(str_shuffle($set), 0, 12);

      //set up email
      $config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'tls://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'smartsystem@asinusa.com', // change it to yours
    'smtp_pass' => 'orhqaifyjoknznjt', // change it to yours
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'validate' => FALSE,
    'wordwrap' => TRUE
      );

      $message =  "<html>
                    <head>
                      <title>Asinusa Marketing [Estimate Asinusa Port Cost Calculator]</title>
                    </head>
                    <body>

                      <div align='center'>
                          <table border='0' cellpadding='0' width='100%' style='width:100.0%;background:#dcdcdc;word-spacing:0px'>
                            <tbody>
                              <tr>
                                <td style='padding:30.0pt .75pt 30.0pt .75pt'>
                                  <div>
                                    <div align='center'>
                                      <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:white;border-collapse:collapse;border-spacing:0px'>
                                        <tbody>
                                          <tr>
                                            <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                              <h1 style='margin:0cm'><span style='font-size:18.0pt;font-family:Arial,sans-serif;color:white;font-weight:normal'>Asinusa Port Cost Calculator</span></h1>
                                            </td>
                                          </tr>
                                        <tr>
                                          <td style='background:#eef2f3;padding:0cm 0cm 15.0pt 0cm'>
                                            <div align='center'>
                                              <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;background:#eef2f3;border-collapse:collapse;border-spacing:0px'>
                                                <tbody>
                                                  <tr>
                                                    <td style='padding:15.75pt 18.75pt 7.5pt 18.75pt'>
                                                      <table border='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr>
                                                            <td style='border:none; padding:0cm 7.5pt 15.0pt 0cm'>
                                                              <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Dear Sir/Madam, ".$nama."<u></u><u></u></span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>
                                                              <p class='MsoNormal'>
                                                                <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>
                                                                  Thank you for your inquiry on our Port Cost. The calculation below is indicative tariffs based on your provided data and information.
                                                                  <br>
                                                                  The provided Total Port Cost consists of our Port Cost and the applicable Non-Revenue Government Tax.
                                                                </span></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td style='padding:7.5pt 0cm 0cm 0cm'>
                                                              <div>Vessel Type
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                  <tbody>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:0pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Information</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Name</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Email</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$email."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>WhatsApp Number</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nodisatukan."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:5.75pt 7.5pt 5pt 0cm'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Vessel</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$vessel_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Gross Register Ton (GRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$gross_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Net Register Tonnage (NRT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$net_register."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Dead Weight Tonnage (DWT)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$dead_weight."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Length Overall (LOA)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$lenght_over."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Vessel Type</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$nama_vessel_type."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Company Name (Shipping Company/Ship Charterer/Cargo Owner/Agent)</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$company_name."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$Data->activity." - ".$DataDetail->nama."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Arrival Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_arrival." ".$arrival_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Departure Date & Time</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$view_departure." ".$departure_time."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top;'>Activity Days</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top;'> ".$jarak."</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td style='width: 45%; font-size:11pt;font-family:Arial,sans-serif;color: black; vertical-align: top; font-weight:bold;'>Indicative Exchange Rate US$ 1</td>
                                                                      <td style='width: 2%; vertical-align: top;'>: </td>
                                                                      <td style='width: 53%; font-size:11pt;font-family:Arial,sans-serif; color: black; vertical-align: top; font-weight:bold;'> Rp 14.600</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none; font-weight: bold; padding:14.75pt 7.5pt 0pt 0cm; text-align: center;'>
                                                                        <span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>Total Port Cost : USD ".$total_barge_oil."</span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;border-bottom:solid #e0e1e3 1.5pt;padding:0cm 7.5pt 0pt 0cm'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan='3' style='border:none;padding:15.75pt 7.5pt 0pt 0cm'>
                                                                        <p class='MsoNormal'><span style='font-size:11pt;font-family:Arial,sans-serif;color: black;'>For further details and business inquiries, please do not hesitate to contact us by e-mail at marketing@asinusa.com</span></p>
                                                                      </td>
                                                                    </tr>
                                                                  </tbody>
                                                                </table>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style='background:#346f9b;padding:0cm 0cm 0cm 0cm'>
                                            <table border='0' cellspacing='0' cellpadding='0' style='max-width:450.0pt;border-collapse:collapse'>
                                              <tbody>
                                                <tr>
                                                  <td valign='top' style='background:#346f9b;padding:15.0pt 11.25pt 15.0pt 8.75pt'>
                                                    <p class='MsoNormal' align='center' style='text-align:center'><span style='font-size:9.0pt;font-family:Arial,sans-serif;color:white'>*) This email was generated by Asinusa System</span></p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                    </body>
                    </html>
                    ";
                    
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($config['smtp_user']);
      $this->email->to($email);
      $this->email->cc('marketing@asinusa.com');
      $this->email->subject('Asinusa Marketing [Estimate Asinusa Port Cost Calculator]');  
      $this->email->message($message);

      //sending email
      if($this->email->send()){
        $this->session->set_flashdata('message','Notifikasi persetujuan email berhasil di kirimkan');
      }
      else{
        $this->session->set_flashdata('message', $this->email->print_debugger());

      }

      $data = array('contents' => 'Layouts/activity/5',
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
            'jarak' => $jarak,
            'result_pilotage' => $result_pilotage,
            'result_isps_wo' => $result_isps_wo,
            'result_sts' => $result_sts,
            'result_labuh' => $result_labuh,
            'result_rambu' => $result_rambu,
            'result_vts' => $result_vts,
            'total_barge_oil' => $total_barge_oil,

          );
      $data1 = array(
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
            'jarak' => $jarak,
            'result_pilotage' => $result_pilotage,
            'result_isps_wo' => $result_isps_wo,
            'result_sts' => $result_sts,
            'result_labuh' => $result_labuh,
            'result_rambu' => $result_rambu,
            'result_vts' => $result_vts,
            'total_barge_oil' => $total_barge_oil,
            'created_at' => $created_at,
            'kode_telepon' => $kode_telepon

          );
      $this->model_global->input_data($data1,'ref_registrasi');
      // echo "<pre>"; print_r($this->db->last_query()); die();
      //$this->load->view('Layouts/activity/5', $data);
      $this->db->query("
                        INSERT INTO outbox (wa_mode, wa_no, wa_text, wa_media, wa_file)
                        VALUES(0, '".$nodisatukan."', 'Asinusa Smart system

                                Total the port cost based on your provided data is ".$total_sts_mother."

                                Total port cost consist of Port Charges and Port Dues (Non Tax Revenue Government)

                                The detail of Port Cost please contact us at: marketing@asinusa.com', '', '' )");
      $this->session->set_flashdata('success', 'To see the result of port cost calculator, please check your email : '.$email);
      $this->load->view('Layouts/activity/info');

    }
  }


  public function view(){

    $nama = addslashes($this->input->post('nama'));
    $email = addslashes($this->input->post('email'));
    $no_wa = addslashes($this->input->post('no_wa'));
    $vessel_name = addslashes($this->input->post('vessel_name'));
    $gross_register = preg_replace("/[^0-9]/", "", addslashes($this->input->post('gross_register')));
    $net_register =  preg_replace("/[^0-9]/", "", addslashes($this->input->post('net_register')));
    $dead_weight = preg_replace("/[^0-9]/", "", addslashes($this->input->post('dead_weight')));
    $lenght_over = preg_replace("/[^0-9]/", "", addslashes($this->input->post('lenght_over')));
    $vessel_type = addslashes($this->input->post('vessel_type'));
    $company_name = addslashes($this->input->post('company_name'));
    $vessel_activity = addslashes($this->input->post('vessel_activity'));
    $va_detail = addslashes($this->input->post('va_detail'));
    if(empty($this->input->post('cargo_mt'))){
      $cargo_mt ="0";
    }else{
      $cargo_mt = preg_replace("/[^0-9]/", "", addslashes($this->input->post('cargo_mt')));
     }     $cargo_type = addslashes($this->input->post('cargo_type'));
     $mfp = preg_replace("/[^0-9]/", "", addslashes($this->input->post('mfp')));
    $arrival_date = addslashes($this->input->post('arrival_date'));
    $departure_date = addslashes($this->input->post('departure_date'));
    $arrival_time = addslashes($this->input->post('arrival_time'));
    $departure_time = addslashes($this->input->post('departure_time'));
    // echo $vessel_name;
    // echo "<br/>";
    // echo $gross_register;
    // echo "<br/>";
    // echo $net_register;
    // echo "<br/>";
    // echo $dead_weight;
    // echo "<br/>";
    // echo $lenght_over;
    // echo "<br/>";
    // echo $vessel_type;
    // echo "<br/>";
    // echo $company_name;
    // echo "<br/>";
    // echo $vessel_activity;
    // echo "<br/>";
    // echo $va_detail;
    // echo "<br/>";
    // echo $cargo_mt;
    // echo "<br/>";
    // echo $cargo_type;
    // echo "<br/>";
    // echo $mfp;
    // echo "<br/>";
    // echo $arrival_date;
    // echo "<br/>";
    // echo $departure_date;
    // echo "<br/>";
    // echo $arrival_time;
    // echo "<br/>";
    // echo $departure_time;
    // echo "<br/>";
    // die();

    $data = array('contents' => 'Layouts/activity/view',
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'vessel_name' => $vessel_name,
            'gross_register' => $gross_register,
            'net_register' => $net_register,
            'dead_weight' => $dead_weight,
            'lenght_over' => $lenght_over,
            'vessel_type' => $vessel_type,
            'company_name' => $company_name,
            'vessel_activity' => $vessel_activity,
            'va_detail' => $va_detail,
            'cargo_mt' => $cargo_mt,
            'cargo_type' => $cargo_type,
            'mfp' => $mfp,
            'arrival' => $arrival_date,
            'departure' => $departure_date,
            'arrival_time' => $arrival_time,
            'departure_time' => $departure_time,
          );

      $this->load->view('Layouts/activity/view', $data);

  }
}
?>
