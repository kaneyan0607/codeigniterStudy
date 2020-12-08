<?php
class News_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_news($slug = FALSE)
    // $slugのエスケープ処理はQuery Builderがしてくれる
    {
        if ($slug === FALSE) {
            //SELECT * FROM news
            $query = $this->db->get('news');

            //結果を配列で取得する。
            return $query->result_array();
        }

        // SELECT * FROM news WHERE 'slug' = $slug
        $query = $this->db->get_where('news', array('slug' => $slug));

        //結果を1行配列で取得する
        return $query->row_array();
    }
}
