<?php if($method == 'voucher'){ ?>
<section style="text-align: center; margin: 0 auto">
    <a class="edit-btn" href="<?php echo base_url('admin/vouchers/0/add');?>">ADD VOUCHER</a>
</section>

<center>
    <h1 class="prod-header">VOUCHER LIST</h1><table style="width: 80%">
    <?php
    echo '<table>';
        foreach ($vouchers as $voucher)
        {
            $status = $voucher->status?'<small style="color: green; padding: 2px;">Active</small>':'<small style="color: red; padding: 2px;">Inactive</small>';
            $action = $voucher->status?'Disable':'Enable';
            echo '<tr class="product-details welcome">
            <td style="text-align: left; padding: 3% 0;">
            <h3>'.$voucher->title.' <sup> ('.$voucher->type.') </sup></h3>
            <p class="price"><span>'.$voucher->price.'<br /></span></p>
             '.$status.' <a class="edit-btn" href="'.base_url('admin/vouchers/'.$voucher->id.'/edit').'">EDIT</a> |   
             <span style="cursor: pointer;" onclick="return confirmAction(\''.$action.'\',\''.$voucher->price.'\', \''.$voucher->id.'\');">'.$action.'</span>
            </td></tr>';
        }
        echo '</table>';
    ?>

</center>
<?php } ?>

<?php if($method == 'add' || $method == 'edit'){ ?>
<?php 
    if($method == 'add'){ $action = base_url('admin/add_voucher'); }
    if($method == 'edit'){ $action = base_url('admin/update_voucher/'.$id); }
?>     
 <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
     <center><table style="width: 500px;margin: 5%;">
         <tr><td>Title</td><td><input type="text" class="save-field" name="title" value="<?=$title?>" /></td></tr>
         <tr><td>TYPE</td><td><select type="text" class="save-field" name="type">
            <option value="fixed" <?php echo ($type == 'fixed')? 'selected':'';?>>Fixed</option>
            <option value="custom" <?php echo ($type == 'custom')? 'selected':'';?>>Custom</option>
            </select></td>
         </tr>
         <tr><td>PRICE</td><td><input type="text" class="save-field" name="price" value="<?=$price?>" /></td></tr>
         <tr><td>IMAGE</td><td><input type="file" name="images" /></td></tr>
         <tr><td>&nbsp;</td><td><input type="submit" class="save-btn" name="submit" value="SAVE" /></td></tr>
     </table></center>
 </form>
<?php } ?>
        

<script type="text/javascript">
    function confirmAction(action, title, prod)
    {
        var agree=confirm("Are you sure you want to "+ action +" Voucher of R" + title + "?");
        if (agree){
            window.location.replace("<?php echo base_url('admin/change_voucher_status');?>/"+action+"/"+prod);
        }else{
            return false ;
        }
    }
</script>