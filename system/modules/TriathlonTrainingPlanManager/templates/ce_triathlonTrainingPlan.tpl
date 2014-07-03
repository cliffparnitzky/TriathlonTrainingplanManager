
<!-- indexer::stop -->
<div class="<?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
<?php if ($this->headline): ?>

<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
<?php endif; ?>

<style>
.instructions > table td {
    border-right: 1px solid #000000;
    border-top: 1px solid #000000;
    padding: 3px;
}
.instructions > table {
    border-bottom: 1px solid #000000;
    border-left: 1px solid #000000;
}
.instructions > table tr:nth-child(2n) td {
    border-top: 0 none;
}
</style>

<?php if ($this->error) : ?>
<div class="error"><?php echo $this->errorMsg; ?></div>
<?php else : ?>
	<?php foreach ($this->plans as $plan) : ?>
	<div class="plan <?php echo $plan['kindOfSport']; ?> <?php echo $plan['performanceClass']; ?>">
		<div class="date" title="<?php echo date('j. F Y', $plan['date']); ?>"><label><?php echo $plan['dateLabel']; ?>:</label><?php echo $plan['dateText']; ?></div>
		<div class="title"><label><?php echo $plan['titleLabel']; ?>:</label><?php echo $plan['title']; ?></div>
		<div class="kindOfSport <?php echo $plan['kindOfSport']; ?>"><label><?php echo $plan['kindOfSportLabel']; ?>:</label><?php echo $plan['kindOfSportText']; ?> <?php echo $plan['kindOfSportImage']; ?></div>
	<?php if ($plan['forPerformanceClass'] && strlen($plan['performanceClass']) > 0) : ?>
		<div class="performanceClass <?php echo $plan['performanceClass']; ?>"><label><?php echo $plan['performanceClassLabel']; ?>:</label><?php echo $plan['performanceClassText']; ?></div>
	<?php endif; ?>
	<?php if ($plan['forMembers'] && count($plan['members']) > 0) : ?>
		<div class="members">
			<label><?php echo $plan['membersLabel']; ?>:</label>
			<ul>
			<?php foreach ($plan['members'] as $member) : ?>
				<li class="member"><?php echo $member['name']; ?></li>
			<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
	<?php if ($plan['forMemberGroups'] && count($plan['memberGroups']) > 0) : ?>
		<div class="memberGroups">
			<label><?php echo $plan['memberGroupsLabel']; ?>:</label>
			<ul>
			<?php foreach ($plan['memberGroups'] as $memberGroup) : ?>
				<li class="memberGroup"><?php echo $memberGroup['name']; ?></li>
			<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
		<div class="instructions">
			<label><?php echo $plan['instructionsLabel']; ?>:</label>
			<table cellspacing="0" cellpadding="0" border="0" width="600">
			<?php foreach($plan['instructions'] as $blockName=>$block): ?>
				<tr>
					<td rowspan="<?php echo (count($block) * 2); ?>"><?php echo (strlen($GLOBALS['TL_LANG']['TriathlonTrainingPlan']['instructionBlock'][$blockName]) > 0) ? $GLOBALS['TL_LANG']['TriathlonTrainingPlan']['instructionBlock'][$blockName] : $blockName; ?></td>
					<?php $newRow = false; ?>
					<?php foreach($block as $instruction): ?>
			<?php if ($newRow): ?>
				<tr>
			<?php endif; ?>
					<td rowspan="2"><?php echo $instruction['repetition']; ?></td>
					<td rowspan="2">X</td>
					<td rowspan="2"><?php echo $instruction['interval']['value']; ?></td>
					<td rowspan="2"><?php echo $instruction['interval']['unit']; ?></td>
					<td><?php echo $instruction['description']; ?></td>
				</tr>
				<tr>
					<td><?php echo $instruction['execution']; ?></td>
				</tr>
						<?php $newRow = true; ?>
					<?php endforeach; ?>
			<?php endforeach; ?>
			</table>
		</div>
		<div class="comment"><label><?php echo $plan['commentLabel']; ?>:</label><br><?php echo $plan['comment']; ?></div>
		<div class="total sum">
			<label><?php echo $plan['totalSumsLabel']; ?>:</label>
			<?php foreach($plan['totalSums'] as $unit=>$value): ?>
				<span class="unit_<?php echo $unit; ?>"><?php echo $value; ?><?php echo $unit; ?></span>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endforeach; ?>
<?php endif; ?>
 
</div>
<!-- indexer::continue -->
