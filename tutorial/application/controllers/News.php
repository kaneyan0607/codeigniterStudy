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
}
