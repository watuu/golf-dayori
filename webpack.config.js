const webpack = require('webpack');

module.exports = {
    mode: process.env.WEBPACK_ENV,
    // mode: 'production',
    entry: `./src/js/app.js`,
    output: {
        path: `${__dirname}/dest/assets/js`,
        filename: 'app.js'
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader'
                }
            },
            {
                test: /\.css/,
                use: [
                    'style-loader',
                    {
                        loader: 'css-loader',
                        options: {
                            url: false
                        }
                    }
                ],
            }
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery'
        })
    ]
};