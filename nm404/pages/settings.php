<div class="nm404-bs" style="margin-top: 20px; width: 99%;">
    <div class="col-md-12">
        <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="button" id="stars" class="btn btn-info" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                    <div class="hidden-xs"><?php _e('General', NM404_TEXT_DOMAIN); ?></div>
                </button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    <div class="hidden-xs"><?php _e('Settings', NM404_TEXT_DOMAIN); ?></div>
                </button>
            </div>
        </div>

        <div class="well">
            <div class="tab-content">
                <div class="tab-pane fade in active row" id="tab1">

                    <div class="col-md-6">
                        <form method="post" action="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><?php _e('nm404 Status', NM404_TEXT_DOMAIN) ?></h4>
                                </div>
                                <div class="panel-body" style="min-height: 200px; font-size: 17px; padding: 0;">

                                    <table class="table table-striped" style="margin: 0;">
                                        <tbody>
                                        <tr>
                                            <td><?php _e('License', NM404_TEXT_DOMAIN); ?></td>
                                            <td>
                                                GPLv2
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php _e('Author', NM404_TEXT_DOMAIN); ?></td>
                                            <td>
                                                <a target="_blank" href="https://www.affiliate-solutions.xyz/">LAMP solutions GmbH</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php _e('Plugin URL', NM404_TEXT_DOMAIN); ?></td>
                                            <td>
                                                <a href="https://wordpress.org/plugins/nm404/" target="_blank">https://wordpress.org/plugins/nm404/</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php _e('Plugin Version', NM404_TEXT_DOMAIN); ?></td>
                                            <td>
                                                <?php
                                                $data = get_plugin_data(NM404_PLUG_FILE);
                                                echo $data['Version'];
                                                ?>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                                <div class="panel-footer">
                                    <div class="button-float-wrapper" style="min-height: 40px;">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade in row" id="tab2">
                    <div class="col-md-6">
                        <form method="post" action="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><?php _e('nm404 Settings', NM404_TEXT_DOMAIN) ?></h4>
                                </div>
                                <div class="panel-body" style="min-height: 200px;">
                                    <?php if ($error) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <span class="sr-only"><?php _e('Error', NM404_TEXT_DOMAIN); ?>:</span>
                                            <?php echo $error; ?>
                                        </div>
                                    <?php } elseif(!empty($_POST["sitemap_url"])) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                            <span class="sr-only"><?php _e('Success', NM404_TEXT_DOMAIN); ?>:</span>
                                            <?php _e('Settings saved', NM404_TEXT_DOMAIN); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label for="sitemap_url"><?php _e('Sitemap URL', NM404_TEXT_DOMAIN); ?></label>
                                        <input name="sitemap_url" class="form-control" type="text" placeholder="/sitemap.xml" id="sitemap_url" value="<?php echo $settings["sitemap_url"]; ?>">
                                        <p class="help-block">
                                            <?php
                                            $d = parse_url(get_site_url());
                                            $example = 'http://'.$_SERVER['SERVER_NAME'].'/sitemap.xml';
                                            ?>
                                            <?php printf(__('Relative (<small>%s</small>) or absolute urls (<small>%s</small>) are possible.', NM404_TEXT_DOMAIN), '/sitemap.xml', $example) ?><br/>
                                            <?php _e('The default sitemap url is <small>/sitemap.xml</small> .', NM404_TEXT_DOMAIN) ?><br/>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="limit_parsed_entries"><?php _e('Sitemap entries limit', NM404_TEXT_DOMAIN); ?></label>
                                        <input name="limit_parsed_entries" class="form-control" id="limit_parsed_entries" value="<?php echo (int)$settings["limit_parsed_entries"]; ?>" />
                                        <p class="help-block">
                                            <?php _e('For large blogs parsing dynamically generated XML-Sitemaps can take a lot of time.', NM404_TEXT_DOMAIN); ?><br />
                                            <?php _e('Limiting the entries parsed, increases speed but lowers quality of result.', NM404_TEXT_DOMAIN); ?><br />
                                            <?php _e('If your sitemap is split into more then one file, the limit is used for each single file.', NM404_TEXT_DOMAIN); ?><br />
                                            <?php _e('The default limit for entries is 1000.', NM404_TEXT_DOMAIN); ?><br />
                                            <?php _e('If you want to parse unlimited entries, set the limit to <b>-1</b>.', NM404_TEXT_DOMAIN); ?>
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="timeout"><?php _e('Sitemap retrieving timeout in seconds', NM404_TEXT_DOMAIN); ?></label>
                                        <input name="timeout" class="form-control" id="timeout" value="<?php echo (int)$settings["timeout"]; ?>" />
                                        <p class="help-block">
                                            <?php _e('If the nm404 url lookup runs into a timeout, the user will be shown the default 404 error page of your theme.', NM404_TEXT_DOMAIN); ?><br />
                                            <?php _e('The default timeout for retrieving the sitemap.xml is 3 seconds.', NM404_TEXT_DOMAIN); ?><br />
                                        </p>
                                    </div>

                                </div>
                                <div class="panel-footer">
                                    <div style="min-height: 40px;">
                                        <button name="save" value="save" class="btn btn-info btn-sm pull-right">
                                            <span class="glyphicon btn-glyphicon glyphicon glyphicon-ok img-circle text-info"></span>
                                            <?php _e('Save', NM404_TEXT_DOMAIN) ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery(".btn-pref .btn").click(function () {
                jQuery(".btn-pref .btn").removeClass("btn-info").addClass("btn-default");
                jQuery(this).removeClass("btn-default").addClass("btn-info");
            });
        });


        jQuery('button[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('NM404activeTab', jQuery(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('NM404activeTab');
        if (activeTab) {
            jQuery(".btn-pref .btn").removeClass("btn-info").addClass("btn-default");
            jQuery('button[href="' + activeTab + '"]').tab('show').removeClass("btn-default").addClass("btn-info");
        }


    </script>
</div>