<?php
global $user;
global $posts;
global $follow_suggestions;
?>
<div class="container col-md-10 col-sm-12 col-lg-9 rounded-0 d-flex justify-content-between">
    <!-- Posts Section -->
    <div class="col-md-8 col-sm-12" style="max-width:93vw">
        <?php
        showError('post_img');
        if (count($posts) < 1) {
            echo "<p style='width:100%' class='p-2 bg-white border rounded text-center my-3 col-12'>Follow someone or add a new post.</p>";
        }
        foreach ($posts as $post) {
            $likes = getLikes($post['id']);
            $comments = getComments($post['id']);
        ?>
            <!-- Post Card -->
            <div class="card mt-4">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <!-- User Info -->
                    <div class="d-flex align-items-center p-2">
                        <img src="assets/images/profile/<?=$post['profile_pic']?>" alt="Profile" height="30" width="30" class="rounded-circle border">
                        &nbsp;&nbsp;
                        <a href='?u=<?=$post['username']?>' class="text-decoration-none text-dark"><?=$post['first_name']?> <?=$post['last_name']?></a>
                    </div>
                    <div class="p-2">
                        <?php if ($post['uid'] == $user['id']) { ?>
                            <!-- Dropdown for Post Actions -->
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical" id="option<?=$post['id']?>" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu" aria-labelledby="option<?=$post['id']?>">
                                    <li><a class="dropdown-item" href="assets/php/actions.php?deletepost=<?=$post['id']?>"><i class="bi bi-trash-fill"></i> Delete Post</a></li>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <!-- Report Post -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#reportPostModal<?=$post['id']?>" class="text-danger">Report</a>
                        <?php } ?>
                    </div>
                </div>
                <!-- Post Content -->
                <img src="assets/images/posts/<?=$post['post_img']?>" loading="lazy" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h4 class="p-2 border-bottom d-flex align-items-center">
                        <!-- Like/Unlike -->
                        <span>
                            <?php
                            $like_btn_display = checkLikeStatus($post['id']) ? 'none' : '';
                            $unlike_btn_display = checkLikeStatus($post['id']) ? '' : 'none';
                            ?>
                            <i class="bi bi-heart-fill unlike_btn text-danger" style="display:<?=$unlike_btn_display?>" data-post-id='<?=$post['id']?>'></i>
                            <i class="bi bi-heart like_btn" style="display:<?=$like_btn_display?>" data-post-id='<?=$post['id']?>'></i>
                        </span>
                        <!-- Comments -->
                        &nbsp;&nbsp;<i class="bi bi-chat-left">
                            <span class="p-1 mx-2 text-small" style="font-size:small" data-bs-toggle="modal" data-bs-target="#postview<?=$post['id']?>"><?=count($comments)?> comments</span>
                        </i>
                    </h4>
                    <!-- Likes and Time -->
                    <div>
                        <span class="p-1 mx-2" data-bs-toggle="modal" data-bs-target="#likes<?=$post['id']?>"><span id="likecount<?=$post['id']?>"><?=count($likes)?></span> likes</span>
                        <span style="font-size:small" class="text-muted">Posted</span> <?=show_time($post['created_at'])?>
                    </div>
                    <!-- Post Text -->
                    <?php if ($post['post_text']) { ?>
                        <p class="mt-2"><?=$post['post_text']?></p>
                    <?php } ?>
                </div>
                <!-- Add Comment -->
                <div class="input-group p-2 border-top">
                    <input type="text" class="form-control rounded-0 border-0 comment-input" placeholder="Say something.." aria-label="Comment">
                    <button class="btn btn-outline-primary rounded-0 border-0 add-comment" data-page='wall' data-cs="comment-section<?=$post['id']?>" data-post-id="<?=$post['id']?>">Post</button>
                </div>
            </div>

            <!-- Report Modal for Post -->
<!-- Report Modal for Post -->
<div class="modal fade" id="reportPostModal<?=$post['id']?>" tabindex="-1" aria-labelledby="reportPostModalLabel<?=$post['id']?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportPostModalLabel<?=$post['id']?>">Report Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="assets/php/actions.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="reason<?=$post['id']?>" class="form-label">Reason for Reporting</label>
                        <select class="form-select" id="reason<?=$post['id']?>" name="reason" required>
                            <option value="spam">Spam</option>
                            <option value="abuse">Abusive Content</option>
                            <option value="hate_speech">Hate Speech</option>
                            <option value="inappropriate_content">Inappropriate Content</option>
                        </select>
                    </div>
                    <input type="hidden" name="post_id" value="<?=$post['id']?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="report_post" class="btn btn-danger">Submit Report</button>
                </div>
            </form>
        </div>
    </div>
</div>

        <?php } ?>
    </div>

    <!-- Follow Suggestions Section -->
    <div class="col-lg-4 col-sm-0 overflow-hidden mt-4 p-sm-0 p-md-3">
        <div class="d-flex align-items-center p-2">
            <img src="assets/images/profile/<?=$user['profile_pic']?>" alt="Profile" height="60" width="60" class="rounded-circle border">
            &nbsp;&nbsp;&nbsp;
            <div>
                <a href='?u=<?=$user['username']?>' class="text-decoration-none text-dark">
                    <h6 style="margin: 0px;"><?=$user['first_name']?> <?=$user['last_name']?></h6>
                </a>
                <p class="text-muted">@<?=$user['username']?></p>
            </div>
        </div>
        <h6 class="text-muted p-2">You Can Follow</h6>
        <?php
        foreach ($follow_suggestions as $suser) {
        ?>
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center p-2">
                    <img src="assets/images/profile/<?=$suser['profile_pic']?>" alt="Profile" height="40" width="40" class="rounded-circle border">
                    &nbsp;&nbsp;
                    <div>
                        <a href='?u=<?=$suser['username']?>' class="text-decoration-none text-dark">
                            <h6 style="margin: 0px;font-size: small;"><?=$suser['first_name']?> <?=$suser['last_name']?></h6>
                        </a>
                        <p class="text-muted">@<?=$suser['username']?></p>
                    </div>
                </div>
                <button class="btn btn-sm btn-primary followbtn" data-user-id='<?=$suser['id']?>'>Follow</button>
            </div>
        <?php
        }
        if (count($follow_suggestions) < 1) {
            echo "<p class='p-2 bg-white border rounded text-center'>No Suggestions For You</p>";
        }
        ?>
    </div>
</div>
