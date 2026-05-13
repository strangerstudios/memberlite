/**
 * Hide memberlite/nav-menu and memberlite/member-info from the block
 * inserter unless we are editing a memberlite_header or memberlite_footer.
 *
 * Why supports.inserter and not allowed_block_types_all: the PHP filter
 * approach can drop third-party blocks that register client-side only
 * (e.g. yoast-seo/table-of-contents). This filter targets only our two
 * blocks by name and leaves the rest of the inserter untouched.
 */

import { addFilter } from '@wordpress/hooks';
import { select } from '@wordpress/data';

const SCOPED_BLOCKS = [ 'memberlite/nav-menu', 'memberlite/member-info' ];
const ALLOWED_POST_TYPES = [ 'memberlite_header', 'memberlite_footer' ];

function getPostTypeFromBody() {
	if ( typeof document === 'undefined' ) {
		return null;
	}
	const match = document.body.className.match( /post-type-([a-z0-9_-]+)/i );
	return match ? match[ 1 ] : null;
}

addFilter(
	'blocks.registerBlockType',
	'memberlite/scope-blocks-to-header-footer',
	( settings, name ) => {
		if ( ! SCOPED_BLOCKS.includes( name ) ) {
			return settings;
		}

		// At block-registration time core/editor may not be populated yet,
		// so fall back to the document body class WP sets for the post type.
		const postType =
			select( 'core/editor' )?.getCurrentPostType?.() ||
			getPostTypeFromBody();

		if ( postType && ALLOWED_POST_TYPES.includes( postType ) ) {
			return settings;
		}

		return {
			...settings,
			supports: {
				...( settings.supports || {} ),
				inserter: false,
			},
		};
	}
);
