<section class="section">
    <form action="<?= ($BASE . '/login/') ?>" method="POST" id="login-form">
        <input type="hidden" name="routeback" value="<?= ($BASE . $routeback) ?>" id="routeback">
        <div class="field">
            <label class="label" for="username">Username</label>
            <div class="control has-icons-left">
                <input class="input" type="text" name="username" id="username">
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
            </div>
            <p class="help is-danger username">Username doesn't exists</p>            
        </div>
        <div class="field">
            <label class="label" for="password">Password</label>
            <div class="control has-icons-left">
                <input class="input" type="password" name="password" id="password">
                <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
            <p class="help is-danger password">Password doesn't match to database</p>
        </div>
        <div class="field is-grouped is-grouped-centered">
            <div class="control"><input class="button is-success" type="submit" value="Login"></div>
            <div class="control"><button type="button" class="button is-danger close-login-modal">Cancel</button></div>
        </div>
    </form>
</section>

<script>
    jQuery(document).ready(function ($) {
        $('.help').hide();
        $('#login-form').on('submit', function(e) {
            e.preventDefault();            
            $('.help').hide();
            $('#username').removeClass('is-danger');
            $('#password').removeClass('is-danger');
            $.ajax({
                url: $('#login-form').prop('action'),
                type: $('#login-form').prop('method'),
                data: $('#login-form').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success != '') {                        
                        restartHolderModal($('#routeback').val());
                    } else {
                        $.each(response.error, function () {
                            if (this == 'username') {
                                $('#username').addClass('is-danger');
                                $('.username.help').show();
                            }

                            if (this == 'password') {
                                $('#password').addClass('is-danger');
                                $('.password.help').show();
                            }
                        });
                    }
                }
            }).done(function () {

            });
        });

        $('.close-login-modal').on('click', function () {
            $('#holder-modal').iziModal('close');
        });
    });
</script>