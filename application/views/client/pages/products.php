<?php if($type == 'product'){ ?>
<section style="text-align: center; margin: 0 auto">
    <a class="edit-btn" href="<?php echo base_url('admin/products/0/add');?>">ADD SERVICE</a>
</section>

<center>
    <h1 class="prod-header">SERVICE LIST</h1><table style="width: 80%">
    <?php
    echo '<table>';
        foreach ($products as $product)
        {
            echo '<tr class="product-details welcome">
            <td class="prod-left">
            <img src="'.base_url('assets/images/test/'.$product->images).'" width="80%"></td>
            <td style="text-align: left; padding: 3% 0;">
            <h3>'.$product->heading.'<br /></h3>
            <p class="price"><span>'.$product->price.'<br /></span></p>
            <p>'.$product->description.'<br /></p>
            <a class="edit-btn" href="'.base_url('admin/products/'.$product->id.'/edit').'">EDIT</a> |   <span style="cursor: pointer;" onclick="return confirmProduct(\''.$product->heading.'\', \''.$product->id.'\');">DELETE</span>
            </td></tr>';
        }
        echo '</table>';
    ?>

</center>
<?php } ?>

<?php if($type == 'add' || $type == 'edit'){ ?>
<?php 
    if($type == 'add'){ $action = base_url('client/add'); }
    if($type == 'edit'){ $action = base_url('client/update/'.$id); }
?>     
 <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
     <center><table style="width: 800px;margin: 5%;">
         <tr>
         <?php if($image){ ?><td style="width: 100%" rowspan=5><img src="<?=base_url('assets/images/test/'.$image)?>" width="80%"></td><?php } ?>
         <tr><td>WHO</td><td><input type="text" class="save-field" name="who" value="<?=$who?>" /></td></tr>
         <tr><td>NUMBER</td><td><input type="text" class="save-field" name="number" value="<?=$number?>" /></td></tr>
         <tr><td>TAKEN</td><td><input type="text" class="save-field" name="taken" value="<?=$taken?>" /></td></tr>
         <tr><td>TIME</td><td><input type="text" class="save-field" name="time" value="<?=$time?>" /></td></tr>
         <tr><td>AUDIENCE</td><td><input type="text" class="save-field" name="audience" value="<?=$audience?>" /></td></tr>
         <tr><td>WHY</td><td><input type="text" class="save-field" name="why" value="<?=$why?>" /></td></tr>
         <tr><td>RELATIONSHIP</td><td><input type="text" class="save-field" name="relationship" value="<?=$relationship?>" /></td></tr>
         <tr><td>EDIT</td><td><input type="text" class="save-field" name="edit" value="<?=$edit?>" /></td></tr>
         <tr><td>GENRE</td><td><input type="text" class="save-field" name="genre" value="<?=$genre?>" /></td></tr>

         <tr><td>IMAGE<br><small>Up to 1500x1500 px</small></td><td><input type="file" name="image" /></td></tr>
         <tr><td>&nbsp;</td><td><input type="submit" class="save-btn" name="submit" value="SAVE" /></td></tr>
     </table></center>
 </form>
<?php } ?>

  
<script type="text/javascript">
    function confirmProduct(title, prod)
    {
        var agree=confirm("Are you sure you want to delete " + title + "?");
        if (agree){
            window.location.replace("<?php echo base_url('client/delete_beginner_image');?>/"+prod);
        }else{
            return false ;
        }
    }
</script>