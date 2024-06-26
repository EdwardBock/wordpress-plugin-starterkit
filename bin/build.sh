#!/bin/sh

PLUGIN_SLUG="wordpress-plugin-starterkit"
PROJECT_PATH=$(pwd)
BUILD_PATH="${PROJECT_PATH}/build"
DEST_PATH="$BUILD_PATH/$PLUGIN_SLUG"

echo "Build production version of assets..."
npm run build

echo "Generating build directory..."
rm -rf "$BUILD_PATH"
mkdir -p "$DEST_PATH"

echo "Syncing files..."
rsync -rL "$PROJECT_PATH/plugin/" "$DEST_PATH/"

echo "Cleanup files..."
cd "$DEST_PATH"
composer install --no-cache
composer update --no-cache
composer dump-autoload
rm "composer.json"
rm "composer.lock"
cd "$PROJECT_PATH"


echo "Generating zip file..."
cd "$BUILD_PATH" || exit
zip -q -r "${PLUGIN_SLUG}.zip" "$PLUGIN_SLUG/"

cd "$PROJECT_PATH" || exit
mv "$BUILD_PATH/${PLUGIN_SLUG}.zip" "$PROJECT_PATH"
echo "${PLUGIN_SLUG}.zip file generated!"

echo "Cleanup build path..."
rm -rf "$BUILD_PATH"

echo "Build done!"