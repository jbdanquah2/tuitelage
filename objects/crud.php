<?php

class crud {
    
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
    
$statement = $this->conn->prepare(
"INSERT INTO person(firstName,lastName,email) VALUES (:firstName,:lastName,:email);

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

} catch (PDOException $ex){
echo $ex->getMessage();
return false;
}
}
    
    
public function getUser($userName){
    
try{

$statement = $this->conn->prepare("SELECT au.userName,au.pssword, p.firstName, c.companyName FROM app_user au join person p on au.personId = p.personId join company_person cp on cp.personId = p.personId join company c on cp.companyId = c.companyId WHERE au.userName=:userName");
$statement->execute(array(":userName"=>$userName));
$dataRows = $statement->fetch(PDO::FETCH_ASSOC);

return $dataRows;

} catch (PDOException $ex){
echo $ex->getMessage();
}
}
}
