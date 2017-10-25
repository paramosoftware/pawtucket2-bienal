<?php
	$t_item = $this->getVar("item");
	$va_comments = $this->getVar("comments");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");	
?>
<div class="row">
	<div class='col-xs-12 navTop'><!--- only shown at small screen size -->
		{{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
	</div><!-- end detailTop -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgLeft">
			{{{previousLink}}}{{{resultsLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
	<div class='col-xs-12 col-sm-10 col-md-10 col-lg-10'>
		<div class="container">
			<div class="row">
				<div class='col-md-12 col-lg-12'>
					<H4>{{{^ca_entities.preferred_labels.displayname}}}</H4>
					{{{<ifdef code="ca_entities.school_dates.school_dates_value"><H5>^ca_entities.school_dates.school_dates_value</H5></ifdef>}}}
				</div><!-- end col -->
			</div><!-- end row -->
			<div class="row">			
				<div class='col-sm-6'>
					{{{<ifdef code="ca_entities.nonpreferred_labels.displayname"><HR/><H6>Alternate name(s)</H6>^ca_entities.nonpreferred_labels.displayname%delimiter=,_</ifdef>}}}
					{{{<ifdef code="ca_entities.themes"><div class='unit'><HR/><H6>Themes</H6>^ca_entities.themes%delimiter=,_</div></ifdef>}}}		
					{{{<ifcount code="ca_entities.related" restrictToTypes="community" min="1"><HR/><H6>Home communities of students</H6><unit relativeTo="ca_entities.related" restrictToTypes="community" delimiter=", "><l>^ca_entities.preferred_labels.displayname</l></unit></ifcount>}}}
					<HR/>
					{{{<ifcount code="ca_entities.related" restrictToTypes="religious_organization" restrictToRelationshipTypes="related" min="1"><H6>Religous/Missionary organization(s)</H6><unit relativeTo="ca_entities.related" restrictToTypes="religious_organization" restrictToRelationshipTypes="related" delimiter=", "><l>^ca_entities.preferred_labels.displayname</l></unit></ifcount>}}}
					{{{<ifcount code="ca_entities.related" restrictToRelationshipTypes="principal,founder,matron,administrator,teacher,staff" min="1"><H6>School staff</H6><unit relativeTo="ca_entities.related" restrictToRelationshipTypes="principal,founder,matron,administrator,teacher,staff" delimiter="<br/>"><l>^ca_entities.preferred_labels.displayname</l><unit relativeTo="ca_entities_x_entities"> (^relationship_typename)</unit></unit></ifcount>}}}
				</div>
				<div class='col-sm-6'>
					{{{map}}}
					{{{<ifdef code="ca_entities.entity_location.location_text|ca_entities.entity_location.location_narrative"><div class='unit'><H6>Location</H6><unit delimiter="<br/><br/>"><ifdef code="ca_entities.entity_location.location_text"><b>^ca_entities.entity_location.location_text</b><br/></ifdef><ifdef code="ca_entities.entity_location.location_narrative">^ca_entities.entity_location.location_narrative</ifdef></unit></div></ifdef>}}}
					
<?php
				# Comment and Share Tools
				if ($vn_comments_enabled | $vn_share_enabled) {
						
					print '<div id="detailTools">';
					if ($vn_comments_enabled) {
?>				
						<div class="detailTool"><a href='#' onclick='jQuery("#detailComments").slideToggle(); return false;'><span class="glyphicon glyphicon-comment"></span>Comments (<?php print sizeof($va_comments); ?>)</a></div><!-- end detailTool -->
						<div id='detailComments'><?php print $this->getVar("itemComments");?></div><!-- end itemComments -->
<?php				
					}
					if ($vn_share_enabled) {
						print '<div class="detailTool"><span class="glyphicon glyphicon-share-alt"></span>'.$this->getVar("shareLink").'</div><!-- end detailTool -->';
					}
					print '</div><!-- end detailTools -->';
				}				
?>
				</div>
			</div>
			<div class="row">			
				<div class='col-sm-12'><br/><br/>
			
			
			
				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
					{{{<ifcount code="ca_objects" min="1"><li role="presentation" class="active"><a href="#objects" aria-controls="objects" role="tab" data-toggle="tab">Related Objects</a></li></ifcount>}}}
					<li role="presentation"><a href="#date" aria-controls="date" role="tab" data-toggle="tab">Dates</a></li>
					<li role="presentation"><a href="#land" aria-controls="land" role="tab" data-toggle="tab">Land & Buildings</a></li>
					<li role="presentation"><a href="#abuse" aria-controls="abuse" role="tab" data-toggle="tab">Abuse, Disease & Death</a></li>
					<li role="presentation"><a href="#advocacy" aria-controls="advocacy" role="tab" data-toggle="tab">Advocacy & Resistance</a></li>
				  	{{{<ifdef code="ca_entities.public_notes"><li role="presentation"><a href="#notes" aria-controls="notes" role="tab" data-toggle="tab">Notes</a></li></ifdef>}}}
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
	
	
					{{{<ifcount code="ca_objects" min="1">
							<div role="tabpanel" class="tab-pane active" id="objects">
								<div class="row">
									<div id="browseResultsContainer">
										<?php print caBusyIndicatorIcon($this->request).' '.addslashes(_t('Loading...')); ?>
									</div><!-- end browseResultsContainer -->
								</div><!-- end row -->
								<script type="text/javascript">
									jQuery(document).ready(function() {
										jQuery("#browseResultsContainer").load("<?php print caNavUrl($this->request, '', 'Search', 'objects', array('search' => 'entity_id:^ca_entities.entity_id'), array('dontURLEncodeParameters' => true)); ?>", function() {
											jQuery('#browseResultsContainer').jscroll({
												autoTrigger: true,
												loadingHtml: '<?php print caBusyIndicatorIcon($this->request).' '.addslashes(_t('Loading...')); ?>',
												padding: 20,
												nextSelector: 'a.jscroll-next'
											});
										});
					
					
									});
								</script>
							</div>
				</ifcount>}}}
					<div role="tabpanel" class="tab-pane" id="date">
						{{{<ifdef code="ca_entities.school_dates"><div class='unit'><H6>Dates of operation</H6><unit delimiter="<br/><br/>"><ifdef code="ca_entities.school_dates.school_dates_value">^ca_entities.school_dates.school_dates_value<br/></ifdef><ifdef code="ca_entities.school_dates.date_narrative"><span class="trimText">^ca_entities.school_dates.date_narrative</span><br/></ifdef><ifdef code="ca_entities.school_dates.date_narrative"><b>Community Input</b><br/>^ca_entities.school_dates.date_community</ifdef></unit></div></ifdef>}}}					
					</div>
					<div role="tabpanel" class="tab-pane" id="land">
						{{{<ifdef code="ca_entities.land_ownership"><div class='unit'><H6>Land ownership</H6><ifdef code="ca_entities.land_ownership.land_narrative">^ca_entities.land_ownership.land_narrative<br/></ifdef><ifdef code="ca_entities.land_ownership.land_community"><br/><b>Community Input</b><br/>^ca_entities.land_ownership.land_community</ifdef></div></ifdef>}}}
						{{{<ifcount code="ca_entities.related" restrictToRelationshipTypes="owner_founded" min="1"><H6>Land owner when school was founded</H6><unit relativeTo="ca_entities.related" restrictToRelationshipTypes="owner_founded" delimiter=", "><l>^ca_entities.preferred_labels.displayname</l></unit></ifcount>}}}
						{{{<ifcount code="ca_entities.related" restrictToRelationshipTypes="owner_closed" min="1"><H6>Land owner when school was closed</H6><unit relativeTo="ca_entities.related" restrictToRelationshipTypes="owner_closed" delimiter=", "><l>^ca_entities.preferred_labels.displayname</l></unit></ifcount>}}}
						{{{<ifcount code="ca_entities.related" restrictToRelationshipTypes="owner_current" min="1"><H6>Current owner</H6><unit relativeTo="ca_entities.related" restrictToRelationshipTypes="owner_current" delimiter=", "><l>^ca_entities.preferred_labels.displayname</l></unit></ifcount>}}}		
						{{{<ifdef code="ca_entities.school_buildings"><HR/><div class='unit'><H6>History of school buildings</H6><unit delimiter="<br/><br/>"><ifdef code="ca_entities.school_buildings.building_narrative">^ca_entities.school_buildings.building_narrative<br/></ifdef><ifdef code="ca_entities.school_buildings.building_community"><br/><b>Community Input</b><br/>^ca_entities.school_buildings.building_community</ifdef></unit></div></ifdef>}}}
						{{{<ifdef code="ca_entities.vocational_training"><HR/><div class='unit'><H6>Vocational training</H6>^ca_entities.vocational_training</div></ifdef>}}}				
					</div>
					<div role="tabpanel" class="tab-pane" id="abuse">
						{{{<ifdef code="ca_entities.abuse"><div class='unit'><H6>History of abuse</H6><unit delimiter="<br/><br/>"><ifdef code="ca_entities.abuse.abuse_narrative">^ca_entities.abuse.abuse_narrative<br/></ifdef><ifdef code="ca_entities.abuse.abuse_community"><br/><b>Community Input</b><br/>^ca_entities.abuse.abuse_community</ifdef></unit></div></ifdef>}}}
						{{{<ifdef code="ca_entities.injury"><div class='unit'><H6>History of injury and disease</H6><unit delimiter="<br/><br/>"><ifdef code="ca_entities.injury.injury_narrative">^ca_entities.injury.injury_narrative<br/></ifdef><ifdef code="ca_entities.injury.injury_community"><br/><b>Community Input</b><br/>^ca_entities.injury.injury_community</ifdef></unit></div></ifdef>}}}
						{{{<ifdef code="ca_entities.death"><div class='unit'><H6>History of death</H6><unit delimiter="<br/><br/>"><ifdef code="ca_entities.death.death_narrative">^ca_entities.death.death_narrative<br/></ifdef><ifdef code="ca_entities.death.death_community"><br/><b>Community Input</b><br/>^ca_entities.death.death_community</ifdef></unit></div></ifdef>}}}
					</div>
					<div role="tabpanel" class="tab-pane" id="advocacy">
						{{{<ifdef code="ca_entities.advocacy"><HR/><div class='unit'><H6>Community and Parental Advocacy</H6><unit delimiter="<br/><br/>"><ifdef code="ca_entities.advocacy.advocacy_narrative">^ca_entities.advocacy.advocacy_narrative<br/></ifdef><ifdef code="ca_entities.advocacy.advocacy_community"><br/><b>Community Input</b><br/>^ca_entities.advocacy.advocacy_community</ifdef></unit></div></ifdef>}}}
						{{{<ifdef code="ca_entities.resistance"><HR/><div class='unit'><H6>Resistance</H6><unit delimiter="<br/><br/>"><ifdef code="ca_entities.resistance.resistance_narrative">^ca_entities.resistance.resistance_narrative<br/></ifdef><ifdef code="ca_entities.resistance.resistance_community"><br/><b>Community Input</b><br/>^ca_entities.resistance.resistance_community</ifdef></unit></div></ifdef>}}}			
						{{{<ifdef code="ca_entities.truancy"><HR/><div class='unit'><H6>Truancy</H6><unit delimiter="<br/><br/>"><ifdef code="ca_entities.truancy.truancy_narrative">^ca_entities.truancy.truancy_narrative<br/></ifdef><ifdef code="ca_entities.truancy.truancy_community"><br/><b>Community Input</b><br/>^ca_entities.truancy.truancy_community</ifdef></unit></div></ifdef>}}}			
					</div>
					{{{<ifdef code="ca_entities.public_notes"><div role="tabpanel" class="tab-pane" id="notes"><div class='unit'><HR/><H6>Notes</H6>^ca_entities.public_notes</div></div></ifdef>}}}
				  
				  </div><!-- end tab panes -->

				</div><!-- end col -->
			</div><!-- end row -->		

		</div><!-- end container -->
	</div><!-- end col -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgRight">
			{{{nextLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
</div><!-- end row -->
<script type='text/javascript'>
	jQuery(document).ready(function() {
		$('.trimText').readmore({
		  speed: 75,
		  maxHeight: 120
		});
	});
</script>