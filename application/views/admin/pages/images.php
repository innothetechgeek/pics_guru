<!--<img src="'.base_url('assets/images/test/'.$image->image).'" width="100%" >-->

<?php if(isset($view)){?>
    
    <center>
        <div class="container my-view">
         <div class="row">
            <div class="col-md-6">
                <img style="width: 100%; margin: 0 auto" src="<?=base_url('assets/images/test/'.$image)?>">
                <table class="my-img-table" style="margin: 0;     width: 100%;">
     
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
                      <tr><td class="golden">TAKEN WITH</td><td><p><?=$taken_with?></p></td></tr>
					 <?php if($taken_with == 'Other'){?>
                     <tr><td class="golden">OTHER SPECIFIED</td><td><p><?=$other_specified?></p></td></tr>
					 <?php } ?>
                     <tr><td class="golden">CAMERA SETTINGS</td><td><p><?=$camera_settings?></p></td></tr>
                     <tr><td class="golden">SHUTTER SPEED</td><td><p><?=$shutter_speed?></p></td></tr>
                     <tr><td class="golden">F/STOP</td><td><p><?=$fstop?></p></td></tr>
                     <tr><td class="golden">WHITE BALANCE</td><td><p><?=$white_balance_type?></p></td></tr>
                     <tr><td class="golden">ISO</td><td><p><?=$iso_type?></p></td></tr>
                </table>
                
                
                <h3>FeedBack</h3>
				<form action="<?php echo base_url("admin/add_image_feedback/$type/$id"); ?>" method="post" enctype="multipart/form-data">
				<?php if($type == 1){ ?>
				 <table class="my-img-table">
                     <tr><td class="golden">F/stop Aperture</td><td><input type="text" class="save-field" name="aperture" value="<?=$aperture?>" /></td></tr>
                     <tr><td class="golden">Shutterspeed</td><td><input type="text" class="save-field" name="shutterspeed" value="<?=$shutterspeed?>" /></td></tr>
                     <tr><td class="golden">ISO</td><td><input type="text" class="save-field" name="iso" value="<?=$iso?>" /></td></tr>
                     <tr><td class="golden">White Balance</td><td><input type="text" class="save-field" name="white_balance" value="<?=$white_balance?>" /></td></tr>
                     <tr><td class="golden">Rule of Thirds?</td><td><input type="text" class="save-field" name="rule_of_thirds" value="<?=$rule_of_thirds?>" /></td></tr>
                     <tr><td class="golden">Fore, Middel, Background</td><td><input type="text" class="save-field" name="for_middle_background" value="<?=$for_middle_background?>" /></td></tr>
                     <tr><td class="golden">Crop/Frame</td><td><input type="text" class="save-field" name="crop_frame" value="<?=$crop_frame?>" /></td></tr>
                     <tr><td class="golden">Lines</td><td><input type="text" class="save-field" name="photo_lines" value="<?=$photo_lines?>" /></td></tr>
                     <tr><td class="golden">Balance</td><td><input type="text" class="save-field" name="balance" value="<?=$balance?>" /></td></tr>
                     <tr><td class="golden">Perspective/Vantage/POV</td><td><input type="text" class="save-field" name="perspective" value="<?=$perspective?>" /></td></tr>
                     <tr><td class="golden">Framing</td><td><input type="text" class="save-field" name="framing" value="<?=$framing?>" /></td></tr>
                     <tr><td class="golden">Contrast</td><td><input type="text" class="save-field" name="contrast" value="<?=$contrast?>" /></td></tr>
                     <tr><td class="golden">Movement</td><td><input type="text" class="save-field" name="movement" value="<?=$movement?>" /></td></tr>
                  
                     <tr><td>&nbsp;</td><td><input type="submit" class="save-btn" name="submit" value="SAVE" /></td></tr>   
                </table>
				<?php } ?>
				
				<?php if($type == 2){ ?>
				<table class="my-img-table">
                     <tr><td class="golden">Rule of Thirds?</td><td><input type="text" class="save-field" name="rule_of_thirds" value="<?=$rule_of_thirds?>" /></td></tr>
                     <tr><td class="golden">Fore, Middel, Background</td><td><input type="text" class="save-field" name="for_middle_background" value="<?=$for_middle_background?>" /></td></tr>
                     <tr><td class="golden">Crop/Frame</td><td><input type="text" class="save-field" name="crop_frame" value="<?=$crop_frame?>" /></td></tr>
                     <tr><td class="golden">Lines</td><td><input type="text" class="save-field" name="photo_lines" value="<?=$photo_lines?>" /></td></tr>
                     <tr><td class="golden">Balance</td><td><input type="text" class="save-field" name="balance" value="<?=$balance?>" /></td></tr>
                     <tr><td class="golden">Perspective/Vantage/POV</td><td><input type="text" class="save-field" name="perspective" value="<?=$perspective?>" /></td></tr>
                     <tr><td class="golden">Framing</td><td><input type="text" class="save-field" name="framing" value="<?=$framing?>" /></td></tr>
                     <tr><td class="golden">Contrast</td><td><input type="text" class="save-field" name="contrast" value="<?=$contrast?>" /></td></tr>
                     <tr><td class="golden">Movement</td><td><input type="text" class="save-field" name="movement" value="<?=$movement?>" /></td></tr>
                  
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
							<textarea type="text" class="save-field" name="no_feel" ><?=$no_feel?></textarea>
							<br/>
							How does it make me feel?
							Happy: <input type="checkbox" name="feel" value="Happy" <?=($feel == 'Happy')?'checked':'';?>/><br/>
							Sad: <input type="checkbox" name="feel" value="Sad" <?=($feel == 'Sad')?'checked':'';?>/><br/>
							Angry: <input type="checkbox" name="feel" value="Angry" <?=($feel == 'Angry')?'checked':'';?>/> <br/>
							Other: <input type="checkbox" name="feel" value="Other" <?=($feel == 'Other')?'checked':'';?>/>
					 </tr>
                </table>
					<table class="my-img-table">
                     <tr><td class="golden">Summary</td><td><textarea type="text" name="summary"  ><?=$summary;?></textarea></td></tr>
                     <tr><td>&nbsp;</td><td><input type="submit" class="save-btn" name="submit" value="SAVE" /></td></tr>   
                </table>
				<?php } ?>
				</form>
				
				
				
            </div>
             <div class="col-md-6">
                 <div class="bg-message">
                <div class="col-md-12">
                <form action="/admin/add_message" method="post">
                    <table class="my-feedback-table">
                         
                         <tr><td valign='top' class="feedback-heading ">FEEDBACK</td></tr>
                         <tr><td class="feedback"><textarea name="message" class="save-field" cols="30" rows="12"></textarea></td></tr>
                         <tr><td>
                            <input type="hidden" name="type" value="<?=$type?>">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <input type="submit" class="save-btn reply-btn " name="submit" value="SAVE" />
                        </td></tr>
                         
                     </table>
                 </form>
            </div>
                <?php if(isset($messages)){
                    foreach($messages as $message){ ?>
                        
                        <div><p class="pix-guru-chat"><?=$message['timestamp']?> <?=$message['username']?></p></div>
                        <div><p class="message"><?=$message['message']?></p></div>
                        
                <?php } } ?>
                </div>
             </div>
         </div>
        </div>
     </center>
    
<?php }else{  ?>

    <?php if($type == 1 || $type == 2){
    
    $title = "BEGINNERS"; if($type == 2) $title = "ADVANCED";
    ?>
    
    <center>
        <h1 class="prod-header"><?=$title?></h1><table style="width: 98%">
        <?php
        echo ' <div class="container product-details welcome">
                <div class="row">';
        
            foreach ($images as $image)
            {
                echo '
                <div class="col-md-3 prod-left">
                <div class="my-member" style="cursor: pointer;" onclick="location.href=\''.base_url('admin/images/'.$type.'/'.$image->id).'\'">
                
                <div class="my-img"  style="height: 40vh; background: url('.base_url('assets/images/test/'.$image->image).'); background-size: cover; background-repeat: no-repeat; background-position: center;">
                
                 
                
                </div>
                <h3><i class="fa-icon fa fa-calendar"></i>'.date("d/m/Y H:i",strtotime($image->timestamp)).'</h3>
                </div>
                </div>
                ';
            }
            echo '</div></div>';
        ?>
    
    </center>
    <?php } ?>
        
<?php } ?>