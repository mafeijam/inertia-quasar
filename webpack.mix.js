const mix = require('laravel-mix')
const cssImport = require('postcss-import')

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
      cssImport(),
    ])
    .webpackConfig({
      output: {
        chunkFilename: 'js/[name].js?id=[chunkhash]',
      },
      module: {
        rules: [{
          test: /\.pug$/,
          oneOf: [{
            resourceQuery: /^\?vue/,
            use: ['pug-plain-loader']
          }, {
            use: ['raw-loader', 'pug-plain-loader']
          }]
        }]
      }
    })
