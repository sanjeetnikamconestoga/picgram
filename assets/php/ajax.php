<?php
require_once 'functions.php';





if(isset($_GET['unblock'])){
  $user_id = $_POST['user_id']; 
    if(unblockUser($user_id)){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}










if(isset($_GET['like'])){
    $post_id = $_POST['post_id'];

    if(!checkLikeStatus($post_id)){
        if(like($post_id)){
            $response['status']=true;
        }else{
            $response['status']=false;
        }
    
        echo json_encode($response);
    }

  
}


if(isset($_GET['unlike'])){
    $post_id = $_POST['post_id'];

    if(checkLikeStatus($post_id)){
        if(unlike($post_id)){
            $response['status']=true;
        }else{
            $response['status']=false;
        }
    
        echo json_encode($response);
    }

  
}





if(isset($_GET['search'])){
    $keyword = $_POST['keyword'];
    $data = searchUser($keyword);
$users="";
    if(count($data)>0){
        $response['status']=true;
     


        foreach($data as $fuser){
            $fbtn='';
        
        
       $users.=' <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center p-2">
                                <div><img src="assets/images/profile/'.$fuser['profile_pic'].'" alt="" height="40" class="rounded-circle border">
                                </div>
                                <div>&nbsp;&nbsp;</div>
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="?u='.$fuser['username'].'" class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;">'.$fuser['first_name'].' '.$fuser['last_name'].'</h6></a>
                                    <p style="margin:0px;font-size:small" class="text-muted">@'.$fuser['username'].'</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                              '.$fbtn.'
        
                            </div>
                        </div>';
        
        }
                    
        
$response['users']=$users;



    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}