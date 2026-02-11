# Build Process

## Overview

Memberlite uses a hybrid development approach:
- Traditional theme CSS/JS are committed directly.
- Block editor enhancements are compiled using `@wordpress/scripts`.

## How it Works

Memberlite’s front-end styles and JavaScript (in `css/` and `js/`) do not rely on a build step. 
These files are authored and committed directly.

However, for block development and customizations to the WordPress block editor, we use a build process. 
You can find the source code for blocks and editor settings in the `src/` directory. We use `@wordpress/scripts` (wp-scripts), 
which leverages Webpack under the hood, to build custom blocks and editor settings. A custom `webpack.config.js` file defines 
additional source and destination paths.

Built assets are output to the `build/` directory (or appropriate destination defined in `webpack.config.js`).

## Getting Started

1. Clone the Memberlite repository and navigate to the theme directory.
   - For more detailed instructions, see the root `README.md`.
2. Run `npm install` to install dependencies.
3. Run `npm run build` to build blocks and editor settings.
4. You can also run `npm run watch` to watch for changes and rebuild automatically.

## Adding New Paths to the Webpack Config

1. Create new blocks in the `src/blocks/` directory. 
   - You can create new subdirectories within `blocks/` to organize your blocks as needed. For example, you might have `src/blocks/my-new-block/` for a new block called "My New Block".
2. Add the new block to the `entry` object in `webpack.config.js`.
    - Format: `'blocks/my-new-block/index': path.resolve( process.cwd(), 'src/blocks/my-new-block/index.js' ),`
4. For new editor settings, you can use the existing `src/editor-settings.js` file. You do not need to add a new path to the Webpack config.

**Note:** We do not commit files in the `build/` directory. These are generated files that should be built locally when developing or testing.

## Further Reading

- [WordPress Scripts Documentation](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/)
- [How Webpack and WordPress packages interact](https://developer.wordpress.org/news/2023/04/how-webpack-and-wordpress-packages-interact/)
