<div class="container">
    <div class="row">
        <div class="col-md-12">
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
        </div>
    </div>
</div>