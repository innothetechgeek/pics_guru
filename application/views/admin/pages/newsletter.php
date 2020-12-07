<?php if($type == 'newsletters'){ ?>
<!--<section style="text-align: center; margin: 0 auto">-->
<!--<a class="edit-btn" href="<?php echo base_url('admin/newsletter/0/add');?>">ADD NEWSLETTER</a>-->
<!--</section>-->
<center>
    <h1 class="prod-header">NEWSLETTER</h1><table style="width: 80%">
    <?php
    echo '<table class="newsletters">';
        foreach ($newsletters as $newsletters)
        {
            echo '<tr class="product-details welcome">
            <td style="text-align: left;">
            <h3>'.$newsletters->heading.'<br /></h3>
            <p>'.$newsletters->button.'<br /></p>
            <a class="edit-btn" href="'.base_url('admin/newsletter/'.$newsletters->id.'/edit').'">EDIT</a> 
            </td></tr>';
        }
        echo '</table>';
    ?>

</center>
<?php } ?>

<?php if($type == 'add' || $type == 'edit'){ ?>
<?php 
    if($type == 'add'){ $action = base_url('admin/add_newsletters'); }
    if($type == 'edit'){ $action = base_url('admin/update_newsletters/'.$id); }
?>     
 <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
     <center><table class="newsletter" style="width: 80%;margin: 5%;">
         <tr>
         <td>NEWSLETTER HEADING</td><td><input type="text" class="save-field" name="heading" value="<?=$heading?>" /></td></tr>
         <tr><td valign='top'>NEWSLETTER BUTTON TEXT</td><td><textarea name="button" class="save-field" cols="25" rows="5"><?=$button?></textarea></td></tr>
         <tr><td>&nbsp;</td><td><input type="submit" class="save-btn" name="submit" value="SAVE" /></td></tr>
        
     </table></center>
 </form>
<?php } ?>
        

<script type="text/javascript">
    function confirmService(title, ser)
    {
        var agree=confirm("Are you sure you want to delete " + title + "?");
        if (agree){
            window.location.replace("<?php echo base_url('admin/delete_newsletters');?>/"+ser);
        }else{
            return false ;
        }
    }
</script>