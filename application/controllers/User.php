<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		// $this->load->library('session');
		$data['category'] = $this->db->distinct()->select('categories_id')->get('venue')->result_array();
		$data['category_vendor'] = $this->db->distinct()->select('categories_id')->get('vendor')->result_array();
		$data['category_event'] = $this->db->distinct()->select('categories_id')->get('event')->result_array();
		$data['category_shop'] = $this->db->distinct()->select('categories_id')->get('shop')->result_array();
		$data['category_invites'] = $this->db->distinct()->select('categories_id')->get('e_invites')->result_array();
		$data['category_blog'] = $this->db->distinct()->select('categories_id')->get('blog')->result_array();
		$data['category_photo'] = $this->db->distinct()->select('categories_id')->get('photo')->result_array();
		$this->load->view('header',$data);
    } 
	public function index()
	{
		$categories_id=$this->input->post('categories_id');
		$data['category'] = $this->db->distinct()->select('categories_id')->get('venue')->result_array();
		$data['category_vendor'] = $this->db->distinct()->select('categories_id')->get('vendor')->result_array();
		$data['category_event'] = $this->db->distinct()->select('categories_id')->get('event')->result_array();
		$data['category_shop'] = $this->db->distinct()->select('categories_id')->get('shop')->result_array();
		$data['category_invites'] = $this->db->distinct()->select('categories_id')->get('e_invites')->result_array();
		$data['category_blog'] = $this->db->distinct()->select('categories_id')->get('blog')->result_array();
		$data['category_photo'] = $this->db->distinct()->select('categories_id')->get('photo')->result_array();
		$data['fetch_max']=$this->admin_model->get_maxmin_venue();
		$this->load->view('index',$data);
        $this->load->view('footer',$data);
	}

	// VENUE 

	public function venue()
	{
		
		// $id=$this->input->get('id');
		$categories_id=$this->input->post('categories_id');
		$id=$this->input->get('id');
		$data=array(
			'fetch_cat'=>$this->admin_model->fetchcategories(),
			'fetch'=>$this->admin_model->fetch_product_by_sub_categories($id),
		
			// 'fetch_sub_cat'=>$this->admin_model->fetchsubcategories_user($categories_id),
			'fetch_sub'=>$this->admin_model->fetch_product_sub_categories(),
			'fetch_max'=>$this->admin_model->get_maxmin_venue(),
		
		);
		
        // $this->load->view('header',$data);
		$this->load->view('venue',$data);
        $this->load->view('footer',$data);
	}

	// DETAILS OF VENUE
	public function venue_details()
	{
		$categories_id=$this->input->post('categories_id');
		$id=$this->input->get('id');
		$id=$this->input->get('id');
		$id=$this->input->get('id');
		$data=array(
			'fetch_cat'=>$this->admin_model->fetchcategories(),
			'fetch'=>$this->admin_model->fetch_product_by_id_sub_categories($id),
			// 'fetch_sub_cat'=>$this->admin_model->fetchsubcategories_user($categories_id),
			'fetch_sub'=>$this->admin_model->fetch_product_sub_categories(),
			'fetch_max'=>$this->admin_model->get_maxmin_venue(),
		);
        // $this->load->view('header',$data);
		$this->load->view('venue_details',$data);
        $this->load->view('footer',$data);
	}

	// VENDOR 

	public function vendors()
	{
		// $id=$this->input->get('id');
		$categories_id=$this->input->post('categories_id');
		$id=$this->input->get('id');
		$data=array(
			'fetch_cat'=>$this->admin_model->fetchcategories(),
			'fetch'=>$this->admin_model->fetch_vendor_by_sub_categories($id),
			// 'fetch_sub_cat'=>$this->admin_model->fetchsubcategories_user($categories_id),
			'fetch_sub'=>$this->admin_model->fetch_vendor_sub_categories(),
			'fetch_max'=>$this->admin_model->get_maxmin_vendor(),
			
		);
		
        // $this->load->view('header',$data);
		$this->load->view('vendors',$data);
        $this->load->view('footer',$data);
	}

		// DETAILS OF VENDOR
		public function vendor_details()
		{
			$categories_id=$this->input->post('categories_id');
			$id=$this->input->get('id');
			$id=$this->input->get('id');
			$id=$this->input->get('id');
			$data=array(
				'fetch_cat'=>$this->admin_model->fetchcategories(),
				// 'fetch'=>$this->admin_model->fetch_vendor_by_sub_categories($id),
				'fetch'=>$this->admin_model->fetch_vendor_by_id_sub_categories($id),
				// 'fetch_sub_cat'=>$this->admin_model->fetchsubcategories_user($categories_id),
				'fetch_sub'=>$this->admin_model->fetch_vendor_sub_categories(),
				'fetch_max'=>$this->admin_model->get_maxmin_vendor(),
			);
			// $this->load->view('header',$data);
			$this->load->view('vendor_details',$data);
			$this->load->view('footer',$data);
		}



		// SHOP 

	public function shop()
	{
		// $id=$this->input->get('id');
		$categories_id=$this->input->post('categories_id');
		$id=$this->input->get('id');
		$data=array(
			'fetch_cat'=>$this->admin_model->fetchcategories(),
			'fetch'=>$this->admin_model->fetch_shop_by_sub_categories($id),
			// 'fetch_sub_cat'=>$this->admin_model->fetchsubcategories_user($categories_id),
			'fetch_sub'=>$this->admin_model->fetch_shop_sub_categories(),
			'fetch_max'=>$this->admin_model->get_maxmin_shop(),
		);

		
        // $this->load->view('header',$data);
		$this->load->view('shop',$data);
        $this->load->view('footer',$data);
	}

		// DETAILS OF SHOP
		public function shop_details()
		{
			$categories_id=$this->input->post('categories_id');
			$id=$this->input->get('id');
			$id=$this->input->get('id');
			$id=$this->input->get('id');
			$data=array(
				'fetch_cat'=>$this->admin_model->fetchcategories(),
				// 'fetch'=>$this->admin_model->fetch_vendor_by_sub_categories($id),
				'fetch'=>$this->admin_model->fetch_shop_by_id_sub_categories($id),
				// 'fetch_sub_cat'=>$this->admin_model->fetchsubcategories_user($categories_id),
				'fetch_sub'=>$this->admin_model->fetch_shop_sub_categories(),
				'fetch_max'=>$this->admin_model->get_maxmin_shop(),
			);
			// $this->load->view('header',$data);
			$this->load->view('shop_details',$data);
			$this->load->view('footer',$data);
		}


		// BLOG 

	public function blog()
	{
		// $id=$this->input->get('id');
		$categories_id=$this->input->post('categories_id');
		$id=$this->input->get('id');
		$data=array(
			'fetch_cat'=>$this->admin_model->fetchcategories(),
			'fetch'=>$this->admin_model->fetch_blog_by_sub_categories($id),
			// 'fetch_sub_cat'=>$this->admin_model->fetchsubcategories_user($categories_id),
			'fetch_sub'=>$this->admin_model->fetch_blog_sub_categories(),
			'fetch_max'=>$this->admin_model->get_maxmin_venue(),
		);
		
        // $this->load->view('header',$data);
		$this->load->view('blog',$data);
        $this->load->view('footer',$data);
	}

		// DETAILS OF BLOG
		public function blog_details()
		{
			$categories_id=$this->input->post('categories_id');
			$id=$this->input->get('id');
			$id=$this->input->get('id');
			$id=$this->input->get('id');
			$data=array(
				'fetch_cat'=>$this->admin_model->fetchcategories(),
				// 'fetch'=>$this->admin_model->fetch_vendor_by_sub_categories($id),
				'fetch'=>$this->admin_model->fetch_blog_by_id_sub_categories($id),
				// 'fetch_sub_cat'=>$this->admin_model->fetchsubcategories_user($categories_id),
				'fetch_sub'=>$this->admin_model->fetch_blog_sub_categories(),
				'fetch_max'=>$this->admin_model->get_maxmin_venue(),
			);
			// $this->load->view('header',$data);
			$this->load->view('blog_details',$data);
			$this->load->view('footer',$data);
		}

				// EVENTS 

	public function event()
	{
		// $id=$this->input->get('id');
		$categories_id=$this->input->post('categories_id');
		$id=$this->input->get('id');
		$data=array(
			'fetch_cat'=>$this->admin_model->fetchcategories(),
			'fetch'=>$this->admin_model->fetch_event_by_sub_categories($id),
			// 'fetch_sub_cat'=>$this->admin_model->fetchsubcategories_user($categories_id),
			'fetch_sub'=>$this->admin_model->fetch_event_sub_categories(),
			'fetch_max'=>$this->admin_model->get_maxmin_events(),
		);
		
        // $this->load->view('header',$data);
		$this->load->view('event',$data);
        $this->load->view('footer',$data);
	}

		// DETAILS OF EVENT
		public function event_details()
		{
			$categories_id=$this->input->post('categories_id');
			$id=$this->input->get('id');
			$id=$this->input->get('id');
			$id=$this->input->get('id');
			$data=array(
				'fetch_cat'=>$this->admin_model->fetchcategories(),
				// 'fetch'=>$this->admin_model->fetch_vendor_by_sub_categories($id),
				'fetch'=>$this->admin_model->fetch_event_by_id_sub_categories($id),
				// 'fetch_sub_cat'=>$this->admin_model->fetchsubcategories_user($categories_id),
				'fetch_sub'=>$this->admin_model->fetch_event_sub_categories(),
				'fetch_max'=>$this->admin_model->get_maxmin_events(),
				
			);
			// $this->load->view('header',$data);
			$this->load->view('event_details',$data);
			$this->load->view('footer',$data);
		}

	// e_invites 

	public function e_invites()
	{
		// $id=$this->input->get('id');
		$categories_id=$this->input->post('categories_id');
		$id=$this->input->get('id');
		$data=array(
			'fetch_cat'=>$this->admin_model->fetchcategories(),
			'fetch'=>$this->admin_model->fetch_invites_by_sub_categories($id),
			// 'fetch_sub_cat'=>$this->admin_model->fetchsubcategories_user($categories_id),
			'fetch_sub'=>$this->admin_model->fetch_invites_sub_categories(),
			'fetch_max'=>$this->admin_model->get_maxmin_e_invites(),
		);
		
        // $this->load->view('header',$data);
		$this->load->view('e_invites',$data);
        $this->load->view('footer',$data);
	}

	// DETAILS OF e_invites
	public function e_invites_details()
	{
		$categories_id=$this->input->post('categories_id');
		$id=$this->input->get('id');
		$id=$this->input->get('id');
		$id=$this->input->get('id');
		$data=array(
			'fetch_cat'=>$this->admin_model->fetchcategories(),
			'fetch'=>$this->admin_model->fetch_invites_by_id_sub_categories($id),
			// 'fetch_sub_cat'=>$this->admin_model->fetchsubcategories_user($categories_id),
			'fetch_sub'=>$this->admin_model->fetch_invites_sub_categories(),
			'fetch_max'=>$this->admin_model->get_maxmin_e_invites(),
		);
        // $this->load->view('header',$data);
		$this->load->view('e_invites_details',$data);
        $this->load->view('footer',$data);
	}

	// MAIL FOR E-INVITES
	function booking_e_invites() {
        $email=$this->input->post('email');
        $planeserparty='PlaneServeParty';
		$subject="Your requirements sent to (Invitation Designer)- PlaneServeParty";
		//configure email settings
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user'] = 'Umaira3773@gmail.com';
		$config['smtp_pass'] = 'euvzniqfzpvwbuvq';
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n"; //use double quotes
		// $this->load->library('email', $config);
		$this ->email-> initialize($config);
		$message = '
		
<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

    <meta name="description" content="New Account Email Template.">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!-- 100% body table -->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                           
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
									<h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:25px;">Requirements Sent to - PlaneServeParty
									</h1>
									<p style="font-size:22px; color:#455056; margin:8px 0 0; line-height:24px;">
									Dear '.$this->input->post("name").'</p>
										<p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
										Your invitation requirements and contact details have been sent to:
										PlaneServeParty</p>
                                       <h2>NOW, YOU CAN CALL THE INVITATION DESIGNER</h2>
                                            

                                        <a href="https://wa.me/923348993918?"
                                            style="background:#20e277;text-decoration:none !important; display:inline-block; font-weight:500; margin-top:24px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Chat / Call</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">With Love Team PlaneServeParty  </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>
		';
		//send mail
		$this -> email -> set_newline("\r\n");
		$this -> email -> set_crlf("\r\n");
		$this -> email -> from('Umaira3773@gmail.com',$planeserparty);
		$this -> email -> to($email);
		$this -> email -> subject($subject);
		$this -> email -> message($message);
		if ($this ->email-> send()) {
			$id = $this->input->post('id');
		$data=array(
			'invite_name'=>$this->input->post('venue_name'),
			'invite_img'=>$this->input->post('pro_image'),
			'price'=>$this->input->post('price'),
			'total_card'=>$this->input->post('guest'),
			
			'user_name'=>$this->input->post('name'),
			'phone'=>$this->input->post('phone'),
			'email'=>$this->input->post('email'),
			'event_date'=>$this->input->post('date'),
		
			'invite_date'=>date('Y-m-d'),
          
		);

		if ($this ->admin_model->add_invites($data)) {
			// $msg=$this->session->set_flashdata('success', 'YOUR BOOKING DETAILS SEND ON YOUR EMAIL AND ADMIN WILL BE CONFIRM YOUR BOOKING IF AVAILABLE ON THIS DATE AND SEND YOU CONFIMATION EMAIL.');
			redirect("e_invites_details?id=$id");
		
		}
				
		} else {
			$id = $this->input->post('id');
			//error
			echo 'mail not send';
			print_r($this -> email -> print_debugger());
			redirect("e_invites_details?id=$id");
		}
		
	}




			// PHOTO 

	public function photos()
	{
		// $id=$this->input->get('id');
		$categories_id=$this->input->post('categories_id');
		$id=$this->input->get('id');
		$data=array(
			'fetch_cat'=>$this->admin_model->fetchcategories(),
			'fetch'=>$this->admin_model->fetch_photo_by_sub_categories($id),
			// 'fetch_sub_cat'=>$this->admin_model->fetchsubcategories_user($categories_id),
			'fetch_sub'=>$this->admin_model->fetch_photo_sub_categories(),
			'fetch_max'=>$this->admin_model->get_maxmin_venue(),
		);
		
        // $this->load->view('header',$data);
		$this->load->view('photos',$data);
        $this->load->view('footer',$data);
	}

	// BOOKING AND MAILING SYSTEM FOR VENUE
	function booking() {
        $email=$this->input->post('email');
        $planeserparty='PlaneServeParty';
		$subject="Your requirements sent to ".$this->input->post("venue_name")." - PlaneServeParty";
		//configure email settings
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user'] = 'Umaira3773@gmail.com';
		$config['smtp_pass'] = 'euvzniqfzpvwbuvq';
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n"; //use double quotes
		// $this->load->library('email', $config);
		$this ->email-> initialize($config);
		$message = '
		<!doctype html>
		<html lang="en-US">
		
		<head>
			<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		
			<meta name="description" content="New Account Email Template.">
			<style type="text/css">
				a:hover {text-decoration: underline !important;}
			</style>
		</head>
		
		<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
			<!-- 100% body table -->
			<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8">
				<tr>
					<td>
						<table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
							align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td style="height:80px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="text-align:center;">
								   
								</td>
							</tr>
							<tr>
								<td style="height:20px;">&nbsp;</td>
							</tr>
							<tr>
								<td>
									<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
										style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
										<tr>
											<td style="height:40px;">&nbsp;</td>
										</tr>
										<tr>
											<td style="padding:0 35px;">
												<h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:25px;">Requirements Sent to '.$this->input->post('venue_name').' - PlaneServeParty
												</h1>
												<p style="font-size:22px; color:#455056; margin:8px 0 0; line-height:24px;">
												Dear '.$this->input->post("name").'</p>
												<p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
												Your Venue requirements and contact details have been sent to:
												PlaneServeParty</p>
											   <h2>NOW, YOU CAN CALL THE VENUE</h2>
													
		
												<a href="https://wa.me/923348993918?"
													style="background:#20e277;text-decoration:none !important; display:inline-block; font-weight:500; margin-top:24px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Chat / Call</a>
											</td>
										</tr>
										<tr>
											<td style="height:40px;">&nbsp;</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="height:20px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="text-align:center;">
									<p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">With Love Team PlaneServeParty  </p>
								</td>
							</tr>
							<tr>
								<td style="height:80px;">&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<!--/100% body table-->
		</body>
		
		</html>
		';
		//send mail
		$this -> email -> set_newline("\r\n");
		$this -> email -> set_crlf("\r\n");
		$this -> email -> from('Umaira3773@gmail.com',$planeserparty);
		$this -> email -> to($email);
		$this -> email -> subject($subject);
		$this -> email -> message($message);
		if ($this ->email-> send()) {
			$id = $this->input->post('id');
		$data=array(
			'booking_name'=>$this->input->post('venue_name'),
			
			'price'=>$this->input->post('price'),
			'guest'=>$this->input->post('guest'),
			'city'=>$this->input->post('city'),
			'user_name'=>$this->input->post('name'),
			'phone'=>$this->input->post('phone'),
			'email'=>$this->input->post('email'),
			'event_date'=>$this->input->post('date'),
			'function_time'=>$this->input->post('time'),
			'booking_date'=>date('Y-m-d'),
          
		);

		if ($this ->admin_model->add_booking($data)) {
			// $msg=$this->session->set_flashdata('success', 'YOUR BOOKING DETAILS SEND ON YOUR EMAIL AND ADMIN WILL BE CONFIRM YOUR BOOKING IF AVAILABLE ON THIS DATE AND SEND YOU CONFIMATION EMAIL.');
			redirect("venue_details?id=$id");
		
		}
				
		} else {
			$id = $this->input->post('id');
			//error
			echo 'mail not send';
			print_r($this -> email -> print_debugger());
			redirect("venue_details?id=$id");
		}
		
	}


	
		// BOOKING AND MAILING SYSTEM FOR Vendor

		
		function booking_vendor() {
			$email=$this->input->post('email');
			$planeserparty='PlaneServeParty';
			$subject="Your requirements sent to ".$this->input->post("venue_name")." - PlaneServeParty";
			//configure email settings
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com';
			$config['smtp_port'] = '465';
			$config['smtp_timeout'] = '7';
			$config['smtp_user'] = 'Umaira3773@gmail.com';
			$config['smtp_pass'] = 'euvzniqfzpvwbuvq';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n"; //use double quotes
			// $this->load->library('email', $config);
			$this ->email-> initialize($config);
			$message = '
			<!doctype html>
		<html lang="en-US">
		
		<head>
			<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		
			<meta name="description" content="New Account Email Template.">
			<style type="text/css">
				a:hover {text-decoration: underline !important;}
			</style>
		</head>
		
		<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
			<!-- 100% body table -->
			<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8">
				<tr>
					<td>
						<table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
							align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td style="height:80px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="text-align:center;">
								   
								</td>
							</tr>
							<tr>
								<td style="height:20px;">&nbsp;</td>
							</tr>
							<tr>
								<td>
									<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
										style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
										<tr>
											<td style="height:40px;">&nbsp;</td>
										</tr>
										<tr>
											<td style="padding:0 35px;">
												<h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:25px;">Requirements Sent to '.$this->input->post('venue_name').' - PlaneServeParty
												</h1>
												<p style="font-size:22px; color:#455056; margin:8px 0 0; line-height:24px;">
									Dear '.$this->input->post("name").'</p>
												<p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
												Your Vender requirements and contact details have been sent to:
												PlaneServeParty</p>
											   <h2>NOW, YOU CAN CALL THE VENDER</h2>
													
		
												<a href="https://wa.me/923348993918?"
													style="background:#20e277;text-decoration:none !important; display:inline-block; font-weight:500; margin-top:24px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Chat / Call</a>
											</td>
										</tr>
										<tr>
											<td style="height:40px;">&nbsp;</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="height:20px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="text-align:center;">
									<p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">With Love Team PlaneServeParty  </p>
								</td>
							</tr>
							<tr>
								<td style="height:80px;">&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<!--/100% body table-->
		</body>
		
		</html>
			';
			//send mail
			$this -> email -> set_newline("\r\n");
			$this -> email -> set_crlf("\r\n");
			$this -> email -> from('Umaira3773@gmail.com',$planeserparty);
			$this -> email -> to($email);
			$this -> email -> subject($subject);
			$this -> email -> message($message);
			if ($this ->email-> send()) {
				$id = $this->input->post('id');
			$data=array(
				'booking_name'=>$this->input->post('venue_name'),
				'price'=>$this->input->post('price'),
				'guest'=>$this->input->post('guest'),
				'city'=>$this->input->post('city'),
				'user_name'=>$this->input->post('name'),
				'phone'=>$this->input->post('phone'),
				'email'=>$this->input->post('email'),
				'event_date'=>$this->input->post('date'),
				'function_time'=>$this->input->post('time'),
				'booking_date'=>date('Y-m-d'),
			);
		
				if ($this ->admin_model->add_booking($data)) {
				
					redirect("vendor_details?id=$id");
				}
			} else {
				$id = $this->input->post('id');
				//error
				echo 'mail not send';
				print_r($this -> email -> print_debugger());
				redirect("vendor_details?id=$id");
			}
			
		}

		// BOOKING AND MAILING SYSTEM FOR EVENT

		
		function eventbooking() {
			$email=$this->input->post('email');
			$planeserparty='PlaneServeParty';
			$subject="Your requirements sent to ".$this->input->post("venue_name")." - PlaneServeParty";
			//configure email settings
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com';
			$config['smtp_port'] = '465';
			$config['smtp_timeout'] = '7';
			$config['smtp_user'] = 'Umaira3773@gmail.com';
			$config['smtp_pass'] = 'euvzniqfzpvwbuvq';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n"; //use double quotes
			// $this->load->library('email', $config);
			$this ->email-> initialize($config);
			$message = '
			<!doctype html>
			<html lang="en-US">
			
			<head>
				<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
			
				<meta name="description" content="New Account Email Template.">
				<style type="text/css">
					a:hover {text-decoration: underline !important;}
				</style>
			</head>
			
			<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
				<!-- 100% body table -->
				<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8">
					<tr>
						<td>
							<table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
								align="center" cellpadding="0" cellspacing="0">
								<tr>
									<td style="height:80px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="text-align:center;">
									   
									</td>
								</tr>
								<tr>
									<td style="height:20px;">&nbsp;</td>
								</tr>
								<tr>
									<td>
										<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
											style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
											<tr>
												<td style="height:40px;">&nbsp;</td>
											</tr>
											<tr>
												<td style="padding:0 35px;">
													<h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:25px;">Requirements Sent to '.$this->input->post('venue_name').' - PlaneServeParty
													</h1>
													<p style="font-size:22px; color:#455056; margin:8px 0 0; line-height:24px;">
													Dear '.$this->input->post("name").'</p>
													<p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
													Your Event requirements and contact details have been sent to:
													PlaneServeParty</p>
												   <h2>NOW, YOU CAN CALL THE EVENT MANAGER</h2>
														
			
													<a href="https://wa.me/923348993918?"
														style="background:#20e277;text-decoration:none !important; display:inline-block; font-weight:500; margin-top:24px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Chat / Call</a>
												</td>
											</tr>
											<tr>
												<td style="height:40px;">&nbsp;</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td style="height:20px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="text-align:center;">
										<p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">With Love Team PlaneServeParty  </p>
									</td>
								</tr>
								<tr>
									<td style="height:80px;">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<!--/100% body table-->
			</body>
			
			</html>
			';
			//send mail
			$this -> email -> set_newline("\r\n");
			$this -> email -> set_crlf("\r\n");
			$this -> email -> from('Umaira3773@gmail.com',$planeserparty);
			$this -> email -> to($email);
			$this -> email -> subject($subject);
			$this -> email -> message($message);
			if ($this ->email-> send()) {
				$id = $this->input->post('id');
			$data=array(
				'booking_name'=>$this->input->post('venue_name'),
				'price'=>$this->input->post('price'),
				'guest'=>$this->input->post('guest'),
				'city'=>$this->input->post('city'),
				'user_name'=>$this->input->post('name'),
				'phone'=>$this->input->post('phone'),
				'email'=>$this->input->post('email'),
				'event_date'=>$this->input->post('date'),
				'function_time'=>$this->input->post('time'),
				'booking_date'=>date('Y-m-d'),
			  
			);
		
				if ($this ->admin_model->add_booking($data)) {
					$this->session->set_flashdata('success', 'Something is wrong.');
					redirect("event_details?id=$id");
				}
			} else {
				$id = $this->input->post('id');
				//error
				echo 'mail not send';
				print_r($this -> email -> print_debugger());
				redirect("event_details?id=$id");
			}
			
		}


		// CONTACT US

		public function contact()
		{
			$data['fetch_max']=$this->admin_model->get_maxmin_venue();
			$this->load->view('contact_us');
			$this->load->view('footer',$data);
		}

		// SEND CONTACT DATA ON EMAIL

	public function contactus() {

			// //get the form data
			$name = $this -> input -> post('name');
			$email = $this -> input -> post('email');
			$phone = $this -> input -> post('phone');
			$subject = $this -> input -> post('subject');
			$message = $this -> input -> post('message');
	
			// //set to_email id to which you want to receive mails
			// $to_email = 'demoe132@gmail.com';
	
			//configure email settings
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com';
			$config['smtp_port'] = '465';
			$config['smtp_timeout'] = '7';
			$config['smtp_user'] = 'Umaira3773@gmail.com';
			$config['smtp_pass'] = 'euvzniqfzpvwbuvq';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n"; //use double quotes
			// $this->load->library('email', $config);
			$this ->email-> initialize($config);
	
			//send mail
			$this -> email -> set_newline("\r\n");
			$this -> email -> set_crlf("\r\n");
			$this -> email -> from($email, $name);
			$this -> email -> to('Umaira3773@gmail.com');
			$this -> email -> message($phone);
			$this -> email -> subject($subject);
			$this -> email -> message($message);
			if ($this ->email-> send()) {
				
					redirect('contact_us');
				}
			else {
				//error
				echo 'mail not send';
				print_r($this -> email -> print_debugger());
				redirect('contact_us');
			}
		}
}
