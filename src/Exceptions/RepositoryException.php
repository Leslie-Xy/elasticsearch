<?php

namespace Leslie\elasticsearch\Exceptions;
use RuntimeException;

class RepositoryException extends RuntimeException
{
    public $code = 401;
    public $msg = '';
    public $errorCode = 10001;
    public $data=[];
}