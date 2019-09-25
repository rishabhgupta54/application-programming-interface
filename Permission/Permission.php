<?php

class Permission
{
    private $authentication;


    public function getAuthentication()
    {
        return $this->authentication;
    }


    public function setAuthentication($authentication)
    {
        $this->authentication = $authentication;
    }

    public function validateAuthentication()
    {
        if (password_verify('Rishabh', $this->getAuthentication())) {
            return true;
        }
        return false;
    }
}