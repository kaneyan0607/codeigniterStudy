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

    // ニュースの記事を投稿するset_news()メソッドを追加
    public function set_news()
    {
        //URLヘルパーをロード。コントラクタでやってもよい。
        //ニュースセクションの時にコントローラーのコントラクトでロードするように設定しているのでここで明示的にロードしなくてもよい。
        $this->load->helper('url');

        $slug = urlencode(url_title($this->input->post('title'), '-', TRUE));

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('news', $data);
    }
}

//urlencode() を使用する理由
//urlencode無しでtitleに日本語データを入力すると個別ページが開かない
//urlencodeを使うことで$slugに格納されたUTF-8エンコードされた日本語を認識する。
