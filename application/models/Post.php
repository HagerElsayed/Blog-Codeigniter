<?php

class Post extends CI_Model {

   function get_posts($num=20,$start=0){
       //$sql="select * from posts where active=1 order by date_added limit 0,20;";
       $this->db->select()->from('posts')->where('active',1)->order_by('date_added','desc')->limit($num,$start);
    //    ->join('users','users.userID=posts.userID','left');
       $query=$this->db->get();
    //    $this->db->order_by('date_added','desc');
    //    $query=$this->db->get_where('posts',array('active'=>1),$num,$start);
       return $query->result_array();
   }
   function get_post($postID){
       $this->db->select()->from('posts')->where(array('active'=>1,'postID'=>$postID))->order_by('date_added','desc');
       $query=$this->db->get();
       return $query->first_row('array');

   }
     function get_posts_count(){
        $this->db->select("postID")->from('posts')->where('active',1);
        $query=$this->db->get();
        return $query->num_rows();
    }

   function insert_post($data){
        // $data=array(
        //     'title'=>'this a a test',
        //     'post'=>'this a description'
        // );
        $this->db->insert('posts',$data);
        return $this->db->insert_id();
   }

   function update_post($postID,$data){
       $this->db->where('postID',$postID);
       $this->db->update('posts',$data);
   }

   function delete_post($postID,$data)
   {
       $this->db->where('postID',$postID);
       $this->db->delete('posts',$data);
        
   }
   function query(){
       $this->db->query("select * from posts where active=1 order by date_added limit 0,20;");
   }
}