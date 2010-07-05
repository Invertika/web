<div>
    <a href="<?= site_url('accountmanager/settings') ?>">
        <img src="<?= base_url() . 'images/go-left.png' ?>" border="0" alt="<?= lang('back_to_settings') ?>" />
        <?= lang('back_to_settings') ?>
    </a>
</div>
<div>
    <h3><?= lang('settings_change_mail_head') ?></h3>
    <p><?= lang('settings_change_mail_descr') ?></p>

    <?php
    $attributes = array('name'=>'changeEmail', 'id'=>'ManaChangeEmail');
    echo form_open('accountmanager/changemailaddress', $attributes); ?>

    <table style="border-width: 0px; margin-bottom: 0px;">
        <? if (isset($has_errors)) { ?>
        <tr>
            <td colspan="2" style="border: 1px solid #660000; font-weight: bold;
                color: #660000;">
                Something was wrong with your new mailaddress: <br />
                <?= validation_errors(); ?>
            </td>
        </tr>
        <? } ?>

    <? if (isset($mailaddress_changed_message)) { ?>
        <tr>
            <td colspan="2" style="border: 1px solid #006600; font-weight: bold;
                color: #006600;">
                <?= $mailaddress_changed_message; ?>
            </td>
        </tr>
        <? } else { ?>

        <tr>
            <td style="border-width: 0px;">
                <label for="Mana_current_password">
                    <?= lang('settings_current_password') ?>:
                </label>
            </td>
            <td style="border-width: 0px;">
                <input type="password" size="30" tabindex="1" value=""
                       id="Mana_current_password"
                       title="<?= lang('settings_enter_current_password') ?>"
                       name="Mana_current_password" />
            </td>
        </tr>
        <tr>
            <td style="border-width: 0px;">
                <label for="Mana_new_mailaddress">
                    <?= lang('settings_new_mailaddress') ?>:
                </label>
            </td>
            <td style="border-width: 0px;">
                <input type="text" size="40" tabindex="2" value=""
                       id="Mana_new_mailaddress"
                       title="<?= lang('settings_enter_new_mailaddress') ?>"
                       name="Mana_new_mailaddress" />
            </td>
        </tr>
        <tr>
            <td style="border-width: 0px;">
                <label for="Mana_retype_mailaddress">
                    <?= lang('settings_retype_mailaddress') ?>:
                </label>
            </td>
            <td style="border-width: 0px;">
                <input type="text" size="40" tabindex="3" value=""
                       id="Mana_retype_mailaddress"
                       title="<?= lang('settings_enter_retype_mailaddress') ?>"
                       name="Mana_retype_mailaddress" />
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; border-width: 0px;">

                <input type="submit" tabindex="4"
                       value="<?= lang('settings_change_mailaddress') ?>!"
                       title="<?= lang('settings_change_mailaddress') ?>!"
                       id="ManasubmitMailddress"
                       name="ManasubmitMailddress" />
                <input type="reset" tabindex="5"
                       value="<?= lang('cancel')?>"
                       id="ManacancelMailaddress"
                       title="<?= lang('cancel')?>"
                       name="ManacancelMailaddress" />
            </td>
        </tr>
        <? } ?>
    </table>

    <?= form_close(); ?>
</div>
