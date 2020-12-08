<?php
// class Pages extends CI_controller{
//     public function view($id = null){
//         echo "ID:".$id."Posts";
//     }
// }

// class Pages extends CI_controller{
//     public function view(){
//         echo "hello";
//     }
// }
class Pages extends CI_controller
{
    public function show($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            // application/views/errors/html/error_404.php を表示する
            show_404();
        } //file_exists() 関数がファイルの存在有無を判別するために 使用されている。

        $data['title'] = ucfirst($page); //ucfirst — 文字列の最初の文字を大文字にする

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        // ↑viewsのpagesに引数を渡す。$pageにはurlからの引数。(何もしてなければhomeが入ってる)$dataには頭文字を大文字にした値が入ってる。
        $this->load->view('templates/footer', $data);
    }
}
