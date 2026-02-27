# Build Process

## Overview

Memberlite uses a hybrid development approach:
- Most front-end styles are authored in Sass (`src/scss/`) and compiled to CSS in `build/css/`.
- The compiled CSS includes a table of contents and is not compressed by default.
- Some legacy vanilla CSS files remain in the theme's `css/` directory and are committed directly.
- The theme's JavaScript is edited directly in the `js/` directory.
- Block editor enhancements are compiled using `@wordpress/scripts`.

## How it Works

- Sass source files for front-end styles are located in `src/scss/`.
- Run the build process to compile these Sass files into CSS, outputting to `build/css/`. The compiled CSS includes a table of contents and is not minified by default.
- Some vanilla CSS files in the `css/` directory are still used and maintained directly.
- JavaScript for the theme is authored and committed directly in the `js/` directory.
- For block development and customizations to the WordPress block editor, source code is in the `src/` directory. We use `@wordpress/scripts` (wp-scripts), which leverages Webpack under the hood, to build custom blocks and editor settings. A custom `webpack.config.js` file defines additional source and destination paths.
- Built block/editor assets are output to the `build/` directory (or as defined in `webpack.config.js`).

## Getting Started

1. Clone the Memberlite repository and navigate to the theme directory.
   - For more detailed instructions, see the root `README.md`.
2. Run `npm install` to install dependencies.
3. Run `npm run build:blocks` to build blocks and editor settings.
4. Run `npm run build:css` to compile Sass to CSS.
5. Run `npm run build` to build blocks, editor settings, and CSS all at once.
6. You can also run `npm run watch:css` or `npm run watch:blocks` to watch for changes and rebuild automatically.

## Adding New Paths to the Webpack Config

1. Create new blocks in the `src/blocks/` directory. 
   - You can create new subdirectories within `blocks/` to organize your blocks as needed. For example, you might have `src/blocks/my-new-block/` for a new block called "My New Block".
2. Add the new block to the `entry` object in `webpack.config.js`.
    - Format: `'blocks/my-new-block/index': path.resolve( process.cwd(), 'src/blocks/my-new-block/index.js' ),`
4. For new editor settings, you can use the existing `src/editor/custom-settings.js` file. You do not need to add a new path to the Webpack config.

**Note:** We do not commit files in the `build/` directory. These are generated files that should be built locally when developing or testing.

## Further Reading

- [WordPress Scripts Documentation](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/)
- [How Webpack and WordPress packages interact](https://developer.wordpress.org/news/2023/04/how-webpack-and-wordpress-packages-interact/)
