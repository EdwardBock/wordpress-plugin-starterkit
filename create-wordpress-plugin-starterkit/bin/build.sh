#!/bin/sh

BASEDIR=$(dirname "$(realpath "$0")")

rm -rf "$BASEDIR/../dist"

rsync -av \
  --exclude='.git' \
  --exclude='.idea' \
  --exclude='create-wordpress-plugin-starterkit' \
  --exclude='node_modules' \
  --exclude='.github' \
  "$BASEDIR/../.." "$BASEDIR/../template"

