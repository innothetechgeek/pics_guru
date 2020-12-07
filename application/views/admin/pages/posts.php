<?php if($type == 'post'){ ?>
<section style="text-align: center; margin: 0 auto">
    <a class="edit-btn" href="<?php echo base_url('admin/posts/0/add');?>">ADD SLIDER IMAGE</a>
</section>

<center>
    <h1 class="prod-header">SLIDER LIST ITEMS</h1><table style="width: 80%">
    <?php
    echo '<table class="blog-table"><thead class="blog-top">
	<th>Title</th>
	<th>Category</th>
	<th>Actions</th>
	</thead>
	<tbody>';
        
        foreach ($posts as $post)
        {
            echo '<tr class="blog-body ">
            
            <td style="text-align: left; padding: 3% 0;">
            <h3>'.$post->title.'<br /></h3>
            </td>
            <td style="text-align: left; padding: 3% 0;">
            <h3>'.$post->title.'<br /></h3>
            </td>
            <td style="text-align: left; padding: 3% 0;">
            <a class="blog-btn" href="'.base_url('admin/posts/'.$post->id.'/edit').'">EDIT</a> |   <span style="cursor: pointer;" onclick="return confirmPost(\''.$post->title.'\', \''.$post->id.'\');">DELETE</span>
            </td></tr>';
        }
        echo '</tbody></table>';
    ?>

</center>
<?php } ?>

<?php if($type == 'add' || $type == 'edit'){ ?>
<?php 
    if($type == 'add'){ $action = base_url('admin/add_post'); }
    if($type == 'edit'){ $action = base_url('admin/update_post/'.$id); }
?>     
 <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
     <center><table style="width: 80%;margin: 5%;">
         <tr>
         <?php if($image){ ?><td style="width: 300px;" rowspan=5><img src="<?=base_url('assets/images/test/'.$image)?>" width="80%"></td><?php } ?>
         
         <tr><td valign='top'>Title</td><td><textarea name="title" class="save-field" cols="70" rows="10"><?=$title?></textarea></td></tr>
         <tr><td valign='top'>Body</td><td><textarea name="body" class="save-field" cols="70" rows="10"><?=$body?></textarea></td></tr>
         <tr><td>IMAGE<br><small></small></td><td><input type="file" name="image" /></td></tr>
         <tr><td>&nbsp;</td><td><input type="submit" class="save-btn" name="submit" value="SAVE" /></td></tr>
     </table></center>
 </form>
<?php } ?>
        

<script type="text/javascript">
    function confirmPost(title, ser)
    {
        var agree=confirm("Are you sure you want to delete " + title + "?");
        if (agree){
            window.location.replace("<?php echo base_url('admin/delete_post');?>/"+ser);
        }else{
            return false ;
        }
    }
</script>