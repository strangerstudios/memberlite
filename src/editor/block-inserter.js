/**
 * Adds PMPro icon to the Memberlite Category in the block inserter
 */

import PMProIcon from "./pmpro-icon";

( function () {
	wp.blocks.updateCategory('memberlite', {
		icon: PMProIcon
	} );
} )();

