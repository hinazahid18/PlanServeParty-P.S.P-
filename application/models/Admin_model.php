<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }


       // FETCH LOGIN ADMIN

       public function fetchadmin($id)  
       {  
          $this->db->where("username", $id);  
          $query = $this->db->get("admin");  
          return $query;  
       }
  
       // UPDATE LOGIN ADMIN INFORMATION
  
      public function upate_login_admin($user,$id)
      {
          $this->db->where('admin.id',$id);
          $this->db->update('admin',$user);
          return true;
      }

    // ADD CATEGORIES

    public function addcategories($data)
    {
        $this->db->insert("categories",$data);
        return true;
    }

    // FETCH CATEGORIES FORM DATABASE

    public function fetchcategories()
    {
        $this->db->select('*');
        $this->db->from('categories');
        // $this->db->order_by("id", "desc"); 
        $query=$this->db->get();
        return $query;
    }

    // EDIT CATEGORIES

    public function editcategories($id)
    {
        
        $this->db->where('categories_id',$id);
        $query=$this->db->get('categories');
        return $query;
    }

    // DELETE CATEGORIES

    public function deletecategories($id)
    {
        $tables = array('categories', 'sub_categories', 'photo','venue','vendor','blog','event','shop','e_invites');
        $this->db->where('categories_id', $id);
        $this->db->delete($tables);
        return true;
    }


    // ADD SUB CATEGORIES

    public function addsubcategories($data)
    {
        $this->db->insert("sub_categories",$data);
        return true;
    }

     // UPDATE SUB CATEGORY

     public function updatesubcateogry($user,$id)
     {
         $this->db->where('sub_categories.sub_id',$id);
         $this->db->update('sub_categories',$user);
         return true;
     }
    // FETCH SUB CATEGORIES BY ID

    public function get_byid_subcategory($id)
    {
        $this->db->select('*');
        $this->db->from('sub_categories');
        $this->db->join('categories','categories.categories_id = sub_categories.categories_id');
        $this->db->where('sub_categories.sub_id',$id);
        $query=$this->db->get();
		return $query;
    }

    // FETCH SUB CATEGORIES FORM DATABASE

    public function fetchsubcategories()
    {
        $this->db->select('*');
        $this->db->from('sub_categories');
        $this->db->join('categories','categories.categories_id = sub_categories.categories_id');
        $query=$this->db->get();
        return $query;
    }

     // DELETE SUB CATEGORY

     public function deletesubcategories($id)
     {
         $this->db->where('sub_id',$id);
         $this->db->delete("sub_categories");
         return true;
     }

      // FETCH SUB CATEGORIES BASE ON CATEGORIES

    public function subcategorie($categories_id)
    {
        $this->db->where('categories_id',$categories_id);
        $query=$this->db->get('sub_categories');
        return $query->result();
    }

     

      // .......................VENUE..............................

    // ADD VENUE

    public function addvenue($data)
    {
        $this->db->insert('venue',$data);
        return true;
    }

    // FETCH ALL VENUE AT ADMIN SIDE
    
    public function fetch_all_venue()
    {
        $this->db->select('*');
        $this->db->from('venue');
        $this->db->join('categories','categories.categories_id = venue.categories_id');
        $this->db->join('sub_categories','sub_categories.sub_id = venue.sub_category');
       
        $query=$this->db->get();
        return $query;
    }

    // MAX MIN PRICE VENUE
    public function get_maxmin_venue()
    {
        $this->db->select('MAX(price) as max_price, MIN(price) as min_price');
        return $this->db->get('venue');
    }
     // MAX MIN PRICE VENDOR
     public function get_maxmin_vendor()
     {
         $this->db->select('MAX(price) as max_price, MIN(price) as min_price');
         return $this->db->get('vendor');
     }
      // MAX MIN PRICE SHOP
    public function get_maxmin_shop()
    {
        $this->db->select('MAX(price) as max_price, MIN(price) as min_price');
        return $this->db->get('shop');
    }
 
    
     // MAX MIN PRICE EVENTS
     public function get_maxmin_events()
     {
         $this->db->select('MAX(price) as max_price, MIN(price) as min_price');
         return $this->db->get('event');
     }

     // MAX MIN PRICE e_invites
     public function get_maxmin_e_invites()
     {
         $this->db->select('MAX(price) as max_price, MIN(price) as min_price');
         return $this->db->get('e_invites');
     }
      // DELETE VENDOR

      public function delete_venue($id)
      {
          $this->db->where('venue_id', $id);
          $this->db->delete("venue");
          return true;
      }
  
      // EDIT VENDOR
  
      public function edit_venue($id)
      {
          $this->db->select('*');
          $this->db->from('venue');
          $this->db->join('categories','categories.categories_id = venue.categories_id');
          $this->db->join('sub_categories','sub_categories.sub_id = venue.sub_category');
      
          $this->db->where('venue.venue_id',$id);
  
          $query=$this->db->get();
          return $query;
      }

       // UPDATE VENUE

    public function updatevenue($user,$id)
    {
        $this->db->where('venue.venue_id',$id);
        $this->db->update('venue',$user);
        return true;
    }

    // FETCH VENUE BY CATEGORIES

    public function fetch_product_by_sub_categories($id)
    {
        $this->db->where("sub_category", $id ,'id',$id); 
        $query=$this->db->get('venue');
        return $query;
    }
 // FETCH venue BY ID USING 

 public function fetch_product_by_id_sub_categories($id)
 {
     $this->db->where('venue_id',$id); 
     $query=$this->db->get('venue');
     return $query;
 }
    public function fetch_product_sub_categories()
    {
        $this->db->select('*');
        $this->db->from('venue');
        $query=$this->db->get();
        return $query;
    }

     // FETCH SUBCATEGOREIS FOR USER SIDE NAVBAR
     public function fetchsubcategories_user($categories_id)
     {
         
         $this->db->select('*');
         $this->db->from('sub_categories');
         $this->db->where('categories_id',$categories_id);
         $query=$this->db->get();
         return $query;
     }


      // .......................E-INVITES..............................

    // ADD INVITES

    public function addinvites($data)
    {
        $this->db->insert('e_invites',$data);
        return true;
    }

    // FETCH ALL Invites AT ADMIN SIDE
    
    public function fetch_all_invites()
    {
        $this->db->select('*');
        $this->db->from('e_invites');
        $this->db->join('categories','categories.categories_id = e_invites.categories_id');
        $this->db->join('sub_categories','sub_categories.sub_id = e_invites.sub_category');
        $query=$this->db->get();
        return $query;
    }
 
      // DELETE Invites

      public function delete_invites($id)
      {
          $this->db->where('invites_id', $id);
          $this->db->delete("e_invites");
          return true;
      }
  
      // EDIT Invites
  
      public function edit_invites($id)
      {
          $this->db->select('*');
          $this->db->from('e_invites');
          $this->db->join('categories','categories.categories_id = e_invites.categories_id');
          $this->db->join('sub_categories','sub_categories.sub_id = e_invites.sub_category');
      
          $this->db->where('e_invites.invites_id',$id);
  
          $query=$this->db->get();
          return $query;
      }

       // UPDATE Invites

    public function updateinvites($user,$id)
    {
        $this->db->where('e_invites.invites_id',$id);
        $this->db->update('e_invites',$user);
        return true;
    }
  
      // FETCH Invites BY CATEGORIES

      public function fetch_invites_by_sub_categories($id)
      {
          $this->db->where("sub_category", $id ,'id',$id); 
          $query=$this->db->get('e_invites');
          return $query;
      }
   // FETCH e_invites BY ID USING 
  
   public function fetch_invites_by_id_sub_categories($id)
   {
       $this->db->where('invites_id',$id); 
       $query=$this->db->get('e_invites');
       return $query;
   }
      public function fetch_invites_sub_categories()
      {
          $this->db->select('*');
          $this->db->from('e_invites');
          $query=$this->db->get();
          return $query;
      }

     // .......................VENDOR..............................

    // ADD VENDOR

    public function addvendor($data)
    {
        $this->db->insert('vendor',$data);
        return true;
    }

    // FETCH ALL VENDOR AT ADMIN SIDE
    
    public function fetch_all_vendor()
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->join('categories','categories.categories_id = vendor.categories_id');
        $this->db->join('sub_categories','sub_categories.sub_id = vendor.sub_category');
        $query=$this->db->get();
        return $query;
    }
 
      // DELETE VENDOR

      public function delete_vendor($id)
      {
          $this->db->where('vendor_id', $id);
          $this->db->delete("vendor");
          return true;
      }
  
      // EDIT VENDOR
  
      public function edit_vendor($id)
      {
          $this->db->select('*');
          $this->db->from('vendor');
          $this->db->join('categories','categories.categories_id = vendor.categories_id');
          $this->db->join('sub_categories','sub_categories.sub_id = vendor.sub_category');
      
          $this->db->where('vendor.vendor_id',$id);
  
          $query=$this->db->get();
          return $query;
      }

       // UPDATE VENDOR

    public function updatevendor($user,$id)
    {
        $this->db->where('vendor.vendor_id',$id);
        $this->db->update('vendor',$user);
        return true;
    }
  
      // FETCH vendor BY CATEGORIES

      public function fetch_vendor_by_sub_categories($id)
      {
          $this->db->where("sub_category", $id ,'id',$id); 
          $query=$this->db->get('vendor');
          return $query;
      }
   // FETCH vendor BY ID USING 
  
   public function fetch_vendor_by_id_sub_categories($id)
   {
       $this->db->where('vendor_id',$id); 
       $query=$this->db->get('vendor');
       return $query;
   }
      public function fetch_vendor_sub_categories()
      {
          $this->db->select('*');
          $this->db->from('vendor');
          $query=$this->db->get();
          return $query;
      }
    
     // .......................EVENTS..............................

    // ADD EVENTS

    public function addevent($data)
    {
        $this->db->insert('event',$data);
        return true;
    }

    // FETCH ALL EVENTS AT ADMIN SIDE
    
    public function fetch_all_event()
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('categories','categories.categories_id = event.categories_id');
        $this->db->join('sub_categories','sub_categories.sub_id = event.sub_category');
        $query=$this->db->get();
        return $query;
    }
 
      // DELETE EVENTS

      public function delete_event($id)
      {
          $this->db->where('event_id', $id);
          $this->db->delete("event");
          return true;
      }
  
      // EDIT EVENT
  
      public function edit_event($id)
      {
          $this->db->select('*');
          $this->db->from('event');
          $this->db->join('categories','categories.categories_id = event.categories_id');
          $this->db->join('sub_categories','sub_categories.sub_id = event.sub_category');
      
          $this->db->where('event.event_id',$id);
  
          $query=$this->db->get();
          return $query;
      }

       // UPDATE EVENTS

    public function updateevent($user,$id)
    {
        $this->db->where('event.event_id',$id);
        $this->db->update('event',$user);
        return true;
    }

    // FETCH event BY CATEGORIES

    public function fetch_event_by_sub_categories($id)
    {
        $this->db->where("sub_category", $id ,'id',$id); 
        $query=$this->db->get('event');
        return $query;
    }
 // FETCH event BY ID USING 

 public function fetch_event_by_id_sub_categories($id)
 {
     $this->db->where('event_id',$id); 
     $query=$this->db->get('event');
     return $query;
 }
    public function fetch_event_sub_categories()
    {
        $this->db->select('*');
        $this->db->from('event');
        $query=$this->db->get();
        return $query;
    }

    // .......................SHOP..............................

    // ADD SHOP

    public function addshop($data)
    {
        $this->db->insert('shop',$data);
        return true;
    }

    // FETCH ALL SHOPS AT ADMIN SIDE
    
    public function fetch_all_shop()
    {
        $this->db->select('*');
        $this->db->from('shop');
        $this->db->join('categories','categories.categories_id = shop.categories_id');
        $this->db->join('sub_categories','sub_categories.sub_id = shop.sub_category');
        $query=$this->db->get();
        return $query;
    }
 
      // DELETE SHOP

      public function delete_shop($id)
      {
          $this->db->where('shop_id', $id);
          $this->db->delete("shop");
          return true;
      }
  
      // EDIT SHOP
  
      public function edit_shop($id)
      {
          $this->db->select('*');
          $this->db->from('shop');
          $this->db->join('categories','categories.categories_id = shop.categories_id');
          $this->db->join('sub_categories','sub_categories.sub_id = shop.sub_category');
      
          $this->db->where('shop.shop_id',$id);
  
          $query=$this->db->get();
          return $query;
      }

       // UPDATE SHOP

    public function updateshop($user,$id)
    {
        $this->db->where('shop.shop_id',$id);
        $this->db->update('shop',$user);
        return true;
    }

    // FETCH shop BY CATEGORIES

    public function fetch_shop_by_sub_categories($id)
    {
        $this->db->where("sub_category", $id ,'id',$id); 
        $query=$this->db->get('shop');
        return $query;
    }
 // FETCH venue BY ID USING 

 public function fetch_shop_by_id_sub_categories($id)
 {
     $this->db->where('shop_id',$id); 
     $query=$this->db->get('shop');
     return $query;
 }
    public function fetch_shop_sub_categories()
    {
        $this->db->select('*');
        $this->db->from('shop');
        $query=$this->db->get();
        return $query;
    }

     // .......................BLOG..............................

    // ADD BLOG

    public function addblog($data)
    {
        $this->db->insert('blog',$data);
        return true;
    }

    // FETCH ALL BLOG AT ADMIN SIDE
    
    public function fetch_all_blog()
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->join('categories','categories.categories_id = blog.categories_id');
        $this->db->join('sub_categories','sub_categories.sub_id = blog.sub_category');
        $query=$this->db->get();
        return $query;
    }
 
      // DELETE BLOG

      public function delete_blog($id)
      {
          $this->db->where('blog_id', $id);
          $this->db->delete("blog");
          return true;
      }
  
      // EDIT BLOG
  
      public function edit_blog($id)
      {
          $this->db->select('*');
          $this->db->from('blog');
          $this->db->join('categories','categories.categories_id = blog.categories_id');
          $this->db->join('sub_categories','sub_categories.sub_id = blog.sub_category');
          $this->db->where('blog.blog_id',$id);
          $query=$this->db->get();
          return $query;
      }

       // UPDATE BLOG

    public function updateblog($user,$id)
    {
        $this->db->where('blog.blog_id',$id);
        $this->db->update('blog',$user);
        return true;
    }

      // FETCH blog BY CATEGORIES

      public function fetch_blog_by_sub_categories($id)
      {
          $this->db->where("sub_category", $id ,'id',$id); 
          $query=$this->db->get('blog');
          return $query;
      }
   // FETCH blog BY ID USING 
  
   public function fetch_blog_by_id_sub_categories($id)
   {
       $this->db->where('blog_id',$id); 
       $query=$this->db->get('blog');
       return $query;
   }
      public function fetch_blog_sub_categories()
      {
          $this->db->select('*');
          $this->db->from('blog');
          $query=$this->db->get();
          return $query;
      }



      // .......................PHOTO..............................

    // ADD PHOTO

    public function addphoto($data){ 
        $insert = $this->db->insert('photo',$data); 
        return true; 
    } 

    // FETCH ALL PHOTO AT ADMIN SIDE
    
    public function fetch_all_photo()
    {
        $this->db->select('*');
        $this->db->from('photo');
        $this->db->join('categories','categories.categories_id = photo.categories_id');
        $this->db->join('sub_categories','sub_categories.sub_id = photo.sub_category');
        $query=$this->db->get();
        return $query;
    }
 
      // DELETE PHOTO

      public function delete_photo($id)
      {
          $this->db->where('photo_id', $id);
          $this->db->delete("photo");
          return true;
      }
  
      // EDIT PHOTO
  
      public function edit_photo($id)
      {
          $this->db->select('*');
          $this->db->from('photo');
          $this->db->join('categories','categories.categories_id = photo.categories_id');
          $this->db->join('sub_categories','sub_categories.sub_id = photo.sub_category');
          $this->db->where('photo.photo_id',$id);
          $query=$this->db->get();
          return $query;
      }

       // UPDATE PHOTO

    public function updatephoto($user,$id)
    {
        $this->db->where('photo.photo_id',$id);
        $this->db->update('photo',$user);
        return true;
    }



      // FETCH PHOTO BY CATEGORIES

      public function fetch_photo_by_sub_categories($id)
      {
          $this->db->where("sub_category", $id ,'id',$id); 
          $query=$this->db->get('photo');
          return $query;
      }
   // FETCH photo BY ID USING 
  
   public function fetch_photo_by_id_sub_categories($id)
   {
       $this->db->where('photo_id',$id); 
       $query=$this->db->get('photo');
       return $query;
   }
      public function fetch_photo_sub_categories()
      {
          $this->db->select('*');
          $this->db->from('photo');
          $query=$this->db->get();
          return $query;
      }



    //   BOOKING

    public function add_booking($data)
    {
        $this->db->insert('booking',$data);
        return true;
    }

    // DELET BOOKING

    public function delete_booking($id)
    {
        $this->db->where('booking_id',$id);
        $this->db->delete('booking');
        return true;
    }

     // EDIT BOOKING

     public function edit_booking($id)
     {
         $this->db->where('booking_id',$id);
         $query=$this->db->get('booking');
         return $query;
     }


          // UPDATE BOOKING

    public function updatebooking($user,$id)
    {
        $this->db->where('booking.booking_id',$id);
        $this->db->update('booking',$user);
        return true;
    }

    // FETCH PENDING BOOKINGS

    public function fetch_booking()
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('booking_status','pending');
        $this->db->order_by('booking_id','desc');
        $query=$this->db->get();
        return $query;
    }

 // FETCH confirm BOOKINGS

 public function fetch_confirm_booking()
 {
     $this->db->select('*');
     $this->db->from('booking');
     $this->db->where('booking_status','confirm');
     $this->db->order_by('booking_id','desc');
     $query=$this->db->get();
     return $query;
 }

 // FETCH COMPLETE BOOKINGS

 public function fetch_complete_booking()
 {
     $this->db->select('*');
     $this->db->from('booking');
     $this->db->where('booking_status','complete');
     $this->db->order_by('booking_id','desc');
     $query=$this->db->get();
     return $query;
 }

//  GENRATE REPORT FROM COMPLETE BOOKINGS BTWEEN DATES

public function report_complete_booking($from,$to)
{
    
    $this->db->select('*');
    $this->db->from('booking');
    $this->db->where("event_date BETWEEN '$from' AND '$to'");
    $this->db->where('booking_status','complete');
    // $this->db->where('booking_id',$id);
    $query=$this->db->get();
    return $query;
}

//  GENRATE ALL REPORT FROM COMPLETE BOOKINGS 

public function all_complete_booking()
{
    
    $this->db->select('*');
    $this->db->from('booking');
    $this->db->where('booking_status','complete');
    $query=$this->db->get();
    return $query;
}


// E-INVITES BOOKINGS

 public function add_invites($data)
 {
     $this->db->insert('e_invites_order',$data);
     return true;
 }



    // COUNT PENDING BOOKINGS

    public function countpending()
    {
       $query=$this->db->query("SELECT count(booking_id) as total FROM booking where booking_status='pending'");
       return $query;
    }

     // COUNT COMPLETE BOOKINGS

     public function countcomplete()
     { 
        $query=$this->db->query("SELECT count(booking_id) as total FROM booking where booking_status='complete' ");
        return $query;
     }

     // COUNT CANCEL BOOKINGS

     public function countconfirm()
     { 
        $query=$this->db->query("SELECT count(booking_id) as total FROM booking where booking_status='confirm' ");
        return $query;
     }


      // FETCH PENDING BOOKINGS

    public function fetch_invites_booking()
    {
        $this->db->select('*');
        $this->db->from('e_invites_order');
        $this->db->where('invite_status','pending');
        $this->db->order_by('invite_id','desc');
        $query=$this->db->get();
        return $query;
    }

 // FETCH confirm BOOKINGS

 public function fetch_invites_confirm_booking()
 {
     $this->db->select('*');
     $this->db->from('e_invites_order');
     $this->db->where('invite_status','confirm');
     $this->db->order_by('invite_id','desc');
     $query=$this->db->get();
     return $query;
 }

 // FETCH COMPLETE BOOKINGS

 public function fetch_invites_complete_booking()
 {
     $this->db->select('*');
     $this->db->from('e_invites_order');
     $this->db->where('invite_status','complete');
     $this->db->order_by('invite_id','desc');
     $query=$this->db->get();
     return $query;
 }

  // DELETE INVITE BOOKING

  public function delete_invite_booking($id)
  {
      $this->db->where('invite_id',$id);
      $this->db->delete('e_invites_order');
      return true;
  }

   // EDIT INVITATION BOOKING

   public function edit_invite_booking($id)
   {
       $this->db->where('invite_id',$id);
       $query=$this->db->get('e_invites_order');
       return $query;
   }

     // UPDATE INVITATION BOOKING

     public function update_invitation_booking($user,$id)
     {
         $this->db->where('e_invites_order.invite_id',$id);
         $this->db->update('e_invites_order',$user);
         return true;
     }
}