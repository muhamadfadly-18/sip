<?php
class Purchase extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_global');
    }



    function index()
    {

        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_access() == 1) {

                $id_group     = $this->session->userdata('id_group');
                $where      = array('id_group' => $id_group);

                $data = array(
                    'contents' => 'Dashboard/Purchase/index',
                    'data' => $this->model_global->edit_data($where, 'purchase')->result()
                );
                $this->load->view('Layouts/warper', $data);
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }



    public function add()
    {
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_add() == 1) {




                $this->load->library('auto_number');

                $row = $this->model_global->id_p();

                $config['id'] = $row->id_purchase;
                $config['awalan'] = 'PO';
                $config['digit'] = 2;
                $this->auto_number->config($config);
                /* echo $this->auto_number->generate_id();
		        die();*/


                $data = array(
                    'contents' => 'Dashboard/Purchase/add',
                    'kodep' => $this->auto_number->generate_p(),
                );


                $this->load->view('Layouts/warper', $data);
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }

    public function add_action()
    {
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_add() == 1) {



                $po_number          = addslashes($this->input->post('po_number'));
                $raw_material             = addslashes($this->input->post('raw_material'));
                $item         = addslashes($this->input->post('item'));
                $vendor         = addslashes($this->input->post('vendor'));
                $date         = addslashes(date("Y-m-d"));
                $qty         = addslashes($this->input->post('qty'));
                $ammount         = addslashes($this->input->post('ammount'));
                $activation_date     = addslashes(date("Y-m-d H:i:s"));
                // $id_group =    addslashes($this->input->post('id_group'));

                $data = array(
                    'po_number' => $po_number,
                    'raw_material' => $raw_material,
                    'item' => $item,
                    'vendor' => $vendor,
                    'date' => $date,
                    'qty' => $qty,
                    'ammount' => $ammount,
                    'status' => 0,
                    'activation_date' => $activation_date,
                    'id_group' => 1,
                );



                $this->model_global->input_data($data, 'purchase');
                //log

                $assign_type = '';
                activity_log("Master Data -> Purchase", "Menambah data Satuan", $txt1, $assign_type);
                $this->session->set_flashdata('succeed', 'Sukses, Satu data telah berhasil disimpan.');
                redirect('Purchase');
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }

    public function delete($id)
    {
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_delete() == 1) {
                $where = array('id_purchase' => $id);
                $this->model_global->hapus_data($where, 'purchase');

                $this->session->set_flashdata('succeed', 'Satu Data  telah di hapus.');
                //log
                $assign_to  = '';
                $assign_type = '';
                activity_log("Master Data -> Satuan", "Menghapus data Satuan", $id, $assign_to, $assign_type);
                $this->session->set_flashdata('succeed', 'Sukses, Satu data telah berhasil dihapus.');
                redirect('Purchase');
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }

    public function edit($id)
    {
        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_edit() == 1) {
                $where = array('id_purchase' => $id);
                $data = array(
                    'contents' => 'Dashboard/Purchase/edit',
                    'data' => $this->model_global->edit_data($where, 'purchase')->row()
                );
                $this->load->view('Layouts/warper', $data);
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }

    public function update($id)
    {

        if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
            if ($this->model_user_access->access_edit() == 1) {

                // $txt1             = addslashes($this->input->post('txt1'));
                // $txt2             = addslashes($this->input->post('txt2'));
                // $modified_at     = addslashes(date("Y-m-d H:i:s"));

                // $data = array(
                //     'uom'           => $txt1,
                //     'keterangan'  => $txt2,
                //     'modified_at' => $modified_at
                // );



                $po_number          = addslashes($this->input->post('po_number'));
                $raw_material             = addslashes($this->input->post('raw_material'));
                $item         = addslashes($this->input->post('item'));
                $vendor         = addslashes($this->input->post('vendor'));
                $date         = addslashes(date("Y-m-d"));
                $qty         = addslashes($this->input->post('qty'));
                $ammount         = addslashes($this->input->post('ammount'));
                $activation_date     = addslashes(date("Y-m-d H:i:s"));
                // $id_group =    addslashes($this->input->post('id_group'));

                $data = array(
                    'po_number' => $po_number,
                    'raw_material' => $raw_material,
                    'item' => $item,
                    'vendor' => $vendor,
                    'date' => $date,
                    'qty' => $qty,
                    'ammount' => $ammount,
                    'status' => 0,
                    'activation_date' => $activation_date,
                    'id_group' => 1,
                );

                $where = array(
                    'id_purchase' => $id


                );




                $this->model_global->update_data($where, $data, 'purchase');
                $assign_type = '';
                activity_log("Master Data -> Purchase", "Mengubah data Purchase", $txt1, $assign_type);
                $this->session->set_flashdata('succeed', 'Sukses, Satu data telah berhasil diperbaharui.');
                redirect('Purchase');
            } else {
                $this->load->view('Layouts/error-404');
            }
        } else {
            session_destroy();
            redirect('dashboard');
        }
    }
}
