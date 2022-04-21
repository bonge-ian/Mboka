const mix = require("laravel-mix");
const path = require("path");

mix
    // resolve uikit-util path
    .webpackConfig({
        resolve: {
            alias: {
                "uikit-util": path.resolve(
                    __dirname,
                    "node_modules/uikit/src/js/util/"
                ),
            },
        },
    })
    // Utilities
    .sourceMaps()
    .options({
        processCssUrls: false,
    })

    // Add global libraries
    .autoload({
        "uikit/dist/js/uikit-core": "UIkit",
    })

    // Suppress success messages
    .disableNotifications()

    // Compile Javascript (ES6)
    .js("resources/js/app.js", "public/js")
    .extract()

    // Compile Sass
    .sass("resources/scss/app.scss", "public/css");

    // .copy('resources/img', 'public/img')
    // .copy('resources/fonts', 'public/fonts')

// Setup versioning (cache-busting)
if (mix.inProduction()) {
    mix.version();
}
