<h3><?= T_('Cached data') ?></h3>
<p><?= T_('cached_data_descr') ?></p>

<? if (isset($action_result) && strlen($action_result) > 0 ) { ?>
<p style="border: 1px solid black; padding:10px;">
    <strong><?= $action_result ?></strong>
    <? if(isset($missing_item_images) && sizeof($missing_item_images) > 0) { ?>
    <br />
    <span style="color: red; font-weight: bold;">
    For the following items, the image could not be found. Please update the
    <tt>./images/items</tt> directory of your manaweb installation.<br />
    <tt>
        <? foreach ($missing_item_images as $img) {
                echo $img . ", ";
           }
        ?>
    </tt>
    </span>
    <? } ?>
</p>
<? } ?>


<table style="border-width: 0px; margin-bottom: 0px;">
    <tr>
        <th><?= T_('Subject') ?></th>
        <th><?= T_('Description') ?></th>
        <th><?= T_('Value') ?></th>
        <th><?= T_('Actions') ?></th>
    </tr>
    <tr>
        <td>
            <span class="label"><?= XML_MAPS_FILE ?></span>
        </td>
        <td>
            <?
            $format = T_('The file <tt>%s</tt> contains all maps provided by the map server. Manaweb uses this file to show descriptions of the character locations.');
            printf($format, XML_MAPS_FILE);
            ?>
        </td>
        <td>
            <span class="label">
                <?= date(T_('date_time_format'), $maps_file_age); ?>
            </span>
        </td>
        <td>
            <span class="label">
                <a href="<?= site_url('admin/maintenance/reload_maps.xml') ?>">
                <img src="<?= base_url() ?>images/view-refresh.png"
                    style="vertical-align: middle"
                    title="<?= T_('Reload maps database') ?>"
                    border="0">
                </a>
                &nbsp;
            </span>
        </td>
    </tr>
    <tr>
        <td>
            <span class="label"><?= XML_SKILLS_FILE ?></span>
        </td>
        <td>
            <?
            $format = T_('The file <tt>%s</tt> contains all skills a character can gain. Manaweb uses this file to show descriptions of the skills.');
            printf($format, XML_SKILLS_FILE);
            ?>
        </td>
        <td>
            <span class="label">
                <?= date(T_('date_time_format'), $skills_file_age); ?>
            </span>
        </td>
        <td>
            <span class="label">
                <a href="<?= site_url('admin/maintenance/reload_skills.xml') ?>">
                <img src="<?= base_url() ?>images/view-refresh.png"
                    style="vertical-align: middle"
                    title="<?= T_('Reload skills database') ?>"
                    border="0">
                </a>
                &nbsp;
            </span>
        </td>
    </tr>
	<tr>
        <td>
            <span class="label"><?= XML_ATTRIBUTES_FILE ?></span>
        </td>
        <td>
            <?
            $format = T_('The file <tt>%s</tt> contains all attributes a character can gain. Manaweb uses this file to show descriptions of the attributes.');
            printf($format, XML_ATTRIBUTES_FILE);
            ?>
        </td>
        <td>
            <span class="label">
                <?= date(T_('date_time_format'), $attributes_file_age); ?>
            </span>
        </td>
        <td>
            <span class="label">
                <a href="<?= site_url('admin/maintenance/reload_attributes.xml') ?>">
                <img src="<?= base_url() ?>images/view-refresh.png"
                    style="vertical-align: middle"
                    title="<?= T_('Reload attributes database') ?>"
                    border="0">
                </a>
                &nbsp;
            </span>
        </td>
    </tr>
    <tr>
        <td>
            <span class="label"><?= T_('Item graphics') ?></span>
        </td>
        <td>
            <?
            $format = T_('The database table %s contains all known items of The Mana Server. Use this function to copy all images provided by the client data to a directory accessible to the webserver.');
            $ci =& get_instance();
            $tblItems =$ci->config->item('tbl_name_items');
            printf($format, "<code>" . $tblItems . "</code>");
            ?>
        </td>
        <td></td>
        <td>
            <span class="label">
                <a href="<?= site_url('admin/maintenance/reload_item_images') ?>">
                <img src="<?= base_url() ?>images/view-refresh.png"
                    style="vertical-align: middle"
                    title="<?= T_('Reload item database') ?>"
                    border="0">
                </a>
                &nbsp;
            </span>
        </td>
    </tr>
    <tr>
        <td>
            <span class="label"><?= T_('Errorlogs') ?></span>
        </td>
        <td>
            <?= T_('CodeIgniter writes errors into daily rotating logfiles in a separate directory. Here you can see how many logfiles have been written and view these logfiles or simply clean up the directory.') ?>
        </td>
        <td nowrap>
            <!-- number of logfiles -->
            <?= T_('Files:') ?> <?= $log_count ?>
            <?php if ($log_count > 0) { ?>
            <br />
            <!-- size in kilobytes of logfiles -->
            <?= T_('Size:') ?> <?= round( $logfile_size / 1024 ) ?> <?= T_('kiB') ?><br />
            <!-- daterange -->
            <?= T_('Oldest log:') ?> <?= date(T_('date_format'), $min_date) ?> <br />
            <?= T_('Latest log:') ?> <?= date(T_('date_format'), $max_date) ?>
            <?php } ?>
        </td>
        <td>
            <?php if ($log_count > 0) { ?>
            <span class="label">
                <a href="<?= site_url('admin/maintenance/list_logfiles#loglist') ?>">
                <img src="<?= base_url() ?>images/ico-src.png"
                    style="vertical-align: middle"
                    title="<?= T_('List logfiles') ?>"
                    border="0">
                </a>

            </span>
            <?php } ?>&nbsp;
        </td>
    </tr>
    <?php if (isset($show_logfiles) && $log_count > 0) { ?>
    <tr>
        <td colspan="4">
            <a name="loglist"></a>
            <table class="datatable">
                <tr>
                    <th><?= T_('Logfile') ?></th>
                    <th><?= T_('Size') ?></th>
                    <th><?= T_('Date') ?></th>
                    <th><?= T_('Action') ?></th>
                </tr>
                <?php foreach ($logfiles as $logfile) { ?>
                <tr>
                    <td><?= $logfile['filename'] ?></td>
                    <td align="right"><?= round( $logfile['filesize'] / 1024 ) ?> kB</td>
                    <td><?= date(T_('date_time_format'), $logfile['filedate'] ) ?></td>
                    <td><a href="<?= site_url("admin/maintenance/delete_log/" . $logfile['filename']) ?>">
                            <img src="<?= base_url() ?>images/edit-delete.png"
                                 style="vertical-align: middle"
                                 title="<?= T_('Delete logfile') ?>"
                                 border="0">
                        </a>
                        <a href="<?= site_url("admin/maintenance/show_log/" . $logfile['filename']) ?>">
                            <img src="<?= base_url() ?>images/edit-find.png"
                                 style="vertical-align: middle"
                                 title="<?= T_('Show logfile') ?>"
                                 border="0">
                        </a>
                    </td>
                </tr>
                    <?php if (isset($logfile['content'])) { ?>
                    <!-- display logfile content -->
                    <tr>
                        <td colspan="4"><tt><?= nl2br($logfile['content']) ?></tt></td>
                    </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </td>
    </tr>
    <?php } ?>
</table>
