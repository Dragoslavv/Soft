<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'conf.php');

class ClassTask
{

    public function insertTask($summary, $date, $descriptions)
    {
        global $db;
        $conn = $db->connect();
        $query = $conn->prepare("INSERT INTO `create-task`(`summary`, `date`, `descriptions`) VALUES (?,?,?)");
        $query->bind_param("sss",$summary,$date, $descriptions);
        return $query->execute();
    }

    public function selectTable()
    {
        global $db;
        $qu = $db->connect();
        $query = $qu->query("SELECT * FROM `create-task`");
        return $query;
    }

    public function editTask($id)
    {
        global $db;
        $qu = $db->connect();
        $query = $qu->query("SELECT * FROM `create-task` WHERE id = '{$id}'");
        return $query->fetch_all();
    }

    public function updateTask($summary, $date, $descriptions, $id)
    {
        global $db;
        $conn = $db->connect();
        $query = $conn->prepare("UPDATE `create-task` SET `summary`=?,`date`=?,`descriptions`=? WHERE id = ?");
        $query->bind_param('sssi',$summary,$date,$descriptions,$id);
        return $query->execute();
    }

    public function deleteTask($id)
    {
        global $db;
        $conn = $db->connect();
        $query = $conn->prepare("DELETE FROM `create-task` WHERE id = ?");
        $query->bind_param('i',$id);
        return $query->execute();
    }
}

$task = new ClassTask();