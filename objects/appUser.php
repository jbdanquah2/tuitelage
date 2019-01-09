<?php

class appUser {
    
private $conn;
 
    
    public function __construct($db){
        $this->conn = $db;
//        echo " i'm also connected";
    }

public function createUser($companyName, 
                           $companyShortName,
                           $companyPhone,
                           $companyEmail,
                           $companyWebsite,
                           $firstName,
                           $lastName,
                           $email,
                           $pssword)
{
    
try{
       
$stmt = $this->conn->prepare("SELECT userName FROM app_user WHERE userName=:email"); 
$stmt->bindparam(":email",$email); 
   $stmt->execute();
if ($stmt->rowCount() > 0) {
     echo "Username or email already exist - ";
    return false;
}else{
    
$statement = $this->conn->prepare(
"INSERT INTO person(firstName,lastName, email) VALUES (:firstName,:lastName,:email);

set @lastId = last_insert_id();

INSERT INTO app_user(personId, userName, pssword) VALUES (@lastId,:email,:pssword);

INSERT INTO company(companyName,companyShortName,companyPhone, companyEmail,companyWebsite) VALUES (:companyName, :companyShortName, :companyPhone, :companyEmail,
:companyWebsite);

set @lastId_Company = last_insert_id();
INSERT INTO company_person(companyId,personId) VALUES (@lastId_Company, @lastId);

");
    
$statement->bindparam(":firstName",$firstName);
$statement->bindparam(":lastName",$lastName);
$statement->bindparam(":email",$email); 

$statement->bindparam(":pssword",$pssword);
    
$statement->bindparam(":companyName",$companyName);
$statement->bindparam(":companyShortName",$companyShortName);
$statement->bindparam(":companyPhone",$companyPhone);
$statement->bindparam(":companyEmail",$companyEmail);
$statement->bindparam(":companyWebsite",$companyWebsite);

    
$statement->execute();

return true;

} 
}catch (PDOException $ex){
echo "Sorry unable to register. Please again";
return false;
}
}

    
public function getUser($userName){
    
try{

$statement = $this->conn->prepare("SELECT au.userName,au.pssword, au.userStatus, p.firstName, c.companyName,c.companyShortName, c.companyId, c.companyLogo FROM app_user au JOIN person p on au.personId = p.personId JOIN company_person cp on cp.personId = p.personId JOIN company c on cp.companyId = c.companyId WHERE au.userName=:userName");
$statement->execute(array(":userName"=>$userName));
$dataRows = $statement->fetch(PDO::FETCH_ASSOC);

return $dataRows;

} catch (PDOException $ex){
echo $ex->getMessage();
}
}
}
?>
