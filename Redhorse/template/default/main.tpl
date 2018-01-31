<div class="container">
	<div class="row">
		<div class="col-md-12">
		        
		</div>
       <?php
            $itemm = image_getall();
            foreach($itemm as $item){
        ?>
        <div class="col-sm-12 col-md-6 col-lg-4">
           
            <div class="content">
               <a href="#">
                    <img src="img/horse.jpg" alt="" class="mypost">
                    <div class="text">
                          <h3 class=""><?php echo $item['title']?></h3> 
                           <p class=""><?php echo $item['img']?></p>
                    </div>  
               </a>
            </div>
        </div>
        <?php 
            }
        ?>
        <div class="col-md-12">
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