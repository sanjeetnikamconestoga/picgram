<?php
 global $user;
 global $posts;
 global $follow_suggestions;
 
 ?>
    <div class="container col-md-10 col-sm-12 col-lg-9 rounded-0 d-flex justify-content-between">
    <div class="col-md-8 col-sm-12" style="max-width:93vw">
        <?php if (count($posts) < 1): ?>
            <p style='width:100%' class='p-2 bg-white border rounded text-center my-3 col-12'>Follow Someone or Add a new post</p>
        <?php endif; ?>
        
        <?php foreach ($posts as $post): ?>
        <div class="card mt-4">
            <div class="card-title d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center p-2">
                    <img src="assets/images/profile/<?= $post['profile_pic'] ?>" alt="" height="30" width="30" class="rounded-circle border">
                    &nbsp;&nbsp;<a href='?u=<?= $post['username'] ?>' class="text-decoration-none text-dark"><?= $post['first_name'] ?> <?= $post['last_name'] ?></a>
                </div>
                <div class="p-2">
                    <?php if ($post['uid'] == $user['id']): ?>
                    <div class="dropdown">
                        <i class="bi bi-three-dots-vertical" id="option<?= $post['id'] ?>" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu" aria-labelledby="option<?= $post['id'] ?>">
                            <li></li>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <img src="assets/images/posts/<?= $post['post_img'] ?>" loading=lazy class="" alt="...">
            <h4 style="font-size: x-larger" class="p-2 border-bottom d-flex">
                <span>
                    <i class="bi bi-heart-fill unlike_btn text-danger" style="display:none" data-post-id='<?= $post['id'] ?>'></i>
                    <i class="bi bi-heart like_btn" style="display:inline" data-post-id='<?= $post['id'] ?>'></i>
                </span>
                &nbsp;&nbsp;<i class="bi bi-chat-left d-flex align-items-center"><span class="p-1 mx-2 text-small" style="font-size:small" data-bs-toggle="modal" data-bs-target="#postview<?= $post['id'] ?>">5 comments</span></i>
            </h4>
            <div>
                <span class="p-1 mx-2" data-bs-toggle="modal" data-bs-target="#likes<?= $post['id'] ?>"><span id="likecount<?= $post['id'] ?>">10</span> likes</span>
                <span style="font-size:small" class="text-muted">Posted 2 hours ago</span>
            </div>
            <?php if ($post['post_text']): ?>
            <div class="card-body">
                <?= $post['post_text'] ?>
            </div>
            <?php endif; ?>
            <div class="input-group p-2 <?= $post['post_text'] ? 'border-top' : '' ?>">
                <input type="text" class="form-control rounded-0 border-0 comment-input" placeholder="say something.." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary rounded-0 border-0 add-comment" data-page='wall' data-cs="comment-section<?= $post['id'] ?>" data-post-id="<?= $post['id'] ?>" type="button" id="button-addon2">Post</button>
            </div>
        </div>

        <div class="modal fade" id="postview<?= $post['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body d-md-flex p-0">
                        <div class="col-md-8 col-sm-12">
                            <img src="assets/images/posts/<?= $post['post_img'] ?>" style="max-height:90vh" class="w-100 overflow:hidden">
                        </div>
                        <div class="col-md-4 col-sm-12 d-flex flex-column">
                            <div class="d-flex align-items-center p-2 border-bottom">
                                <div><img src="assets/images/profile/<?= $post['profile_pic'] ?>" alt="" height="50" width="50" class="rounded-circle border"></div>
                                <div>&nbsp;&nbsp;&nbsp;</div>
                                <div class="d-flex flex-column justify-content-start">
                                    <h6 style="margin: 0px;"><?= $post['first_name'] ?> <?= $post['last_name'] ?></h6>
                                    <p style="margin:0px;" class="text-muted">@<?= $post['username'] ?></p>
                                </div>
                                <div class="d-flex flex-column align-items-end flex-fill">
                                    <div class="dropdown">
                                        <span id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">10 likes</span>
                                    </div>
                                    <div style="font-size:small" class="text-muted">Posted 2 hours ago</div>
                                </div>
                            </div>
                            <div class="flex-fill align-self-stretch overflow-auto" id="comment-section<?= $post['id'] ?>" style="height: 100px;">
                                <p class="p-3 text-center my-2 nce">no comments</p>
                            </div>
                            <div class="input-group p-2 border-top">
                                <input type="text" class="form-control rounded-0 border-0 comment-input" placeholder="say something.." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-primary rounded-0 border-0 add-comment" data-cs="comment-section<?= $post['id'] ?>" data-post-id="<?= $post['id'] ?>" type="button" id="button-addon2">Post</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="likes<?= $post['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Likes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Currently No Likes</p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="col-lg-4 col-sm-0 overflow-hidden mt-4 p-sm-0 p-md-3">
        <div class="d-flex align-items-center p-2">
            <div><img src="assets/images/profile/<?= $user['profile_pic'] ?>" alt="" height="60" width="60" class="rounded-circle border"></div>
            <div>&nbsp;&nbsp;&nbsp;</div>
            <div class="d-flex flex-column justify-content-center">
                <a href='?u=<?= $user['username'] ?>' class="text-decoration-none text-dark"><h6 style="margin: 0px;"><?= $user['first_name'] ?> <?= $user['last_name'] ?></h6></a>
                <p style="margin:0px;" class="text-muted">@<?= $user['username'] ?></p>
            </div>
        </div>
        
        <div>
            <h6 class="text-muted p-2">You Can Follow Them</h6>
            <p class='p-2 bg-white border rounded text-center'>No Suggestions For You</p>
        </div>
    </div>
</div>

   