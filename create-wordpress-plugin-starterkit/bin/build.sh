#!/bin/sh

BASEDIR=$(dirname "$(realpath "$0")")

rm -rf "$BASEDIR/../template"

rsync -av \
  --exclude='.idea' \
  --exclude='.git' \
  --exclude='.github' \
  --exclude='node_modules' \
  --exclude='create-wordpress-plugin-starterkit' \
  "$BASEDIR/../.." "$BASEDIR/../template"

