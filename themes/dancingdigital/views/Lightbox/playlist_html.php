<?php
$representations = $this->getVar('representations');
$start_times = $this->getVar('startTimes');
$end_times = $this->getVar('endTimes');
?>
<div id="caMediaOverlayContent" >
<?php
	$sources = [];
	foreach($representations as $i => $rep) {
		$mimetype = $rep->getMediaInfo('media', 'original', 'MIMETYPE');
		if(!in_array(caGetMediaClass($mimetype), ['audio', 'video'], true)) { continue; }
		if($i == 0) {
			print $rep->getMediaTag('media', 'original', [
				'class' => '', 'width' => "{$percent}%", 'id' => 'comparePlayer_'.$i,
				'start' => $start_times[$i], 'end' => $end_times[$i], 'autoplay' => false
			]);
			continue;
		}
		$source = [
			'type' => 'video',
			'title' => $rep->get('ca_objects.preferred_labels'),
			'sources' => [[
				'src' => $rep->getMediaUrl('media', 'original'),
				'type' => $mimetype,
				'size' => $rep->getMediaInfo('media', 'original', 'width'),
				'start' => $start_times[$i],
				'end' => $end_times[$i]
			]],
			'poster' => $rep->getMediaUrl('media', 'medium'),
			'tracks' => []
		];
		if(is_array($captions = $rep->getCaptionFileList())) {
			foreach($captions as $cf) {
				$source['tracks'][] = [
					'kind' => 'captions',
					'label' => $cf['locale'], 
					'srclang' => substr($cf['locale_code'], 0, 2),
					'src' => $cf['url']
				];
			}
		}
		$sources[] = $source;
	}
?>
	<div class="caMediaOverlayControls">
		<div class='close'><a href="#" onclick="caMediaPanel.hidePanel(); return false;" title="close"><i class="fa fa-times" aria-hidden="true"></i></a></div>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function() {
		caUI.mediaPlayerManager.setPlaylist('comparePlayer_0', <?= json_encode($sources); ?>);
	});
</script>
