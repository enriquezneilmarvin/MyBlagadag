<?php
		Class Admin extends CI_controller{
			function __construct(){
				parent::__construct();
				$this->load->library('session');
				$this->load->library('form_validation');
				$this->load->helper(array('url','form','Blagadag_helper'));
				$this->load->model('admin_model');
				if(!$this->session->userdata('id')){
					redirect($routes['default_controller']);
				}
				if($this->session->userdata('status') == 1){
					redirect('members/home/userchecked');
				}
			}
			
			
			
			
			
			function index(){
				$this->load->view('admin/admin');
				
			}
			function adminchecked(){
				$admin_id = $this->session->userdata('id');
				//$this->db->where('admin_id',$admin_id);
				//$data['query'] = $this->admin_model->GetFolder();
				$data['title'] = "ADMIN PAGE";	
				$this->load->view('admin/admin_view',$data);
			}
			function ActiveAccounts(){
				$status = 1;
				$data['active'] = $this->admin_model->getActive($status);
				$this->load->view('admin/admin_accounts',$data);
			}
			function PendingAccounts(){
				$status = 0;
				$data['pending'] = $this->admin_model->getActive($status);
				$this->load->view('admin/admin_accounts',$data);
			}
			function BannedAccounts(){
				$status = 3;
				$data['banned'] = $this->admin_model->getActive($status);
				$this->load->view('admin/admin_accounts',$data);
			}
			
			function exportPdf(){
				$data['export'] = $this->admin_model->getUsers();
				$this->load->library('pdf');
				$this->pdf->load_view('admin/export',$data);
				$this->pdf->render();
				$this->pdf->stream('Userlist.pdf');
			}
			
			function exportExcel(){
				$data['export'] = $this->admin_model->getUsers();
				$this->load->view('admin/excel_view',$data);
			}
			
			function home(){
				redirect('admin/admin/adminchecked');
			}
			
			function unbanned($id){
				$save = array('status'=>1,'type'=> 'member');
				$this->db->where('id',$id);
				$this->db->update('personalinfo',$save);
				$message = alertMessage('Succesfully Unbanned The Current Member','success');
				$this->session->set_flashdata('message',$message);
				redirect('admin/admin/BannedAccounts');
			}
			function banned($id){
				$save = array('status'=>3,'type'=> 'banned');
				$this->db->where('id',$id);
				$this->db->update('personalinfo',$save);
				$message = alertMessage('Succesfully Banned The Current Member','success');
				$this->session->set_flashdata('message',$message);
				redirect('admin/admin/ActiveAccounts');
			}
			function accept($id){
				$save = array('status'=>1,'type'=> 'member');
				$this->db->where('id',$id);
				$this->db->update('personalinfo',$save);
				$message = alertMessage('Succesfully Accept The Current Member','success');
				$this->session->set_flashdata('message',$message);
				redirect('admin/admin/ActiveAccounts');
			
			}
			function decline($id){
				$delete = "Delete from personalinfo where id = '$id'";
				$this->db->query($delete);
				$message = alertMessage('Succesfully Declined','success');
				$this->session->set_flashdata('message',$message);
				redirect('admin/admin/ActiveAccounts');
			}
			function calendar(){
				$data['result'] = $this->admin_model->getCalendar();

				$this->load->view('admin/calendar',$data);
			}
			function deleteFolder($id){
				
			}
		}

?>