<table class="table is-fullwidth is-striped">
    <thead>
        <tr>
            <th>Name Requested</th>
            <th>Date</th>
            <th>Purchase Recieved</th>
            <th>Purchase Order</th>            
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (($customers?:[]) as $ikey=>$customer): ?>
            <tr>
                <td><?= ($ikey) ?></td>
                <?php foreach (($customer?:[]) as $customer_data): ?>
                    <td><?= ($customer_data) ?></td>
                <?php endforeach; ?>
                <td><button class="button is-info"><i class="fas fa-eye"></i></button></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
jQuery(document).ready(function($) {
    $.ajax({
        type: 'POST',
        url: '<?= ($BASE . "/order/all") ?>',
        success: function(response) {
            console.log(response);
        }
    });
});
</script>