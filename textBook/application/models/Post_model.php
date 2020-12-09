<?php
class Post_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_posts($slug = FALSE)
    {
        if ($slug === FALSE) {
            $query = $this->db->get('posts');
            return $query->result_array();
        }

        $query = $this->db->get_where('posts', array('slug' => $slug));
        return $query->row_array();
    }
}
