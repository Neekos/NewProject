<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-2">
            <h1>Тут меню</h1>
            <div class="publication">
                <ul class="nav">
                    <li><a href="#">Новое</a></li>
                    <li><a href="#">Вчера</a></li>
                    <li><a href="#">За все время</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col-md-10">
          <h1>Тут публикации</h1>
           <?php
        $postss = posts_getall();
        foreach($postss as $item){
        ?>
            <div class="publicationglav">
                <div class="publ">
                    <h1 class="zago"><?php echo $item['title'];?></h1>
                    <p><?php echo $item['content'];?></p>
                </div>
                <hr>
                
            </div>
            <?php
                }
                ?>
                <div class="col-md-12">
          
          <div id="vk_post_1_45616"></div>
          <div id="vk_post_1_45616" style="width: 100%; height: 495px; background: none;"><iframe name="fXD26fbd" frameborder="0" src="https://vk.com/widget_post.php?app=0&amp;width=100%25&amp;_ver=1&amp;owner_id=1&amp;post_id=45616&amp;hash=Zcs7bt5mow9LKcdYXJD4iK83eVk8&amp;startWidth=1366&amp;url=http%3A%2F%2Fredhorse%3A86%2F%3Faction%3Dosnova&amp;referrer=http%3A%2F%2Fredhorse%3A86%2F%3Faction%3Dglavnay&amp;title=Redhorse&amp;1611de234f9" width="100%" height="90" scrolling="no" id="vkwidget1" style="overflow: hidden; height: 495px;"></iframe></div>
        </div>
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