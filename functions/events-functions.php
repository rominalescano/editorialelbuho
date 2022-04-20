<?php
// Add Promo
function events_form_page_handler()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'promosdata';
    $message = '';
    $notice = '';

    // this is default $item which will be used for new records
    $default = array(
        'id' => 0,
        'date' => "",
        'sport' => null,
        'league' => null,
        'event_name' => "",
        'odds_home' => 0,
        'draw' => null,
        'odds_away' => 0,
    );

    // here we are verifying does this request is post back and have correct nonce
    if (wp_verify_nonce($_REQUEST['nonce'], basename(__FILE__))) {
        // combine our default item with request params
        $item = shortcode_atts($default, $_REQUEST);
        $event_id = 0;

        // validate data, and if all ok save item to database
        // if id is zero insert otherwise update
        $item_valid = validate_event($item);

        if ($item_valid === true) {
            list($date, $time) = explode(" ", $item['date']);
            list($m, $d, $y) = explode("/", $date);
            $new_date = $y . "-" . $m . "-" . $d . " ". $time .":00.000000";
            $new_item = $item;
            $new_item['date'] = $new_date;

            //var_dump($new_date);

            if ($item['id'] == 0) {
                $result = $wpdb->insert($table_name, $new_item);
                $event_id = $wpdb->insert_id;
                $item['id'] = $event_id;

                // $wpdb->show_errors();
                // $wpdb->print_error(); die();

                if ($result) {
                    $message = __('Item was successfully saved', 'promos');
                } else {
                    $notice = __('There was an error while saving item', 'promos');
                }
            } else {
                $result = $wpdb->update($table_name, $new_item, array('id' => $item['id']));
                $event_id = $item['id'];
                if ($result !== false) {
                    $message = __('Item was successfully updated', 'promos');
                } else {

                    $notice = __('There was an error while updating item', 'promos');
                }
            }
        } else {
            $notice = $item_valid;
        }
    } else {
        // if this is not post back we load item to edit or give new one to create
        $item = $default;
        if (isset($_REQUEST['id'])) {
            $item = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $_REQUEST['id']), ARRAY_A);
            if (!$item) {
                $item = $default;
                $notice = __('Item not found', 'promos');
            }
        }
    }
    // here we adding our custom meta box
    add_meta_box('events_form_meta_box', (isset($_REQUEST['id']) ? 'Edit Event' : 'Add New Event'), 'events_form_meta_box_handler', 'promos', 'normal', 'default');

?>
    <div class="wrap">
        <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
        <h2><?php _e('Events', 'promos') ?></h2>

        <?php if (!empty($notice)) : ?>
            <div id="notice" class="error">
                <p><?php echo $notice ?></p>
            </div>
        <?php endif; ?>
        <?php if (!empty($message)) : ?>
            <div id="message" class="updated">
                <p><?php echo $message ?></p>
            </div>
        <?php endif; ?>

        <form id="form" method="POST" autocomplete="off">
            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__)) ?>" />
            <?php /* NOTICE: here we storing id to determine will be item added or updated */ ?>
            <input type="hidden" name="id" value="<?php echo $item['id'] ?>" />

            <div class="metabox-holder" id="poststuff">
                <div id="post-body">
                    <div id="post-body-content">
                        <?php /* And here we call our custom meta box */ ?>
                        <?php do_meta_boxes('promos', 'normal', $item); ?>
                        <input type="submit" value="<?php _e('Save', 'promos') ?>" id="submit" class="button-primary" name="submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php
}

function validate_event($item)
{
    $messages = array();
    if (empty($item['date'])) $messages[] = 'Please choose a date';
    if (empty($item['sport'])) $messages[] = 'Please choose a sport';
    if (empty($item['event_name'])) $messages[] = 'Event name must not be empty';
    if ($item['odds_home'] == "") $messages[] = 'Odds Home must not be empty';
    if ($item['odds_away'] == "") $messages[] = 'Odds Away must not be empty';
    if (empty($messages)) return true;
    return implode('<br />', $messages);
}

function events_form_meta_box_handler($item)
{
    $leagues = [
        'A-League', 'AFL', 'Belgian First Division A', 'Bundesliga', 'Champions League', 'Cricket Leagues', 'English Championship', 'English FA Cup', 'English League 1', 'English Premier League', 'Europa League', 'La Liga', 'Ligue 1 Orange', 'Major League Baseball', 'MLS', 'NBA', 'NRL', 'Scottish Championship', 'Serie A', 'Swedish Allsvenskan', 'Tennis Tournaments', 'Turkish Super League'
    ];

    $sports = [
        'Australian Rules Football', 'Baseball', 'Basketball', 'Cricket', 'Rugby', 'Soccer', 'Tennis'
    ];
?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('input[name="date"]').daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true,
                autoApply: true,
                timePicker: true,
                timePicker24Hour: true,
                // maxDate: today // MM/DD/YYYY
            });

            $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY HH:mm'));
            });
        });
    </script>
    <style>
        label[for="type_event"] {
            margin-right: 10px;
        }

        .form-table input[type=text],
        .form-table input[type=number],
        .form-table select {
            width: 300px;
        }
    </style>

    <table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table">
        <tbody>
            <tr class="form-field type-row type-dates">
                <th valign="top" scope="row">
                    <label for="date"><?php _e('Date', 'promos') ?> *</label>
                </th>
                <td>
                    <input id="date" name="date" type="text" value="<?php echo esc_attr($item['date']) ?>" size="50" required>
                </td>
            </tr>
            <tr class="form-field">
                <th valign="top" scope="row">
                    <label for="sport"><?php _e('Sport', 'promos') ?> *</label>
                </th>
                <td>
                    <input type="text" name="sport" id="sport" value="<?php echo esc_attr($item['sport']) ?>" required>
                    <?php /*
                    <select name="sport" required>
                        <option value="">Select sport</option>
                        <?php foreach ($sports as $sport) : ?>
                            <option value="<?php echo $sport; ?>" <?php selected($item['sport'], $sport); ?>> <?php echo $sport; ?></option>
                        <?php endforeach; ?>
                    </select>
                    */ ?>
                </td>
            </tr>
            <tr class="form-field">
                <th valign="top" scope="row">
                    <label for="league"><?php _e('League', 'promos') ?></label>
                </th>
                <td>
                    <input type="text" name="league" id="league" value="<?php echo esc_attr($item['league']) ?>">
                    <?php /*
                    <select name="league">
                        <option value="">Select league</option>
                        <?php foreach ($leagues as $league) : ?>
                            <option value="<?php echo $league; ?>" <?php selected($item['league'], $league); ?>> <?php echo $league; ?></option>
                        <?php endforeach; ?>
                    </select>
                    */ ?>
                </td>
            </tr>
            <tr class="form-field">
                <th valign="top" scope="row">
                    <label for="event_name"><?php _e('Event name', 'promos') ?> * </label>
                </th>
                <td>
                    <input id="event_name" name="event_name" type="text" value="<?php echo esc_attr($item['event_name']) ?>" size="50" required>
                </td>
            </tr>
            <tr class="form-field">
                <th valign="top" scope="row">
                    <label for="odds_home"><?php _e('Odds Home', 'promos') ?> * </label>
                </th>
                <td>
                    <input id="odds_home" name="odds_home" type="number" step="0.01" value="<?php echo esc_attr($item['odds_home']) ?>" size="50" required>
                </td>
            </tr>
            <tr class="form-field">
                <th valign="top" scope="row">
                    <label for="draw"><?php _e('Draw', 'promos') ?> </label>
                </th>
                <td>
                    <input id="draw" name="draw" type="number" step="0.01" value="<?php echo esc_attr($item['draw']) ?>" size="50">
                </td>
            </tr>
            <tr class="form-field">
                <th valign="top" scope="row">
                    <label for="odds_away"><?php _e('Odds Away', 'promos') ?> * </label>
                </th>
                <td>
                    <input id="odds_away" name="odds_away" type="number" step="0.01" value="<?php echo esc_attr($item['odds_away']) ?>" size="50" required>
                </td>
            </tr>
        </tbody>
    </table>
<?php
}
