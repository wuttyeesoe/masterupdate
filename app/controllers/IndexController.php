<?php

class IndexController extends ControllerBase
{   
    public function initialize() {
        $this->tag->setTitle('Login');
        parent::initialize();
    }
     private function _registerSession(Users $user) {
        $this->session->set('auth', array(
            'user_id' => $user->user_id,
            'username' => $user->username,
        ));
    }
    public function indexAction()
    {
         
    }
    public function startAction()
    {   
        
        if($this->request->isPost()){
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $remember = $this->request->getPost('remember');
            
            $user = Users::findFirst(array(
                "username = :username: AND password = :password:",
                'bind' => array('username' => $username, 'password' => $password)
            ));
            
            if ($user == false) {
                $this->flash->error('Please Login Again! Wrong Username/Password');
                
            } else {

               $this->_registerSession($user);
                $this->flash->success('Successfully');
                       
            }
        
        }
        return $this->forward('index/index');
    }

}

