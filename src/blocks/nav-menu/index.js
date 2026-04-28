import { registerBlockType } from '@wordpress/blocks';
import './style.scss';

import Edit from './edit';
import metadata from './block.json';

registerBlockType( metadata.name, {
	icon: {
		background: '#FFFFFF',
		foreground: '#00a59d',
		src: 'menu',
	},
	edit: Edit,
	save: () => null,
} );
