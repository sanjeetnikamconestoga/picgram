<?php
 global $user;
 global $posts;
 global $follow_suggestions;
 
 ?>
    <div class="container col-md-10 col-sm-12 col-lg-9 rounded-0 d-flex justify-content-between">
    <div class="col-md-8 col-sm-12" style="max-width:93vw">
        <div class="card mt-4">
            <div class="card-title d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center p-2">
                    <img src="assets/images/profile/user1.jpg" alt="" height="30" width="30" class="rounded-circle border">
                    &nbsp;&nbsp;<a href="#" class="text-decoration-none text-dark">Cem Özdemir</a>
                </div>
                <div class="p-2">
                    <div class="dropdown">
                        <i class="bi bi-three-dots-vertical" id="option1" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu" aria-labelledby="option1">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash-fill"></i> Delete Post</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <img src="assets/images/posts/post_img.jpg" loading="lazy" alt="Post Image">
            <h4 style="font-size: x-larger" class="p-2 border-bottom d-flex">
                <span>
                    <i class="bi bi-heart-fill unlike_btn text-danger" data-post-id="1"></i>
                    <i class="bi bi-heart like_btn" style="display:none" data-post-id="1"></i>
                </span>
                &nbsp;&nbsp;<i class="bi bi-chat-left d-flex align-items-center">
                    <span class="p-1 mx-2 text-small" style="font-size:small" data-bs-toggle="modal" data-bs-target="#postview1">5 comments</span>
                </i> 
            </h4>
            <div>
                <span class="p-1 mx-2" data-bs-toggle="modal" data-bs-target="#likes1">10 likes</span>
                <span style="font-size:small" class="text-muted">Posted 6 hours ago</span>
            </div>
            <div class="card-body">
                <p>This is my First post on the Picgram!!!!!!!!!</p>
            </div>

<div class="card-title d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center p-2">
                    <img src="assets/images/profile/user1.jpg" alt="" height="30" width="30" class="rounded-circle border">
                    &nbsp;&nbsp;<a href="#" class="text-decoration-none text-dark">Cem Özdemir</a>
                </div>
                <div class="p-2">
                    <div class="dropdown">
                        <i class="bi bi-three-dots-vertical" id="option1" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu" aria-labelledby="option1">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash-fill"></i> Delete Post</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <img src="assets\images\posts\istanbulcity.jpeg" loading="lazy" alt="Post Image">
            <h4 style="font-size: x-larger" class="p-2 border-bottom d-flex">
                <span>
                    <i class="bi bi-heart-fill unlike_btn text-danger" data-post-id="1"></i>
                    <i class="bi bi-heart like_btn" style="display:none" data-post-id="1"></i>
                </span>
                &nbsp;&nbsp;<i class="bi bi-chat-left d-flex align-items-center">
                    <span class="p-1 mx-2 text-small" style="font-size:small" data-bs-toggle="modal" data-bs-target="#postview1">10 comments</span>
                </i> 
            </h4>
            <div>
                <span class="p-1 mx-2" data-bs-toggle="modal" data-bs-target="#likes1">15 likes</span>
                <span style="font-size:small" class="text-muted">Posted 5 min ago</span>
            </div>
            <div class="card-body">
                <p>Trip!!!!!!!!!</p>
            </div>

            <div class="input-group p-2 border-top">
                <input type="text" class="form-control rounded-0 border-0 comment-input" placeholder="say something..">
                <button class="btn btn-outline-primary rounded-0 border-0 add-comment" type="button">Post</button>
            </div>
        </div>
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
            <h6 class="text-muted p-2">You Can Follow Them</h6>
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center p-2">
                    <div><img src="assets/images/profile/profile-1.jpeg" alt="" height="40" width="40" class="rounded-circle border"></div>
                    <div>&nbsp;&nbsp;</div>
                    <div class="d-flex flex-column justify-content-center">
                        <a href="#" class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;">Yasemin Çelik</h6></a>
                        <p style="margin:0px;font-size:small" class="text-muted">@YasCel1210</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-primary">Follow</button>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center p-2">
                    <div><img src="assets/images/profile/profile-2.jpg" alt="" height="40" width="40" class="rounded-circle border"></div>
                    <div>&nbsp;&nbsp;</div>
                    <div class="d-flex flex-column justify-content-center">
                        <a href="#" class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;">Ali Sarsalmaz</h6></a>
                        <p style="margin:0px;font-size:small" class="text-muted">@HiItsAli</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-primary">Follow</button>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center p-2">
                    <div><img src="assets/images/profile/profile-3.jpg" alt="" height="40" width="40" class="rounded-circle border"></div>
                    <div>&nbsp;&nbsp;</div>
                    <div class="d-flex flex-column justify-content-center">
                        <a href="#" class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;">Emre Yildiz</h6></a>
                        <p style="margin:0px;font-size:small" class="text-muted">@EmYil29</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-primary">Follow</button>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center p-2">
                    <div><img src="assets/images/profile/profile-4.jpg" alt="" height="40" width="40" class="rounded-circle border"></div>
                    <div>&nbsp;&nbsp;</div>
                    <div class="d-flex flex-column justify-content-center">
                        <a href="#" class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;">Leyla Conur Ataç</h6></a>
                        <p style="margin:0px;font-size:small" class="text-muted">@Leyyylaaa</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-primary">Follow</button>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center p-2">
                    <div><img src="assets/images/profile/profile-5.jpg" alt="" height="40" width="40" class="rounded-circle border"></div>
                    <div>&nbsp;&nbsp;</div>
                    <div class="d-flex flex-column justify-content-center">
                        <a href="#" class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;">Emir Kaya</h6></a>
                        <p style="margin:0px;font-size:small" class="text-muted">@ateşEmir</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-primary">Follow</button>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center p-2">
                    <div><img src="assets/images/profile/profile-6.jpg" alt="" height="40" width="40" class="rounded-circle border"></div>
                    <div>&nbsp;&nbsp;</div>
                    <div class="d-flex flex-column justify-content-center">
                        <a href="#" class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;">Burak Aydin</h6></a>
                        <p style="margin:0px;font-size:small" class="text-muted">@BurAy</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-primary">Follow</button>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center p-2">
                    <div><img src="assets/images/profile/profile-7.jpg" alt="" height="40" width="40" class="rounded-circle border"></div>
                    <div>&nbsp;&nbsp;</div>
                    <div class="d-flex flex-column justify-content-center">
                        <a href="#" class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;">Asli Mertoğlu</h6></a>
                        <p style="margin:0px;font-size:small" class="text-muted">@GuzelAsli</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-primary">Follow</button>
                </div>
            </div>

        </div>
    </div>
</div>
