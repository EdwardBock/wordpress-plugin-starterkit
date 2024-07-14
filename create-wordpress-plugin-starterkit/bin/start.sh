#!/bin/sh

echo What should the name of your plugin directory be?

read pluginname
BASEDIR=$(dirname "$(realpath "$0")")

if [ -d "$pluginname" ]; then
  echo "$pluginname does already exist."
  exit
fi

cp -r "$BASEDIR/../template" "$pluginname"
