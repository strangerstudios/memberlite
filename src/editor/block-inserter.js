/**
 * Adds PMPro icon to the Memberlite Category in the block inserter
 */

import PMProIcon from './pmpro-icon';
import domReady from '@wordpress/dom-ready';
import { updateCategory } from '@wordpress/blocks';

domReady( () => {
	wp.blocks.registerBlockCollection( 'memberlite', {
		title: 'Memberlite',
		slug: 'memberlite',
		icon: PMProIcon,
	});

	updateCategory( 'memberlite', {
		icon: PMProIcon
	} );
} );

