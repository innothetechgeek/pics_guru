<?php if($type == 'category'){ ?>
<section style="text-align: center; margin: 0 auto">
    <a class="edit-btn" href="<?php echo base_url('admin/blog_categories/0/add');?>">ADD CATEGORY</a>
</section>

<center>
    <h1 class="prod-header">CATEGORY LIST</h1><table style="width: 80%">
    <?php
    echo '<table>';
        foreach ($categories as $category)
        {
            echo '<tr class="product-details welcome">
            <td style="text-align: left; padding: 3% 0;">
            <h3>'.$category->name.'<br /></h3>
            <a class="edit-btn" href="'.base_url('admin/blog_categories/'.$category->id.'/edit').'">EDIT</a> |   <span style="cursor: pointer;" onclick="return confirmService(\''.$category->name.'\', \''.$category->id.'\');">DELETE</span>
            </td></tr>';
        }
        echo '</table>';
    ?>

</center>
<?php } ?>

<?php if($type == 'add' || $type == 'edit'){ ?>
<?php 
    if($type == 'add'){ $action = base_url('admin/add_categories'); }
    if($type == 'edit'){ $action = base_url('admin/update_categories/'.$id); }
?>     
 <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
     <center><table style="width: 80%;margin: 5%;">
         <tr>
         <td>HEADING</td><td><input type="text" class="save-field" name="name" value="<?=$name?>" /></td></tr>
         <tr><td>&nbsp;</td><td><input type="submit" class="save-btn" name="submit" value="SAVE" /></td></tr>
     </table></center>
 </form>
<?php } ?>
        

<script type="text/javascript">
    function confirmService(title, ser)
    {
        var agree=confirm("Are you sure you want to delete " + title + "?");
        if (agree){
            window.location.replace("<?php echo base_url('admin/delete_categories');?>/"+ser);
        }else{
            return false ;
        }
    }
</script>