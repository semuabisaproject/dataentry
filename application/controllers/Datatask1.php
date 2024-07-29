<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatask extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }



    public function Neworder()
    {
        
        $data['title'] = 'Input KK';
        // $data['user'] = $this->db->select('id , name, email');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('name')])->row_array();
        $data['id'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('no_kk', 'no_kk', 'required|trim');
        $this->form_validation->set_rules('kepalakeluarga', 'KepalaKeluarga', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('rt', 'RT', 'required|trim');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim');
        $this->form_validation->set_rules('desa', 'Desa', 'required|trim');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kota_kabupaten', 'Kota_kabupaten', 'required|trim');
        $this->form_validation->set_rules('kodepos', 'Kodepos', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama_lengkap', 'required|trim');
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis_kelamin', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
        $this->form_validation->set_rules('jenis_pekerjaan', 'Jenis_pekerjaan', 'required|trim');
        $this->form_validation->set_rules('status_perkawinan', 'Status_perkawinan', 'required|trim');
        $this->form_validation->set_rules('hub_keluarga', 'Hub_keluarga', 'required|trim');
        $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required|trim');
        $this->form_validation->set_rules('no_paspor', 'No_paspor', 'required|trim');
        $this->form_validation->set_rules('no_kitas', 'No_kitas', 'required|trim');
        $this->form_validation->set_rules('ayah', 'Ayah', 'required|trim');
        $this->form_validation->set_rules('ibu', 'Ibu', 'required|trim');


        

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Input KK';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('order/neworder', $data);
            $this->load->view('templates/footer');
        } else {


            $data2 = [
                'no_kk' => $this->input->post('no_kk', true),
                'kepalakeluarga' => $this->input->post('kepalakeluarga', true),
                'alamat' => $this->input->post('alamat', true),
                'rt' => $this->input->post('rt', true),
                'rw' => $this->input->post('rw', true),
                'desa' => $this->input->post('desa', true),
                'kelurahan' => $this->input->post('kelurahan', true),
                'kecamatan' => $this->input->post('kecamatan', true),
                'kota_kabupaten' => $this->input->post('kota_kabupaten', true),
                'kodepos' => $this->input->post('kodepos', true),
                'provinsi' => $this->input->post('provinsi', true),
            ];
            $this->db->insert('master_kk', $data2);


            $jumlah = count($this->input->post('nik'));print_r($jumlah);die();
         
            for ($i = 0; $i < $jumlah; $i++) {
                $data3 = 
                array(
                    'nama_lengkap'=> $this->input->post('nama_lengkap')[$i],
                    'nik'=> $this->input->post('nik')[$i],
                    'jenis_kelamin'=> $this->input->post('jenis_kelamin')[$i],
                    'tempat_lahir'=> $this->input->post('tempat_lahir')[$i],
                    'tanggal_lahir'=> $this->input->post('tanggal_lahir')[$i],
                    'agama'=> $this->input->post('agama')[$i],
                    'pendidikan'=> $this->input->post('pendidikan')[$i],
                    'jenis_pekerjaan'=> $this->input->post('jenis_pekerjaan')[$i],
                    'status_perkawinan'=> $this->input->post('status_perkawinan')[$i],
                    'hub_keluarga'=> $this->input->post('hub_keluarga')[$i],
                    'kewarganegaraan'=> $this->input->post('kewarganegaraan')[$i],
                    'no_paspor'=> $this->input->post('no_paspor')[$i],
                    'no_kitas'=> $this->input->post('no_kitas')[$i],
                    'ayah'=> $this->input->post('ayah')[$i],
                    'ibu'=> $this->input->post('ibu')[$i],

                );
                $this->db->insert('master_kk', $data3);
        }


                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Order Success!</div>');
                redirect('user');
        }    
    }
    
    public function Orderlist()
    {
        $data['title'] = 'Order List';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $role = $this->db->get_where('user', ['role_id' => $this->session->userdata('role_id')])->row_array();
        $data['orderlist'] = $this->load->model('Order_model', 'get_order');
        $data['orderList'] = $this->get_order->get_order();
        $data['orderlist'] = $this->db->get('parcels')->result_array();

        if ($role[('role_id')] == 1) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/tab_order', $data);
            $this->load->view('order/orderlist', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            // $this->load->view('templates/tab_order', $data);
            $this->load->view('order/orderlist', $data);
            $this->load->view('templates/footer');
        }
    }


    //     public function Vieworder($par)
    //     {
    //         $data['title'] = 'Detailed Order';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['role'] = $this->db->get('user');
    //         $data['view'] = $this->db->get_where('parcels', ['reference_number' => $par])->row_array();

    //         $this->db->select('*');
    //         $this->db->from('parcels');
    //         $this->db->join('parcel_tracks', 'parcels.id = parcel_tracks.parcel_id');
    //         $this->db->join('mst_data', 'parcel_tracks.status = mst_data.id');
    //         $this->db->where(['parcel_tracks.reference_number' => $par]);
    //         $data['order'] = $this->db->get()->result_array();




    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('templates/tab_order', $data);
    //         $this->load->view('order/complete', $data);
    //         $this->load->view('templates/footer');
    //     }
    //     //cetak barcode

    //     public function pdfview()
    //     {

    //         $reference_number = $this->input->get('reference_number');
    //         //get ref_number
    //         $data['title'] = 'Resi';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['role'] = $this->db->get('user');
    //         $data['view'] = $this->db->get_where('parcels', ['reference_number' => $reference_number])->row_array();

    //         $this->db->select('*');
    //         $this->db->from('parcels');
    //         $this->db->join('parcel_tracks', 'parcels.id = parcel_tracks.parcel_id');
    //         $this->db->join('mst_data', 'parcel_tracks.status = mst_data.id');
    //         $this->db->where(['parcel_tracks.reference_number' => $reference_number]);
    //         $data['order'] = $this->db->get()->result_array();


    //         // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //         $this->load->library('pdfgenerator');
    //         $this->load->view('order/resipdf',$data);
    //         // title dari pdf
    //         $this->data['title_pdf'] = 'Resi Sobat';

    //         // // filename dari pdf ketika didownload
    //         $file_pdf = 'resi';
    //         // // setting paper
    //         $paper = 'a7';
    //         // //orientasi paper potrait / landscape
    //         $orientation = "portrait";

    // 		$html = $this->load->view('order/resipdf',$this->data, true);	    

    //         // // run dompdf
    //         $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    //     }

    //     public function Editorder($par)
    //     {
    //         $data['title'] = 'Edit Order';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['view'] = $this->db->get_where('parcels', ['reference_number' => $par])->row_array();
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('templates/tab_order', $data);
    //         $this->load->view('order/editorder', $data);
    //         $this->load->view('templates/footer');
    //     }

    //     public function Ordertrack()
    //     {
    //         $data['title'] = 'Parcel';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['kurir'] = $this->db->get('kurir')->result_array();

    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('templates/tab_order', $data);
    //         $this->load->view('templates/sub_tab', $data);
    //         $this->load->view('parcel/ordertrack', $data);
    //         $this->load->view('templates/footer');
    //     }

    //     public function reqpickup()
    //     {
    //         $data['title'] = 'Pick Up';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['order'] = $this->load->model('Order_model', 'getordernew');
    //         $data['orders'] = $this->getordernew->getordernew();
    //         // $data['order'] = $this->db->get('parcels');
    //         // $ref=$this->input->get('reference_number');
    //         // $data['pickup'] = $this->db->get_where('parcels', ['reference_number' => $ref])->row_array();
    //         // $data['pickup'] = $this->db->get_where('parcels', ['reference_number' => $par])->row_array();
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('templates/tab_order', $data);
    //         $this->load->view('templates/sub_tab', $data);
    //         $this->load->view('parcel/pickup', $data);
    //         $this->load->view('templates/footer');
    //         // var_dump($data);
    //         // exit;
    //     }


    //     public function confirmpickup()
    //     {
    //         $reference_number = $this->input->get('reference_number');
    //         $parcel_id = $this->input->get('id');

    //         $data = [
    //             'reference_number' => $reference_number,
    //             'parcel_id' => $parcel_id,
    //             'status' => 2,
    //             'date_time_create' => date("Y-m-d H:i:s")

    //         ];
    //         $data2 = [
    //             'update_date' => date("Y-m-d H:i:s"),
    //             'reference_number' => $reference_number,
    //             'status' => 2,
    //         ];

    //         $result = $this->db->get_where('parcel_tracks', ['reference_number' => $reference_number], ['status' => 2]);
    //         //  var_dump($data);
    //         //         exit;
    //         if ($result->num_rows() < 1) {
    //             $this->db->insert('parcel_tracks', $data);
    //             $this->db->update('parcels', $data2, ['reference_number' => $reference_number]);


    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request Success!</div>');
    //             redirect('order/reqpickup');
    //             // var_dump($data);
    //             // exit;
    //         }
    //     }

    //     public function orderkurir()
    //     {
    //         $data['title'] = 'Kurir Pickup';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['order'] = $this->load->model('Order_model', 'orderkurir');
    //         $data['orders'] = $this->orderkurir->orderkurir();


    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('parcel/orderkurir', $data);
    //         $this->load->view('templates/footer');
    //     }

    //     // public function datapickup()
    //     // {
    //     //     $data['title'] = 'Data Pickup';
    //     //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     //     $data['order'] = $this->load->model('Order_model', 'orderkurir');
    //     //     // $data['orders'] = $this->orderkurir->get_where('reference_number' => $par)->row_array();
    //     //     $data['orders'] = $this->db->get('parcel_tracks')->row_array();


    //     //     $this->load->view('templates/header', $data);
    //     //     $this->load->view('templates/sidebar', $data);
    //     //     $this->load->view('templates/topbar', $data);
    //     //     $this->load->view('parcel/pickupdetail', $data);
    //     //     $this->load->view('templates/footer');
    //     // }
    //     public function completekurir()
    //     {

    //         $reference_number = $this->input->get('reference_number');
    //         $parcel_id = $this->input->get('parcel_id');
    //         // var_dump($parcel_id);exit;
    //         $data = [
    //             'reference_number' => $reference_number,
    //             'parcel_id' => $parcel_id,
    //             'status' => 3,
    //             'date_time_create' => date("Y-m-d H:i:s")

    //         ];
    //         $data2 = [
    //             'update_date' => date("Y-m-d H:i:s"),
    //             'reference_number' => $reference_number,
    //             'status' => 3,
    //         ];

    //         // $result = $this->db->get_where('parcel_tracks', ['reference_number' => $reference_number, 'status' => 3]);
    //         // // var_dump($result);
    //         // exit;
    //         // if ($result->num_rows() < 1) {
    //         $this->db->insert('parcel_tracks', $data);
    //         $this->db->update('parcels', $data2, ['reference_number' => $reference_number]);


    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Collected by Courier!</div>');
    //         redirect('order/orderkurir');
    //     }

    //     public function ordersatelite()
    //     {
    //         $data['title'] = 'Task Order Satelite';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $role = $this->db->get_where('user', ['role_id' => $this->session->userdata('role_id')])->row_array();
    //         $data['order'] = $this->load->model('Order_model', 'tasksatelit');
    //         $data['orders'] = $this->tasksatelit->tasksatelit();

    //         // $data['order'] = $this->db->get('parcels');
    //         // $ref=$this->input->get('reference_number');
    //         // $data['pickup'] = $this->db->get_where('parcels', ['reference_number' => $ref])->row_array();
    //         // $data['pickup'] = $this->db->get_where('parcels', ['reference_number' => $par])->row_array();

    //         if ($role[('role_id')] == 1) {
    //             $this->load->view('templates/header', $data);
    //             $this->load->view('templates/sidebar', $data);
    //             $this->load->view('templates/topbar', $data);
    //             $this->load->view('templates/tab_order', $data);
    //             $this->load->view('templates/sub_tab', $data);
    //             $this->load->view('parcel/satelit', $data);
    //             $this->load->view('templates/footer');
    //         } else {
    //             $this->load->view('templates/header', $data);
    //             $this->load->view('templates/sidebar', $data);
    //             $this->load->view('templates/topbar', $data);
    //             // $this->load->view('templates/tab_order', $data);
    //             // $this->load->view('templates/sub_tab', $data);
    //             $this->load->view('parcel/satelit', $data);
    //             $this->load->view('templates/footer');
    //         }
    //         // var_dump($data);
    //         // exit;
    //     }
    //     public function completesatelit()
    //     {

    //         $reference_number = $this->input->get('reference_number');
    //         $parcel_id = $this->input->get('id');
    //         // var_dump($parcel_id);exit;
    //         $data = [
    //             'reference_number' => $reference_number,
    //             'parcel_id' => $parcel_id,
    //             'status' => 4,
    //             'date_time_create' => date("Y-m-d H:i:s")

    //         ];
    //         $data2 = [
    //             'update_date' => date("Y-m-d H:i:s"),
    //             'reference_number' => $reference_number,
    //             'status' => 4,
    //         ];

    //         // $result = $this->db->get_where('parcel_tracks', ['reference_number' => $reference_number, 'status' => 3]);
    //         // // var_dump($result);
    //         // exit;
    //         // if ($result->num_rows() < 1) {
    //         $this->db->insert('parcel_tracks', $data);
    //         $this->db->update('parcels', $data2, ['reference_number' => $reference_number]);


    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Collected By Satelite!</div>');
    //         redirect('order/ordersatelite');
    //     }

    //     public function orderhub()
    //     {
    //         $data['title'] = 'Task Order Hub';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['order'] = $this->load->model('Order_model', 'taskhub');
    //         $data['orders'] = $this->taskhub->taskhub();
    //         // $data['order'] = $this->db->get('parcels');
    //         // $ref=$this->input->get('reference_number');
    //         // $data['pickup'] = $this->db->get_where('parcels', ['reference_number' => $ref])->row_array();
    //         // $data['pickup'] = $this->db->get_where('parcels', ['reference_number' => $par])->row_array();
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('templates/tab_order', $data);
    //         $this->load->view('templates/sub_tab', $data);
    //         $this->load->view('parcel/hub', $data);
    //         $this->load->view('templates/footer');
    //         // var_dump($data);
    //         // exit;
    //     }

    //     public function pickuphub()
    //     {

    //         $reference_number = $this->input->get('reference_number');
    //         $parcel_id = $this->input->get('id');
    //         // var_dump($parcel_id);exit;
    //         $data = [
    //             'reference_number' => $reference_number,
    //             'parcel_id' => $parcel_id,
    //             'status' => 5,
    //             'date_time_create' => date("Y-m-d H:i:s")

    //         ];
    //         $data2 = [
    //             'update_date' => date("Y-m-d H:i:s"),
    //             'reference_number' => $reference_number,
    //             'status' => 5,
    //         ];
    //         $result = $this->db->get_where('parcels', ['reference_number' => $reference_number, 'status' => 4]);
    //         // $result = $this->db->get_where('parcel_tracks', ['reference_number' => $reference_number, 'status' => 3]);
    //         // // var_dump($result);
    //         // exit;
    //         if ($result->num_rows() == 1) {

    //             $this->db->insert('parcel_tracks', $data);
    //             $this->db->update('parcels', $data2, ['reference_number' => $reference_number]);


    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Request Pickup Success!</div>');
    //             redirect('order/orderhub');
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your request Has been made !!</div>');
    //             redirect('order/orderhub');
    //         }
    //     }


    //     public function pickhub()
    //     {
    //         $data['title'] = 'Hub Pickup';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['order'] = $this->load->model('Order_model', 'hubpick');
    //         $data['order'] = $this->hubpick->hubpick();


    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('parcel/hubpick', $data);
    //         $this->load->view('templates/footer');
    //     }

    //     public function pickhubcomplete()
    //     {

    //         $reference_number = $this->input->get('reference_number');
    //         $parcel_id = $this->input->get('parcel_id');
    //         // var_dump($parcel_id);exit;
    //         $data = [
    //             'reference_number' => $reference_number,
    //             'parcel_id' => $parcel_id,
    //             'status' => 6,
    //             'date_time_create' => date("Y-m-d H:i:s")

    //         ];
    //         $data2 = [
    //             'update_date' => date("Y-m-d H:i:s"),
    //             'reference_number' => $reference_number,
    //             'status' => 6,
    //         ];

    //         // $result = $this->db->get_where('parcel_tracks', ['reference_number' => $reference_number, 'status' => 3]);
    //         // // var_dump($result);
    //         // exit;
    //         // if ($result->num_rows() < 1) {
    //         $this->db->insert('parcel_tracks', $data);
    //         $this->db->update('parcels', $data2, ['reference_number' => $reference_number]);


    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Collected by Courier!</div>');
    //         redirect('order/pickhub');
    //     }

    //     public function completehub()
    //     {

    //         $reference_number = $this->input->get('reference_number');
    //         $parcel_id = $this->input->get('id');
    //         $status = $this->input->get('status');
    //         // var_dump($parcel_id);exit;
    //         $data = [
    //             'reference_number' => $reference_number,
    //             'parcel_id' => $parcel_id,
    //             'status' => 7,
    //             'date_time_create' => date("Y-m-d H:i:s")

    //         ];
    //         $data2 = [
    //             'update_date' => date("Y-m-d H:i:s"),
    //             'reference_number' => $reference_number,
    //             'status' => 7,
    //         ];

    //         $result = $this->db->get_where('parcels', ['reference_number' => $reference_number, 'status' => $status])->row_array();
    //         // var_dump($result);
    //         // exit;
    //         if ($result['status'] == 6) {
    //             $this->db->insert('parcel_tracks', $data);
    //             $this->db->update('parcels', $data2, ['reference_number' => $reference_number]);
    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Collected by Hub !</div>');
    //             redirect('order/orderhub');
    //         } elseif ($result['status'] == 7) {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Order has been collected, please go to delivery Option!!!</div>');
    //             redirect('order/orderhub');
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please request Pick up First !</div>');
    //             redirect('order/orderhub');
    //         }
    //     }

    //     public function selfdelivery()
    //     {

    //         $reference_number = $this->input->get('reference_number');
    //         $parcel_id = $this->input->get('id');
    //         $status = $this->input->get('status');
    //         // var_dump($parcel_id);exit;
    //         $data = [
    //             'reference_number' => $reference_number,
    //             'parcel_id' => $parcel_id,
    //             'status' => 10,
    //             'date_time_create' => date("Y-m-d H:i:s")

    //         ];
    //         $data2 = [
    //             'update_date' => date("Y-m-d H:i:s"),
    //             'reference_number' => $reference_number,
    //             'status' => 10,
    //         ];

    //         $result = $this->db->get_where('parcels', ['reference_number' => $reference_number, 'status' => $status])->row_array();
    //         // var_dump($result);
    //         // exit;
    //         if ($result['status'] == 7) {
    //             $this->db->insert('parcel_tracks', $data);
    //             $this->db->update('parcels', $data2, ['reference_number' => $reference_number]);
    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request Self Delivery Success !</div>');
    //             redirect('order/orderhub');
    //         } elseif ($result['status'] == 9) {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Order has been Requested to self Delivery Option !</div>');
    //             redirect('order/orderhub');
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Check </div>');
    //             redirect('order/orderhub');
    //         }
    //     }

    //     public function self()
    //     {
    //         $data['title'] = 'List Delivery';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['order'] = $this->load->model('Order_model', 'selfdelivery');
    //         $data['orders'] = $this->selfdelivery->selfdelivery();
    //         // $data['order'] = $this->db->get('parcels');
    //         // $ref=$this->input->get('reference_number');
    //         // $data['pickup'] = $this->db->get_where('parcels', ['reference_number' => $ref])->row_array();
    //         // $data['pickup'] = $this->db->get_where('parcels', ['reference_number' => $par])->row_array();
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('parcel/selfdeliverykurir', $data);
    //         $this->load->view('templates/footer');
    //         // var_dump($data);
    //         // exit;
    //     }

    //     public function ondelivery()
    //     {

    //         $reference_number = $this->input->get('reference_number');
    //         $parcel_id = $this->input->get('id');
    //         $status = $this->input->get('status');
    //         // var_dump($parcel_id);exit;
    //         $data = [
    //             'reference_number' => $reference_number,
    //             'parcel_id' => $parcel_id,
    //             'status' => 11,
    //             'date_time_create' => date("Y-m-d H:i:s")

    //         ];
    //         $data2 = [
    //             'update_date' => date("Y-m-d H:i:s"),
    //             'reference_number' => $reference_number,
    //             'status' => 11,
    //         ];

    //         $result = $this->db->get_where('parcels', ['reference_number' => $reference_number, 'status' => $status])->row_array();
    //         // var_dump($result);
    //         // exit;
    //         if ($result['status'] == 10) {
    //             $this->db->insert('parcel_tracks', $data);
    //             $this->db->update('parcels', $data2, ['reference_number' => $reference_number]);
    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Collected !</div>');
    //             redirect('order/self');
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Order has been Picked Up</div>');
    //             redirect('order/self');
    //         }
    //     }

    //     public function deliver()
    //     {
    //         $data['title'] = 'Detailed Order';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         // $data['role'] = $this->db->get('user');
    //         $reference_number = $this->input->get('parcel_tracks', 'reference_number');
    //         $data['order'] = $this->load->model('Order_model', 'trackorder');
    //         $data['order'] = $this->trackorder->trackorder('reference_number', $reference_number);
    //         // $data['order'] = $this->load->model('Order_model','trackorder');
    //         // $data['order'] = $this->db->get_where('parcel_tracks');
    //         // $data['order'] = $this->trackorder->trackorder();

    //         // VAR_DUMP($data);exit;



    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         // $this->load->view('templates/tab_order', $data);
    //         $this->load->view('order/complete', $data);
    //         $this->load->view('templates/footer');
    //     }
    //     public function datadeliver($par)
    //     {
    //         $data['title'] = 'Detailed Order';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['role'] = $this->db->get('user');
    //         // $data['order'] = $this->load->model('Order_model', 'trackorder');
    //         // $data['order'] = $this->trackorder->trackorder(['reference_number' => $par]);
    //         $this->db->select('*');
    //         $this->db->from('parcels');
    //         $this->db->join('parcel_tracks', 'parcels.id = parcel_tracks.parcel_id');
    //         $this->db->join('mst_data', 'parcel_tracks.status = mst_data.id');
    //         $this->db->where(['parcel_tracks.reference_number' => $par]);
    //         $data['order'] = $this->db->get()->result_array();

    //         $data['view'] = $this->db->get_where('parcels', ['reference_number' => $par])->row_array();

    //         $this->form_validation->set_rules('receive_by', 'receive_by', 'required|trim');

    //         if ($this->form_validation->run() == false) {
    //             $this->load->view('templates/header', $data);
    //             $this->load->view('templates/sidebar', $data);
    //             $this->load->view('templates/topbar', $data);
    //             $this->load->view('order/complete', $data);
    //             $this->load->view('templates/footer');
    //         } else {
    //             $name = $this->input->post('receive_by');
    //             $reference_number = $this->input->get('reference_number');

    //             // cek jika ada gambar yang akan diupload
    //             $upload_image = $_FILES['image_receive']['receive_by'];
    //             // var_dump($data);exit;
    //             if ($upload_image) {
    //                 $config['allowed_types'] = 'gif|jpg|png';
    //                 $config['max_size']      = '2048';
    //                 $config['upload_path'] = './assets/img/profile/';

    //                 $this->load->library('upload', $config);

    //                 if ($this->upload->do_upload('image_receive')) {
    //                     $old_image = $data['parcels']['image_receive'];
    //                     if ($old_image != 'default.jpg') {
    //                         unlink(FCPATH . 'assets/img/profile/' . $old_image);
    //                     }
    //                     $new_image = $this->upload->data('file_name');
    //                     $this->db->set('image_receive', $new_image);
    //                 } else {
    //                     echo $this->upload->dispay_errors();
    //                 }
    //             }

    //             $this->db->set('receive_by', $name);
    //             $this->db->where('reference_number', $reference_number);
    //             $this->db->update('parcels');

    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
    //             redirect('order/datadeliver');
    //         }

    //         // $this->load->view('templates/header', $data);
    //         // $this->load->view('templates/sidebar', $data);
    //         // $this->load->view('templates/topbar', $data);
    //         // $this->load->view('order/complete', $data);
    //         // $this->load->view('templates/footer');
    //     }
    //     public function completeorder()
    //     {
    //         $reference_number = $this->input->get('reference_number');
    //         $parcel_id = $this->input->get('id');
    //         $status = $this->input->get('status');
    //         // var_dump($parcel_id);exit;
    //         $data = [
    //             'reference_number' => $reference_number,
    //             'parcel_id' => $parcel_id,
    //             'status' => 12,
    //             'date_time_create' => date("Y-m-d H:i:s")

    //         ];
    //         $data2 = [
    //             'update_date' => date("Y-m-d H:i:s"),
    //             'reference_number' => $reference_number,
    //             'status' => 12,
    //         ];

    //         $result = $this->db->get_where('parcels', ['reference_number' => $reference_number, 'status' => $status])->row_array();
    //         // var_dump($result);
    //         // exit;
    //         if ($result['status'] == 11) {
    //             $this->db->insert('parcel_tracks', $data);
    //             $this->db->update('parcels', $data2, ['reference_number' => $reference_number]);
    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Delievered !</div>');
    //             redirect('order/self');
    //         } elseif ($result['status'] == 10) {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Pick up order to HUB !</div>');
    //             redirect('order/self');
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Order Has been finished</div>');
    //             redirect('order/self');
    //         }
    //     }


    //     public function data($par)
    //     {
    //         $data['title'] = 'Detailed Order';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['role'] = $this->db->get('user');
    //         // $data['order'] = $this->load->model('Order_model', 'trackorder');
    //         // $data['order'] = $this->trackorder->trackorder(['reference_number' => $par]);
    //         $this->db->select('*');
    //         $this->db->from('parcels');
    //         $this->db->join('parcel_tracks', 'parcels.id = parcel_tracks.parcel_id');
    //         $this->db->join('mst_data', 'parcel_tracks.status = mst_data.id');
    //         $this->db->where(['parcel_tracks.reference_number' => $par]);
    //         $data['order'] = $this->db->get()->result_array();

    //         $data['view'] = $this->db->get_where('parcels', ['reference_number' => $par])->row_array();

    //         $this->form_validation->set_rules('receive_by', 'receive_by', 'required|trim');
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('order/finishorder', $data);
    //         $this->load->view('templates/footer');
    //     }


    //     public function uploadorder($par)
    //     {
    //         $data['title'] = 'Finish Order';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['order'] = $this->db->get_where('parcels', ['reference_number' => $par])->row_array();
    //         // $reference_number = $this->input->get('reference_number');
    //         // echo($data);var_dump($data);exit;
    //         $this->form_validation->set_rules('request_by', 'full name', 'required|trim');
    //         // var_dump($data);exit;



    //         if ($this->form_validation->run() == false) {
    //             $this->load->view('templates/header', $data);
    //             $this->load->view('templates/sidebar', $data);
    //             $this->load->view('templates/topbar', $data);
    //             $this->load->view('order/finishorder', $data);
    //             $this->load->view('templates/footer');
    //         } else {

    //             $reference_number = $this->input->get('reference_number');
    //             $receive_by = $this->input->post('receive_by');
    //             $this->db->set('receive_by', $receive_by);
    //             $this->db->where('reference_number', $reference_number);
    //             var_dump($reference_number);
    //             exit;
    //             $this->db->update('parcels');
    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Receive !</div>');
    //             redirect('order/self');

    //             // cek jika ada gambar yang akan diupload
    //             // $upload_image = $_FILES['image']['image_receive'];
    //             // var_dump($data);exit;
    //             // if ($upload_image) {
    //             //     $config['allowed_types'] = 'gif|jpg|png';
    //             //     $config['max_size']      = '2048';
    //             //     $config['upload_path'] = './assets/img/profile/';

    //             //     $this->load->library('upload', $config);

    //             //     if ($this->upload->do_upload('image_receive')) {
    //             //         $old_image = $data['parcels']['image_receive'];
    //             //         if ($old_image != 'default.jpg') {
    //             //             unlink(FCPATH . 'assets/img/profile/' . $old_image);
    //             //         }
    //             //         $new_image = $this->upload->data('file_name');
    //             //         $this->db->set('image_receive', '1.jpg');
    //             //     } else {
    //             //         echo $this->upload->dispay_errors();
    //             // }
    //             // }

    //             // $this->db->set('receive_by', $name);
    //             // $this->db->where('reference_number', $par);
    //             // $this->db->update('parcels');

    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
    //             redirect('order/self');
    //         }
    //     }
    //     public function doupload()
    //     {
    //         $reference_number = $this->input->get('reference_number');
    //         $receive_by = $this->input->post('receive_by');
    //         $upload_image = $_FILES['image_receive'];
    //         $data['image'] = $this->db->get('parcels');
    //         // $data2 = [
    //         //     'update_date' => date("Y-m-d H:i:s"),
    //         //     'reference_number' => $reference_number,
    //         //     'receive_by' => $receive_by,
    //         // ];
    //         $result = $this->db->get_where('parcels', ['reference_number' => $reference_number])->row_array();

    //         if ($result['reference_number'] = $reference_number and $upload_image) {

    //             $config['allowed_types'] = 'gif|jpg|png';
    //             $config['max_size']      = '2048';
    //             $config['upload_path'] = './assets/img/profile/';

    //             $this->load->library('upload', $config);

    //             if ($this->upload->do_upload('image_receive')) {
    //                 $old_image = $data['image_receive'];
    //                 if ($old_image != 'default.jpg') {
    //                     unlink(FCPATH . 'assets/img/profile/' . $old_image);
    //                 }
    //                 $new_image = $this->upload->data('file_name');
    //                 $this->db->set('image_receive', $new_image);
    //             } else {
    //                 echo $this->upload->dispay_errors();
    //             }
    //         }

    //         $this->db->set('receive_by', $receive_by);
    //         $this->db->where('reference_number', $reference_number);
    //         $this->db->update('parcels');

    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
    //         redirect('order/self');
    //     }
    // }

    // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Order Has been finished</div>');
    // redirect('order/self');
}
