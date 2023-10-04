<?php
require_once(__DIR__ ."/../db/Database.class.php");
use Database;
class BaseModel 
{
    protected $table;
    protected $db;
  
    protected function __construct()
    {
		$this->db = new Database();
    }

}
