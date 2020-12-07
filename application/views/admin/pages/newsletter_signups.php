<?php if($newsletters_contacts){ ?>
        <h1 class="newsletter-header">NEWSLETTERS SIGN UP</h1><table style="width: 80%">
        <table class="newsletter-r  table table-bordered">
        
        <tr class="newsletter-responses">
            <td>Newsletter</td>
            <td>Contact</td>
            <td>Email</td>
            <td>Date</td>
        </tr>    
    <?php foreach($newsletters_contacts as $contact){ ?>
        <tr>
            <td><?php echo $contact->newsletter_heading;?></td>
            <td><?php echo $contact->contact_name;?></td>
            <td><?php echo $contact->email;?></td>
            <td><?php echo $contact->created_at;?></td>
        </tr>
    <?php } ?>
        </table>
<?php } ?>
