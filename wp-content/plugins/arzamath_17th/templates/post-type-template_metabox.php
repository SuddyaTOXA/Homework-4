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
            <select id="meta-multi-select" name="meta-multi-select" multiple <?php echo @get_post_meta($post->ID, 'meta-multi-select', false); ?>>
                <option value="1">Один</option>
                <option value="2">Два</option>
                <option value="3">Три</option>
                <option value="4">Чотири</option>
                <option value="5">П’ять</option>
            </select>
        </td>
    </tr>
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta-add-img">Add_img</label>
        </th>
        <td>
            <input type="file" id="meta-add-img" name="meta-add-img" value="<?php echo @get_post_meta($post->ID, 'meta-add-img', true); ?>" />
        </td>
    </tr>                
</table>
