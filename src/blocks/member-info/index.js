import { registerBlockType } from '@wordpress/blocks';

import Edit from './edit';
import metadata from './block.json';

registerBlockType( metadata.name, {
	icon: {
		background: '#FFFFFF',
		foreground: '#00a59d',
		src: 'admin-users',
	},
	edit: Edit,
	save: () => null,
} );
