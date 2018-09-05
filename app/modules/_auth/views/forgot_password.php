<div class="container" style="margin-top:30px">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <strong><?= lang('forgot_password_heading'); ?></strong>
                </h3>
            </div>
            <div class="panel-body">
                <p><?= sprintf(lang('forgot_password_subheading'), $identity_label); ?></p>
                <div id="infoMessage"><?= $message; ?></div>
                <?= form_open("auth/forgot_password"); ?>
                <div class="form-group">
                    <label class="control-label">
                        <?= (($type == 'email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label)); ?>
                    </label>
                <?= form_input($identity + ['class' => 'form-control']); ?>
                </div>
                <?= form_submit('submit', lang('forgot_password_submit_btn'), ['class' => 'btn btn-primary pull-right']); ?>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
