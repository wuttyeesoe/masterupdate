<?php

use Phalcon\Mvc\Controller;

class UploadController extends Controller {

    public function initialize() {
        
    }

    public function indexAction() {
        if ($this->session->has('auth')) {
            $auth = $this->session->auth;
            $this->view->username = $auth['username'];
        }
    }

    public function fileuploadAction() { 
        
         
        $userid=$this->session->get('auth')['user_id'];
        
        if($this->request->hasFiles() == TRUE){
            
            $uploads= $this->request->getUploadedFiles();
            $isUploaded=FALSE;
            $upload_dir='temp/'.$userid;
            if(!is_dir($upload_dir)){
                mkdir($upload_dir, 0777);
            }
            foreach ($uploads as $upload){     
                $path = $upload_dir.'/'.$upload->getname();
                ($upload->moveTo($path))? $isUploaded = TRUE : $isUploaded = FALSE;
                ($isUploaded)? $this->flash->success("Files successfully uploaded."): $this->flash->error("Some error occur");  
            }                   
        }
//        return $this->forward('upload/index');
        echo $this->view->path=$path;
        
        $this->session->remove('auth');
    }

}
