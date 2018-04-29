<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 f-r">
                        <h4 class="page-title">
                            <a class="profile-pic" href="#"> <img src="images/<?php echo $craftsmen->getImage();?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $craftsmen->getFirstName()." ".$craftsmen->getSurName(); ?></b> </a>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="5"
                                     aria-valuemin="0" aria-valuemax="100" id="rate">
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div>
                            <p>{{rate}}</p>
                        </h4> 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 f-r">
                        <ol class="breadcrumb">
                            <li><a href="#"><?php echo $craftsmen->getBio()?></a></li>
                              
                        </ol>
                           
                    </div>
                    
                    <!-- /.col-lg-12 -->
                </div>