<?php

class News_model extends Model {

    function list_news() {
        $data = array();
        $this->db->where('page_type', 1);
        $this->db->order_by('news_id', 'DESC');
        $query = $this->db->get('news');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row)
                $data[] = $row;
        }
        $query->free_result();

        return $data;
    }

    function list_recent_news($offset=0) {
        $data = array();
        $this->db->where('page_type', 1);
        $this->db->where('published', 1);
       
        $this->db->order_by('news_id', 'DESC');
        $query = $this->db->get('news', 5, $offset);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row)
                $data[] = $row;
        }
        $query->free_result();

        return $data;
    }
    
      function list_tagged_news($tag) {
        $data = array();
        $this->db->where('news.page_type', 1);
        $this->db->join('news_tag_links', 'news_tag_links.news_id = news.news_id');
        $this->db->join('news_tags', 'news_tags.news_tag_id = news_tag_links.news_tag_id');
        $this->db->where('news_tags.news_tag_safe', $tag);
        $this->db->where('news.published', 1);
        
        $this->db->limit(10);
        $this->db->order_by('news.news_id', 'DESC');
        $query = $this->db->get('news');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row)
                $data[] = $row;
        }
        $query->free_result();

        return $data;
    }

    function get_latest_news() {
        $data = array();
        $this->db->where('page_type', 1);
        $this->db->limit(1);
        $this->db->order_by('news_id', 'DESC');
        $query = $this->db->get('news');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row)
                $data[] = $row;
        }
        $query->free_result();

        return $data;
    }

    function get_news($id) {
        $data = array();
        $this->db->where('news_id', $id);
        $query = $this->db->get('news');
        if ($query->num_rows() == 1) {
            foreach ($query->result_array() as $row)
                $data[] = $row;
        }
        $query->free_result();

        return $data;
    }

    function edit_news($id) {


        $content_update = array(
            'news_content' => $this->input->post('content'),
            'added_by' => $this->input->post('added_by'),
            'date_added' => $this->input->post('date_added'),
            'news_title' => $this->input->post('title'),
            'published' => $this->input->post('published')
        );




        $this->db->where('news_id', $id);
        $update = $this->db->update('news', $content_update);
        return $update;
    }
    
      /**
     *
     * @param type $param
     * @return type 
     */
    function autocomplete_news_tags($param) {
        $data = array();



        $where = "news_tag REGEXP '^$param'";
        $this->db->where($where);


        $query = $this->db->get('news_tags');

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row)
                $data[] = $row;
            $query->free_result();

            return $data;
        } else {
            return FALSE;
        }
    }
    
      function create_new_tag($tag) {

        $pagelink = trim(str_replace(" ", "_", $tag));
         $pagelink = trim(str_replace(".", "_", $pagelink));

        $new_cat_entry = array(
            'news_tag' => trim(ucfirst(strtolower($tag))),
            'news_tag_safe' => $pagelink
        );

        $insert = $this->db->insert('news_tags', $new_cat_entry);
        return $insert;
    }
    
    function delete_news_tag($tag_id) {
        
        $this->db->where('news_tag_link_id', $tag_id);
        $this->db->delete('news_tag_links');
        return;
    }

    function add_to_news_tag_links($tag_id, $blog_id) {

  $new_list_entry = array(
            'news_id' => $blog_id,
            'news_tag_id' => $tag_id
        );

        $insert = $this->db->insert('news_tag_links', $new_list_entry);
        return $insert;
    }
    
     function get_news_tags($news_id) {
        $this->db->where('news_tag_links.news_id', $news_id);
        $this->db->join('news_tags', 'news_tag_links.news_tag_id = news_tags.news_tag_id', 'left');
        $query = $this->db->get('news_tag_links');

        if ($query->num_rows > 0) {
            return $query->result();
        }

        return FALSE;
    }
    
    function get_all_news_tags() {
        $this->db->join('news_tags', 'news_tag_links.news_tag_id = news_tags.news_tag_id', 'left');
        $this->db->order_by('news_tag');
        $query = $this->db->get('news_tag_links');
         if ($query->num_rows > 0) {
            return $query->result();
        }

        return FALSE;
    }

    /**
     *
     * @param type $filename
     * @param type $blog_id
     * @return type 
     */
    function add_file($filename, $blog_id) {
        $content_update = array(
            'main_image' => $filename
        );

        $this->db->where('news_id', $blog_id);
        $update = $this->db->update('news', $content_update);
        return $update;
    }

    /**
     *
     * @param type $form_data
     * @return type 
     */
    function SaveForm($form_data) {
        $this->db->insert('news', $form_data);

        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

}