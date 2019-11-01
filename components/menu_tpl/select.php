
<option

	value="<?=$category['id']?>"
	<?php if($category['id'] == $this->model->parent_id) echo ' selected'?>
	<?php if($category['id'] == $this->model->id) echo ' style="display:none;"'?>

	><?=$tab . $category['name']?></option>

<?php if( isset($category['childs'])): ?>
		<ul class="panel-body">
			<?= $this->getMenuHtml($category['childs'], $tab . ' -')?>
		</ul>
	<?php endif;?>




