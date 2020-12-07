<?php if($type == 'beginner_image'){ ?>

<center>
    <h1 class="prod-header">BEGINNERS</h1><table style="width: 98%">
    <?php
    echo ' <div class="product-details welcome">
            <div class="row">';
    
        foreach ($beginner_image as $beginner_image)
        {
            echo '
            <div class="col-md-3 prod-left">
            <h3>15/02/2020 5PM</h3>
            <a class="edit-btn" href="'.base_url('admin/beginner_image/'.$beginner_image->id.'/edit').'">VIEW</a>
            <div class="my-img">
            <img src="'.base_url('assets/images/test/'.$beginner_image->image).'" width="80%" >
            </div>
            </div>
            ';
        }
        echo '</div></div>';
    ?>

</center>
<?php } ?>

<?php if($type == 'add' || $type == 'edit'){ ?>
<?php 
    if($type == 'add'){ $action = base_url('admin/add_product'); }
    if($type == 'edit'){ $action = base_url('admin/update_product/'.$id); }
?>     
 <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
     <center>
        <div class="container my-view">
         <div class="row">
            <div class="col-md-6">
                <table class="my-img-table">
     
                     <?php if($image){ ?><?php } ?>
                     <tr><td class="golden">WHO TOOK THE PHOTO</td><td><p><?=$who?></p></td></tr>
                     <tr><td class="golden">AUTHOR</td><td><p>Pix-Guru</p></td></tr>
                     <tr><td class="golden">DATE</td><td><p><?=$timestamp?></p></td></tr>
                     <tr><td class="golden">PHOTO NAME/NUMBER</td><td><p><?=$number?></p></td></tr>
                     <tr><td class="golden">WHERE WAS THE PHOTO TAKEN</td><td><p><?=$taken?></p></td></tr>
                     <tr><td class="golden">TIME OF DAY IT WAS TAKEN</td><td><p><?=$time?></p></td></tr>
                     <tr><td class="golden">INTENDED AUDIENCE/USE</td><td><p><?=$audience?></p></td></tr>
                     <tr><td class="golden">WHY TAKEN</td><td><p><?=$why?></p></td></tr>
                     <tr><td class="golden">RELATIONSHIP WITH SUBJECT</td><td><p><?=$relationship?></p></td></tr>
                     <tr><td class="golden">MANIPULATED/EDITED</td><td><p><?=$edit?></p></td></tr>
                     <tr><td class="golden">GENRE</td><td><p><?=$genre?></p></td></tr>
                     
                </table>
            </div>
            <div class="col-md-6">
                <table class="my-feedback-table">
                    <img style="width: 100%; margin: 0 auto" src="<?=base_url('assets/images/test/'.$image)?>">
                     
                     <tr><td valign='top'>FEEDBACK</td></tr>
                     <tr><td class="feedback"><textarea name="description" class="save-field" cols="70" rows="12"><?=$description?></textarea></td></tr>
                     

                     
                     <tr><td><input type="submit" class="save-btn" name="submit" value="SAVE" /></td></tr>
                     
                 </table>
            </div>
         </div>
        </div>
     </center>
         
         
         
     
 </form>
<?php } ?>
        
