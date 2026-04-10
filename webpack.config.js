const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

module.exports = {
	...defaultConfig,
	entry: {
		'editor/custom-settings': path.resolve( process.cwd(), 'src/editor/custom-settings.js' ),
		'blocks/nav-menu/index': path.resolve( process.cwd(), 'src/blocks/nav-menu/index.js' ),
		'blocks/member-info/index': path.resolve( process.cwd(), 'src/blocks/member-info/index.js' ),
	},
};
