<table class="table table-bordered">
    <thead>
    <tr>
        <td>Membership</td>
        <td>Amount</td>
        <td>SubscriptionID</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <?php echo ucfirst(str_replace('_'," ",$subscription->type)); ?>
        </td>
        <td>
            <?php echo '$'.$subscription->price; ?>
        </td>
        <td>
            <?php echo $subscription->subscriptionId; ?>
        </td>
    </tr>
    </tbody>
</table>