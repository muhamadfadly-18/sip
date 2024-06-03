<?php
class Perusahaan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('model_global');

	}


	function index(){
		if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
			if ($this->model_user_access->access_access() == 1) {

				$DataPerusahaan = $this->db->query("SELECT * FROM ref_perusahaan")->result();


				$data = array('contents' => 'Dashboard/Perusahaan/index',
								'DataPerusahaan' => $DataPerusahaan
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

	public function add(){
		if ($this->session->userdata('name_user') and $this->session->userdata('username')) {
			if ($this->model_user_access->access_add() == 1) {

				$data = array('contents' => 'Dashboard/Perusahaan/add'
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

	public function add_action(){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_add() == 1){

				$nama_perusahaan = addslashes($this->input->post('nama_perusahaan'));
				$alamat = addslashes($this->input->post('alamat'));
				$no_telp = addslashes($this->input->post('no_telp'));
				$npwp = addslashes($this->input->post('npwp'));
				$pic = addslashes($this->input->post('pic'));
				$keterangan = addslashes($this->input->post('keterangan'));

				$data = array(
								'nama_perusahaan' => $nama_perusahaan,
								'alamat' => $alamat,
								'no_telp' => $no_telp,
								'npwp' => $npwp,
								'pic' => $pic,
								'keterangan' => $keterangan,
				            );

				$this->model_global->input_data($data,'ref_perusahaan');
				$this->session->set_flashdata('success', 'Data Perusahaan baru telah di simpan.');
				redirect('perusahaan');
				

			}else{
				$this->load->view('Layouts/error-404');
			}
		}else{
			session_destroy();
			redirect('dashboard');
		}
	}

	public function delete($id_perusahaan){
    	if($this->session->userdata('name_user') and $this->session->userdata('username')){
      		if($this->model_user_access->access_delete() == 1){

        		$where = array('id_perusahaan' => $id_perusahaan);
        
		        $this->model_global->hapus_data($where,'ref_perusahaan');
		        $this->session->set_flashdata('success', 'Perhatian, Data Perusahaan telah dihapus.');
		        redirect('perusahaan');
      
    	}else{
        		$this->load->view('Layouts/error-404');
      		}
    	}else{
      		session_destroy();
      		redirect('dashboard');
    	}
  	}


  	public function edit($id_perusahaan){
	    if($this->session->userdata('name_user') and $this->session->userdata('username')){
	      if($this->model_user_access->access_edit() == 1){

	        $where = array('id_perusahaan' => $id_perusahaan);

	        $data = array('contents' => 'Dashboard/Perusahaan/edit',
	        				'DataPerusahaan' => $this->db->query("SELECT * FROM ref_perusahaan WHERE id_perusahaan = '$id_perusahaan'")->row()
	                );
	        
	        $this->load->view('Layouts/warper', $data);
	     }else{
	        $this->load->view('Layouts/error-404');
	      }
	    }else{
	      session_destroy();
	      redirect('dashboard');
	    }
	}

	public function update($id_perusahaan){
		if($this->session->userdata('name_user') and $this->session->userdata('username')){
			if($this->model_user_access->access_edit() == 1){

				$where = array(
								'id_perusahaan' => $id_perusahaan
							);

				$nama_perusahaan = addslashes($this->input->post('nama_perusahaan'));
				$alamat = addslashes($this->input->post('alamat'));
				$no_telp = addslashes($this->input->post('no_telp'));
				$npwp = addslashes($this->input->post('npwp'));
				$pic = addslashes($this->input->post('pic'));
				$keterangan = addslashes($this->input->post('keterangan'));
				
				$data = array(
								'nama_perusahaan' => $nama_perusahaan,
								'alamat' => $alamat,
								'no_telp' => $no_telp,
								'npwp' => $npwp,
								'pic' => $pic,
								'keterangan' => $keterangan,
				            );
			 
				$this->model_global->update_data($where,$data,'ref_perusahaan');
				$this->session->set_flashdata('success', 'Data Perusahaan telah di perbarui.');
				redirect('perusahaan');

			
			}else{
				$this->load->view('Layouts/error-404');
			}
		}else{
			session_destroy(); 
			redirect('dashboard');
		}
	}

}
?>
