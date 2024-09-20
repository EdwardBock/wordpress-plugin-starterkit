# Create WordPress Plugin Starterkit

Are you looking to streamline your WordPress plugin development process? This starterkit is crafted from years of professional plugin development experience, ensuring your code is both maintainable and developer-friendly.

```shell
npx create-wordpress-plugin-starterkit
# or
pnpm create wordpress-plugin-starterkit
# or
bunx create-wordpress-plugin-starterkit

# change directory into your plugin
cd name-of-your-plugin-directory

# if you do not have a local php and composer installation
nix-shell

# build the vendor directory for psr-4 autoloading
# this needs to be executed after every root namespace change
cd plugin
composer dump-autoload
cd ..

# (optional) Startup an wordpress docker environment.
npm run wp-env start

# If you need transpiled TypeScript or JavaScript files.
pnpm install
pnpm build
```
