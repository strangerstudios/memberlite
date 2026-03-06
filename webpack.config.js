const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

module.exports = {
	...defaultConfig,
	entry: {
		'editor/custom-settings': path.resolve( process.cwd(), 'src/editor/custom-settings.js' ),
		// Add more entries as needed
		// 'blocks/my-block/index': path.resolve( process.cwd(), 'src/blocks/my-block/index.js' ),
	},
};
