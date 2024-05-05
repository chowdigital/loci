<?php // Add custom metaboxes for Home William template

function custom_theme_add_metaboxes() {
    global $post;

    // Check if the current page is using the "Home William" template
    $template_slug = get_page_template_slug( $post->ID );
    if ( 'template-home.php' === $template_slug ) {
        add_meta_box(
            'hero_item_1_metabox',
            'Hero Item 1 Options',
            'custom_theme_render_metabox',
            'page',
            'normal',
            'high',
            array('metabox_id' => 'hero_item_1_metabox')
        );

        add_meta_box(
            'hero_item_2_metabox',
            'Hero Item 2 Options',
            'custom_theme_render_metabox',
            'page',
            'normal',
            'high',
            array('metabox_id' => 'hero_item_2_metabox')
        );

        add_meta_box(
            'hero_item_3_metabox',
            'Hero Item 3 Options',
            'custom_theme_render_metabox',
            'page',
            'normal',
            'high',
            array('metabox_id' => 'hero_item_3_metabox')
        );

        add_meta_box(
            'history_metabox',
            'History',
            'custom_theme_render_history_metabox',
            'page',
            'normal',
            'high'
        );

        add_meta_box(
            'gallery_metabox',
            'Gallery',
            'custom_theme_render_gallery_metabox',
            'page',
            'normal',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'custom_theme_add_metaboxes' );

function custom_theme_render_metabox( $post, $metabox ) {
    // Retrieve existing values from post meta
    $fields = array(
        'image_url' => 'Image URL',
        'headline' => 'Headline',
        'body_copy' => 'Body Copy',
        'button_text' => 'Button Text',
        'button_link' => 'Button Link'
    );

    foreach ($fields as $key => $label) {
        $field_value = get_post_meta( $post->ID, $metabox['args']['metabox_id'] . '_' . $key, true );
        ?>
<p>
    <label for="<?php echo $metabox['args']['metabox_id'] . '_' . $key; ?>"><?php echo $label; ?>:</label><br>
    <?php if ($key === 'body_copy') { ?>
    <textarea id="<?php echo $metabox['args']['metabox_id'] . '_' . $key; ?>"
        name="<?php echo $metabox['args']['metabox_id'] . '_' . $key; ?>" rows="6"
        style="width: 100%;"><?php echo esc_textarea( $field_value ); ?></textarea>
    <?php } elseif ($key === 'image_url') { ?>
    <input type="text" id="<?php echo $metabox['args']['metabox_id'] . '_' . $key; ?>"
        name="<?php echo $metabox['args']['metabox_id'] . '_' . $key; ?>"
        value="<?php echo esc_attr( $field_value ); ?>" style="width: 70%;" readonly>
    <button type="button" class="button button-secondary"
        id="<?php echo $metabox['args']['metabox_id'] . '_upload_' . $key; ?>">Select Image</button>
    <script>
    jQuery(document).ready(function($) {
        $('#<?php echo $metabox['args']['metabox_id'] . '_upload_' . $key; ?>').click(function() {
            var mediaUploader;
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#<?php echo $metabox['args']['metabox_id'] . '_' . $key; ?>').val(attachment
                    .url);
            });
            mediaUploader.open();
        });
    });
    </script>
    <?php } else { ?>
    <input type="text" id="<?php echo $metabox['args']['metabox_id'] . '_' . $key; ?>"
        name="<?php echo $metabox['args']['metabox_id'] . '_' . $key; ?>"
        value="<?php echo esc_attr( $field_value ); ?>" style="width: 100%;">
    <?php } ?>
</p>
<?php
    }
}

function custom_theme_render_history_metabox( $post ) {
    // Retrieve existing values from post meta
    $history = get_post_meta( $post->ID, 'history', true );
    ?>
<p>
    <label for="history">History:</label><br>
    <textarea id="history" name="history" rows="6"
        style="width: 100%;"><?php echo esc_textarea( $history ); ?></textarea>
</p>
<?php
}

function custom_theme_render_gallery_metabox( $post ) {
    // Retrieve existing values from post meta
    $images = array();
    for ($i = 1; $i <= 8; $i++) {
        $image_url = get_post_meta( $post->ID, 'gallery_image_' . $i, true );
        $images[] = $image_url;
    }
    ?>
<p>
    <?php for ($i = 1; $i <= 8; $i++) { ?>
    <label for="gallery_image_<?php echo $i; ?>">Image <?php echo $i; ?>:</label><br>
    <input type="text" id="gallery_image_<?php echo $i; ?>" name="gallery_image_<?php echo $i; ?>"
        value="<?php echo isset($images[$i-1]) ? esc_attr( $images[$i-1] ) : ''; ?>" style="width: 70%;" readonly>
    <button type="button" class="button button-secondary" id="upload_gallery_image_<?php echo $i; ?>">Select
        Image</button><br>
    <?php } ?>
</p>
<script>
jQuery(document).ready(function($) {
    <?php for ($i = 1; $i <= 8; $i++) { ?>
    $('#upload_gallery_image_<?php echo $i; ?>').click(function() {
        var mediaUploader;
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#gallery_image_<?php echo $i; ?>').val(attachment.url);
        });
        mediaUploader.open();
    });
    <?php } ?>
});
</script>
<?php
}

function custom_theme_save_metabox( $post_id ) {
    // Check if the current page is using the "Home William" template
    $template_slug = get_page_template_slug( $post_id );
    if ( 'template-home.php' === $template_slug ) {
        $hero_item_metaboxes = array('hero_item_1_metabox', 'hero_item_2_metabox', 'hero_item_3_metabox');

        foreach ( $hero_item_metaboxes as $metabox_id ) {
            $fields = array(
                'image_url',
                'headline',
                'body_copy',
                'button_text',
                'button_link'
            );

            foreach ( $fields as $field ) {
                if ( isset( $_POST[$metabox_id . '_' . $field] ) ) {
                    update_post_meta( $post_id, $metabox_id . '_' . $field, sanitize_text_field( $_POST[$metabox_id . '_' . $field] ) );
                }
            }
        }

        if ( isset( $_POST['history'] ) ) {
            update_post_meta( $post_id, 'history', sanitize_textarea_field( $_POST['history'] ) );
        }

        for ($i = 1; $i <= 8; $i++) {
            $field_name = 'gallery_image_' . $i;
            if ( isset( $_POST[$field_name] ) ) {
                update_post_meta( $post_id, $field_name, sanitize_text_field( $_POST[$field_name] ) );
            }
        }
    }
}
add_action( 'save_post', 'custom_theme_save_metabox' );