const path = require("path");
const defaultConfig = require( '@wordpress/scripts/config/webpack.config.js' );


module.exports = {
    ...defaultConfig,
    entry: {
        gutenberg: path.resolve(__dirname, './src/gutenberg.ts'),
        admin: path.resolve(__dirname, './src/admin.ts'),
    },
    output: {
        path: path.resolve(__dirname, "../plugin/dist"),
    },
};