<?php
class Reservation extends Admin_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profile_m');
        $this->load->model('hotel_m');
        $this->load->model('room_m');
        $this->load->model('reservation_m');
    }
    public function index()
    {
        if(!$this->user_m->loggedin())
          redirect('login');
       $data['user_info']= $this->profile_m->get_profile_data();
       $data['available_hotels'] = $this->reservation_m->get_hotel_room('hotel');
        $this->load->view('admin/reservation_page', $data);
    }
    public function get_hotel_room_data($data=null , $id=null)
    {
          $id=$this->input->get('id');
           $result['room_data'] = $this->reservation_m->get_hotel_room($data,$id);
           $result['profile_data'] = $this->session->role;
          echo json_encode($result);
    }

     public function show_reservation_content()
    {
       $data = $this->load->view('admin/show_reservation');
        echo json_encode($data);
    }
    public function get_reservation_data()
    {
        $data = $this->reservation_m->get_reservation_data();
        echo json_encode($data);
    }
    public function add_reservation()
    {
         $room_data = $this->reservation_m->get_hotel_room('roomById',$this->input->post('id'));
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
        $quantity = $this->input->post('select_quantity');
        $check_in = date_create($this->input->post('check_in_date'));
        $check_out = date_create($this->input->post('check_out_date'));
        $guest_name = $this->input->post('guest_name');
        $check_in_date = date("d/m/Y", strtotime($this->input->post('check_in_date')));
        $check_out_date = date("d/m/Y", strtotime($this->input->post('check_out_date')));
        $reff = round(microtime(true) * 1000);
        $night = date_diff($check_in,$check_out);
        $price = $price_p_night * $quantity * $night;
        $price = number_format((float) $price, 2, '.', '');
        $offer = $offer * $night * $quantity;
        $total_price = $price - $offer;
        $total_price = number_format((float) $total_price, 2, '.', '');
        $price_p_night = number_format((float) $price_p_night, 2, '.', '');
        $offer = number_format((float) $offer, 2, '.', '');
        $data = array(
            'guest_name' => $this->input->post('guest_name'),
            'guest_email' => $this->input->post('guest_email'),
            'guest_contact' => $this->input->post('guest_phone'),
            'check_in' => $this->input->post('check_in_date'),
            'check_out' => $this->input->post('check_out_date'),
            'quantity' => $this->input->post('select_quantity'),
            'hotel_id'=> $this->input->post('select_hotel'),
            'room_id' => $this->input->post('id'),
            'price' => $total_price,
            'profile_id' => $this->session->id,
            'payment_status'=>'Not paid',
            'resrve_status' => 'Pending',
            'reff' => $reff
        );

       $rules = $this->reservation_m->rules;
       $this->form_validation->set_rules($rules);
       if ($this->form_validation->run() == TRUE)
        {
            if($this->reservation_m->add_reservation($data))
            {
                $guest_email=$this->input->post('guest_email');
                if($this->user_m->loggedin())
                { 
                    $email = $guest_email.', '.$this->session->email;
                    $this->email->to($email);
                }
                else
                    $this->email->to($guest_email);   

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
               if($this->email->send())
                $response['success']=True;
               else
                $response['error']='Check your internet connection.';
            }
            else 
                $response['error']='Technical problem.';
        }
       echo json_encode($data);
     }
   
}
