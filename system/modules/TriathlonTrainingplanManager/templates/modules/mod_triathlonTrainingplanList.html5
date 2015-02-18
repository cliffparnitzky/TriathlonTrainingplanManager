
<!-- indexer::stop -->
<div class="<?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
<?php if ($this->headline): ?>

<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
<?php endif; ?>

<table cellspacing="0" cellpadding="0" border="0" class="ligatable">
	<thead>
		<tr>
			<td><?php echo $GLOBALS['TL_LANG']['RscTriathlonLeagueManager']['thead']['place']; ?></td>
			<td><?php echo $GLOBALS['TL_LANG']['RscTriathlonLeagueManager']['thead']['team']; ?></td>
<?php if ($this->triathlonLeagueColumns == 'wp_pz'): ?>
			<td class="points"><?php echo $GLOBALS['TL_LANG']['RscTriathlonLeagueManager']['thead']['scoringPoints']; ?></td>
			<td class="points"><?php echo $GLOBALS['TL_LANG']['RscTriathlonLeagueManager']['thead']['placeNumber']; ?></td>
<?php elseif ($this->triathlonLeagueColumns == 'pkt'): ?>
			<td class="points"><?php echo $GLOBALS['TL_LANG']['RscTriathlonLeagueManager']['thead']['points']; ?></td>
<?php endif; ?>
		</tr>
	</thead>
	<tfoot>
		<tr><td colspan="<?php if ($this->triathlonLeagueColumns == 'wp_pz'): ?>4<?php elseif ($this->triathlonLeagueColumns == 'pkt'): ?>3<?php endif; ?>"><?php echo $this->tfoot; ?></td></tr>
	</tfoot>
	<tbody>
<?php foreach ($this->table as $index => $entry): ?>
			<tr<?php if ($this->teams[$entry['triathlonLeagueTableTeam']]['ownTeam']): ?> class="ownteam"<?php endif; ?>>
				<td class="place"><?php echo $entry['triathlonLeagueTablePlace']; ?>.</td>
				<td class="team"><?php echo $this->teams[$entry['triathlonLeagueTableTeam']]['name']; ?><img src="<?php echo $this->teams[$entry['triathlonLeagueTableTeam']]['logo']; ?>" title="<?php echo $this->teams[$entry['triathlonLeagueTableTeam']]['name']; ?>" /></td>
<?php if ($this->triathlonLeagueColumns == 'wp_pz'): ?>
				<td class="points"><?php echo $entry['triathlonLeagueTableScoringPoints']; ?></td>
				<td class="points"><?php echo $entry['triathlonLeagueTablePlaceNumber']; ?></td>
<?php elseif ($this->triathlonLeagueColumns == 'pkt'): ?>
				<td class="points"><?php echo $entry['triathlonLeagueTablePoints']; ?></td>
<?php endif; ?>
			</tr>
<?php endforeach; ?>
	</tbody>
</table>
 
</div>
<!-- indexer::continue -->
