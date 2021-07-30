<?php

namespace oStella\Taxonomy;

use oStella\PostType\EventPostType;

class EventTaxonomy extends Taxonomy {

    const TAXONOMY_KEY = 'event';
    const TAXONOMY_NAME = 'Evénements';
    const RELATED_CPT_LIST = [EventPostType::POST_TYPE_KEY];
    
    const CAPABILITIES =  [
        'manage_terms' => 'manage_events',
        'edit_terms' => 'edit_events',
        'delete_terms' => 'delete_events',
        'assign_terms' => 'assign_events'
    ];

    const ADMIN_CAPS = [
        'edit_events' => true,
        'publish_events' => true,
        'edit_event' => true,
        'read_event' => true,
        'delete_event' => true,
        'edit_others_events' => true,
        'delete_others_events' => true
    ];
}
