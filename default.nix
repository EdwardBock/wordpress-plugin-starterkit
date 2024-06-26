{ pkgs ? import <nixpkgs> {} }:

pkgs.mkShell {
  buildInputs = [
    pkgs.php81
    pkgs.php81Packages.composer
  ];
}