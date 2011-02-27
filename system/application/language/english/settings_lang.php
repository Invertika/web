<?php
/*
 *  The Mana Server Account Manager
 *  Copyright 2008 The Mana Server Development Team
 *
 *  This file is part of The Mana Server.
 *
 *  The Mana Server  is free software; you can redistribute  it and/or modify it
 *  under the terms of the GNU General  Public License as published by the Free
 *  Software Foundation; either version 2 of the License, or any later version.
 *
 *  The Mana Server is  distributed in  the hope  that it  will be  useful, but
 *  WITHOUT ANY WARRANTY; without even  the implied warranty of MERCHANTABILITY
 *  or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 *  more details.
 *
 *  You should  have received a  copy of the  GNU General Public  License along
 *  with The Mana Server; if not, write to the  Free Software Foundation, Inc.,
 *  59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 */

// header /////////////////////////////////////////////////////////////////////

$lang['settings_title']                 = 'Account Settings';

$lang['settings_descr'] =
 "On this page you have serveral options to modify your account settings.\n".
 " Maybe you would like to change your stored mailadress, or change your login".
 " password or even drop your complete account? Just select one of the options".
 " below.";

$lang['settings_selection']             = 'I would like to...';
$lang['settings_select_password']       = '...change my password.';
$lang['settings_select_mail']           = '...change my mailaddress.';
$lang['settings_select_delete_account'] = '...delete my account.';
$lang['back_to_settings']               = 'back to the settings';


// change password ////////////////////////////////////////////////////////////

$lang['settings_change_pwd_head']       = 'Change your password';
$lang['settings_change_pwd_descr'] =
 'To change your password, please type in your current password, a new'.
 ' password for your account and retype it to be sure you have no typo in it.';

$lang['settings_old_password']          = 'old password';
$lang['settings_enter_old_password']    = 'Please enter your old password';

$lang['settings_new_password']          = 'new password';
$lang['settings_enter_new_password']    = 'Please enter your new password';

$lang['settings_retype_password']       = 'retype password';
$lang['settings_retype_new_password']   = 'Please retype your new password';

$lang['settings_change_password']       = 'Change password';
$lang['settings_change_password_ok']    = 'Your new password has been saved.';

$lang['settings_pwd_to_short']          = 'The given password is to short.';
$lang['settings_pwd_to_long']           = 'The given password is to long.';
$lang['settings_pwd_eq_username']       = 'The password must be different '.
                                          'then your username.';

// change mailadress //////////////////////////////////////////////////////////

$lang['settings_change_mail_head']      = 'Change your mailaddress';
$lang['settings_change_mail_descr']     =
    'With this form you can change your mailaddress. Please enter your current'.
    ' password and two times your new mailaddress. Your mailaddress will be'.
    'stored in a crypted format so there is no chance to receive spam from us!';
$lang['mailaddress_changed_message']    = 'Your new mailaddress has been saved successfully.';

$lang['settings_current_password']      = 'current password';
$lang['settings_enter_current_password']= 'Please enter your current password';

$lang['settings_new_mailaddress']       = 'new mailaddress';
$lang['settings_enter_new_mailaddress'] = 'Please enter your new mailaddress';

$lang['settings_retype_mailaddress']       = 'retype mailaddress';
$lang['settings_enter_retype_mailaddress'] = 'Please retype your new mailaddress';

$lang['settings_change_mailaddress']       = 'Change mailaddress';

// delete account /////////////////////////////////////////////////////////////

$lang['settings_delete_account_head']   = 'Delete your account';
$lang['settings_delete_account_descr']  =
 'With this option you can delete your account including all your characters.'.
 ' Be warned, that this action is <strong>not revertable</strong> and we are'.
 ' <strong>not able to restore your characters</strong> after that!'.
 ' Besides it would be nice if you leave a message in the forum why you wanna'.
 ' leave The Mana Server.';

$lang['settings_delete_account']        = 'Yes, delete my account!';

?>