<section class="section">
    <?php foreach (($field_values?:[]) as $field_value): ?><?php endforeach; ?>
    <form action="<?= ($BASE . $action) ?>" id="add" method="post">
        <div class="field">
            <label for="<?= ($field_name) ?>" class="label"><?= ($field_formal_name) ?></label>
            <div class="control">
                <input class="input" type="<?= ($field_name=='file_upload'?'file':'text') ?>" name="<?= ($field_name) ?>" id="<?= ($field_name) ?>" value="<?= ($field_name=='purchase_order'?$field_value['purchase_order']:$field_value['purchase_received']) ?>">
            </div>
        </div>
        <div class="field is-grouped is-grouped-centered">
            <div class="control"><button type="submit" class="button">Add / Edit <?= ($field_formal_name) ?></button></div>
            <div class="control"><button type="button" class="button is-danger close-modal">Cancel</button></div>
        </div>
    </form>
</section>

<script>
    jQuery(document).ready(function ($) {
        $('.close-modal').on('click', function () {
            $(this).closest('.iziModal').iziModal('close');
        });

        $('#add').on('submit', function () {
            event.preventDefault();
            var current_form = $(this);
            var current_form_data = new FormData($(this)[0]);
            $.ajax({
                url: current_form.prop('action'),
                type: 'POST',
                data: current_form_data,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response == 'Successfully added') {
                        orders_table.ajax.reload();
                        toastr.success(response);
                        $(current_form).closest('.iziModal').iziModal('close');
                    } else {
                        toastr.error(response);
                    }
                }
            });
        });
    });
</script>