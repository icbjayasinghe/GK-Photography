<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    // function to upload the image to img/uploads folder
    public function uploadImage(){

        if(isset($_FILES["file"]["type"]))
        {
            $valid_extensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["file"]["name"]);
            $file_extension = strtolower(end($temporary));

            if ((($_FILES["file"]["type"] == "image/png") ||
                    ($_FILES["file"]["type"] == "image/jpg") ||
                    ($_FILES["file"]["type"] == "image/jpeg"))
                && ($_FILES["file"]["size"] < 100000000) //Approx. 100mb files can be uploaded.
                && in_array($file_extension, $valid_extensions)) {

                if ($_FILES["file"]["error"] > 0)
                {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
                }
                else
                {
                    $file_name_new = uniqid('',true).".".$file_extension;

                    if (file_exists("img/uploads/". $file_name_new)) {
                        echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
                    }
                    else
                    {


                        $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                        $targetPath = "img/uploads/".$file_name_new; // Target path where file is to be stored
                        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

                        $this->load->model('gallery_model');

                        // insert image path to database
                        $result = $this->gallery_model->addImage($file_name_new);

                        echo "<span id=''>Image Uploaded Successfully...!!</span><br/>";
                        echo "<br/><b>New File Name:</b> " . $file_name_new . "<br>";
                        echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
                        echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                        echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
                    }
                }
            }
            else
            {
                echo "<span id='invalid'>***Invalid file Size or Type***<span>";
            }
        }
    }
   
    // delete and image from the gallery
    public function removeImage(){
        $image = $this->input->post('image_id');
        $this->load->model('gallery_model');
        $result = $this->gallery_model->deleteImage($image);
        if ($result){
            $full_path = "img/uploads/".$image;
            $result_next = unlink($full_path);
            if($result_next){
                echo "<h4>Image Successfully Deleted</h4>";
            }
            else{
                echo "<h4>Failed to delete the Image</h4>";
            }
        }
    }


    // set the priority of the image
    public function setPriority(){
        $image = $this->input->post('image_id');
        $this->load->model('gallery_model');
        $result = $this->gallery_model->updateDate($image);
        if ($result){
            echo "<h4>Image Successfully Updated</h4>";
        }
        else{
            echo "<h4>Failed to update the Image</h4>";
        }

    }
}

?>