<?php

namespace Insyghts\Authentication;
use Insyghts\Authentication\Models\User;

class LoginUser {

    public $user;
    public $session_token_id;


    public function __construct()
    {
       $this->userModel =  new User();
    }

    public function setUser($userId)
    {
       $this->user =  $this->userModel->getUser($userId);
    }

    public function getUser()
    {

        return $this->user;
    }

    public function setSessionToken($tokenId)
    {
        $this->session_token_id = $tokenId;
    }

    public function getSessionToken()
    {
        return $this->user;
    }
}
