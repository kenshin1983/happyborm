<?php
class PublicAction extends Action {
    const ADMIN_KEY = 'ADMIN_LOGIN';
    const ADMIN_ACCOUNT = 'admin';
    const ADMIN_PASSWORD = 'admin888';

    public function check(){
        $u = session(self::ADMIN_KEY);
        if(!$u && $u != md5(self::ADMIN_ACCOUNT . self::ADMIN_PASSWORD)){
            $this->redirect('/Admin/public/login');
            exit;
        }
    }

    public function login(){
        session(self::ADMIN_KEY,null);
        if($this->isPost()){
            $account = $this->_post('account');
            $password = $this->_post('password');
            if($account && $password && $account == self::ADMIN_ACCOUNT && $password == self::ADMIN_PASSWORD){
                session(self::ADMIN_KEY, md5(self::ADMIN_ACCOUNT . self::ADMIN_PASSWORD));
                $this->redirect('/Admin');
            }else{
                $this->assign('errorMsg','登陆失败');
            }
        }
        $this->display();
    }
}