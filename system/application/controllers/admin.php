<?php

class Admin extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('professionals_model');
        $this->load->library(array('encrypt', 'form_validation'));
        $this->load->library('s3');
        $this->is_logged_in();
    }

    function index() {
        redirect('admin/view_companies', 'refresh');
    }

    function edit() {


        $id = $this->uri->segment(3);
        $data['page'] = $id;
        $data['title'] = "edit page";
        $data['content'] = $this->content_model->get_content($id);
        $data['news'] = $this->news_model->list_news();
        $data['main'] = "admin/edit_content";
        $data['menu'] = $this->content_model->get_menus();
        $this->load->vars($data);
        $this->load->view('template');
    }

    function edit_content() {
        $id = $this->uri->segment(3);
        $this->content_model->edit_content($id);

        redirect("admin/edit/$id");
    }

    function create_news() {
        $data['page'] = "news";
        $data['content'] = $this->content_model->get_content('news');
        $data['main'] = "admin/create_news";
        $data['menu'] = $this->content_model->get_menus();
        $data['news'] = $this->news_model->list_news();


        $this->load->vars($data);
        $this->load->view('template');
    }

    function submit_news() {
        $this->form_validation->set_rules('news_title', 'Title', 'max_length[255]');
        $this->form_validation->set_rules('news_content', 'Content', 'max_length[1024]');
        $this->form_validation->set_rules('page_type', 'Page Type', 'max_length[11]');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) { // validation hasn'\t been passed
            $this->load->view('blog');
        } else { // passed validation proceed to post success logic
            // build array for the model
            $form_data = array(
                'news_content' => $this->input->post('content'),
                'added_by' => $this->input->post('added_by'),
                'date_added' => $this->input->post('date_added'),
                'news_title' => $this->input->post('title'),
                //page type 1 is blog, or news, doesn't matter as its not used yet
                'page_type' => 1
            );




            if ($this->news_model->SaveForm($form_data) == TRUE) { // the information has therefore been successfully saved in the db
//create a new bucket
                $bucketname = "lease-desk-blog";
                if ($this->s3->putBucket($bucketname, S3::ACL_PUBLIC_READ)) {
//upload success
                } else {
//upload failed
                }
                // run insert model to write data to db
                //upload file
                //retrieve uploaded file
                if (!empty($_FILES) && $_FILES['file']['error'] != 4) {

                    $fileName = $_FILES['file']['name'];
                    $tmpName = $_FILES['file']['tmp_name'];
                    $filelocation = $fileName;

                    $thefile = file_get_contents($tmpName, true);

                    //add filename into database
                    //get blog id
                    $blog_id = mysql_insert_id();
                    $this->news_model->add_file($fileName, $blog_id);
                    //move the file

                    if ($this->s3->putObject($thefile, "lease-desk-blog", $filelocation, S3:: ACL_PUBLIC_READ)) {
                        //echo "We successfully uploaded your file.";
                        $this->session->set_flashdata('message', 'News Added and file uploaded successfully');
                    } else {
                        //echo "Something went wrong while uploading your file... sorry.";
                        $this->session->set_flashdata('message', 'News Added, but your file did not upload');
                    }
                } else {

                    $this->session->set_flashdata('message', 'News Added');
                }




                redirect('blog');   // or whatever logic needs to occur
            } else {
                echo 'An error occurred saving your information. Please try again later';
                // Or whatever error handling is necessary
            }
        }
    }

    function create_company() {

        if ($this->input->post('company_name')) {
            $this->Membership_model->create_company();
            $this->session->set_flashdata('message', 'Company Created');
            redirect('admin', 'refresh');
        } else {
            $this->load->view('/admin/add_company');
        }
    }

    function view_companies() {



        $data['company_data'] = $this->Membership_model->get_companies();
        $data['rowcount'] = 0;
        foreach ($data['company_data'] as $countrow):
            $data['rowcount'] = $data['rowcount'] + 1;
        endforeach;
        $segment_active = $this->uri->segment(3);
        if ($segment_active != NULL) {
            $data['company_id'] = $this->uri->segment(3);
            $data['company_info'] = $this->Membership_model->get_company_detail($data['company_id']);
            $data['employees_detail'] = $this->Membership_model->get_employees($data['company_id']);
        }
        $data['main'] = '/admin/main';
        $data['title'] = 'Administration';
        $this->load->vars($data);
        $this->load->view('template');
    }

    function view_company() {
        $data['company_id'] = $_POST['limit'];
        $data['company_info'] = $this->Membership_model->get_company_detail($data['company_id']);
        $data['employees_detail'] = $this->Membership_model->get_employees($data['company_id']);
        $this->load->vars($data);
        $this->load->view('/admin/view_company');
    }

    function delete_company() {
        $data['company_id'] = $this->uri->segment(3);
        $this->Membership_model->delete_company($data['company_id']);
        $this->session->set_flashdata('message', 'Company Deleted');
        redirect('admin/view_companies', 'refresh');
    }

    function create_user() {
        if ($this->input->post('username')) {
            $this->form_validation->set_rules('firstname', 'Name', 'trim|required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|callback_username_check');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
            $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');


            if ($this->form_validation->run() == FALSE) {
                $errors = validation_errors();
                $this->session->set_flashdata('message', $errors);
                redirect('admin/view_companies', 'refresh');
            } else {
                $this->Membership_model->create_member();
                $this->session->set_flashdata('message', 'Member Created');
                redirect('admin', 'refresh');
            }
        } else {
            $this->session->set_flashdata('message', 'There was a problem adding a user. Please make a note of everything you did and contact support');
            redirect('admin/view_companies', 'refresh');
        }
    }

    function username_check($str) {

        $this->db->where('username', $str);
        $query = $this->db->get('users');
        if ($query->num_rows == 1) {
            $message = "The username $str is already taken";
            $this->form_validation->set_message('username_check', $message);
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function view_user() {
        $segment_active = $this->uri->segment(3);
        if ($segment_active != NULL) {
            $data['user_id'] = $this->uri->segment(3);
            $data['user_info'] = $this->Membership_model->get_user($data['user_id']);
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
            $data['user_info'] = $this->Membership_model->get_user($data['user_id']);
        }
        $data['customercompany_id'] = $this->session->userdata('company_id');
        $data['ticket_list'] = $this->support_model->list_tickets($data['customercompany_id']);

        $data['rowcount'] = 0;
        foreach ($data['ticket_list'] as $countrow):
            $data['rowcount'] = $data['rowcount'] + 1;
        endforeach;

        $data['main'] = '/admin/view_user';
        $data['title'] = "User Details";
        $this->load->vars($data);
        $this->load->view('template');
    }

    function editpro() {

        $id = $this->uri->segment(3);
        $data['page'] = 'professionals';
        $data['content'] = $this->content_model->get_content('news');
        $data['professional'] = $this->professionals_model->get_professional($id);
        $data['news'] = $this->news_model->list_news();
        $data['main'] = "admin/edit_user";
        $data['menu'] = $this->content_model->get_menus();
        $this->load->vars($data);
        $this->load->view('template');
    }

    function edit_pro() {
        $id = $this->uri->segment(3);
        $this->professionals_model->edit_pro($id);
        redirect("admin/editpro/$id");
    }

    function editnews() {

        $id = $this->uri->segment(3);
        $data['page'] = 'news';
        $data['content'] = $this->content_model->get_content('news');
        $data['news'] = $this->news_model->get_news($id);
        $data['title'] = "edit blog";
        $data['main'] = "admin/edit_news";
        $data['menu'] = $this->content_model->get_menus();
        $this->load->vars($data);
        $this->load->view('template');
    }

    function edit_news() {
        $id = $this->uri->segment(3);
        $this->news_model->edit_news($id);


        //create a new bucket

        $bucketname = "lease-desk-blog";
        if ($this->s3->putBucket($bucketname, S3::ACL_PUBLIC_READ)) {
//upload success
        } else {
//upload failed
        }
        // run insert model to write data to db
        //upload file
        //retrieve uploaded file
        if (!empty($_FILES) && $_FILES['file']['error'] != 4) {

            $fileName = $_FILES['file']['name'];
            $tmpName = $_FILES['file']['tmp_name'];
            $filelocation = $fileName;

            $thefile = file_get_contents($tmpName, true);

            //add filename into database
            //get blog id
            $blog_id = mysql_insert_id();
            $this->news_model->add_file($fileName, $blog_id);
            //move the file

            if ($this->s3->putObject($thefile, "lease-desk-blog", $filelocation, S3:: ACL_PUBLIC_READ)) {
                //echo "We successfully uploaded your file.";
                $this->session->set_flashdata('message', 'News Added and file uploaded successfully');
            } else {
                //echo "Something went wrong while uploading your file... sorry.";
                $this->session->set_flashdata('message', 'News Added, but your file did not upload');
            }
        } else {

            $this->session->set_flashdata('message', 'News Added');
        }



        redirect("admin/editnews/$id");
    }

    function delete_user() {
        //get user id from link
        $data['user_id'] = $this->uri->segment(3);
        $this->Membership_model->delete_user($data['user_id']);
        //set flashdata
        $this->session->set_flashdata('message', 'User Deleted');

        redirect('admin/view_companies', 'refresh');
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $role = $this->session->userdata('role');
        if (!isset($is_logged_in) || $role != 1) {
            $data['message'] = "You don't have permission";
            redirect('welcome', 'refresh');
        }
    }

}