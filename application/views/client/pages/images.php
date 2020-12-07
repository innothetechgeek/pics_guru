<?php if($type == 'view'){ ?>
<section style="text-align: center; margin: 0 auto">
    <?php if($membership_type==2){ ?>
        <div class="top-section-week ">Images allow per rolling month: <?=$imagecnt?>/12</div>
    <?php }else{ ?>
        <div class="top-section-week ">Images allow per rolling month: <?=$imagecnt?>/8</div>
    <?php } ?>
    <a style="width: 30%; padding: 1% 0;" class="edit-btn member-edit-btn" href="<?php echo base_url('client/images/add');?>">ADD IMAGE</a>
</section>

<center>
    <h1 class="prod-header">MY GALLERY</h1><table style="width: 98%">
    <?php
    echo ' <div class="product-details welcome">
            <div class="row">';
    
        foreach ($images as $image)
        {
            echo '<div class="col-md-3 prod-left">
            <div class="my-member" style="cursor: pointer;" onclick="location.href=\''.base_url('client/images/'.$image->id).'\'">
            <h3><i class="fa-icon fa fa-clock"></i>'.date("d/m/Y H:i",strtotime($image->timestamp)).'</h3>
            <div class="my-img">
            <img src="'.base_url('assets/images/test/'.$image->image).'" width="100%" >
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
    if($type == 'add'){ $action = base_url('client/add_image'); }
    if($type == 'edit'){ $action = base_url('client/update_image/'.$id); }
    
    if($type == 'add' && ($membership_type==1 || $membership_type==2) && $error){
        if($membership_type==2){ ?>
            <p style="text-align: center;padding: 9% 0;font-size: 16px;height: 37vh;color: #000000;">Only 12 images per rolling month allow!</p>
        <?php }else{ ?>
            <p style="text-align: center;padding: 9% 0;font-size: 16px;height: 37vh;color: #000000;">Only 8 images per rolling month allow!</p>
        <?php }
    }else{
?>     
     <center>
        <div class="container my-view">
         <div class="row">
            <div class="col-md-12">
                
                 <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
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
                     
                     <tr><td>F/STOP?</td><td><input type="text" class="save-field" name="fstop" value="<?=$fstop?>" /></td></tr>
                     <tr><td>SHUTTERSPEED?</td><td><input type="text" class="save-field" name="shutter_speed" value="<?=$shutter_speed?>" /></td></tr>
                     <tr><td>ISO?</td><td><input type="text" class="save-field" name="iso_type" value="<?=$iso_type?>" /></td></tr>
                     <tr><td>WHITE BALANCE?</td><td><input type="text" class="save-field" name="white_balance_type" value="<?=$white_balance_type?>" /></td></tr>
                     <tr><td>UPLOAD YOUR IMAGE<br><small>Up to 1500x1500 px</small></td><td><input type="file" name="image" /><input type="hidden" name="currentimage" value="<?=$image?>"></td></tr>
                 	 <?php if($membership_type == 1) { ?>
                     <tr><td>&nbsp;</td><td><input type="submit" class="save-btn" name="submit" value="SAVE" /></td></tr>
                     <?php } ?>
                     
                 </table>
				<?php if($membership_type == 2) { ?>
				<table>
					<tr>
						<td>
						Taken with:  <br/>
						<input type="radio" name="taken_with" value="DSLR Camera" <?=($taken_with == 'DSLR Camera')?'checked':'';?>> DSLR Camera</input><br/>
						<input type="radio" name="taken_with" value="Point and Shoot" <?=($taken_with == 'Point and Shoot')?'checked':'';?>> Point and Shoot</input><br/>
						<input type="radio" name="taken_with" value="Mobile camera" <?=($taken_with == 'Mobile camera')?'checked':'';?>>Mobile camera</input><br/>
						<input type="radio" name="taken_with" value="Other" <?=($taken_with == 'Other')?'checked':'';?>>Other:  </input><br/>
						<input type="text" name="other_specified" placeholder="Specify" value="<?=$other_specified?>"  />
						</td>
					</tr>
					<tr>
						<td>
							Camera settings:
							<input type="text" name="camera_settings"  value="<?=$camera_settings?>" />
						</td>
					</tr>
				
					  <tr><td><input type="submit" class="save-btn" name="submit" value="SAVE" /></td></tr>
				</table>
				<?php } ?>
				</form>
            </div>
			
			<div class="col-md-12">
	        <br/>
			<?php if($membership_type == 1 && $type !== 'add'){ ?>
			<h3>FeedBack</h3>
				 <table class="my-img-table">
                     <tr><td class="golden">F/stop Aperture</td><td><input type="text" class="save-field" name="aperture" readonly value="<?=$aperture?>" /></td></tr>
                     <tr><td class="golden">Shutterspeed</td><td><input type="text" class="save-field" name="shutterspeed" readonly value="<?=$shutterspeed?>" /></td></tr>
                     <tr><td class="golden">ISO</td><td><input type="text" class="save-field" name="iso" value="<?=$iso?>" readonly/></td></tr>
                     <tr><td class="golden">White Balance</td><td><input type="text" class="save-field" name="white_balance" readonly value="<?=$white_balance?>" /></td></tr>
                </table>
				
				<table class="my-img-table">
                     <tr><td class="golden">Rule of Thirds?</td><td><input type="text" class="save-field" name="rule_of_thirds" readonly value="<?=$rule_of_thirds?>" /></td></tr>
                     <tr><td class="golden">Fore, Middel, Background</td><td><input type="text" class="save-field" name="for_middle_background" readonly value="<?=$for_middle_background?>" /></td></tr>
                     <tr><td class="golden">Crop/Frame</td><td><input type="text" class="save-field" name="crop_frame" readonly value="<?=$crop_frame?>" /></td></tr>
                     <tr><td class="golden">Lines</td><td><input type="text" class="save-field" name="photo_lines" readonly value="<?=$photo_lines?>" /></td></tr>
                     <tr><td class="golden">Balance</td><td><input type="text" class="save-field" name="balance" readonly value="<?=$balance?>" /></td></tr>
                     <tr><td class="golden">Perspective/Vantage/POV</td><td><input type="text" class="save-field" name="perspective" readonly value="<?=$perspective?>" /></td></tr>
                     <tr><td class="golden">Framing</td><td><input type="text" class="save-field" name="framing" readonly value="<?=$framing?>" /></td></tr>
                     <tr><td class="golden">Contrast</td><td><input type="text" class="save-field" name="contrast" readonly value="<?=$contrast?>" /></td></tr>
                     <tr><td class="golden">Movement</td><td><input type="text" class="save-field" name="movement" readonly value="<?=$movement?>" /></td></tr>
                </table>
				<?php } ?>
				
				<?php if($membership_type == 2 && $type !== 'add'){ ?>
				<h3>FeedBack</h3>
				<table class="my-img-table">
                     <tr><td class="golden">Rule of Thirds?</td><td><input type="text" class="save-field" name="rule_of_thirds" readonly value="<?=$rule_of_thirds?>" /></td></tr>
                     <tr><td class="golden">Fore, Middel, Background</td><td><input type="text" class="save-field" name="for_middle_background" readonly value="<?=$for_middle_background?>" /></td></tr>
                     <tr><td class="golden">Crop/Frame</td><td><input type="text" class="save-field" name="crop_frame" readonly value="<?=$crop_frame?>" /></td></tr>
                     <tr><td class="golden">Lines</td><td><input type="text" class="save-field" name="photo_lines" readonly value="<?=$photo_lines?>" /></td></tr>
                     <tr><td class="golden">Balance</td><td><input type="text" class="save-field" name="balance" readonly value="<?=$balance?>" /></td></tr>
                     <tr><td class="golden">Perspective/Vantage/POV</td><td><input type="text" class="save-field" name="perspective" readonly value="<?=$perspective?>" /></td></tr>
                     <tr><td class="golden">Framing</td><td><input type="text" class="save-field" name="framing" readonly value="<?=$framing?>" /></td></tr>
                     <tr><td class="golden">Contrast</td><td><input type="text" class="save-field" name="contrast" readonly value="<?=$contrast?>" /></td></tr>
                     <tr><td class="golden">Movement</td><td><input type="text" class="save-field" name="movement" readonly value="<?=$movement?>" /></td></tr>
                  
                </table>
					<table class="my-img-table">
                     <tr><td class="golden">Focus</td>
					 <td>
                     Sharp:<input type="checkbox" name="focus" value="Sharp" <?=($focus == 'Sharp')?'checked':'';?>/> <br/>
                     Fuzzy: <input type="checkbox" name="focus" value="Fuzzy" <?=($focus == 'Fuzzy')?'checked':'';?>/></td></tr>
                     <tr><td class="golden">Exposure     </td><td>
					 Overexposed:<input type="checkbox" name="exposure" value="Overexposed" <?=($exposure == 'Overexposed')?'checked':'';?>/><br/>
                     Underexposed: <input type="checkbox" name="exposure" value="Underexposed" <?=($exposure == 'Underexposed')?'checked':'';?>/><br/>
                     Normal Exposed: <input type="checkbox" name="exposure" value=" Normal_Exposed" <?=($exposure == ' Normal_Exposed')?'checked':'';?>/>
					 </td></tr>
					<tr><td class="golden">DOF     </td><td>
					 Shallow: <input type="checkbox" name="dof" value="Shallow" <?=($dof == 'Shallow')?'checked':'';?>/><br/>
                     Deep: <input type="checkbox" name="dof" value="Deep" <?=($dof == 'Deep')?'checked':'';?>/> <br/>
                     Light: <input type="checkbox" name="dof" value="Light" <?=($dof == 'Light')?'checked':'';?>/>
					 </td></tr>
					 <tr><td class="golden">White Balance</td><td><input type="text" class="save-field" name="white_balance" value="<?=$time?>" />
					 </td></tr>
                </table>
					<table class="my-img-table">
						<tr>
							 <td class="golden">
							 &nbsp;
							</td>
								<td>
								Emotional Apeal:<br/>
								Yes: <input type="checkbox" name="story_clear" value="Yes" <?=($story_clear == 'Yes')?'checked':'';?>/><br/>
								No: <input type="checkbox" name="story_clear" value="No" <?=($story_clear == 'No')?'checked':'';?>/>
							 <br/>
							 Why Not:<br/>
							<?=$no_feel?>
							<br/>
							How does it make me feel?
							Happy: <input type="checkbox" name="feel" value="Happy" <?=($feel == 'Happy')?'checked':'';?>/><br/>
							Sad: <input type="checkbox" name="feel" value="Sad" <?=($feel == 'Sad')?'checked':'';?>/><br/>
							Angry: <input type="checkbox" name="feel" value="Angry" <?=($feel == 'Angry')?'checked':'';?>/> <br/>
							Other: <input type="checkbox" name="feel" value="Other" <?=($feel == 'Other')?'checked':'';?>/>
					 </tr>
                </table>
					<table class="my-img-table">
                     <tr><td class="golden">Summary</td><td><?=$summary;?></td></tr>
                </table>
				<?php } ?>
		
				
            </div>
         </div>
        </div>
     </center>
         
         
<?php } } ?>
        
