<?php
/* ----------------------------------------------------------------------
 * app/controllers/LookupController.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */
	
 	require_once(__CA_LIB_DIR__."/ca/Search/ObjectSearch.php");
 	require_once(__CA_LIB_DIR__."/ca/Search/EntitySearch.php");
 	require_once(__CA_LIB_DIR__."/ca/Search/PlaceSearch.php");
 	require_once(__CA_LIB_DIR__."/ca/Search/OccurrenceSearch.php");
 	require_once(__CA_LIB_DIR__."/ca/Search/CollectionSearch.php");
	require_once(__CA_MODELS_DIR__."/ca_objects.php");	
	require_once(__CA_MODELS_DIR__."/ca_occurrences.php");	
	require_once(__CA_MODELS_DIR__."/ca_entities.php");
	require_once(__CA_MODELS_DIR__."/ca_places.php");
	require_once(__CA_LIB_DIR__.'/pawtucket/BasePawtucketController.php');

 	class QuickfindController extends BasePawtucketController {

		/**
 		 *
 		 */
		 
 		public function __construct(&$po_request, &$po_response, $pa_view_paths=null) {
			
			$this->request = $po_request;

 		}
		
		public function numErrors() { 
			return false;
		}

 		public function Place($pa_additional_query_params=null, $pa_options=null) {
			
			header("Content-type: application/json");

			$this->search_engine = new PlaceSearch();
			$this->table = "ca_places";
			$this->key_field = "place_id";
			$this->Get( $pa_additional_query_params=null, $pa_options=null );	
			
		}
		
		public function Occurrence($pa_additional_query_params=null, $pa_options=null) {
			
			header("Content-type: application/json");

			$this->search_engine = new OccurrenceSearch();
			$this->table = "ca_occurrences";
			$this->key_field = "occurrence_id";
			$this->Get( $pa_additional_query_params=null, $pa_options=null );	
			
		}
		
		public function Entity($pa_additional_query_params=null, $pa_options=null) {
			
			header("Content-type: application/json");

			$this->search_engine = new EntitySearch();
			$this->table = "ca_entities";
			$this->key_field = "entity_id";
			$this->Get( $pa_additional_query_params=null, $pa_options=null );
			
		}
		
		public function Object($pa_additional_query_params=null, $pa_options=null) {
			
			header("Content-type: application/json; charset=utf-8");

			$this->search_engine = new ObjectSearch();
			$this->table = "ca_objects";
			$this->key_field = "object_id";
			$this->Get( $pa_additional_query_params=null, $pa_options=null );

		}	
		
		public function Get($pa_additional_query_params=null, $pa_options=null) {
			
			$term = $this->request->getParameter('term', pString);
			if (!($limit = $this->request->getParameter('limit', pInteger))) { $limit = 100; }
			
			// FRED
			// 20/3/2021
			$sort = $this->request->getParameter('sort', pString);
			
			$results = $this->search_engine->search( $term, array('sort' => $sort) );
			
			// FIM
			
			$count = 1;
			$output = array();
			
			while( $results->nextHit() && $count <= $limit ) {
				$output[] = array(
					"value" => $results->get( $this->table . '.' . $this->key_field ),
					"label" => $results->get( $this->table . '.preferred_labels')
				);
				print $label;			
				$count++;
			}
			print json_encode( $output );
			die();			
		}

	}