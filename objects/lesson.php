<?php
class Lesson{
 
    // database connection and table name
    private $conn;
    private $table_name = "lesson";
 
    // object properties
    public $lessonId;
    public $lessonName;
    public $lessonSummary;
    public $descriptiveImage;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $query = "SELECT
                    lessonId, lessonName, lessonSummary, descriptiveImage
                FROM
                    " . $this->table_name . "
                ORDER BY
                    lessonName";  
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }
 
}
?>
