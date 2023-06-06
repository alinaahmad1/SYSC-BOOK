<?php

function emailExist($email)
{
    include 'connection.php';

    // Fetching Query
    $sql = 'select 	student_email from users_info';
    $query = mysqli_query($conn , $sql);
    while($row = mysqli_fetch_assoc($query))
    {
        if($row['student_email'] == $email)
            return true;
    }
    return false;
}

function checkLogin($E , $P)
{
    include 'connection.php';
    // Fetching Query
    $sql = 'select * from users_info';
    $query = mysqli_query($conn , $sql);
    while($row = mysqli_fetch_assoc($query))
    {
        if($row['student_email'] == $E && $row['Password'] == $P)
            return true;
    }
    return false;
}

function Extract_hash()
{
    include 'connection.php';
    // Fetching Query
    $sql = 'select password from users_password';
    $query = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($query);

        return $row['password'];
}

function GetId($E)
{
    include 'connection.php';
    // Fetching Query
    $sql = 'select * from users_info';
    $query = mysqli_query($conn , $sql);
    while($row = mysqli_fetch_assoc($query))
    {
        if($row['student_email'] == $E)
            return $row['student_ID'];
    }
}

function GetRole($role)
{
    if($role == "Admin") return 1;
    else return 0;
}

function checkEmail($E)
{
    include 'connection.php';
    // Fetching Query
    $sql = 'select 	student_mail from users_info';
    $query = mysqli_query($conn , $sql);
    while($row = mysqli_fetch_assoc($query))
    {
        if($row['Email'] == $E)
            return true;
    }
    return false;
}
?>