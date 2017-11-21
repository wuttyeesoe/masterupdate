<?php

class IndexController extends ControllerBase {

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

    public function indexAction() {
        
    }

    public function startAction() {

        if ($this->request->isPost()) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $remember = $this->request->getPost('remember');
            $user = Users::findFirst(array(
                        "username = :username: AND password = :password:",
                        'bind' => array('username' => $username, 'password' => $password)
            ));

            if ($user == false) {
                $this->flash->error('Please Login Again! Wrong Username And Password');
            } else {
                if ($remember == "1") {
                    setcookie("username", $username, time() + 3600, "/", "", 0);
                    setcookie("password", $password, time() + 3600, "/", "", 0);
                }

                $this->_registerSession($user);
                $this->response->redirect('upload/index');
            }
        }
        return $this->forward('index/index');
    }

    public function endAction() {
        $this->session->remove('auth');
//        $this->flash->success('Logout Successfully');
//        $rememberMeCookie = $this->cookies->get("remember-me");
//        $rememberMeCookie->delete();
        return $this->forward('index/index');
    }

}
