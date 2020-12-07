<?php if($type == 'service'){ ?>
<!--<section style="text-align: center; margin: 0 auto">-->
<!--    <a class="edit-btn" href="<?php echo base_url('admin/services/0/add');?>">ADD PRODUCT</a>-->
<!--</section>-->

<center>
    <h1 class="prod-header">BEGINNER FEEDBACK</h1><table style="width: 80%">
    <?php
    echo '<table>';
        foreach ($services as $service)
        {
            echo '<tr class="product-details welcome">
            <td class="prod-left">
            <img src="'.base_url('assets/images/test/'.$service->images).'" width="80%"></td><br>
            <td style="text-align: left; padding: 3% 0;">
            <h3>'.$service->heading.'<br /></h3>
            <p class="price"><span>'.$service->price.'<br /></span></p>
            <p>'.$service->extra.'<br /></p>
            <p>'.$service->description.'<br /></p>
            <p>'.$service->directions.'<br /></p>
            <p>'.$service->safe.'<br /></p>
            <p>'.$service->work.'<br /></p>
            <p>'.$service->result.'<br /></p>
            <a class="edit-btn" href="'.base_url('admin/services/'.$service->id.'/edit').'">EDIT</a> |   <span style="cursor: pointer;" onclick="return confirmService(\''.$service->heading.'\', \''.$service->id.'\');">DELETE</span>
            </td></tr>';
        }
        echo '</table>';
    ?>

</center>
<?php } ?>

<?php if($type == 'add' || $type == 'edit'){ ?>
<?php 
    if($type == 'add'){ $action = base_url('admin/add_service'); }
    if($type == 'edit'){ $action = base_url('admin/update_service/'.$id); }
?>     
 <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
     <center><table style="width: 80%;margin: 5%;">
         <tr>
         <?php if($images){ ?><td style="width: 300px;" rowspan=5><img src="<?=base_url('assets/images/test/'.$images)?>" width="80%"></td><?php } ?>
         <td>HEADING</td><td><input type="text" class="save-field" name="heading" value="<?=$heading?>" /></td></tr>
         <tr><td>PRICE</td><td><input type="text" class="save-field" name="price" value="<?=$price?>" /></td></tr>
         <tr><td valign='top'>MAIN</td><td><textarea name="extra" class="save-field" cols="25" rows="5"><?=$extra?></textarea></td></tr>
         <tr><td valign='top'>DESCRIPTION</td><td><textarea name="description" class="save-field" cols="25" rows="5"><?=$description?></textarea></td></tr>
         <tr><td valign='top'>DIRECTIONS FOR USE</td><td><textarea name="directions" class="save-field" cols="25" rows="5"><?=$directions?></textarea></td></tr>
         <tr><td valign='top'>SAFE TO USE</td><td><textarea name="safe" class="save-field" cols="25" rows="5"><?=$safe?></textarea></td></tr>
         <tr><td valign='top'>DOES IT REALLY WORK</td><td><textarea name="work" class="save-field" cols="25" rows="5"><?=$work?></textarea></td></tr>
         <tr><td valign='top'>HOW LONG DOES IT TAKE TO SEE RESULTS</td><td><textarea name="result" class="save-field" cols="25" rows="5"><?=$result?></textarea></td></tr>
         <tr><td>IMAGE<br><small>Up to 1500x1500 px</small></td><td><input type="file" name="images" /></td></tr>
         <tr><td>&nbsp;</td><td><input type="submit" class="save-btn" name="submit" value="SAVE" /></td></tr>
     </table></center>
 </form>
<?php } ?>
        

<script type="text/javascript">
    function confirmService(title, ser)
    {
        var agree=confirm("Are you sure you want to delete " + title + "?");
        if (agree){
            window.location.replace("<?php echo base_url('admin/delete_service');?>/"+ser);
        }else{
            return false ;
        }
    }
</script>