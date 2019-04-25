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
                           $companyLogo,
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
     echo "<span class='text-danger mb-0 ml-2'>Username or email already exist - </span>";
    return false;
}else{

$statement = $this->conn->prepare(
"INSERT INTO person(firstName,lastName, email) VALUES (:firstName,:lastName,:email);

set @lastId = last_insert_id();

INSERT INTO app_user(personId, userName, pssword) VALUES (@lastId,:email,:pssword);

INSERT INTO company(companyName,companyShortName,companyPhone, companyEmail,companyWebsite,companyLogo) VALUES (:companyName, :companyShortName, :companyPhone, :companyEmail,
:companyWebsite, :companyLogo);

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
$statement->bindparam(":companyLogo",$companyLogo);


$statement->execute();

return true;

}
}catch (PDOException $ex){
echo "Sorry unable to register. Please again";
return false;
}
}


public function createGuestUser($avatar,
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
"INSERT INTO person(firstName,lastName, email, avatar) VALUES (:firstName,:lastName,:email, :avatar);

set @lastId = last_insert_id();

INSERT INTO app_user(personId, userName, pssword, userType) VALUES (@lastId,:email,:pssword,'guest');


INSERT INTO company_person(companyId,personId) VALUES (26, @lastId);

");

$statement->bindparam(":firstName",$firstName);
$statement->bindparam(":lastName",$lastName);
$statement->bindparam(":email",$email);
$statement->bindparam(":pssword",$pssword);
$statement->bindparam(":avatar",$avatar);


$statement->execute();

return true;

}
}catch (PDOException $ex){
echo "Sorry unable to register. Please again";
return false;
}
}

public function createEmployee($avatar,
                           $firstName,
                           $lastName,
                           $userType,
                           $email,
                           $pssword,
                           $companyId,
                           $createdBy)
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
"INSERT INTO person(firstName,lastName, email, avatar) VALUES (:firstName,:lastName,:email, :avatar);

set @lastId = last_insert_id();

INSERT INTO app_user(personId, userName, pssword, userType, updatedBy, createdBy)
VALUES (@lastId,:email,:pssword,:userType,:updatedBy,:createdBy);


INSERT INTO company_person(companyId,personId) VALUES (:companyId, @lastId);

");

$statement->bindparam(":firstName",$firstName);
$statement->bindparam(":lastName",$lastName);
$statement->bindparam(":email",$email);
$statement->bindparam(":pssword",$pssword);
$statement->bindparam(":userType",$userType);
$statement->bindparam(":avatar",$avatar);
$statement->bindparam(":companyId",$companyId);
$statement->bindparam(":updatedBy",$createdBy);
$statement->bindparam(":createdBy",$createdBy);

$statement->execute();

return true;

}
}catch (PDOException $ex){
echo "Sorry unable to register. Please again";
return false;
}
}

public function numEmployee($companyId){

  $stmt = $this->conn->prepare("SELECT count(*) FROM company_person WHERE companyId = :companyId");
    $stmt->bindParam(":companyId",$companyId);
    $stmt->execute();
    $dataRows = $stmt -> fetchColumn();
  return $dataRows;
}


public function getUser($userName){

try{

$statement = $this->conn->prepare("SELECT au.userName,au.pssword, au.userType, au.userStatus, p.firstName,p.lastName, p.avatar, c.companyName,c.companyShortName, c.companyId, c.companyLogo FROM app_user au JOIN person p on au.personId = p.personId JOIN company_person cp on cp.personId = p.personId JOIN company c on cp.companyId = c.companyId WHERE au.userName=:userName");
$statement->execute(array(":userName"=>$userName));
$dataRows = $statement->fetch(PDO::FETCH_ASSOC);

return $dataRows;

} catch (PDOException $ex){
echo $ex->getMessage();
}
}

public function updateUser($userName, $newPssword){
  $stmt = $this->conn->prepare("UPDATE app_user SET pssword=:newPssword WHERE userName=:userName");
  $stmt->bindParam(":userName",$userName);
  $stmt->bindParam(":newPssword",$newPssword);
  $stmt->execute();
return true;
}
}
?>
