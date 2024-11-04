<?php
global $profile;
global $profile_post;
global $user;
global $posts;
?>
<div class="container col-md-9 col-sm-11 rounded-0">
    <div class="col-12 rounded p-4 mt-4 d-md-flex gap-5">
        <div class="col-md-4 col-sm-12 d-flex justify-content-center mx-auto align-items-start">
            <img src="assets/images/profile/<?=$profile['profile_pic']?>"
                 class="img-thumbnail rounded-circle mb-3" style="width:170px;height:170px" alt="...">
        </div>
        <div class="col-md-8 col-sm-11">
            <div class="d-flex flex-column">
                <div class="d-flex gap-5 align-items-center">
                    <span style="font-size: xx-large;"><?=$profile['first_name']?> <?=$profile['last_name']?></span>
                    
                    <?php if($user['id'] != $profile['id'] && !checkBS($profile['id'])) { ?>
                    <div class="dropdown">
                        <span class="" style="font-size:xx-large" type="button" id="dropdownMenuButton1"
                              data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i> </span>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#chatbox"
                                   onclick="popchat(<?=$profile['id']?>)"><i class="bi bi-chat-fill"></i> Message</a></li>
                            <li><a class="dropdown-item " href="assets/php/ajax.php?block=<?=$profile['id']?>&username=<?=$profile['username']?>"><i class="bi bi-x-circle-fill"></i> Block</a></li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
                
                <span style="font-size: larger;" class="text-secondary">@<?=$profile['username']?></span>
                <?php if(!checkBS($profile['id'])) { ?>
                <div class="d-flex gap-2 align-items-center my-3">
                    <a class="btn btn-sm btn-primary"><i class="bi bi-file-post-fill"></i> <?=count($profile_post)?> Posts</a>
                    <a class="btn btn-sm btn-primary disabled" data-bs-toggle="modal" data-bs-target="#follower_list"><i class="bi bi-people-fill"></i> 5 Followers</a>
                    <a class="btn btn-sm btn-primary disabled" data-bs-toggle="modal" data-bs-target="#following_list"><i class="bi bi-person-fill"></i> 10 Following</a>
                </div>
                <?php } ?>
                
                <?php if($user['id'] != $profile['id']) { ?>
                <div class="d-flex gap-2 align-items-center my-1">
                    <button class="btn btn-sm btn-primary followbtn" data-user-id='<?=$profile['id']?>'>Follow</button>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <h3 class="border-bottom">Posts</h3>
    <?php
    if(checkBS($profile['id'])) {
        $profile_post = array();
    ?>
    <div class="alert alert-secondary text-center" role="alert">
        <i class="bi bi-x-octagon-fill"></i> You are not allowed to see posts!
    </div>
    <?php } else if(count($profile_post) < 1) { ?>
        <p class='p-2 bg-white border rounded text-center my-3'>You don't have any post</p>
    <?php } ?>
    
    <div class="gallery d-flex flex-wrap gap-2 mb-4">
        <?php foreach($profile_post as $post) { ?>
        <img src="assets/images/posts/<?=$post['post_img']?>" data-bs-toggle="modal" data-bs-target="#postview<?=$post['id']?>" width="300px" class="rounded" />
        
        <div class="modal fade" id="postview<?=$post['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body d-md-flex p-0">
                        <div class="col-md-8 col-sm-12">
                            <img src="assets/images/posts/<?=$post['post_img']?>" style="max-height:90vh" class="w-100 rounded-start">
                        </div>
                        <div class="col-md-4 col-sm-12 d-flex flex-column">
                            <div class="d-flex align-items-center p-2 <?=$post['post_text'] ? '' : 'border-bottom'?>">
                                <div><img src="assets/images/profile/<?=$profile['profile_pic']?>" alt="" height="50" width="50" class="rounded-circle border"></div>
                                <div>&nbsp;&nbsp;&nbsp;</div>
                                <div class="d-flex flex-column justify-content-start">
                                    <h6 style="margin: 0px;"><?=$profile['first_name']?> <?=$profile['last_name']?></h6>
                                    <p style="margin:0px;" class="text-muted">@<?=$profile['username']?></p>
                                </div>
                                <div class="d-flex flex-column align-items-end flex-fill">
                                    <span>20 likes</span>
                                    <div style="font-size:small" class="text-muted">Posted 2 days ago</div>
                                </div>
                            </div>
                            <div class="border-bottom p-2 <?=$post['post_text'] ? '' : 'd-none'?>"><?=$post['post_text']?></div>
                            <div class="flex-fill align-self-stretch overflow-auto" id="comment-section<?=$post['id']?>" style="height: 100px;">
                                <p class="p-3 text-center my-2 nce">No comments</p>
                            </div>
                            <div class="text-center p-2">
                                If you want to comment, follow this user
                            </div>
                            
                            <!-- Delete button (only for post owner) -->
                            <?php if($user['id'] == $post['user_id']) { ?>
                            <div class="text-end p-2">
                                <a href="assets/php/actions.php?deletepost=<?=$post['id']?>" class="btn btn-sm btn-danger">Delete Post</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
