<section class="section">
    <?php foreach (($basic_info?:[]) as $info): ?>
        <input type="hidden" name="" id="order-id" data-id="<?= ($info['id']) ?>">
        <table class="table is-fullwidth">
            <tbody>
                <tr>
                    <td>Requester: </td>
                    <td><?= ($info['name']) ?></td>
                </tr>
                <tr>
                    <td>Date requested: </td>
                    <td><?= ($info['date']) ?></td>
                </tr>
                <tr>
                    <td>Date needed: </td>
                    <td><?= ($info['date_needed']) ?></td>
                </tr>
                <tr>
                    <td>Purchase Received: </td>
                    <td>
                        <?php if ($info['purchase_received'] == ''): ?>
                            ---
                            <?php else: ?><?= ($info['purchase_received']) ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Purchase Order: </td>
                    <td>
                        <?php if ($info['purchase_order'] == ''): ?>
                            ---
                            <?php else: ?><?= ($info['purchase_order']) ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td>
                        <?php if ($info['status'] == 'Pending'): ?>
                            <span class='has-text-danger'><?= ($info['status']) ?></span>
                            <?php else: ?><span class='has-text-success'><?= ($info['status']) ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- <span class="fas fa-check"></span> -->
        <div class="columns">
            <div class="column">
                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <?php foreach (($types_selected?:[]) as $type): ?>
                                    <?php if ($type['type_name']=='regular'): ?>
                                        
                                            <label for="regular" class="checkbox">
                                                <?php if ($type['value']==1): ?>
                                                    <input type="checkbox" name="regular" id="regular" disabled
                                                            checked>
                                                    
                                                    <?php else: ?><input type="checkbox" name="regular" id="regular" disabled>
                                                    
                                                <?php endif; ?>
                                                <b>Regular</b>
                                            </label>
                                        
                                    <?php endif; ?>
                                    <?php if ($type['type_name']=='emergency'): ?>
                                        
                                            <label for="emergency" class="checkbox">
                                                <?php if ($type['value']==1): ?>
                                                    <input type="checkbox" name="emergency" id="emergency"
                                                            disabled checked>
                                                    <?php else: ?><input type="checkbox" name="emergency" id="emergency"
                                                            disabled>
                                                    
                                                <?php endif; ?>
                                                <b>Emergency</b>
                                            </label>
                                        
                                    <?php endif; ?>
                                    <?php if ($type['type_name']=='budgeted'): ?>
                                        
                                            <label for="budgeted" class="checkbox">
                                                <?php if ($type['value']==1): ?>
                                                    <input type="checkbox" name="budgeted" id="budgeted" checked
                                                            disabled>
                                                    
                                                    <?php else: ?><input type="checkbox" name="budgeted" id="budgeted"
                                                            disabled>
                                                <?php endif; ?>
                                                <b>Budgeted</b>
                                            </label>
                                        
                                    <?php endif; ?>
                                    <?php if ($type['type_name']=='unbudgeted'): ?>
                                        
                                            <label for="unbudgeted" class="checkbox">
                                                <?php if ($type['value']==1): ?>
                                                    <input type="checkbox" name="unbudgeted" id="unbudgeted"
                                                            checked disabled>
                                                    <?php else: ?><input type="checkbox" name="unbudgeted" id="unbudgeted"
                                                            disabled>
                                                    
                                                <?php endif; ?>
                                                <b>Unbudgeted</b>
                                            </label>
                                        
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field is-grouped is-grouped-multiline">
                    <?php $count=0; foreach (($categories_selected?:[]) as $category): $count++; ?>
                        <?php if ($category['category_name']=='Travel'): ?>
                            <div class="control">
                                <label for="Travel" class="checkbox"><input type="checkbox" name="Travel" id="Travel"
                                        <?= ($category['value']==1?'checked':'') ?> disabled>
                                    Travel</label>
                            </div>
                        <?php endif; ?>
                        <?php if ($category['category_name']=='Supplies/Materials'): ?>
                            <div class="control">
                                <label for="Supplies/Materials" class="checkbox"><input type="checkbox"
                                        name="Supplies/Materials" id="Supplies/Materials"
                                        <?= ($category['value']==1?'checked':'') ?> disabled> Supplies/Materials</label>
                            </div>
                        <?php endif; ?>
                        <?php if ($category['category_name']=='Software_Licenses'): ?>
                            <div class="control">
                                <label for="Software_Licenses" class="checkbox"><input type="checkbox"
                                        name="Software_Licenses" id="Software_Licenses"
                                        <?= ($category['value']==1?'checked':'') ?> disabled> Software
                                    Licenses</label>
                            </div>
                        <?php endif; ?>
                        <?php if ($category['category_name']=='Preventive_Maintenance'): ?>
                            <div class="control">
                                <label for="Preventive_Maintenance" class="checkbox"><input type="checkbox"
                                        name="Preventive_Maintenance" id="Preventive_Maintenance"
                                        <?= ($category['value']==1?'checked':'') ?> disabled> Preventive
                                    Maintenance</label>
                            </div>
                        <?php endif; ?>
                        <?php if ($category['category_name']=='Insurance'): ?>
                            <div class="control">
                                <label for="Insurance" class="checkbox"><input type="checkbox" name="Insurance"
                                        id="Insurance" <?= ($category['value']==1?'checked':'') ?> disabled>
                                    Insurance</label>
                            </div>
                        <?php endif; ?>
                        <?php if ($category['category_name']=='Repair'): ?>
                            <div class="control">
                                <label for="Repair" class="checkbox"><input type="checkbox" name="Repair" id="Repair"
                                        <?= ($category['value']==1?'checked':'') ?> disabled>
                                    Repair</label>
                            </div>
                        <?php endif; ?>
                        <?php if ($category['category_name']=='Uniform/PPE'): ?>
                            <div class="control">
                                <label for="Uniform/PPE" class="checkbox"><input type="checkbox" name="Uniform/PPE"
                                        id="Uniform/PPE" <?= ($category['value']==1?'checked':'') ?> disabled> Uniform/PPE</label>
                            </div>
                        <?php endif; ?>
                        <?php if ($category['category_name']=='Furn/Eqpt/Fixt'): ?>
                            <div class="control">
                                <label for="Furn/Eqpt/Fixt" class="checkbox"><input type="checkbox"
                                        name="Furn/Eqpt/Fixt" id="Furn/Eqpt/Fixt" <?= ($category['value']==1?'checked':'') ?> disabled>
                                    Furn/Eqpt/Fixt</label>
                            </div>
                        <?php endif; ?>
                        <?php if ($count==9): ?>
                            <div class="control">
                                <label for="Others" class="checkbox"><input type="checkbox" name="Others" id="Others"
                                        <?= ($category['value']==1?'checked':'') ?> disabled>
                                    Others /
                                    Please specify: <input type="text" name="others_custom"
                                        value="<?= ($category['category_name']!='Others'?$category['category_name']:'') ?>" disabled></label>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <table class="table is-fullwidth">
            <thead>
                <th>Quantity with OUM</th>
                <th>Description</th>
                <th>Remarks / Purpose</th>
            </thead>
            <tbody>
                <?php foreach (($requests?:[]) as $request): ?>
                    <tr>
                        <td><?= ($request['quantity_with_oum']) ?></td>
                        <td><?= ($request['description']) ?></td>
                        <td><?= ($request['remarks_or_purpose']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="buttons">
            <button class="button is-info edit-order"><span class="icon"><i
                        class="fas fa-pen"></i></span><span>Edit</span></button>
            <button class="button add-pr"><span class="icon"><i class="fas fa-plus"></i></span><span>Add
                    PR</span></button>
            <button class="button add-or"><span class="icon"><i class="fas fa-plus"></i></span><span>Add
                    OR</span></button>
            <button class="button print-pdf"><span class="icon"><i class="fas fa-file-pdf"></i></span><span>Print to
                    PDF</span></button>
            <button class="button is-danger close-view-modal"><span class="icon"><i
                        class="fas fa-window-close"></i></span><span>Cancel</span></button>
        </div>
    <?php endforeach; ?>
</section>

<script>
    jQuery(document).ready(function ($) {
        $('.close-view-modal').on('click', function () {
            $('#view_order_modal').iziModal('close');
        });
    });
</script>