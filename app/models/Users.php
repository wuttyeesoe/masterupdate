<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Phalcon\Mvc\Model;

class Users extends Model
{
    public $user_id;
    public $username;
    public $password;
    public $email;
}

