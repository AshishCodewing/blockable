// Import the original config from the @wordpress/scripts package.
const path = require("path");

const defaultConfig = require('@wordpress/scripts/config/webpack.config');

// Import the helper to find and generate the entry points in the src directory
const { getWebpackEntryPoints } = require('@wordpress/scripts/utils/config');

// CSS minimizer
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

// Build Bundle Analyzer
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

// Add any a new entry point by extending the webpack config.
module.exports = {
	...defaultConfig,
    mode:"development",
    devtool: "inline-source-map",
	entry: {
		...getWebpackEntryPoints(),
        admin: './assets/js/admin.js'
	},
	output: {
		path: path.resolve(__dirname, "build"),
	},
	optimization: {
        minimizer: [
            ...defaultConfig.optimization.minimizer,
            new CssMinimizerPlugin()
        ],
    },
    plugins: [
        ...defaultConfig.plugins,
        new BundleAnalyzerPlugin({
            analyzerMode: 'static', // Generates report file instead of starting HTTP server
            reportFilename: 'report.html', // Name of the report file
            openAnalyzer: false, // Don't automatically open the report in the browser
            generateStatsFile: true, // Generate a stats JSON file
            statsFilename: 'stats.json', // Name of the stats file
        })
    ]
};
