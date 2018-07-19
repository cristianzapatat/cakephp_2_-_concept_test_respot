<div class="products index">
	
	<h2><?php echo __('Products'); ?></h2>

	<!-- Prueba de Envio de Datos Form -->
	
	<?php echo $this->Form->create(false, array(
		'url' => '/' . $this->request->controller .'/' . $this->request->action . '/' . $filterOrderTable,
		'type' => 'get'
	));?>
		<fieldset>
			<legend><?php echo __('Filtros') ?></legend>
		</fieldset>

		<?php
			echo $this->Form->input('start', array(
				'type' => 'date',
				'label' => 'Fecha de inicio',
				'dateFormat' => 'DMY',
				'minYear' => date('Y') - 70,
				'selected' => isset($query['start']) ? date('Y-m-d', strtotime(implode('-', $query['start']))) : date('Y-m-d')
			));
			echo $this->Form->input('end', array(
				'type' => 'date',
				'label' => 'Fecha de inicio',
				'dateFormat' => 'DMY',
				'minYear' => date('Y') - 70,
				'selected' => isset($query['end']) ? date('Y-m-d', strtotime(implode('-', $query['end']))) : date('Y-m-d')
			));
			foreach ($associations as $key => $value) {
				echo $this->Form->input('joins['.$key.']', array(
					'type' => 'checkbox',
					'value' => $value,
					'label' => $value,
					'checked' => isset($query['joins']) ? isset($query['joins'][$key]) ? true : false : false,
					'hiddenField' => false
				));
			}
			
		?>
	<?php echo $this->Form->end(__('Filtrar')); ?>

	<!-- Paginator -->

	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>

	<!-- Cabecera de la Tabla -->

	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['code']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
		</td>
		<td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array(), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>



<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entries'), array('controller' => 'entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entry'), array('controller' => 'entries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Outputs'), array('controller' => 'outputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Output'), array('controller' => 'outputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
