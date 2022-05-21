<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
class Admin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
        
    }

    // ADMIN LOGIN FORM

    public function index()
    {
    
		$this->load->view('admin/login');
        
    }

    // ADMIN LOGIN

	public function login()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
        
		$que=$this->db->query("select * from admin where username='$username' and password='$password'");
        if($que->num_rows() > 0) {
			$data  = $que->row_array();
			$name  = $data['username'];
			$password = $data['password'];
			$role = $data['role'];
			$sesdata = array(
				'username'  => $username,
				'password'			=> $password,
				'role'     => $role,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			if($role === '0') {
				redirect('admin/dashboard');
			} elseif($role === '1') {
				redirect('admin/products');
			}
		} else {
			$dataaa['error']="<p style='color:white;font-size: 15px; '>Invalid Username or Password !</p>";
		}
        $this->load->view('admin/login',@$dataaa);

	}

    // LOGOUT

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->sess_destroy(); 
		redirect('admin/index'); 
	}

    // UPDATE LOGIN ADMIN

	public function update_login_admin()
	{
		$id=$this->input->post("id");
		$record['username']=$this->input->post('username');
		$record['password']=$this->input->post('password');
        $record['email']=$this->input->post('email');
		if($this->admin_model->upate_login_admin($record, $id)) {}
		redirect('admin');
	}


    // VIEW 
    // DASHBOARD

	public function dashboard()
	{
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_countcomplete'=>$this->admin_model->countcomplete(),
            'fetch_countpending'=>$this->admin_model->countpending(),
            'fetch_confirm'=>$this->admin_model->countconfirm(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
	}
    }

    // MANAGE 
    // CATEGORIES

    public function categories()
	{
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $id=$this->input->get('id');
        $data=array(
        'fetch_data'=>$this->admin_model->fetchcategories(),
        'edite_data'=>$this->admin_model->editcategories($id),
        'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );  
        $this->load->view('admin/header',$data);
		$this->load->view('admin/categories',$data);
        $this->load->view('admin/footer');
    } 
	}
    
    // ADD 
    // CATEGORIES

    public function addcategories()
    {
        $data=array(
            'categories_name'=> $this->input->post('addcategories')
        );
        $this->admin_model->addcategories($data);
        redirect('admin/categories');
    }

    // DELETE
    // CATEGORIES

    public function deletecategories()
    {
        $id=$this->input->get('id');
        $this->admin_model->deletecategories($id);
        redirect('admin/categories');
    }

    // MANAGE 
    // SUB CATEGORIES

    public function sub_categories()
	{
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data['fetch_categories']=$this->admin_model->fetchcategories();
        $data['fetch_subcategories']=$this->admin_model->fetchsubcategories();
        $data['fetch_admin']=$this->admin_model->fetchadmin($email); 
        $this->load->view('admin/header',$data);
		$this->load->view('admin/sub_categories',$data);
        $this->load->view('admin/footer');
	}
    }  

    
    // EDIT SUB CATEGORY

    public function edit_subcategory()
    {
        $email=$this->session->userdata('username');
        $id=$this->input->get('id');
        $data['fetch_categories']=$this->admin_model->fetchcategories();
        $data['get_byid_subcategory']=$this->admin_model->get_byid_subcategory($id); 
        $data['fetch_admin']=$this->admin_model->fetchadmin($email); 
        $this->load->view('admin/header',$data);
		$this->load->view('admin/edit_subcat',$data);
        $this->load->view('admin/footer');
    }


    // UPDATE SUB CATEGORY

    public function updatesubcategory()
    {
        $id= $this->input->post('id');
        $category=$this->input->post("category");
		$subcategories=$this->input->post("subcategories");
        $config=array('file_name'=>time(),
		'allowed_types'=> "*",
		'upload_path'=>'assets/img'
	    );
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('image'))
        {
		$imageData=$this->upload->data();
		$fileName=$imageData['file_name'];
		$record['subcat_image']=$fileName;
        }
        $record['categories_id']=$this->input->post('category') ;
        $record['sub_categories']=$this->input->post('subcategories') ;
        $this->admin_model->updatesubcateogry($record,$id);
        redirect('admin/sub_categories');
    }

    // DELETE
    // SUB CATEGORIES

    public function deletesubcategories()
    {
        $id=$this->input->get('id');
        $this->admin_model->deletesubcategories($id);
        redirect('admin/sub_categories');
    }

    // ADD 
    // SUB CATEGORIES

    public function addsubcategories()
    {
        $config=array('file_name'=>time(),
		'allowed_types'=> "*",
		'upload_path'=>'assets/img'
	    );
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('image'))
        {
		$imageData=$this->upload->data();
		$fileName=$imageData['file_name'];
		$record['subcat_image']=$fileName;
        $record['categories_id']=$this->input->post('category') ;
        $record['sub_categories']=$this->input->post('addsubcategories') ;
        $this->admin_model->addsubcategories($record);
        redirect('admin/sub_categories');
        }
    }


    // FETCH SUB CATEGORIES 
    // BASE ON CATEGORIES
      
    public function get_sub_cat()
    {
        $categories_id=$this->input->post('categories_id');
        $subcategorie=$this->admin_model->subcategorie($categories_id);
        if(count($subcategorie)>0)
        {
          $sub_cat_box='';
          $sub_cat_box .='<option value=""> Select Sub Category </option>';
          foreach($subcategorie as $subcate)
          {
          $sub_cat_box .='<option value="'.$subcate->sub_id.'">'.$subcate->sub_categories.'</option>';
          }
          echo json_encode($sub_cat_box); 
        }

    }

    // ----------------------------------------VENUES SECTION-----------------------------------------------

      // FETCH
     //   VENUES

	public function venue()
	{
        
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetch_all_venue(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/venue',$data);
        $this->load->view('admin/footer');
	}
    }
    // FETCH
    // CATEGORIES IN DROPDOWN
    // IN ADD_VENUES FILE

	public function add_venue()
	{
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetchcategories(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/add_venue',$data);
        $this->load->view('admin/footer');
	}
    }
    
    // ADD 
    // VENUES

    public function addvenue()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $config=array('file_name'=>time(),
		'allowed_types'=> "*",
		'upload_path'=>'assets/img'
	    );
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('venue_image'))
        {
		$imageData=$this->upload->data();
		$fileName=$imageData['file_name'];
		$record['image']=$fileName;
        $record['categories_id']=$this->input->post('category') ;
        $record['sub_category']=$this->input->post('sub_category') ;
		$record['name']=$this->input->post('venue_name') ;
		$record['price']=$this->input->post('venue_price') ;
        $record['city']=$this->input->post('venue_city') ;
		
		$record['description']=$this->input->post('short_des') ;
        $record['long_description']=$this->input->post('long_des') ;
        // $record['add_by']=$this->session->userdata('username');
		$this->admin_model->addvenue($record);
        redirect('admin/venue');
        }
        }
    }
   

    // DELETE
    // VENUE

    public function deletevenue()
    {
        $id=$this->input->get('id');
        $this->admin_model->delete_venue($id);
        redirect('admin/venue');
    }

    // EDIT
    // VENUE

    public function edit_venue()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $data["edit_data"]=$this->admin_model->edit_venue($id);
        $data["fetch_data"]=$this->admin_model->fetchcategories();
        $data['fetch_admin']=$this->admin_model->fetchadmin($email);
        $this->load->view('admin/header',$data);
		$this->load->view('admin/edit_venue',$data);
        $this->load->view('admin/footer');
    }
    }

      // UPDATE VENUE

      public function updatevenue()
      {
          $id= $this->input->post('id');
        //   $category=$this->input->post("category");
        //   $subcategories=$this->input->post("subcategories");
          $config=array(
          'allowed_types'=> "*",
          'upload_path'=>'assets/img'
          );
          $this->upload->initialize($config);
          if($this->upload->do_upload('venue_image'))
          {
          $imageData=$this->upload->data();
          $fileName=$imageData['file_name'];
          $record['image']=$fileName;
          }
          $record['name']=$this->input->post('venue_name') ;
          $record['price']=$this->input->post('venue_price') ;
          $record['city']=$this->input->post('venue_city') ;
          
          $record['description']=$this->input->post('short_des') ;
          $record['long_description']=$this->input->post('long_des') ;
          $this->admin_model->updatevenue($record,$id);
        
          redirect('admin/venue');
      }

    // ----------------------------------------VENDOR SECTION-----------------------------------------------

      // FETCH
     //   VENDOR

	public function vendor()
	{
        
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetch_all_vendor(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/vendor',$data);
        $this->load->view('admin/footer');
	}
    }
    // FETCH
    // CATEGORIES IN DROPDOWN
    // IN ADD_VENDOR FILE

	public function add_vendor()
	{
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetchcategories(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/add_vendor',$data);
        $this->load->view('admin/footer');
	}
    }
    
    // ADD 
    // VENDOR

    public function addvendor()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $config=array('file_name'=>time(),
		'allowed_types'=> "*",
		'upload_path'=>'assets/img'
	    );
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('venue_image'))
        {
		$imageData=$this->upload->data();
		$fileName=$imageData['file_name'];
		$record['image']=$fileName;
        $record['categories_id']=$this->input->post('category') ;
        $record['sub_category']=$this->input->post('sub_category') ;
		$record['name']=$this->input->post('venue_name') ;
		$record['price']=$this->input->post('venue_price') ;
        $record['city']=$this->input->post('venue_city') ;
		
		$record['description']=$this->input->post('short_des') ;
        $record['long_description']=$this->input->post('long_des') ;
        // $record['add_by']=$this->session->userdata('username');
		$this->admin_model->addvendor($record);
        redirect('admin/vendor');
        }
        }
    }
   

    // DELETE
    // VENDOR

    public function deletevendor()
    {
        $id=$this->input->get('id');
        $this->admin_model->delete_vendor($id);
        redirect('admin/vendor');
    }

    // EDIT
    // VENDOR

    public function edit_vendor()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $data["edit_data"]=$this->admin_model->edit_vendor($id);
        $data["fetch_data"]=$this->admin_model->fetchcategories();
        $data['fetch_admin']=$this->admin_model->fetchadmin($email);
        $this->load->view('admin/header',$data);
		$this->load->view('admin/edit_vendor',$data);
        $this->load->view('admin/footer');
    }
    }

      // UPDATE VENDOR

      public function updatevendor()
      {
          $id= $this->input->post('id');
        //   $category=$this->input->post("category");
        //   $subcategories=$this->input->post("subcategories");
          $config=array(
          'allowed_types'=> "*",
          'upload_path'=>'assets/img'
          );
          $this->upload->initialize($config);
          if($this->upload->do_upload('venue_image'))
          {
          $imageData=$this->upload->data();
          $fileName=$imageData['file_name'];
          $record['image']=$fileName;
          }
          $record['name']=$this->input->post('venue_name') ;
          $record['price']=$this->input->post('venue_price') ;
          $record['city']=$this->input->post('venue_city') ;
          
          $record['description']=$this->input->post('short_des') ;
          $record['long_description']=$this->input->post('long_des') ;
          $this->admin_model->updatevendor($record,$id);
        
          redirect('admin/vendor');
      }


      // ----------------------------------------E-INVITES SECTION-----------------------------------------------

      // FETCH
     //   E-INVITES

	public function e_invites()
	{
        
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetch_all_invites(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/e_invites',$data);
        $this->load->view('admin/footer');
	}
    }
    // FETCH
    // CATEGORIES IN DROPDOWN
    // IN E-INVITES FILE

	public function add_invites()
	{
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetchcategories(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/add_e_invites',$data);
        $this->load->view('admin/footer');
	}
    }
    
    // ADD 
    // E-INVITES

    public function addinvites()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $config=array('file_name'=>time(),
		'allowed_types'=> "*",
		'upload_path'=>'assets/img'
	    );
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('venue_image'))
        {
		$imageData=$this->upload->data();
		$fileName=$imageData['file_name'];
		$record['image']=$fileName;
        $record['categories_id']=$this->input->post('category') ;
        $record['sub_category']=$this->input->post('sub_category') ;
		$record['name']=$this->input->post('venue_name') ;
		$record['price']=$this->input->post('venue_price') ;
	
		$record['description']=$this->input->post('short_des') ;
        $record['long_description']=$this->input->post('long_des') ;
        // $record['add_by']=$this->session->userdata('username');
		$this->admin_model->addinvites($record);
        redirect('admin/e_invites');
        }
        }
    }
   

    // DELETE
    // VENDOR

    public function deleteinvites()
    {
        $id=$this->input->get('id');
        $this->admin_model->delete_invites($id);
        redirect('admin/e_invites');
    }

    // EDIT
    // E-INVITES

    public function edit_e_invites()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $data["edit_data"]=$this->admin_model->edit_invites($id);
        $data["fetch_data"]=$this->admin_model->fetchcategories();
        $data['fetch_admin']=$this->admin_model->fetchadmin($email);
        $this->load->view('admin/header',$data);
		$this->load->view('admin/edit_e_invites',$data);
        $this->load->view('admin/footer');
    }
    }

      // UPDATE E-INVITES

      public function updateinvites()
      {
          $id= $this->input->post('id');
        //   $category=$this->input->post("category");
        //   $subcategories=$this->input->post("subcategories");
          $config=array(
          'allowed_types'=> "*",
          'upload_path'=>'assets/img'
          );
          $this->upload->initialize($config);
          if($this->upload->do_upload('venue_image'))
          {
          $imageData=$this->upload->data();
          $fileName=$imageData['file_name'];
          $record['image']=$fileName;
          }
          $record['name']=$this->input->post('venue_name') ;
          $record['price']=$this->input->post('venue_price') ;
        //   $record['city']=$this->input->post('venue_city') ;
          
          $record['description']=$this->input->post('short_des') ;
          $record['long_description']=$this->input->post('long_des') ;
          $this->admin_model->updateinvites($record,$id);
        
          redirect('admin/e_invites');
      }


        // ----------------------------------------EVENTS SECTION-----------------------------------------------

      // FETCH
     //   EVENTS

	public function event()
	{
        
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetch_all_event(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/event',$data);
        $this->load->view('admin/footer');
	}
    }
    // FETCH
    // CATEGORIES IN DROPDOWN
    // IN ADD_EVENT FILE

	public function add_event()
	{
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetchcategories(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/add_event',$data);
        $this->load->view('admin/footer');
	}
    }
    
    // ADD 
    // EVENT

    public function addevent()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $config=array('file_name'=>time(),
		'allowed_types'=> "*",
		'upload_path'=>'assets/img'
	    );
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('venue_image'))
        {
		$imageData=$this->upload->data();
		$fileName=$imageData['file_name'];
		$record['image']=$fileName;
        $record['categories_id']=$this->input->post('category') ;
        $record['sub_category']=$this->input->post('sub_category') ;
		$record['name']=$this->input->post('venue_name') ;
		$record['price']=$this->input->post('venue_price') ;
        $record['city']=$this->input->post('venue_city') ;
		
		$record['description']=$this->input->post('short_des') ;
        $record['long_description']=$this->input->post('long_des') ;
        // $record['add_by']=$this->session->userdata('username');
		$this->admin_model->addevent($record);
        redirect('admin/event');
        }
        }
    }
   

    // DELETE
    // EVENT

    public function deleteevent()
    {
        $id=$this->input->get('id');
        $this->admin_model->delete_event($id);
        redirect('admin/event');
    }

    // EDIT
    // EVENT

    public function edit_event()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $data["edit_data"]=$this->admin_model->edit_event($id);
        $data["fetch_data"]=$this->admin_model->fetchcategories();
        $data['fetch_admin']=$this->admin_model->fetchadmin($email);
        $this->load->view('admin/header',$data);
		$this->load->view('admin/edit_event',$data);
        $this->load->view('admin/footer');
    }
    }

      // UPDATE EVENT

      public function updateevent()
      {
          $id= $this->input->post('id');
        //   $category=$this->input->post("category");
        //   $subcategories=$this->input->post("subcategories");
          $config=array(
          'allowed_types'=> "*",
          'upload_path'=>'assets/img'
          );
          $this->upload->initialize($config);
          if($this->upload->do_upload('venue_image'))
          {
          $imageData=$this->upload->data();
          $fileName=$imageData['file_name'];
          $record['image']=$fileName;
          }
          $record['name']=$this->input->post('venue_name') ;
          $record['price']=$this->input->post('venue_price') ;
          $record['city']=$this->input->post('venue_city') ;
          
          $record['description']=$this->input->post('short_des') ;
          $record['long_description']=$this->input->post('long_des') ;
          $this->admin_model->updateevent($record,$id);
        
          redirect('admin/event');
      }


        // ----------------------------------------SHOP SECTION-----------------------------------------------

      // FETCH
     //   SHOP

	public function shop()
	{
        
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetch_all_shop(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/shop',$data);
        $this->load->view('admin/footer');
	}
    }
    // FETCH
    // CATEGORIES IN DROPDOWN
    // IN ADD_SHOP FILE

	public function add_shop()
	{
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetchcategories(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/add_shop',$data);
        $this->load->view('admin/footer');
	}
    }
    
    // ADD 
    // SHOP

    public function addshop()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $config=array('file_name'=>time(),
		'allowed_types'=> "*",
		'upload_path'=>'assets/img'
	    );
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('venue_image'))
        {
		$imageData=$this->upload->data();
		$fileName=$imageData['file_name'];
		$record['image']=$fileName;
        $record['categories_id']=$this->input->post('category') ;
        $record['sub_category']=$this->input->post('sub_category') ;
		$record['name']=$this->input->post('venue_name') ;
		$record['price']=$this->input->post('venue_price') ;
        $record['city']=$this->input->post('venue_city') ;
		
		$record['description']=$this->input->post('short_des') ;
        $record['long_description']=$this->input->post('long_des') ;
        // $record['add_by']=$this->session->userdata('username');
		$this->admin_model->addshop($record);
        redirect('admin/shop');
        }
        }
    }
   

    // DELETE
    // SHOP

    public function deleteshop()
    {
        $id=$this->input->get('id');
        $this->admin_model->delete_shop($id);
        redirect('admin/shop');
    }

    // EDIT
    // SHOP

    public function edit_shop()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $data["edit_data"]=$this->admin_model->edit_shop($id);
        $data["fetch_data"]=$this->admin_model->fetchcategories();
        $data['fetch_admin']=$this->admin_model->fetchadmin($email);
        $this->load->view('admin/header',$data);
		$this->load->view('admin/edit_shop',$data);
        $this->load->view('admin/footer');
    }
    }

      // UPDATE SHOP

      public function updateshop()
      {
          $id= $this->input->post('id');
        //   $category=$this->input->post("category");
        //   $subcategories=$this->input->post("subcategories");
          $config=array(
          'allowed_types'=> "*",
          'upload_path'=>'assets/img'
          );
          $this->upload->initialize($config);
          if($this->upload->do_upload('venue_image'))
          {
          $imageData=$this->upload->data();
          $fileName=$imageData['file_name'];
          $record['image']=$fileName;
          }
          $record['name']=$this->input->post('venue_name') ;
          $record['price']=$this->input->post('venue_price') ;
          $record['city']=$this->input->post('venue_city') ;
          
          $record['description']=$this->input->post('short_des') ;
          $record['long_description']=$this->input->post('long_des') ;
          $this->admin_model->updateshop($record,$id);
        
          redirect('admin/shop');
      }


      // ----------------------------------------BLOG SECTION-----------------------------------------------

      // FETCH
     //   BLOG

	public function blog()
	{
        
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetch_all_blog(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/blog',$data);
        $this->load->view('admin/footer');
	}
    }
    // FETCH
    // CATEGORIES IN DROPDOWN
    // IN ADD_BLOG FILE

	public function add_blog()
	{
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetchcategories(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/add_blog',$data);
        $this->load->view('admin/footer');
	}
    }
    
    // ADD 
    // BLOG

    public function addblog()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $config=array('file_name'=>time(),
		'allowed_types'=> "*",
		'upload_path'=>'assets/img'
	    );
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('venue_image'))
        {
		$imageData=$this->upload->data();
		$fileName=$imageData['file_name'];
		$record['image']=$fileName;
        $record['categories_id']=$this->input->post('category') ;
        $record['sub_category']=$this->input->post('sub_category') ;
		$record['name']=$this->input->post('venue_name') ;
		$record['date']=$this->input->post('blog_date') ;
        
		
		$record['description']=$this->input->post('short_des') ;
        $record['long_description']=$this->input->post('long_des') ;
        // $record['add_by']=$this->session->userdata('username');
        
		$this->admin_model->addblog($record);
        redirect('admin/blog');
        }
        }
    }
   

    // DELETE
    // BLOG

    public function deleteblog()
    {
        $id=$this->input->get('id');
        $this->admin_model->delete_blog($id);
        redirect('admin/blog');
    }

    // EDIT
    // BLOG

    public function edit_blog()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $data["edit_data"]=$this->admin_model->edit_blog($id);
        $data["fetch_data"]=$this->admin_model->fetchcategories();
        $data['fetch_admin']=$this->admin_model->fetchadmin($email);
        $this->load->view('admin/header',$data);
		$this->load->view('admin/edit_blog',$data);
        $this->load->view('admin/footer');
    }
    }

      // UPDATE BLOG

      public function updateblog()
      {
          $id= $this->input->post('id');
        //   $category=$this->input->post("category");
        //   $subcategories=$this->input->post("subcategories");
          $config=array(
          'allowed_types'=> "*",
          'upload_path'=>'assets/img'
          );
          $this->upload->initialize($config);
          if($this->upload->do_upload('venue_image'))
          {
          $imageData=$this->upload->data();
          $fileName=$imageData['file_name'];
          $record['image']=$fileName;
          }
          $record['name']=$this->input->post('venue_name') ;
          $record['date']=$this->input->post('blog_date') ;
         
          $record['description']=$this->input->post('short_des') ;
          $record['long_description']=$this->input->post('long_des') ;
          $this->admin_model->updateblog($record,$id);
        
          redirect('admin/blog');
      }


      // ----------------------------------------PHOTOS SECTION-----------------------------------------------

      // FETCH
     //   PHOTOS

	public function photos()
	{
        
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetch_all_photo(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/photos',$data);
        $this->load->view('admin/footer');
	}
    }
    // FETCH
    // CATEGORIES IN DROPDOWN
    // IN ADD_PHOTOS FILE

	public function add_photo()
	{
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $data=array(
            'fetch_data'=>$this->admin_model->fetchcategories(),
            'fetch_admin'=>$this->admin_model->fetchadmin($email),
        );
        $this->load->view('admin/header',$data);
		$this->load->view('admin/add_photo',$data);
        $this->load->view('admin/footer');
	}
    }
    
    // ADD 
    // PHOTOS

    public function addphoto()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $config=array('file_name'=>time(),
		'allowed_types'=> "*",
		'upload_path'=>'assets/img'
	    );
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('image'))
        {
		$imageData=$this->upload->data();
		$fileName=$imageData['file_name'];
		$record['photo']=$fileName;
        $record['categories_id']=$this->input->post('category') ;
        $record['sub_category']=$this->input->post('sub_category') ;
		$record['description']=$this->input->post('caption') ;
		
        
		$this->admin_model->addphoto($record);
        redirect('admin/photos');
        }
        }
 
    }
   

    // DELETE
    // PHOTO

    public function deletephoto()
    {
        $id=$this->input->get('id');
        $this->admin_model->delete_photo($id);
        redirect('admin/photos');
    }

    // EDIT
    // PHOTO

    public function edit_photo()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $id=$this->input->get('id');
        $data["edit_data"]=$this->admin_model->edit_photo($id);
        $data["fetch_data"]=$this->admin_model->fetchcategories();
        $data['fetch_admin']=$this->admin_model->fetchadmin($email);
        $this->load->view('admin/header',$data);
		$this->load->view('admin/edit_photo',$data);
        $this->load->view('admin/footer');
    }
    }

      // UPDATE Photo

      public function updatephoto()
      {
          $id= $this->input->post('id');
        //   $category=$this->input->post("category");
        //   $subcategories=$this->input->post("subcategories");
          $config=array(
          'allowed_types'=> "*",
          'upload_path'=>'assets/img'
          );
          $this->upload->initialize($config);
          if($this->upload->do_upload('image'))
          {
          $imageData=$this->upload->data();
          $fileName=$imageData['file_name'];
          $record['photo']=$fileName;
          }
          $record['description']=$this->input->post('caption') ;
          $this->admin_model->updatephoto($record,$id);
        
          redirect('admin/photos');
      }


    //   BOOKING

    public function bookings()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
       
        $data["fetch"]=$this->admin_model->fetch_booking();
        $data['fetch_admin']=$this->admin_model->fetchadmin($email);
        $this->load->view('admin/header',$data);
		$this->load->view('admin/bookings',$data);
        $this->load->view('admin/footer');

    }
    }
    // CONFIRM BOOKING
    public function confirm_bookings()
    {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
       
        $data["fetch"]=$this->admin_model->fetch_confirm_booking();
        $data['fetch_admin']=$this->admin_model->fetchadmin($email);
        $this->load->view('admin/header',$data);
		$this->load->view('admin/confirm_bookings',$data);
        $this->load->view('admin/footer');

    }
    }

    
     // COMPLETE BOOKING
     public function complete_booking()
     {
         if( !$this->session->userdata("username")) 
         {
         redirect('admin/login'); 
         }else{
         $email=$this->session->userdata('username');
        
         $data["fetch"]=$this->admin_model->fetch_complete_booking();
         $data['fetch_admin']=$this->admin_model->fetchadmin($email);
         $this->load->view('admin/header',$data);
         $this->load->view('admin/complete_booking',$data);
         $this->load->view('admin/footer');
 
    }
    }

      //  ............
	// DOWNLOAD COMPLETE BOOKINGS BTWEEN DATES
	// ...........
	public function report()
	{
		$from=$this->input->post('from');
        $to=$this->input->post('to');
        // $id=$this->input->post('id');
        // $id=$this->input->post('to');
		$data['fetch']=$this->admin_model->report_complete_booking($from,$to);
		$html = $this->load->view('admin/report_complete_booking',$data,true);
        $mpdf = new \Mpdf\Mpdf([
            'format'=>'A4',
        ]);
        $mpdf->WriteHTML($html);
		$file_name = 'CompleteBookingsReport.pdf';
        $mpdf->Output($file_name, 'D');
	}

      //  ............
	// DOWNLOAD ALL COMPLETE BOOKINGS
	// ...........
	public function allreport()
	{
		
		$data['fetch']=$this->admin_model->all_complete_booking();
		$html = $this->load->view('admin/report_complete_booking',$data,true);
        $mpdf = new \Mpdf\Mpdf([
            'format'=>'A4',
        ]);
        $mpdf->WriteHTML($html);
		$file_name = 'CompleteBookingsReport.pdf';
        $mpdf->Output($file_name, 'D');
	}

    // DOWNLOAD IN CSV FORM  ALL COMPLETE BOOKING 
    function export()
   {
     $file_name = 'CompleteBookingsReport'.date('Ymd').'.csv'; 
     header("Content-Description: File Transfer"); 
     header("Content-Disposition: attachment; filename=$file_name"); 
     header("Content-Type: application/csv;");
   
     // get data 
     $booking_data =$this->admin_model->all_complete_booking();

     // file creation 
     $file = fopen('php://output', 'w');
 
     $header = array("Booking Name","City","Event Date","Booking Date","Booking Status","User Name","Phone Number","Email","Guest","Price","Total Price"); 
     fputcsv($file, $header);
     foreach ($booking_data->result()as  $value)
     { 

		 $data=array( 
			 'booking_name'=>$value->booking_name,
			 'city'=>$value->city,
			 'event_date'=>$value->event_date,
             'booking_date'=>$value->booking_date,
			 'booking_status'=>$value->booking_status,
			 'user_name'=>$value->user_name,
			 'phone'=>$value->phone,
             'email'=>$value->email,
			 'guest'=>$value->guest,
			 'price'=>$value->price,
			 //'total_price'=>$value->total_price,
		 );
       fputcsv($file, $data); 
     }
     fclose($file); 
     exit; 
 }
	


    //  DELETE BOOKING

    public function deletbooking()
    {
       $id= $this->input->get('id');
       $this->admin_model->delete_booking($id);
       redirect('admin/bookings');
    }
 
      //  EDIT BOOKING

      public function edit_booking()
      {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $id=$this->input->get('id');
        $data["edit_data"]=$this->admin_model->edit_booking($id);
        $data['fetch_admin']=$this->admin_model->fetchadmin($email);
        $this->load->view('admin/header',$data);
		$this->load->view('admin/edit_booking',$data);
        $this->load->view('admin/footer');
        }
      }


    //   UPDATE BOOKING
    public function updatebooking()
    {
          $id= $this->input->post('id');
          $record['booking_name']=$this->input->post('booking_name') ;
          $record['city']=$this->input->post('city_name') ;
          $record['event_date']=$this->input->post('event_date') ;
          $record['booking_date']=$this->input->post('booking_date') ;
          $record['guest']=$this->input->post('guest') ;
          $record['function_time']=$this->input->post('function_time') ;
          $record['user_name']=$this->input->post('user_name') ;
          $record['phone']=$this->input->post('phone') ;
          $record['email']=$this->input->post('email') ;
      
          $this->admin_model->updatebooking($record,$id);
        
          redirect("admin/edit_booking?id=$id");
    }

      // UPDATE BOOKING STATUS 

	public function update_status(){
        $sid=$_GET['sid'];
		$svalue=$_GET['svalue'];
		if ($svalue=='complete') {
			$status='pending';
		} elseif($svalue=='confirm') {
			$status='complete';
		}
        else{
            $status='confirm';
        }
		$data = array(
			'booking_status' => $status
		);
		$this->db->where('booking_id',$sid);
		 $this->db->update('booking',$data);     
        //  print_r ($data);
        //  die();
         return redirect("admin/edit_booking?id=$sid");      
	}
   


    // MAIL SYSTEM

    function booking_mail() {
        $email=$this->input->post('email');
        $planeserparty='PlaneServeParty';
		$subject="Your reservation request for ".$this->input->post('booking_name').", ".$this->input->post('city_name')." has been ".$this->input->post('subject')." . Please review the details of your booking.";
		//configure email settings
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user'] = 'umaira3773@gmail.com';
		$config['smtp_pass'] = 'euvzniqfzpvwbuvq';
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n"; //use double quotes
		// $this->load->library('email', $config);
		$this ->email-> initialize($config);
        // $total=$this->input->post('price')*$this->input->post('guest');
		$message = '


	
        <p style="font-weight:bold; font-size:20px;" >Your reservation request for '.$this->input->post('booking_name').', '.$this->input->post('city_name').' has been '.$this->input->post('subject').'.  Please review the details of your booking.</p>
		 <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
         align="center" cellpadding="0" cellspacing="0">
        
         <h4>Details of your booking.</h4>
		  <tr>
		   <td >City</td>
		   <td>'.$this->input->post('city_name').'</td>
		  </tr>
		 
          <tr>
          <td >Event Date</td>
          <td>'.$this->input->post("event_date").'</td>
         </tr>
         <tr>
         <td>Booking Date</td>
         <td>'.$this->input->post("booking_date").'</td>
        </tr>
         <tr>
         <td>Function Time</td>
         <td>'.$this->input->post("function_time").'</td>
        </tr>
         <tr>
         <td>Booking Status</td>
         <td >'.$this->input->post("booking_status").'</td>
        </tr>

       
        <tr>
        <td> Price</td>
        <td>'.$this->input->post('price').'</td>
       </tr>
       <tr>
        <td>Guest</td>
        <td width="70%">'.$this->input->post('guest').'</td>
       </tr>
          <h4 style=""> Your Contact Details</h4>
		  <tr>
		   <td >User Name</td>
		   <td width="70%">'.$this->input->post('user_name').'</td>
		  </tr>
		  <tr>
		   <td >Your Phone</td>
		   <td >'.$this->input->post('phone').'</td>
		  </tr>
		  <tr>
		   <td >Your Email</td>
		   <td >'.$this->input->post("email").'</td>
		  </tr>
		 
		 </table>
		';
		//send mail
		$this -> email -> set_newline("\r\n");
		$this -> email -> set_crlf("\r\n");
		$this -> email -> from('umaira3773@gmail.com',$planeserparty);
		$this -> email -> to($email);
		$this -> email -> subject($subject);
		$this -> email -> message($message);
		if ($this ->email-> send()) {
			$id = $this->input->post('id');
            redirect("admin/edit_booking?id=$id");
		} else {
			//error
			echo 'mail not send';
			print_r($this -> email -> print_debugger());
			redirect('');
		}
		
	}


     //  INVITES BOOKING

     public function invites_bookings()
     {
         if( !$this->session->userdata("username")) 
         {
         redirect('admin/login'); 
         }else{
         $email=$this->session->userdata('username');
        
         $data["fetch"]=$this->admin_model->fetch_invites_booking();
         $data['fetch_admin']=$this->admin_model->fetchadmin($email);
         $this->load->view('admin/header',$data);
         $this->load->view('admin/invites_bookings',$data);
         $this->load->view('admin/footer');
 
     }
     }
     // CONFIRM INVITES BOOKING
     public function invites_confirm_bookings()
     {
         if( !$this->session->userdata("username")) 
         {
         redirect('admin/login'); 
         }else{
         $email=$this->session->userdata('username');
        
         $data["fetch"]=$this->admin_model->fetch_invites_confirm_booking();
         $data['fetch_admin']=$this->admin_model->fetchadmin($email);
         $this->load->view('admin/header',$data);
         $this->load->view('admin/invites_confirm_bookings',$data);
         $this->load->view('admin/footer');
 
     }
     }
 
     
      // COMPLETE INVITES BOOKING
      public function invites_complete_booking()
      {
          if( !$this->session->userdata("username")) 
          {
          redirect('admin/login'); 
          }else{
          $email=$this->session->userdata('username');
         
          $data["fetch"]=$this->admin_model->fetch_invites_complete_booking();
          $data['fetch_admin']=$this->admin_model->fetchadmin($email);
          $this->load->view('admin/header',$data);
          $this->load->view('admin/invites_complete_booking',$data);
          $this->load->view('admin/footer');
  
     }
     }

     //  DELETE BOOKING

    public function delet_invite_booking()
    {
       $id= $this->input->get('id');
       $this->admin_model->delete_invite_booking($id);
       redirect('admin/invites_bookings');
    }
 
      //  EDIT BOOKING

      public function edit_invite_booking()
      {
        if( !$this->session->userdata("username")) 
		{
		redirect('admin/login'); 
	    }else{
        $email=$this->session->userdata('username');
        $id=$this->input->get('id');
        $data["edit_data"]=$this->admin_model->edit_invite_booking($id);
        $data['fetch_admin']=$this->admin_model->fetchadmin($email);
        $this->load->view('admin/header',$data);
		$this->load->view('admin/edit_invite_booking',$data);
        $this->load->view('admin/footer');
        }
      }


    //   UPDATE BOOKING
    public function update_invite_booking()
    {
          $id= $this->input->post('id');
          $record['invite_name']=$this->input->post('booking_name') ;
         
          $record['event_date']=$this->input->post('event_date') ;
          $record['invite_date']=$this->input->post('booking_date') ;
          $record['total_card']=$this->input->post('guest') ;
         
          $record['user_name']=$this->input->post('user_name') ;
          $record['phone']=$this->input->post('phone') ;
          $record['email']=$this->input->post('email') ;
      
          $this->admin_model->update_invitation_booking($record,$id);
        
          redirect("admin/edit_invite_booking?id=$id");
    }

      // UPDATE INVITATION BOOKING STATUS 

	public function update_invite_status(){
        $sid=$_GET['sid'];
		$svalue=$_GET['svalue'];
		if ($svalue=='complete') {
			$status='pending';
		} elseif($svalue=='confirm') {
			$status='complete';
		}
        else{
            $status='confirm';
        }
		$data = array(
			'invite_status' => $status
		);
		$this->db->where('invite_id',$sid);
		 $this->db->update('e_invites_order',$data);     
      
         return redirect("admin/edit_invite_booking?id=$sid");      
	}
   
}
