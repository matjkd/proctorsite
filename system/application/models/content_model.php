<?php

class Content_model extends Model {

    function get_content($id) {
        $data = array();
        $this->db->where('menu_title', $id);
        $query = $this->db->get('content');
        if ($query->num_rows() == 1) {
            foreach ($query->result_array() as $row)
                $data[] = $row;
        }
        $query->free_result();

        return $data;
    }

    function edit_content($id) {


        $content_update = array(
            'content' => $this->input->post('content'),
            'menu_title' => $this->input->post('menu_title'),
            'page_title' => $this->input->post('page_title'),
            'title' => $this->input->post('title'),
            'extra' => $this->input->post('extra'),
            'youtube' => $this->input->post('youtube'),
            'meta_desc' => $this->input->post('meta_desc'),
            'meta_keywords' => $this->input->post('meta_keywords')
        );




        $this->db->where('menu_title', $id);
        $update = $this->db->update('content', $content_update);
        return $update;
    }

    function get_menus() {
        $data = array();

        $query = $this->db->get('content');
        if ($query->num_rows() > 1) {
            foreach ($query->result_array() as $row)
                $data[] = $row;
        }

        $query->free_result();

        return $data;
    }

}