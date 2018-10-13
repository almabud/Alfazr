<?php
class Payment extends Admin_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profile_m');
        $this->load->model('hotel_m');
        $this->load->model('room_m');
        $this->load->model('reservation_m');
        $this->load->model('payment_m');
    }
    public function index()
    {
        if(!$this->user_m->loggedin())
           redirect(base_url().'/'.'login');
       $data['user_info']= $this->profile_m->get_profile_data();
        $this->load->view('admin/payment', $data);
    }
    public function get_all_payment()
    {
        if(!$this->user_m->loggedin())
          redirect(base_url().'/'.'login');
      $data = $this->payment_m->get_all_payment();
      echo json_encode($data);
    }
    public function add_payment()
    {
        $rules = $this->payment_m->rules;
       $this->form_validation->set_rules($rules);
        $path = realpath(".");
        $path .= "/images/payment_reciept"; 
        $config['upload_path'] =$path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width']  = 1920;
        $config['max_height'] = 1080;
        $payment_receipt=($this->do_upload($config,'payment_reciept'))['payment_reciept']['file_name'];
        $data=array(
        'name'=>$this->input->post('full_name'),
        'email'=> $this->input->post('email'),
        'amount' => $this->input->post('amount'),
        'reff' => $this->input->post('reff'),
        'profile_id' => $this->session->id,
        'payment_receipt' => $payment_receipt,
        'status' => 'pending'
       );
        $response=null;
       if ($this->form_validation->run() == TRUE)
        {

           if($this->payment_m->add_payment($data))
            {
                $msg='We recieved your payment request.Please wait for the confirmation mail.';
                $email=$this->input->post('email');
                $filename=site_url('images/logo/alfazr.jpg');
                $this->email->to($email);
                $this->email->subject('Payment confirmation');
                $this->email->attach($filename);
                $cid = $this->email->attachment_cid($filename);
                $message= $this->load->view('admin/payment_confirmation',['cid'=>$cid, 'msg'=>$msg], TRUE);
                $this->email->message($message);
                $this->email->send();
                 $response['success']='Success';
            }
            else
                {
                    unlink($path.'/'.$payment_receipt);
                    if($payment_receipt == null)
                        $response['error']='All field must not be null';
                    else
                       $response['error']='Technical problem';
                }
        }
        else
          $response['error']='All field must not be null';
      echo json_encode($response);
    }

    public function test($reservation)
    {

        $room_data = $this->reservation_m->get_hotel_room('roomById',$reservation->room_id);
         if($room_data[0]->room_type == '1')
            $room_type='Single';
        else if($room_data[0]->room_type == '2')
            $room_type='Double';
         else if($room_data[0]->room_type == '3')
            $room_type='Triple';
         else if($room_data[0]->room_type == '4')
            $room_type='Quad';
        if($this->session->role == 'user')
          $offer = $room_data[0]->offer_local_cus;
        else 
          $offer = $room_data[0]->offer_agent;

        $hotel_data = $this->hotel_m->get_all_hotel_data($room_data[0]->hotel_id,TRUE); 
        $price_p_night = $room_data[0]->per_night_price;
        $quantity = $reservation->quantity;
        $guest_name = $reservation->guest_name;
        $check_in_date = date("d/m/Y", strtotime($reservation->check_in));
        $check_out_date = date("d/m/Y", strtotime($reservation->check_out));
        $check_in = date_create($reservation->check_in);
        $check_out = date_create($reservation->check_out);
        $reff = $reservation->reff;
        $night = date_diff($check_in,$check_out);
        $price = $reservation->price;
        $price = number_format((float) $price, 2, '.', '');
        $offer = $offer * $night->days * $quantity;
        $total_price = $price - $offer;
        $total_price = number_format((float) $total_price, 2, '.', '');
        $price_p_night = number_format((float) $price_p_night, 2, '.', '');
        $offer = number_format((float) $offer, 2, '.', '');
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('My Title');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont('helvetica', '', 9);
        $pdf->SetTopMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->AddPage();
        $pdf->setJPEGQuality(75);
        $filename=site_url('images/logo/alfazr.jpg');
        $imagedata = file_get_contents($filename);
        $base64 = base64_encode($imagedata);
        $imgdata = base64_decode($base64);
        $imgdata ='@'.$imgdata;
        $pdf->Image($imgdata, 55, 10, 0, 50, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 0, false, false, false);
        $pdf->writeHTML($html, true, false, true, false);
        $pdf->setXY(15,70);
        $pdf->SetFont('dejavusans', 'B', 11);
        $pdf->Cell(10, 0, 'To:', 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');
        $pdf->setXY(25,70);
        $pdf->SetFont('dejavusans', '', 11);
        $pdf->Cell(40, 0, 'Individual', 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');

        $pdf->SetFont('dejavusans', 'B', 11);
        $pdf->setXY(125,70);
        $pdf->Cell(15, 0, 'Date: ', 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');
        $pdf->SetFont('dejavusans', '', 11);
        $pdf->setXY(140,70);
        $pdf->Cell(50, 0,date('d/m/Y') , 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');

        $pdf->setXY(15,78);
        $pdf->SetFont('dejavusans', 'B', 11);
        $pdf->Cell(15, 0, 'Attn:', 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');

        $pdf->setXY(125,78);
        $pdf->Cell(15, 0, '#reff:', 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');
        $pdf->setXY(140,78);
        $pdf->SetFont('dejavusans', '', 11);
        $pdf->Cell(50, 0, $reff, 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');

        $pdf->setXY(15,86);
        $pdf->SetFont('dejavusans', 'B', 11);
        $pdf->Cell(20, 0, 'Subject:', 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');
        $pdf->setXY(35,86);
        $pdf->SetFont('dejavusans', '', 11);
        $pdf->Cell(60, 0, 'Tentative Confirmation', 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');

        $pdf->setXY(125,86);
        $pdf->SetFont('dejavusans', 'B', 11);
        $pdf->Cell(30, 0, 'Guest name:', 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');
        $pdf->setXY(154,86);
        $pdf->SetFont('dejavusans', '', 11);
        $pdf->Cell(46, 0, $guest_name, 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');

        $pdf->setXY(15,94);
        $pdf->SetFont('dejavusans', 'B', 11);
        $pdf->Cell(30, 0, 'Option date:', 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');
        $pdf->setXY(45,94);
        $pdf->SetFont('dejavusans', '', 11);
        $pdf->Cell(35, 0, date('d/m/Y'), 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');

        $pdf->setXY(15,102);
        $pdf->SetFont('dejavusans', 'B', 11);
        $pdf->Cell(17, 0, 'Dear,', 0, $ln=0, 'L', 0, '', 0, false, 'T', 'C');
        $msg='We seize this opportunity to thank you very much for you kind interest and confidence in AL-Fazr for Hotel Management Tours with reference to the above mentioned subject, we are delighted to confirm you on Tentative basis as fllowing.';        
        $pdf->setXY(15,109);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetFont('dejavusans', '', 11);
        $pdf->MultiCell(182, 20, $msg, 0, 'L', 1, 0, '', '', true, 0, false, true, 15, 'T');

        /*table header */
        $pdf->setXY(15,128);
        $pdf->SetFont('dejavusans', 'B', 11);
        $pdf->SetFillColor(255,255,255);
        $pdf->setCellPaddings(1, 1, 1, 1);
        $pdf->MultiCell(30, 15, 'Hotel name', 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(45,128);
        $pdf->MultiCell(20, 15, 'Room type', 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(65,128);
        $pdf->MultiCell(20, 15, 'Total room', 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(85,128);
        $pdf->MultiCell(30, 15, 'Check In', 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(114,128);
        $pdf->MultiCell(29, 15, 'Check Out', 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(143,128);
        $pdf->MultiCell(15, 15, 'Night', 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(158,128);
        $pdf->MultiCell(19, 15, 'Rate', 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
         $pdf->setXY(177,128);
        $pdf->MultiCell(20, 15, 'Total', 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');

         /*table body */
        $pdf->setXY(15,143);
        $pdf->SetFont('dejavusans', '', 11);
        $pdf->setCellPaddings(1, 1, 1, 1);
        $pdf->MultiCell(30, 15, $hotel_data->name, 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(45,143);
        $pdf->MultiCell(20, 15, $room_type, 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(65,143);
        $pdf->MultiCell(20, 15, $quantity, 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(85,143);
        $pdf->MultiCell(30, 15, $check_in_date, 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(114,143);
        $pdf->MultiCell(29, 15, $check_out_date, 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(143,143);;
        $pdf->MultiCell(15, 15, $night->days, 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(158,143);
        $pdf->MultiCell(19, 15, $price_p_night, 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(177,143);
        $pdf->MultiCell(20, 15, $price, 1, 'C', 1, 0, '', '', true, 0, false, true, 15, 'M');
        $pdf->setXY(15,158);
        $pdf->MultiCell(182, 10, 'Discount: '.$offer.'  Net Total: '.$total_price, 1, 'R', 1, 0, '', '', true, 0, false, true, 10, 'M');
        $pdf->lastPage();
        $tentative = $pdf->Output('My-File-Name.pdf', 'S');
        $this->email->subject('Room reservation confirmation');
       // $filename=site_url('images/logo/alfazr.jpg');
        //$this->email->attach($filename);
        //$cid = $this->email->attachment_cid($filename);
        $this->email->attach($tentative, 'attachment', 'tentative.pdf', 'application/pdf');
       // $message= $this->load->view('admin/activation_email',['cid'=>$cid, 'url'=>$active_url], TRUE);
        $this->email->message('');
        $this->email->to($reservation->guest_email);
       $this->email->send();
    }

    public function payment_status_update()
    {
        $status = $this->input->post('status');
        $id = $this->input->post('id');
        $reff = $this->input->post('reff');
        $payment_data = array(
            'status' => $status
        );
      $reservation = $this->payment_m->payment_validate_reservation($reff,$id);
      $this->test($reservation);
       echo json_encode($reservation);
      var_dump($reservation);
      if($reservation)
      {
        $price = is_numeric( $reservation->payment_status);
        if($reservation->reff == $reff)
        {
            if($price && (($reservation->payment_status + $reservation->amount) >= $resrvation->price) && $status == 'confirmed')
            {
                $reservation_data = array(
                    'payment_status' => 'paid',
                    'resrve_status' => 'Reserved'
              );
              if($this->payment_m->payment_status_update($payment_data, $id) && $this->payment_m->reservation_update($reservation_data,$reservation->id))
              {
                $data['success'] = 'success';
              }
            }
            else if($price && (($reservation->payment_status + $reservation->amount) < $resrvation->price) && $status == 'confirmed')
            {
                $reservation_data = array(
                    'payment_status' => ($reservation->payment_status + $reservation->amount),
                    'resrve_status' => 'Pending'
              );
              if($this->payment_m->payment_status_update($payment_data, $id) && $this->payment_m->reservation_update($reservation_data,$reservation->id))
              {
                $data['success'] = 'success';
              }
            }
            else if((($reservation->price - $reservation->amount) <= 0) && $status == 'confirmed')
            {
                $reservation_data = array(
                    'payment_status' => 'paid',
                    'resrve_status' => 'Reserved'
              );
              if($this->payment_m->payment_status_update($payment_data, $id) && $this->payment_m->reservation_update($reservation_data,$reservation->id))
              {
                $data['success'] = 'success';
              }
            }
            else if(($reservation->price - $reservation->amount) > 0 && $status == 'confirmed')
            {
                $reservation_data = array(
                    'payment_status' => $reservation->amount,
              );
              if($this->payment_m->payment_status_update($payment_data, $id) && $this->payment_m->reservation_update($reservation_data,$reservation->id))
              {
                $data['success'] = 'success';
              }
              else
                echo json_encode($this->db->error());
            }
            else if($status == 'cancel')
            {
                $reservation_data = array(
                    'resrve_status' => 'Cancel',
              );
              if($this->payment_m->payment_status_update($payment_data, $id) && $this->payment_m->reservation_update($reservation_data,$reservation->id))
              {
                $data['success'] = 'success';
              }
            } 
        }
      }
     }
}