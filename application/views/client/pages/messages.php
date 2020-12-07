<center>
    <h1 class="prod-header">MY MESSAGES</h1>
    
    <div class="container my-view">
     <div class="row">
        <div class="col-md-8">
            <div class="bg-message">
            
            <table style="width: 98%">
                
                <?php if($view && isset($messages)){ ?>
                    <tr><td valign='top' class="feedback-heading ">FEEDBACK</td></tr>
                    <tr>
                        
                        <td valign="top"><form action="/client/add_message" method="post">
                            <textarea name="message" class="save-field" cols="80" rows="12"></textarea>
                            <input type="hidden" name="id" value="<?=$messages['image_id']?>">
                            <input type="submit" class="save-btn reply-btn" name="submit" value="REPLY" />
                        </form></td>
                        <td style="width: 300px;" valign="top"></td>
                    </tr><tr><td valign="top" colspan=2><table style="width: 98%">
                    <?php if(isset($messages['row'])){
                        
                        foreach($messages['row'] as $message){ ?>
                            
                            <tr><td><p class="pix-guru-chat"><?=$message['timestamp']?> <?=$message['username']?></p><br /><p class="message"><?=$message['message']?></p></td></tr>
                            
                <?php } } ?>
                
                    </table></td></tr>
                    
                <?php }
                else
                {
                    if(isset($messages)){
                        
                        foreach($messages as $message){ ?>
                            
                            <tr>
                                <td style="width: 300px;"><img src="<?php echo base_url('assets/images/test/'.$message['image']); ?>" width="250px" ></td>
                                <td valign="top"><p class="pix-guru-chat"><?=$message['timestamp']?> <?=$message['username']?></p><br /><p class="message"><?=$message['message']?></p></td>
                                <td style="width: 150px; text-align: center;"><a class="view-btn" href="/client/messages/<?=$message['image_id']?>">VIEW</a></td>
                            </tr>
                            
                    <?php } }
                } ?>
            </table>
            </div>
        </div>
        
        <div class="col-md-4">
            
            <?php if($view && isset($messages)){ ?>
                    
                    <img src="<?php echo base_url('assets/images/test/'.$messages['image']); ?>" width="100%" >
                    <?php if(isset($messages['row'])){
                        
                        foreach($messages['row'] as $message){ ?>
                            
                            <tr><td></td></tr>
                            
                <?php } } ?>
                
                    </table></td></tr>
                    
                <?php }
                else
                {
                    if(isset($messages)){
                        
                        foreach($messages as $message){ ?>
                            
                            
                            
                    <?php } }
                } ?>
            
            
        </div>
     </div>
    </div>
</center>