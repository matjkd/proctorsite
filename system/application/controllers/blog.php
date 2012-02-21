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

    function item() {

        if (($this->uri->segment(3)) == NULL) {
            $id = "news";
        } else {
            $id = $this->uri->segment(3);
        }


        $data['menu'] = $this->content_model->get_menus();
        $data['slideshow'] = "slideshow/main_slideshow2";
        $data['news'] = $this->news_model->list_recent_news();

        $data['widecolumn'] = 'global/mainbuttons';
        $data['captcha'] = $this->captcha_model->initiate_captcha();
        $data['widecolumntop'] = 'sidebar/request_sidebar';

        $data['page'] = $id;
        $is_logged_in = $this->session->userdata('is_logged_in');

        $data['content'] = $this->content_model->get_content($id);

        $data['main'] = "pages/news";

        $is_logged_in = $this->session->userdata('is_logged_in');




        $data['title'] = 'Lease-Desk News and Blog';


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