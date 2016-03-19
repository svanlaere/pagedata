<div id="pagedata" class="page" style="display: block;">
<div title="<?php echo __('Pagedata'); ?>" id="div-image">
<table class="tablesorter">
<thead>
<tr id="kop">
<th scope="col" class="col" id="col_1"><?php echo __('Keyname'); ?></th>
<th scope="col" class="col" id="col_2"><?php echo __('Keyvalue'); ?></th>
</tr>
</thead>
<tfoot>
<tr>
<td colspan="2">Aantal <?php echo $for_limit; ?></td>
</tr>
</tfoot>
<tbody>
<?php if ($pd->data): ?>
<?php $data = json_decode($pd->data, true); ?>
<?php $for_limit = count($data); ?>
<?php $i = 1; ?>
<?php $format = "%s_%d"; ?>
<?php //printf($format, strtolower(__('Labelname')), $i); ?>
<?php foreach($data as $keyname => $keyvalue) : ?>	
<?php if (fmod($i,$for_limit + 1)) : ?>
<tr id="row_<?php echo $i; ?>">
<?php endif; ?>
<td>
<label class="keyname_lbl screen-reader-text" for="keyname_<?php echo $i; ?>" title="<?php echo __('Keyname'); ?> <?php echo $i; ?>"><?php echo __('Keyname'); ?></label>
<input type="text" name="keynames[<?php echo $key_name; ?>]" id="keyname_<?php echo $i; ?>" class="keyname_text" value="<?php echo $keyname; ?>" />
</td>
<td>
<label class="keyvalue_lbl screen-reader-text" for="keyvalue_<?php echo $i; ?>" title="<?php echo __('Keyvalue'); ?> <?php echo $i; ?>"><?php echo __('Keyvalue'); ?></label>
<input type="text" name="keyvalues[<?php echo $key_values; ?>]" id="keyvalue_<?php echo $i; ?>" class="keyvalue_text" value="<?php echo $keyvalue; ?>" />
<?php if ($i === 0): ?>
 <a href="#" class="add-row" title="<?php echo __('Add More'); ?>"><?php echo __('Add More'); ?></a>
<?php else: ?>
 <a href="#" class="remove-row" title="<?php echo __('Remove'); ?>"><?php echo __('Remove'); ?></a>
<?php endif; ?>
</td>
<?php if (fmod($i,$for_limit + 1)) : ?>
</tr>
<?php endif; ?>
<?php $i ++; ?>
<?php endforeach; ?>
<?php else: ?>
<tr id="row_1">
<td>
<label class="keyname_lbl screen-reader-text" for="keyname_1" title="<?php echo __('Keyname'); ?> 1"><?php echo __('Keyname'); ?></label>
<input type="text" name="keynames[]" id="keyname_1" class="keyname_text" value="" />
</td>
<td>
<label class="keyvalue_lbl screen-reader-text" for="keyvalue_1" title="<?php echo __('Keyvalue'); ?> 1"><?php echo __('Keyvalue'); ?></label>
<input type="text" name="keyvalues[]" id="keyvalue_1" class="keyvalue_text" value="" /> <a href="#" class="remove-row" title="<?php echo __('Remove'); ?>"><?php echo __('Remove'); ?></a>
</td>
</tr>
<?php endif; ?>
</tbody>
</table>
<button class="add-row button" title="<?php echo __('Add More'); ?>"><?php echo __('Add More'); ?></button>
</div>
</div>


