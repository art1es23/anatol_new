<?php

/**
 */
defined('ABSPATH') or die();

if (!class_exists('Warranty')) {
  class Warranty
  {

    public function __construct()
    {

      add_action('wp_ajax_register_warranty_action', array($this, 'register_warranty_user'));
      add_action('wp_ajax_nopriv_register_warranty_action', array($this, 'register_warranty_user'));


    }
    function is_warranty_user_registered($email)
    {
      $query_args = array(
        'numberposts'  => 1,
        'post_type'    => 'warranty',
        'meta_key'    => 'email_warranty',
        'post_status' => 'publish',
        'meta_value'  => $email
      );
      $query = new WP_Query($query_args);
      if ($query->post_count) {
        return $query->post->ID;
      }
      return false;
    }

    function update_warranty_user_fields($data,$user_id)
    {
      update_field("first_name_warranty", $data['firstName'], $user_id);
      update_field("last_name_warranty", $data['lastName'], $user_id);
      update_field("address_line_one", $data['addressOne'], $user_id);
      update_field("address_line_two", $data['addressTwo'], $user_id);
      update_field("city_warranty", $data['city'], $user_id);
      update_field("state_warranty", $data['state'], $user_id);
      update_field("zip_code_warranty", $data['zip'], $user_id);
      update_field("phone_warranty", $data['phone'], $user_id);
      update_field("email_warranty", $data['email'], $user_id);
      update_field("contact_warranty", $data['check'], $user_id);
      update_field("equipment_purchased_warranty", $data['equipment'],$user_id);
      update_field("serial_number_warranty", $data['serial'],$user_id);
      update_field("purchase_date_warranty", $data['purchaseDate'],$user_id);
      update_field("installation_date_warranty", $data['installationDate'],$user_id);
      update_field("user_id_warrranty", $data['id'],$user_id);
    }
    function register_warranty_user()
    {
      $data = $_POST['data'];
      $roi_warranty_id = $this->is_warranty_user_registered(sanitize_email($data['email']));
      //if (!$roi_warranty_id) {
        $new_warranty = array(
          'post_title'    => wp_strip_all_tags(sanitize_email($data['email'])),
          'post_type' => 'warranty',
          'post_status'   => 'publish'
        );
        $roi_warranty_id = wp_insert_post($new_warranty);
      //}
      //$data['roi_warranty_id'] = $roi_warranty_id;
      // Add fields
      $this->update_warranty_user_fields($data, $roi_warranty_id);
      // Add return post id
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      wp_die();
    }


  }
  $war = new Warranty();
}

