<?php

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //モデルのロード。news_modelというオブジェクト名で利用できる。データベースの情報をモデルから持ってきている。
        //このコントローラーの他のメソッドで使う。
        $this->load->model('news_model');

        //system/helpersのURLヘルパー関数をロード。ビューで行う。
        $this->load->helper('url_helper');
    }

    //概要ページ
    public function index()
    {
        //引数を指定せずに全ニュースをモデル経由うで連想配列として取得する。
        $data['news'] = $this->news_model->get_news();

        $data['title'] = 'News archive';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    //個々のニュースページ
    public function view($slug = NULL)
    {
        //引数を指定してWHERE 'slug' = '$slug' のニュースをモデル経由で連想配列として取得する。
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    //データベースに入力するためのcreateメソッド
    public function create()
    {
        //フォームヘルパーとフォームライブラリをロードする。
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = '新しいニュースを作成する';

        //titleとtextを必須入力、requiredに設定する。
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE) {

            //submit前や不正な入力な時はフォームを表示する。
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');
        } else {
            //正しく入力された時は成功ページを表示する
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }
}
