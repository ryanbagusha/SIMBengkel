<?php
function is_logged_in()
{
   $ci = get_instance();
   if (!$ci->session->userdata('username')) {
      redirect('login');
   } else {
      $id_level_user = $ci->session->userdata('id_level_user');
      $menu = $ci->uri->segment(1);

      $userAccess = $ci->db->get_where('access_menu', ['id_level_user' => $id_level_user, 
      'url' => $menu])->result();
      $menu2 = $ci->uri->segment(2);

      if (count($userAccess) < 1 && $menu2 == NULL) {
         redirect('login/blocked');
      }

      if ($id_level_user == 0 && $menu2 == 'halaman_kasir') {
         redirect('login/blocked');
      }
   }
}

// function check_access($role_id, $menu_id)
// {
//     $ci = get_instance();

//     $ci->db->where('role_id', $role_id);
//     $ci->db->where('menu_id', $menu_id);
//     $result = $ci->db->get('user_access_menu');
//     if ($result->num_rows() > 0) {
//         return "checked='checked'";
//     }
// }