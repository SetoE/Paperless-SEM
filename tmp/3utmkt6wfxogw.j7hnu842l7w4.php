<section class="section">
    <form action="<?= ($BASE . $action) ?>" id="edit">
        <?php foreach (($basic_info?:[]) as $info): ?>
            <div class="field">
                <label for="name_requested" class="label">Name Requested</label>
                <div class="control"><input name="name" type="text" class="input" id="name_requested"
                        value="<?= ($info['name']) ?>" required></div>
            </div>
            <div class="field">
                <label for="date_needed" class="label">Date Needed</label>
                <div class="control is-expanded"><input type="date" name="date_needed" id="date_needed" class="input"
                        value="<?= ($info['formatted_date_needed']) ?>" required></div>
            </div>
            <!-- <div class="field is-horizontal">
            <div class="field-body">
                <div class="field">
                    <label for="date" class="label">Date</label>
                    <div class="control is-expanded"><input type="date" name="date" id="date" class="input"></div>
                </div>
                <div class="field">
                    <label for="date_needed" class="label">Date Needed</label>
                    <div class="control is-expanded"><input type="date" name="date_needed" id="date_needed" class="input"></div>
                </div>
            </div>
        </div> -->
            <div class="field">
                <label for="department" class="label">Department</label>
                <div class="control"><input name="department" id="department" type="text" class="input"
                        value="<?= ($info['department']) ?>" required></div>
            </div>
            <?php if ($user_login): ?>
                
                    <div class="field">
                <label for="purchase_order" class="label">Purchase Order</label>
                <div class="control"><input name="purchase_order" id="purchase_order" type="text" class="input"
                        value="<?= ($info['purchase_order']!=''?$info['purchase_order']:'PO not set') ?>"
                        <?= ($info['purchase_order']!=''?'':'disabled readonly') ?>></div>
            </div>
            <div class="field">
                <label for="purchase_received" class="label">Purchase Received</label>
                <div class="control"><input name="purchase_received" id="purchase_received" type="text" class="input"
                        value="<?= ($info['purchase_received']!=''?$info['purchase_received']:'PR not set') ?>"
                        <?= ($info['purchase_received']!=''?'':'disabled readonly') ?>></div>
            </div>
            <div class="field">
                <label for="status" class="label">Status</label>
                <div class="control">
                    <div class="select">
                        <select name="status" id="status">
                            <option value="Pending" <?= ($info['status']=='Pending'?'selected':'') ?>>Pending</option>
                            <option value="Complete" <?= ($info['status']=='Complete'?'selected':'') ?>>Complete</option>
                        </select>
                    </div>
                </div>
            </div>
                
            <?php endif; ?>
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <?php foreach (($types?:[]) as $type): ?>
                                <?php if ($type['type_name']=='regular'): ?>
                                    
                                        <label for="regular_edit" class="checkbox">
                                            <?php if ($type['value']==1): ?>
                                                <input type="checkbox" name="regular" id="regular_edit" checked>
                                                
                                                <?php else: ?><input type="checkbox" name="regular" id="regular_edit">
                                            <?php endif; ?>
                                            <b>Regular</b>
                                        </label>
                                    
                                <?php endif; ?>
                                <?php if ($type['type_name']=='emergency'): ?>
                                    
                                        <label for="emergency_edit" class="checkbox">
                                            <?php if ($type['value']==1): ?>
                                                <input type="checkbox" name="emergency" id="emergency_edit" checked>
                                                
                                                <?php else: ?><input type="checkbox" name="emergency" id="emergency_edit">
                                                
                                            <?php endif; ?>
                                            <b>Emergency</b>
                                        </label>
                                    
                                <?php endif; ?>
                                <?php if ($type['type_name']=='budgeted'): ?>
                                    
                                        <label for="budgeted_edit" class="checkbox">
                                            <?php if ($type['value']==1): ?>
                                                <input type="checkbox" name="budgeted" id="budgeted_edit" checked>
                                                
                                                <?php else: ?><input type="checkbox" name="budgeted" id="budgeted_edit">
                                            <?php endif; ?>
                                            <b>Budgeted</b>
                                        </label>
                                    
                                <?php endif; ?>
                                <?php if ($type['type_name']=='unbudgeted'): ?>
                                    
                                        <label for="unbudgeted_edit" class="checkbox">
                                            <?php if ($type['value']==1): ?>
                                                <input type="checkbox" name="unbudgeted" id="unbudgeted_edit" checked>
                                                
                                                <?php else: ?><input type="checkbox" name="unbudgeted" id="unbudgeted_edit">
                                                
                                            <?php endif; ?>
                                            <b>Unbudgeted</b>
                                        </label>
                                    
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-grouped is-grouped-multiline">
                <?php $count=0; foreach (($categories?:[]) as $category): $count++; ?>
                    <?php if ($category['category_name']=='Travel'): ?>
                        <div class="control">
                            <label for="Travel_edit" class="checkbox"><input type="checkbox" name="Travel" id="Travel_edit"
                                    <?= ($category['value']==1?'checked':'') ?>>
                                Travel</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Supplies/Materials'): ?>
                        <div class="control">
                            <label for="Supplies/Materials_edit" class="checkbox"><input type="checkbox"
                                    name="Supplies/Materials" id="Supplies/Materials_edit"
                                    <?= ($category['value']==1?'checked':'') ?>> Supplies/Materials</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Software_Licenses'): ?>
                        <div class="control">
                            <label for="Software_Licenses_edit" class="checkbox"><input type="checkbox"
                                    name="Software_Licenses" id="Software_Licenses_edit" <?= ($category['value']==1?'checked':'') ?>>
                                Software
                                Licenses</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Preventive_Maintenance'): ?>
                        <div class="control">
                            <label for="Preventive_Maintenance_edit" class="checkbox"><input type="checkbox"
                                    name="Preventive_Maintenance" id="Preventive_Maintenance_edit"
                                    <?= ($category['value']==1?'checked':'') ?>> Preventive
                                Maintenance</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Insurance'): ?>
                        <div class="control">
                            <label for="Insurance_edit" class="checkbox"><input type="checkbox" name="Insurance"
                                    id="Insurance_edit" <?= ($category['value']==1?'checked':'') ?>>
                                Insurance</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Repair'): ?>
                        <div class="control">
                            <label for="Repair_edit" class="checkbox"><input type="checkbox" name="Repair" id="Repair_edit"
                                    <?= ($category['value']==1?'checked':'') ?>>
                                Repair</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Uniform/PPE'): ?>
                        <div class="control">
                            <label for="Uniform/PPE_edit" class="checkbox"><input type="checkbox" name="Uniform/PPE"
                                    id="Uniform/PPE_edit" <?= ($category['value']==1?'checked':'') ?>> Uniform/PPE</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Furn/Eqpt/Fixt'): ?>
                        <div class="control">
                            <label for="Furn/Eqpt/Fixt_edit" class="checkbox"><input type="checkbox" name="Furn/Eqpt/Fixt"
                                    id="Furn/Eqpt/Fixt_edit" <?= ($category['value']==1?'checked':'') ?>>
                                Furn/Eqpt/Fixt</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($count==9): ?>
                        <div class="control">
                            <label for="Others_edit" class="checkbox"><input type="checkbox" name="Others" id="Others_edit"
                                    <?= ($category['value']==1?'checked':'') ?>>
                                Others /
                                Please specify: <input type="text" name="others_custom"
                                    value="<?= ($category['category_name']!='Others'?$category['category_name']:'') ?>"></label>
                            <input type="hidden" name="others_custom_old"
                                value="<?= ($category['category_name']!='Others'?$category['category_name']:'') ?>">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php foreach (($requests?:[]) as $request): ?>
                <div class="field is-horizontal edit-row-clonable">
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded"><input type="text" name="quantity[]" class="input"
                                    placeholder="Quantity w/ UOM" value="<?= ($request['quantity_with_oum']) ?>"></div>
                        </div>
                        <div class="field">
                            <div class="control is-expanded"><input type="text" name="description[]" class="input"
                                    placeholder="Description" value="<?= ($request['description']) ?>"></div>
                        </div>
                        <div class="field">
                            <div class="control is-expanded"><input type="text" name="remarks_purpose[]" class="input"
                                    placeholder="Remarks/Purpose" value="<?= ($request['remarks_or_purpose']) ?>"></div>
                        </div>
                        <div class="field">
                            <div class="control is-expanded"><button class="button is-danger delete-row"><i
                                        class="fas fa-minus"></i></button></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="field">
                <div class="control is-expanded"><button type="button" class="button is-info add-row is-fullwidth"><i
                            class="fas fa-plus"></i></button></div>
            </div>
            <div class="field is-grouped is-grouped-centered">
                <div class="control"><button type="submit" class="button is-primary">Submit</button></div>
                <div class="control"><button type="button" class="button is-danger close-modal">Cancel</button>
                </div>
            </div>
    </form>
    <?php endforeach; ?>
</section>
<script>
    jQuery(document).ready(function ($) {
        $('.close-modal').on('click', function () {
            $(this).closest('.iziModal').iziModal('close');
        });

        function checkAvailableClonable() {
            if ($('.edit-row-clonable').length <= 1) {
                $('.delete-row').prop('disabled', true);
            } else {
                $('.delete-row').prop('disabled', false);
            }
        }

        $('.add-row').on('click', function () {
            event.preventDefault();
            $('.edit-row-clonable:first').clone()
                .find("input:text").val("").end()
                .insertAfter('.edit-row-clonable:last');
            checkAvailableClonable();
        });

        $('#edit').on('click', '.delete-row', function () {
            event.preventDefault();
            $(this).closest('.edit-row-clonable').remove();
            checkAvailableClonable();
        });

        $('#edit').on('submit', function () {
            event.preventDefault();
            var current_form = $(this);
            event.preventDefault();
            current_form.find(':checkbox:checked').attr('value', '1').prop('checked', true);
            current_form.find(':checkbox:not(:checked)').attr('value', '0').prop('checked', true);
            current_form.find('button[type=submit]').addClass('is-loading');
            $.ajax({
                url: current_form.prop('action'),
                type: 'POST',
                data: current_form.serialize(),
                dataType: 'json',
                success: function (response) {
                    // console.log(response);
                    $(':input', '#register')
                        .not(':button', ':submit', ':reset', ':hidden',
                            'input[type=submit]')
                        .val('')
                        .prop('checked', false)
                        .prop('selected', false);
                    orders_table.ajax.reload();
                    toastr.success('Successfully edited');
                    $(current_form).closest('.iziModal').iziModal('close');
                    // restartHolderModal(current_form.prop('action'));
                }
            });
        });
    });
</script>