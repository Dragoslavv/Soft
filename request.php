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
                    $r = success('Successfuly', "ok", 200);
                    if (!in_array($r, $res)) array_push($res, $r);
                } else {
                    $r = returnError('Nok', 'nok!', 400);
                    if (!in_array($r, $res)) array_push($res, $r);
                }
            }
            echo json_encode($res);
            break;
        case "updateTask":
            $res = array();
            if(isset($_POST['editSummary']) && !empty($_POST['editSummary']) || isset($_POST['editDate']) && !empty($_POST['editDate']) || isset($_POST['editDesc']) && !empty($_POST['editDesc']) || isset($_POST['uid']) && !empty($_POST['uid'])) {

                $update = $task->updateTask($_POST['editSummary'], $_POST['editDate'], $_POST['editDesc'], $_POST['uid']);

                if ($update) {
                    $r = success('delete', "delete", 200);
                    if (!in_array($r, $res)) array_push($res, $r);
                } else {
                    $r = returnError('Nok', 'nok!', 400);
                    if (!in_array($r, $res)) array_push($res, $r);
                }
            }
            echo json_encode($res);
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