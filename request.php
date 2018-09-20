<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

if(file_exists('include/classTask.php'))require_once 'include/classTask.php';

function returnError($act, $error, $errno, $url = FALSE ) {
    $error = array(
        'act'   => $act,
        'error' => $error,
        'errno' => $errno,
    );
    if ( $url ) $error[ 'url' ] = $url;
    return $error;
}

function success ($act,$success,$status,$url = FALSE) {
    $success = array(
        'act'   => $act,
        'success' => $success,
        'status' => $status
    );
    if ( $url ) $error[ 'url' ] = $url;
    return $success;
}


if(isset($_POST) && isset($_POST['p']))
{
    $result = array();

    switch ($_POST['p']){
        default:
            $result = returnError('ERROR', 'Invalid \'p\' parameter value.', 400 );
            break;
        case "insertTask":
            $res = array();
            if(isset($_POST['summary']) && isset($_POST['date']) && isset($_POST['desc']) && !empty($_POST['summary']) && !empty($_POST['date']) && !empty($_POST['desc'])) {

                $query = $task->insertTask($_POST['summary'],$_POST['date'],$_POST['desc']);

                if ($query) {
                    $r = success('Successful', "ok", 200);
                    if (!in_array($r, $res)) array_push($res, $r);
                } else {
                    $r = returnError('Nok', 'nok!', 400);
                    if (!in_array($r, $res)) array_push($res, $r);
                }
            }
            echo json_encode($res[0]);
            break;
        case "editTask":
            $res = array();
            if(isset($_POST['uid']) && !empty($_POST['uid'])){

                $query = $task->editTask($_POST['uid']);

                if (!in_array($query, $res)) array_push($res, $query);

            }
            echo json_encode($res[0][0]);
            break;
        case "updateTask":
            $res = array();
            if(isset($_POST['summary']) && !empty($_POST['summary']) || isset($_POST['date']) && !empty($_POST['date']) || isset($_POST['description']) && !empty($_POST['description']) || isset($_POST['uid']) && !empty($_POST['uid'])) {

                $update = $task->updateTask($_POST['summary'], $_POST['date'], $_POST['description'], $_POST['uid']);

                if ($update) {
                    $r = success('Update', "Yes", 200);
                    if (!in_array($r, $res)) array_push($res, $r);
                } else {
                    $r = returnError('Nok', 'nok!', 400);
                    if (!in_array($r, $res)) array_push($res, $r);
                }
            }
            echo json_encode($res[0]);
            break;
        case "viewTask":
            $res = array();
            if(isset($_POST['vid']) && !empty($_POST['vid'])){

                $query = $task->editTask($_POST['vid']);

                if (!in_array($query, $res)) array_push($res, $query);

            }
            echo json_encode($res[0][0]);
            break;
        case "deleteTasks":
            $res = array();

            $delete = $task->deleteTask($_POST['cid']);

            if ($delete) {
                $r = success('Delete',"OK",200);
                if ( ! in_array( $r, $res ) ) array_push( $res, $r );
            } else {
                $r = returnError('Nok', 'nok!', 400);
                if (!in_array($r, $res)) array_push($res, $r);
            }
            echo json_encode($res);
            break;
    }
}