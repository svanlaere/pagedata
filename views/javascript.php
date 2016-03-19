<script type="text/javascript">
    // <![CDATA[
    $().ready(function() {
	
        $('#pagedata').on('click', '.add-row', function() {
		
            var rowNumber = $('#pagedata tbody > tr').length + 1;
					

    /*
		if (10 < rowNumber) {
            alert('There is a limit..');
            return false;
        }
	*/
		
		var row_html = $('<tr id="row_' + rowNumber + '"><td class="keyname_row"><label class="keyname_lbl screen-reader-text" for="keyname_' + rowNumber + '" title="<?php echo __('Keyname'); ?> ' + rowNumber + '"><?php echo __('Keyname'); ?></label> <input type="text" name="keynames[]" value="" id="keyname_' + rowNumber + '" class="keyname_text" /></td><td class="keyvalue_row"><label class="keyvalue_lbl screen-reader-text" for="keyvalue_' + rowNumber + '" title="<?php echo __('Keyvalue'); ?> ' + rowNumber + '"><?php echo __('Keyvalue'); ?></label> <input type="text" name="keyvalues[]" value="" id="keyvalue_' + rowNumber + '" class="keyvalue_text" /> <a href="#" class="remove-row" title="<?php echo __('Remove'); ?>"><?php echo __('Remove'); ?></a></td></tr>');
			$('tr:last').after(row_html);
            row_html.fadeIn('slow');
            return false;
        });
		
        $('#pagedata').on('click', '.remove-row', function() {
		
		var rowNumber = $('#pagedata tbody > tr').length;
		
		if (rowNumber === 1) {	
			alert('<?php echo __('This row can not be removed'); ?>');
			return false;
		}		
		
            $(this).parent().parent().css('background-color', '#ff8686');
            $(this).parent().parent().fadeOut("slow", function() {
                $(this).remove();
				

                $('#pagedata tbody > tr').each(function(index) {
                    var counter = (index + 1);
                    var keyname_text = 'keyname_' + counter;
                    var keyname_title = '<?php echo __('Keyname'); ?> ' + counter;
                    var keyvalue_text = 'keyvalue_' + counter;
                    var keyvalue_title = '<?php echo __('Keyvalue'); ?> ' + counter;
                    $(this).attr('id', 'row_' + counter);
                    $(this).find("label.keyname_lbl").attr({
                        for: keyname_text,
                        title: keyname_title
                    });
                    $(this).find("input.keyname_text").attr({
                        for: keyname_text,
                        id: keyname_text,
                        title: keyname_title
                    });
                    $(this).find("label.keyvalue_lbl").attr({
                        for: keyvalue_text,
                        title: keyvalue_title
                    });
                    $(this).find("input.keyvalue_text").attr({
                        for: keyvalue_text,
                        id: keyvalue_text,
                        title: keyvalue_title
                    });
                });
            });
            return false;
        });
	
    });
    // ]]>
</script>