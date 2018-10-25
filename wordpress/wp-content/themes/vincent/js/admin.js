"use strict";

function vincent_reactivate_sortable() {
    jQuery('.vincent_text_table_rows').sortable(
        {
            handle: '.vincent_text_table_row_move',
        }
    );
}

function vincent_rwmb_and_customizer_condition() {
    jQuery("[data-dependency-id]").each(function (index) {
        var vincent_target = jQuery(this).attr('data-dependency-id');
        var vincent_needed_val = jQuery(this).attr('data-dependency-val');

        if (jQuery(this).hasClass('vincent_dependency_customizer')) {
            var vincent_target_status = jQuery('#customize-control-' + vincent_target).find('select').val();
            var vincent_dependency_elem_cont = jQuery(this).parents('.customize-control');
        } else {
            var vincent_target_status = jQuery('#' + vincent_target).val();
            var vincent_dependency_elem_cont = jQuery(this).parents('.rwmb-field');
        }

        if (vincent_needed_val == vincent_target_status) {
            vincent_dependency_elem_cont.show('fast');
        } else {
            vincent_dependency_elem_cont.hide('fast');
        }
    });
}

function vincent_hide_unnecessary_options() {
    if (jQuery('.vincent_this_template_file').size() > 0) {
        var vincent_this_template_file = jQuery('.vincent_this_template_file').val();
        jQuery("[data-show-on-template-file]").each(function (index) {
            var vincent_unnecessary_target = jQuery(this).attr('data-show-on-template-file');
            if (vincent_unnecessary_target.indexOf(',') > -1) {
                var vincent_unnecessary_target_array = vincent_unnecessary_target.split(',');
                var vincent_rwmb_del_status = 'not find';
                jQuery.each(vincent_unnecessary_target_array, function (i, val) {
                    if (vincent_this_template_file == val.trim()) {
                        vincent_rwmb_del_status = 'find';
                    }
                });
                if (vincent_rwmb_del_status == 'not find') {
                    jQuery(this).parents('.rwmb-field').remove();
                }
            } else {
                if (vincent_this_template_file !== vincent_unnecessary_target) {
                    jQuery(this).parents('.rwmb-field').remove();
                }
            }
        });
        
        jQuery("[data-hide-on-template-file]").each(function (index) {
            var vincent_unnecessary_target = jQuery(this).attr('data-hide-on-template-file');
            if (vincent_unnecessary_target.indexOf(',') > -1) {
                var vincent_unnecessary_target_array = vincent_unnecessary_target.split(',');
                var vincent_rwmb_del_status = 'not find';
                jQuery.each(vincent_unnecessary_target_array, function (i, val) {
                    if (vincent_this_template_file == val.trim()) {
                        vincent_rwmb_del_status = 'find';
                    }
                });
                if (vincent_rwmb_del_status == 'find') {
                    jQuery(this).parents('.rwmb-field').remove();
                }
            } else {
                if (vincent_this_template_file == vincent_unnecessary_target) {
                    jQuery(this).parents('.rwmb-field').remove();
                }
            }
        });

    }
}

function vincent_onchange_post_formats() {
    var vincent_post_format = jQuery('#post-formats-select input:checked').val();

    jQuery('#image-post-format-settings, #video-post-format-settings, #audio-past-format-settings, #quote-post-format-settings, #link-post-format-settings').hide('fast');

    if (vincent_post_format == 'standard') {
        jQuery('#image-post-format-settings, #video-post-format-settings, #audio-past-format-settings, #quote-post-format-settings, #link-post-format-settings').hide('fast');
    }

    if (vincent_post_format == 'image') {
        jQuery('#image-post-format-settings').show('fast');
    }

    if (vincent_post_format == 'video') {
        jQuery('#video-post-format-settings').show('fast');
    }

    if (vincent_post_format == 'audio') {
        jQuery('#audio-past-format-settings').show('fast');
    }

    if (vincent_post_format == 'quote') {
        jQuery('#quote-post-format-settings').show('fast');
    }

    if (vincent_post_format == 'link') {
        jQuery('#link-post-format-settings').show('fast');
    }
}

jQuery(document).ready(function () {
    jQuery("[data-dependency-id]").parents('.rwmb-field').hide();

    vincent_onchange_post_formats();
    vincent_rwmb_and_customizer_condition();
    vincent_hide_unnecessary_options();

    jQuery('.rwmb-select, .customize-control-select select').change(function () {
        vincent_rwmb_and_customizer_condition();
    });

    jQuery('#post-formats-select input').on("click", function () {
        vincent_onchange_post_formats();
    });
    
    jQuery('.vincent_reset_all_settings').on("click", function () {
	    if (confirm("Are you sure? All settings will be reset to default state.")) {
			jQuery.post(vincent_admin_ajax_url, {
	            action: 'vincent_reset_all_settings'
	        }, function (response) {
	            alert(response);
	        });
		}
	});

    jQuery(document).on("click", '.vincent_text_table_add_row', function () {
        var vincent_text_table_data_storage_name = jQuery(this).parents('.widget-content').find('.vincent_text_table_data_storage_name').val();
        var vincent_text_table_name_text = jQuery(this).parents('.widget-content').find('.vincent_text_table_name_text').val();
        var vincent_text_table_value_text = jQuery(this).parents('.widget-content').find('.vincent_text_table_value_text').val();

        jQuery(this).parents('.widget-content').find('.vincent_text_table_rows').append('<div class="vincent_text_table_row vincent_dn"><div class="vincent_50_dib"><label>' + vincent_text_table_name_text + ':</label><input class="widefat" type="text" name="' + vincent_text_table_data_storage_name + '[][name]" value=""></div><div class="vincent_50_dib"><label>' + vincent_text_table_value_text + ':</label><textarea class="widefat" type="text" name="' + vincent_text_table_data_storage_name + '[][value]"></textarea></div><div class="vincent_text_table_row_remove"><i class="fa fa-trash"></i></div><div class="vincent_text_table_row_move"><i class="fa fa-arrows"></i></div></div>');
        jQuery('.vincent_dn').slideDown("fast").removeClass('vincent_dn');
    });

    jQuery(document).on("click", '.vincent_text_table_row_remove', function () {
        jQuery(this).parents('.vincent_text_table_row').slideUp("normal", function () {
            jQuery(this).remove();
        });
    });

    jQuery(document).on("click", '.widget-control-save', function () {
        setTimeout(function () {
            vincent_reactivate_sortable()
        }, 1000);
        setTimeout(function () {
            vincent_reactivate_sortable()
        }, 2000);
        setTimeout(function () {
            vincent_reactivate_sortable()
        }, 3000);
    });

    vincent_reactivate_sortable();
});