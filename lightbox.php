<div class="row clearfix imgHeight">
          <div class="flex">
          <?php
            //lightbox begins
            $domain = "your domain";
            //count and add file names to an array
            $dir = '/var/www/vhosts/$domain/httpdocs/templates/templates/';//directory for slider images
            $files = scandir($dir);//array that holds slider images
            $filepath ="/templates/templates/";//path for slider images

            $thumbDir = '/var/www/vhosts/$domain/httpdocs/templates/thumbnails/';//dirctory for thumbnails
            $thumb = scandir($thumbDir);//scan and push to array for thumbnail images
            $thumbPath = '/templates/thumbnails/';//path for thumbnails
            for($i = 2; $i < count($thumb); $i++){?>
              <div class="pillar">
                <img src="<?php echo $thumbPath . $thumb[$i] ?>" onclick="openModal();currentSlide(<?php echo $i-1 ?>)" class="hover-shadow">
              </div>
              <?php
            }//end for loop for thumbnails

           ?>
         </div><!--end thumbnail pillars-->

            <div id="myModal" class="modal">
              <span class="close cursor" onclick="closeModal()">&times;</span>
              <div class="modal-content">

                <?php

                  for($i = 2; $i < count($files); $i++){?>
                    <div class="mySlides">
                      <div class="numbertext"><?php echo $i-1;?> / <?php echo count($files)-2;?></div>
                        <img src="<?php echo $filepath . $files[$i] ?>" style="width:100%;height:auto;">
                    </div>
                    <?php

                  }//end foor loop for slides
                 ?>

                <a id="prev" class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a id="next" class="next" onclick="plusSlides(1)">&#10095;</a>

                <div class="caption-container">
                  <p id="caption"></p>
                </div>
                <?php
                  //remove file extension from file name in array $files
                  $files = array_map(function($e){
                    return pathinfo($e, PATHINFO_FILENAME);
                  }, $files);

                  for($i=2; $i < count($thumb); $i++){?>
                    <div class="pillar">
                      <img class="demo" src="<?php echo $thumbPath . $thumb[$i]?>" onclick="currentSlide(<?php echo $i-1?>)" alt="<? echo $files[$i] ?>">
                    </div>
                    <?php
                  }//end for loop to show slides
                 ?>
              </div>
            </div>
            <!-- End Lightbox -->
        </div>
