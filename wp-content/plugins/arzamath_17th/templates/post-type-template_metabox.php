<table> 
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta-text">Text_field</label>
        </th>
        <td>
            <input type="text" id="meta-text" name="meta-text" value="<?php echo @get_post_meta($post->ID, 'meta-text', true); ?>" />
        </td>
    </tr>
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta-multi-select">Multi_select</label>
        </th>
        <td>
<!--            <input type="text" id="meta-multi-select" name="meta-multi-select" value="--><?php //echo @get_post_meta($post->ID, 'meta-multi-select', true); ?><!--" />-->
           <?php $options_multi_select = @get_post_meta($post->ID, 'meta-multi-select', true); ?>
            <select id='meta-multi-select' name='meta-multi-select[multi-select-box][]' multiple size="5"  >
<!--                <option value="1">Один</option>-->
<!--                <option value="2">Два</option>-->
<!--                <option value="3">Три</option>-->
<!--                <option value="4">Чотири</option>-->
<!--                <option value="5">П’ять</option>-->c1
<!--                <option value='1' --><?php //if ( $options_multi_select['multi-select-box'] == 1 ) echo 'selected="selected"' ; ?><!-->Один</option>-->
<!--                <option value='2' --><?php //if ( $options_multi_select['multi-select-box'] == 2 ) echo 'selected="selected"' ; ?><!-->Два</option>-->
<!--                <option value='3' --><?php //if ( $options_multi_select['multi-select-box'] == 3 ) echo 'selected="selected"' ; ?><!-->Три</option>-->
<!--                <option value='4' --><?php //if ( $options_multi_select['multi-select-box'] == 4 ) echo 'selected="selected"' ; ?><!-->Чотири</option>-->
<!--                <option value='5' --><?php //if ( $options_multi_select['multi-select-box'] == 5 ) echo 'selected="selected"' ; ?><!-->П’ять</option>-->
                <option value='1' <?php selected( in_array("1", $options_multi_select['multi-select-box'] ) ); ?>>Один</option>
                <option value='2' <?php selected( in_array("2", $options_multi_select['multi-select-box'] ) ); ?>>Два</option>
                <option value='3' <?php selected( in_array("3", $options_multi_select['multi-select-box'] ) ); ?>>Три</option>
                <option value='4' <?php selected( in_array("4", $options_multi_select['multi-select-box'] ) ); ?>>Чотири</option>
                <option value='5' <?php selected( in_array("5", $options_multi_select['multi-select-box'] ) ); ?>>П’ять</option>
            </select>
        </td>
    </tr>
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta-add-img">Add_img</label>
        </th>
        <td>
            <input type="file" id="meta-add-img" name="meta-add-img" accept="image/*"  />
        </td>
    </tr>
    <tr valign="top">
        <th class="metabox_label_column">
            Завантажений файл:
        </th>
        <td>
            <?php echo @get_post_meta($post->ID, 'meta-add-img', true); ?>
        </td>
    </tr>
</table>
