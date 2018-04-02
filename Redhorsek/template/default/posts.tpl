<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-2">
          Sidebar
        </div> 
        <div class="col-md-10">
            <?php
        $postss = posts_getall();
        foreach($postss as $item){
        ?>
              <div class="well">
                  <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="/file/photo.jpg">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $item['title'];?></h4>
                      <p class="text-right"></p>
                      <p> <?php echo intro($item['content']);?></p>
                      <ul class="list-inline list-unstyled">
                        <li><span><i class="glyphicon glyphicon-calendar"></i> Добавлено <?=$item['datetime']?></span></li>
                        <li>|</li>
                        <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
                        <li>|</li>
                        <li>
                           <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                        </li>
                        <li>|</li>
                        <li>
                        <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                          <span><i class="fa fa-facebook-square"></i></span>
                          <span><i class="fa fa-twitter-square"></i></span>
                          <span><i class="fa fa-google-plus-square"></i></span>
                        </li>
                        </ul>
                   </div>
                </div>
              </div>
              <?php
                }
            ?>
            <div class="pogination">
            <ul class="pagination">
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul>
        </div>
        </div>
    </div>
</div>