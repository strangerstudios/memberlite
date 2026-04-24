/**
 * Adds PMPro icon to the Memberlite Category in the block inserter
 */

import PMProIcon from './pmpro-icon';
import domReady from '@wordpress/dom-ready';
import { registerBlockCollection } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

domReady( () => {
	registerBlockCollection( 'memberlite', {
		title: __( 'Memberlite', 'memberlite' ),
		slug: 'memberlite',
		icon: PMProIcon,
	});
} );

