<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model
{

    /*
     * add image details to database
     */
    public function addImage($file_name_new){
        $date = date("Y-m-d H:i:s");
        $data = array(
            'path' => $file_name_new,
            'date_added' => $date,
        );
        try{
            $result=$this->db->insert('gallery',$data);
            return $result;
        }
        catch (Exception $e){
            echo $e;
        }
    }

    /*
     * get image details from the database
     */
    public function getImagesMyWork(){
        try{
            $this->db->select('*');
            $this->db->from('gallery');
            $this->db->order_by('date_added', 'DESC');
            $result = $this->db->get();
            return $result->result();
        }
        catch (Exception $e){
            echo $e;
        }
    }


    /*
     * delete image details from database
     */
    public function deleteImage($path){
        try{
            $result = $this->db->delete('gallery', array('path' => $path));
            return $result;
        }
        catch (Exception $e){
            echo $e;
        }
    }


    /*
     * update the date of the image
     */
    public function updateDate($image){
        $date = date("Y-m-d H:i:s");
        $data = array(
            'date_added' => $date
        );
        try{
            $this->db->where('path',$image);
            $result = $this->db->update('gallery',$data);
            return $result;
        }
        catch (Exception $e){
            echo $e;
        }
    }

}

?>