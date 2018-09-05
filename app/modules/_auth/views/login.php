<div class="container" style="margin-top:30px">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <strong><?= lang('login_heading'); ?></strong>
                </h3>
            </div>
            <div class="panel-body">
                <p><?= lang('login_subheading'); ?></p>
                <div id="infoMessage"><?= $message; ?></div>
                <?= form_open("auth/login"); ?>
                <div class="form-group">
                    <label class="control-label"><?= lang('login_identity_label', 'identity'); ?></label>
                    <?= form_input($identity + ['class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <label class="control-label"><?= lang('login_password_label', 'password'); ?></label>
                    <?= form_input($password + ['class' => 'form-control']); ?>
                </div>
                <a href="forgot_password"><?= lang('login_forgot_password'); ?></a>
                <?= form_submit('submit', lang('login_submit_btn'), ['class' => 'btn btn-primary pull-right']); ?>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

