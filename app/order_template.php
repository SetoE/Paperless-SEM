<p></p>
<link rel="stylesheet" href="assets/css/bulma-normal.css">

<section class="section">
    <style>
        label {
            display: block;
            padding-left: 15px;
            margin-top: 5px;
            text-indent: -15px;
        }

        input {
            width: 10px;
            height: 13px;
            padding: 0;
            margin: 0;
            vertical-align: bottom;
            position: relative;
            top: -1px;
            *overflow: hidden;
        }
    </style>
    <img src="assets/img/aai-logo.png" alt="">
    <h1 class="title">Services, Equipment, and Materials (SEM) Form</h1>
    <?php foreach (($basic_info ?: []) as $info) : ?>
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
                        <?php if ($info['purchase_received'] == '') : ?>
                            ---
                        <?php else : ?><?= ($info['purchase_received']) ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Purchase Order: </td>
                    <td>
                        <?php if ($info['purchase_order'] == '') : ?>
                            ---
                        <?php else : ?><?= ($info['purchase_order']) ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td>
                        <?php if ($info['status'] == 'Pending') : ?>
                            <span class='has-text-danger'><?= ($info['status']) ?></span>
                        <?php else : ?><span class='has-text-success'><?= ($info['status']) ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table is-fullwidth" style="margin-top:20px;">
            <tbody>
                <tr>
                    <?php foreach (($types_selected ?: []) as $type) : ?>
                        <td>
                            <label class="">
                                <input type="checkbox" name="" id="" <?= $type['value'] == 1 ? 'checked' : '' ?>>
                                <b>
                                    <?= $type['type_name'] == 'regular' ? 'Regular' : ''; ?>
                                    <?= $type['type_name'] == 'emergency' ? 'Emergency' : ''; ?>
                                    <?= $type['type_name'] == 'budgeted' ? 'Budgeted' : ''; ?>
                                    <?= $type['type_name'] == 'unbudgeted' ? 'Unbudgeted' : ''; ?>
                                </b>
                            </label>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>

        <table class="table is-fullwidth" style="margin-top:20px;">
            <tbody>
                <?php $count = 0;
                foreach (($categories_selected ?: []) as $category) : $count++; ?>
                    <?php if ($count % 3 == 0) : ?>
                        <tr>
                        <?php endif; ?>
                        <td>
                            <?php if ($category['category_name'] == 'Travel') : ?>
                                <div class="control">
                                    <label for="Travel" class="checkbox"><input type="checkbox" name="Travel" id="Travel" <?= ($category['value'] == 1 ? 'checked' : '') ?> disabled>
                                        Travel</label>
                                </div>
                            <?php endif; ?>
                            <?php if ($category['category_name'] == 'Supplies/Materials') : ?>
                                <div class="control">
                                    <label for="Supplies/Materials" class="checkbox"><input type="checkbox" name="Supplies/Materials" id="Supplies/Materials" <?= ($category['value'] == 1 ? 'checked' : '') ?> disabled> Supplies/Materials</label>
                                </div>
                            <?php endif; ?>
                            <?php if ($category['category_name'] == 'Software_Licenses') : ?>
                                <div class="control">
                                    <label for="Software_Licenses" class="checkbox"><input type="checkbox" name="Software_Licenses" id="Software_Licenses" <?= ($category['value'] == 1 ? 'checked' : '') ?> disabled> Software
                                        Licenses</label>
                                </div>
                            <?php endif; ?>
                            <?php if ($category['category_name'] == 'Preventive_Maintenance') : ?>
                                <div class="control">
                                    <label for="Preventive_Maintenance" class="checkbox"><input type="checkbox" name="Preventive_Maintenance" id="Preventive_Maintenance" <?= ($category['value'] == 1 ? 'checked' : '') ?> disabled> Preventive
                                        Maintenance</label>
                                </div>
                            <?php endif; ?>
                            <?php if ($category['category_name'] == 'Insurance') : ?>
                                <div class="control">
                                    <label for="Insurance" class="checkbox"><input type="checkbox" name="Insurance" id="Insurance" <?= ($category['value'] == 1 ? 'checked' : '') ?> disabled>
                                        Insurance</label>
                                </div>
                            <?php endif; ?>
                            <?php if ($category['category_name'] == 'Repair') : ?>
                                <div class="control">
                                    <label for="Repair" class="checkbox"><input type="checkbox" name="Repair" id="Repair" <?= ($category['value'] == 1 ? 'checked' : '') ?> disabled>
                                        Repair</label>
                                </div>
                            <?php endif; ?>
                            <?php if ($category['category_name'] == 'Uniform/PPE') : ?>
                                <div class="control">
                                    <label for="Uniform/PPE" class="checkbox"><input type="checkbox" name="Uniform/PPE" id="Uniform/PPE" <?= ($category['value'] == 1 ? 'checked' : '') ?> disabled> Uniform/PPE</label>
                                </div>
                            <?php endif; ?>
                            <?php if ($category['category_name'] == 'Furn/Eqpt/Fixt') : ?>
                                <div class="control">
                                    <label for="Furn/Eqpt/Fixt" class="checkbox"><input type="checkbox" name="Furn/Eqpt/Fixt" id="Furn/Eqpt/Fixt" <?= ($category['value'] == 1 ? 'checked' : '') ?> disabled>
                                        Furn/Eqpt/Fixt</label>
                                </div>
                            <?php endif; ?>
                            <?php if ($count == 9) : ?>
                                <div class="control">
                                    <label for="Others" class="checkbox"><input type="checkbox" name="Others" id="Others" <?= ($category['value'] == 1 ? 'checked' : '') ?> disabled>
                                        Others /
                                        Please specify: <?= ($category['category_name'] != 'Others' ? $category['category_name'] : '') ?></label>
                                </div>
                            <?php endif; ?>
                            <?php if ($count % 3 == 0) : ?>
                        </tr>
                    <?php endif; ?>
                    </td>
                <?php endforeach; ?>
            </tbody>
        </table>

        <table class="table is-fullwidth" style="margin-top:20px;">
            <thead>
                <tr>
                    <th>Quantity with OUM</th>
                    <th>Description</th>
                    <th>Remarks / Purpose</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (($requests ?: []) as $request) : ?>
                    <tr>
                        <td><?= ($request['quantity_with_oum']) ?></td>
                        <td><?= ($request['description']) ?></td>
                        <td><?= ($request['remarks_or_purpose']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach; ?>
</section>