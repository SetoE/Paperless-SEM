<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= ($page_title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= ($BASE . '/assets/css/bulma.min.css') ?>">
    <link rel="stylesheet" href="<?= ($BASE . '/assets/css/iziModal.min.css') ?>">
    <link rel="stylesheet" href="<?= ($BASE . '/assets/css/toastr.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= ($BASE . '/assets/DataTables/datatables.min.css') ?>"/>
    <script src="<?= ($BASE . '/assets/js/jquery-3.3.1.js') ?>"></script>
    <script type="text/javascript" src="<?= ($BASE . '/assets/DataTables/datatables.min.js') ?>"></script>
    <script defer src="<?= ($BASE . '/assets/fontawesome/js/all.js') ?>"></script>
    <script src="<?= ($BASE . '/assets/js/iziModal.min.js') ?>"></script>
    <script src="<?= ($BASE . '/assets/js/toastr.min.js') ?>"></script>
    <style>
    body {
        background-color: #1f2424;
    }
    .iziModal-content {
        background-color: #1f2424;
    }
    label {
        color: white;
    }
    </style>
</head>

<body>
    <div class="navbar is-dark">
        <div class="container">
            <div class="navbar-brand">
                <a href="<?= ($BASE) ?>" class="navbar-item">
                    <img src="<?= ($BASE . '/assets/img/aai-logo.png') ?>" style="max-height: 3rem" alt="">
                </a>
            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <!-- <a href="" class="button is-primary login-button">Login</a> -->
                        <a href="<?= ($BASE . '/register') ?>" class="button is-secondary register-button">Register</a>                        
                        <?php if ($user_login): ?><a href="<?= ($BASE . '/logout') ?>" class='button is-danger is-outlined'>Logout</a><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <?php echo $this->render($content,NULL,get_defined_vars(),0); ?>
            <div class="iziModal" id="holder-modal">

            </div>
            <div class="iziModal" id="register-modal">
                <section class="section">
                    <form action="<?= ($BASE . '/order/register') ?>" id="register">
                        <div class="field">
                            <label for="name_requested" class="label">Name Requested</label>
                            <div class="control"><input name="name" type="text" class="input" id="name_requested" required></div>
                        </div>
                        <div class="field">
                            <label for="date_needed" class="label">Date Needed</label>
                            <div class="control is-expanded"><input type="date" name="date_needed" id="date_needed" class="input" required></div>
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
                            <div class="control"><input name="department" id="department" type="text" class="input" required></div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <label for="regular" class="checkbox">
                                            <input type="checkbox" name="regular" id="regular">
                                            <b>Regular</b>
                                        </label>
                                        <label for="emergency" class="checkbox">
                                            <input type="checkbox" name="emergency" id="emergency">
                                            <b>Emergency</b>
                                        </label>
                                        <label for="budgeted" class="checkbox">
                                            <input type="checkbox" name="budgeted" id="budgeted">
                                            <b>Budgeted</b>
                                        </label>
                                        <label for="unbudgeted" class="checkbox">
                                            <input type="checkbox" name="unbudgeted" id="unbudgeted">
                                            <b>Unbudgeted</b>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field is-grouped is-grouped-multiline">
                            <div class="control">
                                <label for="Travel" class="checkbox"><input type="checkbox" name="Travel" id="Travel"> Travel</label>
                            </div>
                            <div class="control">
                                <label for="Supplies/Materials" class="checkbox"><input type="checkbox" name="Supplies/Materials" id="Supplies/Materials">
                                    Supplies/Materials</label>
                            </div>
                            <div class="control">
                                <label for="Software_Licenses" class="checkbox"><input type="checkbox" name="Software_Licenses" id="Software_Licenses"> Software
                                    Licenses</label>
                            </div>
                            <div class="control">
                                <label for="Preventive_Maintenance" class="checkbox"><input type="checkbox" name="Preventive_Maintenance" id="Preventive_Maintenance"> Preventive
                                    Maintenance</label>
                            </div>
                            <div class="control">
                                <label for="Insurance" class="checkbox"><input type="checkbox" name="Insurance" id="Insurance"> Insurance</label>
                            </div>
                            <div class="control">
                                <label for="Repair" class="checkbox"><input type="checkbox" name="Repair" id="Repair"> Repair</label>
                            </div>
                            <div class="control">
                                <label for="Uniform/PPE" class="checkbox"><input type="checkbox" name="Uniform/PPE" id="Uniform/PPE"> Uniform/PPE</label>
                            </div>
                            <div class="control">
                                <label for="Furn/Eqpt/Fixt" class="checkbox"><input type="checkbox" name="Furn/Eqpt/Fixt" id="Furn/Eqpt/Fixt"> Furn/Eqpt/Fixt</label>
                            </div>
                            <div class="control">
                                <label for="Others" class="checkbox"><input type="checkbox" name="Others" id="Others"> Others / Please specify: <input type="text" name="others_custom"></label>
                            </div>
                        </div>
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
                                    <div class="control is-expanded"><button class="button is-danger delete-row"><i class="fas fa-minus"></i></button></div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control is-expanded"><button class="button is-info add-row is-fullwidth"><i class="fas fa-plus"></i></button></div>
                        </div>
                        <div class="field is-grouped is-grouped-centered">
                            <div class="control"><button type="submit" class="button is-primary">Submit</button></div>
                            <div class="control"><button class="button is-danger close-modal">Cancel</button></div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    </div>
    <script>
        var holder = {
            'url': ''
        };
        var restartHolderModal;
        jQuery(document).ready(function ($) {

            var clonable_fields = $('.row-clonable');

            function checkAvailableClonable() {
                if ($('.row-clonable').length <= 1) {
                    $('.delete-row').prop('disabled', true);
                } else {
                    $('.delete-row').prop('disabled', false);
                }
            }

            checkAvailableClonable();

            $('.login-button').on('click', function () {
                event.preventDefault();
            });

            $('.close-modal').on('click', function () {
                event.preventDefault();
                $(this).closest('.modal').iziModal('close');
            });

            $('#register-modal').iziModal({
                title: 'Register',
                fullscreen: true,
            });

            $('.register-button').on('click', function () {
                event.preventDefault();
                $('#register-modal').iziModal('open');
            });

            $('.add-row').on('click', function () {
                event.preventDefault();
                $('.row-clonable:first').clone()
                    .find("input:text").val("").end()
                    .insertAfter('.row-clonable:last');
                checkAvailableClonable();
            });

            $('#register').on('click', '.delete-row', function () {
                event.preventDefault();
                $(this).closest('.row-clonable').remove();
                checkAvailableClonable();
            });

            $('#register').on('submit', function () {
                var form = $(this);
                event.preventDefault();
                form.find(':checkbox:checked').attr('value', '1').prop('checked', true);
                form.find(':checkbox:not(:checked)').attr('value', '0').prop('checked', true);
                form.find('button[type=submit]').addClass('is-loading');
                $.ajax({
                    url: form.prop('action'),
                    type: 'POST',
                    data: form.serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.success != '') {
                            toastr.success(response.success);
                            $(':input', '#register')
                                .not(':button', ':submit', ':reset', ':hidden',
                                    'input[type=submit]')
                                .val('')
                                .prop('checked', false)
                                .prop('selected', false);
                            orders_table.ajax.reload();
                            $('#register-modal').iziModal('close');
                        } else {
                            $('input[type=checkbox]', '#register').each(function () {
                                if ($(this).attr('value') == 0) {
                                    $(this).prop('checked', false);
                                }
                            });
                            $.each(response.error, function () {
                                toastr.error(this);
                            });
                        }
                    }
                }).done(function () {
                    form.find('button[type=submit]').removeClass('is-loading');
                });
            });

            $('#holder-modal').iziModal({
                title: ' ',
                fullscreen: true,
                zindex: 1001,
                preventclose: '',
                onOpening: function (modal) {
                    modal.startLoading();
                    $.get(holder.url, function (response) {
                        $('#holder-modal .iziModal-content').html(response);
                        modal.stopLoading();
                    });
                }
            });

            $('#view_order_modal').on('click', '.edit-order', function () {
                holder.url = "<?= ($BASE . '/order/') ?>" + $('#order-id').data('id') + '/edit/';
                $('#holder-modal').iziModal('open');
            });

            $('#view_order_modal').on('click', '.add-or', function () {
                holder.url = "<?= ($BASE . '/order/') ?>" + $('#order-id').data('id') + '/add/purchase_order';
                $('#holder-modal').iziModal('open');
            });

            $('#view_order_modal').on('click', '.add-pr', function () {
                holder.url = "<?= ($BASE . '/order/') ?>" + $('#order-id').data('id') + '/add/purchase_received';
                $('#holder-modal').iziModal('open');
            });

            $('#view_order_modal').on('click', '.add-file', function () {
                holder.url = "<?= ($BASE . '/order/') ?>" + $('#order-id').data('id') + '/add/file_upload';
                $('#holder-modal').iziModal('open');
            });

            restartHolderModal = function restartHolderModal(url) {
                holder.url = url;
                $('#holder-modal').iziModal('startLoading');
                $.get(url, function (response) {
                    $('#holder-modal .iziModal-content').html(response);
                    $('#holder-modal').iziModal('stopLoading');
                });
            }
        });
    </script>
</body>

</html>