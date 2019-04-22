<?php

namespace Application\Model;

class Task {

    public static function getTaskList(){
        $db = Db::getConnection();

        $tasks = array();
        $i = 0;
        $result = $db->query("SELECT * FROM tasks");
        while($row = $result->fetch()){
            $tasks[$i]['id'] = $row['id'];
            $tasks[$i]['task'] = $row['task'];
            $i++;
        }

        return $tasks;
    }

    public static function addTask($task){
        $db = Db::getConnection();
        $result = $db->query("INSERT INTO tasks (task) VALUES ('{$task}')");
    }

    public static function deleteTask($id){
        $db = Db::getConnection();
        $db->query("DELETE FROM tasks WHERE id = '{$id}'");
    }
}
