# WordPress Plugin Starterkit

Are you looking to streamline your WordPress plugin development process? 
This starterkit is crafted from years of professional plugin development 
experience, ensuring your code is both maintainable and developer-friendly.

## In short and sweet

- `plugin/` contains the final WordPress plugin source code
- `src/` contains all raw style and script files that will be transpiled into the `plugin/dist/`
  - `webpack.config.js` wp-scripts configuration
- `bin/` contains scripts for a release build
- `docker-compose.yml` can be used to start an isolated development WordPress
  - `wp.ini` some php configurations
- `plugin.php` if you want to clone this repo into your running project, this file will help

## Getting started

```shell
## --- Once ---

# create starterkit code directory
npx create-wordpress-plugin-starterkit
# or
pnpm create wordpress-plugin-starterkit
# or
bunx create-wordpress-plugin-starterkit

# if you do not have a local php and composer installation
nix-shell

# build the vendor directory for psr-4 autoloading
# this needs to be executed after every root namespace change
cd plugin
composer dump-autoload
cd ..

## --- Every startup ---

# Startup the wordpress docker environment.
docker compose up -d

# If you need transpiled TypeScript or JavaScript files.
npm i
npm run watch
```

Goto [localhost:8080](http://localhost:8080/), install WordPress, activate 
the plugin and start modifying the code in the `plugin` directory.

Use the pack.sh script to pack a production ready version of the plugin into a zip file.

```shell
./bin/pack.sh
```

### Requirements

- [Docker](https://www.docker.com/) or [Podman](https://podman.io/)
- [Nix](https://nix.dev/) or a [composer](https://getcomposer.org/) installation


## Why choose this starterkit?

- **Maintainable Code:** Focus on creating long-term, maintainable code that is easy to understand and manage.
- **Enhanced Developer Experience:** Designed to provide an excellent experience not just for you, but also for third-party plugin and theme developers.

### Beyond standard guidelines

While this starterkit does not adhere to the traditional WordPress Coding 
Guidelines, this is a deliberate choice. Instead, it follows the 
recommendations from [Write Better WordPress Code](https://medium.com/write-better-wordpress-code) publications.

### Key features

- **Professional-Grade Code Structure:** Benefit from a codebase that has been refined through extensive professional use.
- **Future-Proof Your Development:** Ensure your plugins are built to last and easy to update.
- **Community and Third-Party Friendly:** Create plugins and themes that are easy for others to understand and extend.

### Key technical features
 
- **PSR-4 Autoloading:** Optimize your code organization and loading times with PSR-4 autoloading, ensuring efficient and standardized file management.
- **Scheduled Tasks:** Automate and manage recurring tasks seamlessly with built-in scheduling capabilities, enhancing your plugin's efficiency.
- **REST API Integration:** Leverage the power of the WordPress REST API to create dynamic and interactive applications with ease.
- **Gutenberg Block Extensions:** Extend and customize the Gutenberg editor to enhance the editing experience and create rich, dynamic content.
- **WP Scripts Integration:** Simplify your development process with WP Scripts, a powerful toolset for modern JavaScript development in WordPress.
- **Automatic Plugin API Documentation:** Ensure your plugin is well-documented with implicit API documentation, making it easier for other developers to understand and extend your code.

Harness the power of these features to create robust, maintainable, and high-performing WordPress plugins and themes. Get started with our starter kit today and transform your development experience!

## Liked it?

[!["Buy Me A Coffee"](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://www.buymeacoffee.com/edwardbock)