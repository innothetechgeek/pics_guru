<?php if($type == 'beginner_image'){ ?>
<section style="text-align: center; margin: 0 auto">
    <a style="width: 30%; padding: 1% 0;" class="edit-btn member-edit-btn" href="<?php echo base_url('client/beginner_image/0/add');?>">ADD IMAGE</a>
</section>

<center>
    <h1 class="prod-header">MY GALLERY</h1><table style="width: 98%">
    <?php
    echo ' <div class="product-details welcome">
            <div class="row">';
    
        foreach ($beginner_image as $beginner_image)
        {
            echo '<div class="col-md-3 prod-left">
            <div class="my-member">
            <h3><i class="fa-icon fa fa-clock"></i>15/02/2020 5PM</h3>
            <a class="edit-btn member-edit-btn" href="'.base_url('client/beginner_image/'.$beginner_image->id.'/edit').'">VIEW</a>
            <div class="my-img">
            <img src="'.base_url('assets/images/test/'.$beginner_image->image).'" width="80%" >
            </div>
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
    if($type == 'add'){ $action = base_url('client/add_beginner_image'); }
    if($type == 'edit'){ $action = base_url('client/update_beginner_image/'.$id); }
?>     
 <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
     <center>
        <div class="container my-view">
         <div class="row">
            <div class="col-md-12">
                <table class="my-img-table">
     
                     <?php if($type == 'edit' && $image){ ?><tr><td colspan=2><img src="/assets/images/test/<?=$image?>" style="width: 250px;"></td><td><?php } ?>
                     <tr><td>WHO TOOK THE PHOTO?</td><td><input type="text" class="save-field" name="who" value="<?=$who?>" /></td></tr>
                     <tr><td>PHOTO NAME/NUMBER?</td><td><input type="text" class="save-field" name="number" value="<?=$number?>" /></td></tr>
                     <tr><td>WHERE WAS THE PHOTO TAKEN?</td><td><input type="text" class="save-field" name="taken" value="<?=$taken?>" /></td></tr>
                     <tr><td>TIME OF DAY IT WAS TAKEN?</td><td><input type="text" class="save-field" name="time" value="<?=$time?>" /></td></tr>
                     <tr><td>INTENDED AUDIENCE/USE?</td><td><input type="text" class="save-field" name="audience" value="<?=$audience?>" /></td></tr>
                     <tr><td>WHY TAKEN?</td><td><input type="text" class="save-field" name="why" value="<?=$why?>" /></td></tr>
                     <tr><td>RELATIONSHIP WITH SUBJECT(IF ANY)?</td><td><input type="text" class="save-field" name="relationship" value="<?=$relationship?>" /></td></tr>
                     <tr><td>MANIPULATED/EDITED?</td><td><input type="text" class="save-field" name="edit" value="<?=$edit?>" /></td></tr>
                     <tr><td>GENRE?</td><td><input type="text" class="save-field" name="genre" value="<?=$genre?>" /></td></tr>
                     <tr><td>UPLOAD YOUR IMAGE<br><small>Up to 1500x1500 px</small></td><td><input type="file" name="image" /><input type="hidden" name="currentimage" value="<?=$image?>"></td></tr>
                     <tr><td>&nbsp;</td><td><input type="submit" class="save-btn" name="submit" value="SAVE" /></td></tr>
                     
                </table>
            </div>
         </div>
        </div>
     </center>
         
         
         
     
 </form>
<?php } ?>
        
