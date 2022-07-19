<?php
function response($data = [],$status = 200){
    if(is_array($data)){
        $responseData = $data;
    }
    else{
        $responseData = [$data];
    }
    echo json_encode([$responseData, $status]);
}
?>