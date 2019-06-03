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
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <?php foreach (($types?:[]) as $type): ?>
                                <?php if ($type['type_name']=='regular'): ?>
                                    
                                        <label for="regular" class="checkbox">
                                            <?php if ($type['value']==1): ?>
                                                <input type="checkbox" name="regular" id="regular" checked>
                                                <?php else: ?><input type="checkbox" name="regular" id="regular">
                                            <?php endif; ?>
                                            <b>Regular</b>
                                        </label>
                                    
                                <?php endif; ?>
                                <?php if ($type['type_name']=='emergency'): ?>
                                    
                                        <label for="emergency" class="checkbox">
                                            <?php if ($type['value']==1): ?>
                                                <input type="checkbox" name="emergency" id="emergency" checked>
                                                
                                                <?php else: ?><input type="checkbox" name="emergency" id="emergency">
                                            <?php endif; ?>
                                            <b>Emergency</b>
                                        </label>
                                    
                                <?php endif; ?>
                                <?php if ($type['type_name']=='budgeted'): ?>
                                    
                                        <label for="budgeted" class="checkbox">
                                            <?php if ($type['value']==1): ?>
                                                <input type="checkbox" name="budgeted" id="budgeted" checked>
                                                
                                                <?php else: ?><input type="checkbox" name="budgeted" id="budgeted">
                                            <?php endif; ?>
                                            <b>Budgeted</b>
                                        </label>
                                    
                                <?php endif; ?>
                                <?php if ($type['type_name']=='unbudgeted'): ?>
                                    
                                        <label for="unbudgeted" class="checkbox">
                                            <?php if ($type['value']==1): ?>
                                                <input type="checkbox" name="unbudgeted" id="unbudgeted" checked>
                                                
                                                <?php else: ?><input type="checkbox" name="unbudgeted" id="unbudgeted">
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
                            <label for="Travel" class="checkbox"><input type="checkbox" name="Travel" id="Travel"
                                    <?= ($category['value']==1?'checked':'') ?>>
                                Travel</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Supplies/Materials'): ?>
                        <div class="control">
                            <label for="Supplies/Materials" class="checkbox"><input type="checkbox"
                                    name="Supplies/Materials" id="Supplies/Materials"
                                    <?= ($category['value']==1?'checked':'') ?>> Supplies/Materials</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Software_Licenses'): ?>
                        <div class="control">
                            <label for="Software_Licenses" class="checkbox"><input type="checkbox"
                                    name="Software_Licenses" id="Software_Licenses" <?= ($category['value']==1?'checked':'') ?>>
                                Software
                                Licenses</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Preventive_Maintenance'): ?>
                        <div class="control">
                            <label for="Preventive_Maintenance" class="checkbox"><input type="checkbox"
                                    name="Preventive_Maintenance" id="Preventive_Maintenance"
                                    <?= ($category['value']==1?'checked':'') ?>> Preventive
                                Maintenance</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Insurance'): ?>
                        <div class="control">
                            <label for="Insurance" class="checkbox"><input type="checkbox" name="Insurance"
                                    id="Insurance" <?= ($category['value']==1?'checked':'') ?>>
                                Insurance</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Repair'): ?>
                        <div class="control">
                            <label for="Repair" class="checkbox"><input type="checkbox" name="Repair" id="Repair"
                                    <?= ($category['value']==1?'checked':'') ?>>
                                Repair</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Uniform/PPE'): ?>
                        <div class="control">
                            <label for="Uniform/PPE" class="checkbox"><input type="checkbox" name="Uniform/PPE"
                                    id="Uniform/PPE" <?= ($category['value']==1?'checked':'') ?>> Uniform/PPE</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($category['category_name']=='Furn/Eqpt/Fixt'): ?>
                        <div class="control">
                            <label for="Furn/Eqpt/Fixt" class="checkbox"><input type="checkbox" name="Furn/Eqpt/Fixt"
                                    id="Furn/Eqpt/Fixt" <?= ($category['value']==1?'checked':'') ?>> Furn/Eqpt/Fixt</label>
                        </div>
                    <?php endif; ?>
                    <?php if ($count==9): ?>
                        <div class="control">
                            <label for="Others" class="checkbox"><input type="checkbox" name="Others" id="Others"
                                    <?= ($category['value']==1?'checked':'') ?>>
                                Others /
                                Please specify: <input type="text" name="others_custom"
                                    value="<?= ($category['category_name']!='Others'?$category['category_name']:'') ?>"></label>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php foreach (($requests?:[]) as $request): ?>
                <div class="field is-horizontal row-clonable">
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded"><input type="text" name="quantity[]" class="input"
                                    placeholder="Quantity w/ UOM"></div>
                        </div>
                        <div class="field">
                            <div class="control is-expanded"><input type="text" name="description[]" class="input"
                                    placeholder="Description"></div>
                        </div>
                        <div class="field">
                            <div class="control is-expanded"><input type="text" name="remarks_purpose[]" class="input"
                                    placeholder="Remarks/Purpose"></div>
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
                <div class="control"><button type="button" class="button is-danger close-modal">Cancel</button></div>
            </div>
    </form>
    <?php endforeach; ?>
</section>
<script>
    jQuery(document).ready(function ($) {
        $('.close-modal').on('click', function () {
            $(this).closest('.iziModal').iziModal('close');
        });
    });
</script>