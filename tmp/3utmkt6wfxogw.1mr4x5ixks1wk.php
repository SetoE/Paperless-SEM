<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= ($page_title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= ($BASE . '/assets/css/bulma.min.css') ?>">
    <link rel="stylesheet" href="<?= ($BASE . '/assets/css/iziModal.min.css') ?>">
    <script defer src="<?= ($BASE . '/assets/fontawesome/js/all.js') ?>"></script>
    <script src="<?= ($BASE . '/assets/js/jquery-3.3.1.js') ?>"></script>
    <script src="<?= ($BASE . '/assets/js/iziModal.min.js') ?>"></script>
</head>

<body>
    <div class="navbar is-white">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <?php echo $this->render('views/' . $content,NULL,get_defined_vars(),0); ?>
            <div class="modal" id="login-modal">
                <div class="modal-background close-modal"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Login</p>
                        <button class="delete close-modal" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <div class="field">
                            <label class="label" for="username">Username</label>
                            <div class="control has-icons-left">
                                <input class="input" type="text">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="password">Password</label>
                            <div class="control has-icons-left">
                                <input class="input" type="password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control"><button class="button is-success">Login</button></div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="iziModal" id="register-modal">
                <section class="section">
                    <form action="">
                        <div class="field">
                            <label for="name_requested" class="label">Name Requested</label>
                            <div class="control"><input type="text" class="input" id="name_requested"></div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <label for="" class="label">Date</label>
                                    <div class="control is-expanded"><input type="date" name="" id="" class="input"></div>
                                </div>
                                <div class="field">
                                    <label for="" class="label">Date Needed</label>
                                    <div class="control is-expanded"><input type="date" name="" id="" class="input"></div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label for="" class="label">Department</label>
                            <div class="control"><input type="text" class="input"></div>
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
                                <label for="" class="checkbox"><input type="checkbox" name="" id=""> Travel</label>
                            </div>
                            <div class="control">
                                <label for="" class="checkbox"><input type="checkbox" name="" id="">
                                    Supplies/Materials</label>
                            </div>
                            <div class="control">
                                <label for="" class="checkbox"><input type="checkbox" name="" id=""> Software
                                    Licenses</label>
                            </div>
                            <div class="control">
                                <label for="" class="checkbox"><input type="checkbox" name="" id=""> Preventive
                                    Maintenance</label>
                            </div>
                            <div class="control">
                                <label for="" class="checkbox"><input type="checkbox" name="" id=""> Insurance</label>
                            </div>
                            <div class="control">
                                <label for="" class="checkbox"><input type="checkbox" name="" id=""> Repair</label>
                            </div>
                            <div class="control">
                                <label for="" class="checkbox"><input type="checkbox" name="" id=""> Uniform/PPE</label>
                            </div>
                            <div class="control">
                                <label for="" class="checkbox"><input type="checkbox" name="" id=""> Furn/Eqpt/Fixt</label>
                            </div>
                            <div class="control">
                                <label for="" class="checkbox"><input type="checkbox" name="" id=""> Others / Please specify: <input type="text"></label>
                            </div>
                        </div>
                        <div class="field is-horizontal row-clonable">
                            <div class="field-body">
                                <div class="field">
                                    <div class="control is-expanded"><input type="text" name="" id="" class="input"
                                            placeholder="Quantity w/ UOM"></div>
                                </div>
                                <div class="field">
                                    <div class="control is-expanded"><input type="text" name="" id="" class="input"
                                            placeholder="Description"></div>
                                </div>
                                <div class="field">
                                    <div class="control is-expanded"><input type="text" name="" id="" class="input"
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
                            <div class="control"><input type="submit" class="button is-primary" value="Submit"></div>
                            <div class="control"><button class="button is-danger close-modal">Cancel</button></div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    </div>
    <script>
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
                $('.row-clonable:first').clone().insertAfter('.row-clonable:last');
                checkAvailableClonable();
            });

            $(document).on('click', '.delete-row', function () {
                event.preventDefault();
                $(this).closest('.row-clonable').remove();
                checkAvailableClonable();
            });
        });
    </script>
</body>

</html>