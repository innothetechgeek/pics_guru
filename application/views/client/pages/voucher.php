            
<center>
<h1 class="voucher-header">VOUCHER ORDERS</h1><table style="width: 80%">
    <?php
            echo '<tr class="voucher-details voucher-welcome">
            <td style="text-align: center; padding: 2% 0;">
                <h3>ID</h3>
            </td>
            <td style="text-align: center; padding: 2% 0;">
              <h3>VOUCHER VALUE</h3>
             </td>
             <td style="text-align: center; padding: 2% 0;">
             <h3>VOUCHER tYPE</h3>
            </td>
            <td style="text-align: center; padding: 2% 0;">
                <h3>RECIPIENT NAME</h3>
            </td>
            <td style="text-align: center; padding: 2% 0;">
                <h3>CLIENT NAME</h3>
            </td>
            <td style="text-align: center; padding: 2% 0;">
                <h3>CLIENT NUMBER</h3>
            </td>
            <td style="text-align: center; padding: 2% 0;">
                <h3>CLIENT EMAIL</h3>
            </td>
            <td style="text-align: center; padding: 2% 0;">
            <h3>STATUS</h3>
        </td>
        </tr>';
    
    foreach($vouchers as $voucher){
      if($voucher->status == 0){
        $status = 'Pending';
      } elseif($voucher->status == 1){
        $status = 'Paid';
      } elseif($voucher->status == 2){
        $status = 'Cancelled';
      } 
    echo '<tr class="voucher-details voucher-welcome">
        <td style="text-align: center; padding: 2% 0;">
            <p>'.$voucher->id.'</p>
        </td>
        <td style="text-align: center; padding: 2% 0;">
            <p>R'.$voucher->voucher_value.'</p>
        </td>
        <td style="text-align: center; padding: 2% 0;">
            <p>'.$voucher->voucher_type.'</p>
        </td>
        <td style="text-align: center; padding: 2% 0;">
            <p>'.$voucher->recipient_name.'</p>
        </td>
        <td style="text-align: center; padding: 2% 0;">
            <p>'.$voucher->client_name.'</p>
        </td>

        <td style="text-align: center; padding: 2% 0;">
            <p>'.$voucher->client_number.'</p>
        </td>
        <td style="text-align: center; padding: 2% 0;">
         <p>'.$voucher->client_email.'</p>
         </td>
         <td style="text-align: center; padding: 2% 0;">
         <p>'.$status.'</p>
         </td>
    </tr>';
    }
    ?>  
</table></center>
            
        