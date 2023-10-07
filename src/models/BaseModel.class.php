<?php
require_once(PROJECT_ROOT_PATH ."/src/db/Database.class.php");
// use Database;
class BaseModel 
{
    protected $table;
    protected $db;
  
    protected function __construct()
    {
		$this->db = new Database();
    }

}
