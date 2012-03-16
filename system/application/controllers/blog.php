<?php

class Blog extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('captcha_model');
        $this->logged_in();
    }

    function index() {
        redirect('blog/item');
    }

    function logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $role = $this->session->userdata('role');
        if ($is_logged_in != NULL && $role == 1) {
            $globaldata['edit'] = "yes";
            $globaldata['create_news'] = site_url("admin/create_news");
            $this->load->vars($globaldata);
        }
    }

    function item($offset = 0) {


        $id = "news";


        $data['menu'] = $this->content_model->get_menus();
        $data['slideshow'] = "slideshow/main_slideshow2";
        $data['news'] = $this->news_model->list_recent_news($offset);
        $data['allnews'] = $this->news_model->list_news();


        $data['tagcloud'] = $this->news_model->get_all_news_tags();
        $data['widecolumn'] = 'sidebar/blogside';
        $data['captcha'] = $this->captcha_model->initiate_captcha();
        $data['widecolumntop'] = 'sidebar/request_sidebar';

        $data['page'] = $id;
        $is_logged_in = $this->session->userdata('is_logged_in');

        $data['content'] = $this->content_model->get_content($id);
        foreach ($data['content'] as $row):

            if ($row['page_title'] != NULL) {
                $data['title'] = $row['page_title'];
            } else {
                $data['title'] = $row['title'];
            }
            $data['titleonpage'] = $row['title'];
            $data['meta_description'] = $row['meta_desc'];
            $data['meta_keywords'] = $row['meta_keywords'];

        endforeach;

        $data['main'] = "pages/news";

        $is_logged_in = $this->session->userdata('is_logged_in');







        $data['info'] = "infoblock/times";
        $this->load->vars($data);
        $this->load->view('template');
    }

    function tagged($tag) {

        $id = $tag;


        $data['menu'] = $this->content_model->get_menus();
        $data['slideshow'] = "slideshow/main_slideshow2";
        $data['news'] = $this->news_model->list_tagged_news($tag);
        foreach ($data['news'] as $row):
            $tagname = $row['news_tag'];
        endforeach;

        $data['tagcloud'] = $this->news_model->get_all_news_tags();
        $data['widecolumn'] = 'sidebar/blogside';
        $data['captcha'] = $this->captcha_model->initiate_captcha();
        $data['widecolumntop'] = 'sidebar/request_sidebar';

        $data['page'] = $id;
        $is_logged_in = $this->session->userdata('is_logged_in');

        $data['content'] = $this->content_model->get_content($id);

        $data['main'] = "pages/news";

        $is_logged_in = $this->session->userdata('is_logged_in');

        $data['title'] = 'Lease-Desk News and Blog';


        $data['mainheading'] = "Posts tagged '" . $tagname . "'";


        $data['info'] = "infoblock/times";
        $this->load->vars($data);
        $this->load->view('template');
    }

    function post($post) {

        $id = 'news';
        $data['menu'] = $this->content_model->get_menus();
        $data['slideshow'] = "slideshow/main_slideshow2";
        $data['news'] = $this->news_model->get_news($post);

        $data['page'] = $id;
        $is_logged_in = $this->session->userdata('is_logged_in');

        $data['content'] = $this->content_model->get_content($id);

        $data['main'] = "pages/newsitem";

        $is_logged_in = $this->session->userdata('is_logged_in');

        //$data['widecolumn'] = 'global/mainbuttons';
        $data['captcha'] = $this->captcha_model->initiate_captcha();
        $data['widecolumntop'] = 'sidebar/request_sidebar';

        foreach ($data['news'] as $row):


            $data['title'] = $row['news_title'];
        endforeach;


        $data['info'] = "infoblock/times";
        $this->load->vars($data);
        $this->load->view('template');
    }

}

/* End of file news.php */
/* Location: ./system/application/controllers/news.php */