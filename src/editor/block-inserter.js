/**
 * Adds PMPro icon to the Memberlite Category in the block inserter
 */

import PMProIcon from "./pmpro-icon";

import domReady from '@wordpress/dom-ready';
import { updateCategory } from '@wordpress/blocks';

domReady( () => {
	updateCategory( 'memberlite', {
		icon: PMProIcon
	} );
} );

