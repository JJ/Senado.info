#!perl 

use strict;
use warnings;

use Test::More qw( no_plan ); #Random initial string...
use lib qw( lib ../lib ../../lib  ); #Just in case we are testing it in-place

use ES::Senado;
use File::Slurp qw(read_file);

my @fichas = qw(249 278 061 125 200);

for my $f (@fichas ) {
  my $source;
  if ( -r "../../data/$f"."_index_files/$f.html" ) {
    $source = "../../data/$f"."_index_files/$f.html";
  } else {
    $source = "../data/$f"."_index_files/$f.html";
  }

  my $ficha = read_file( $source ) || die "No puedo cargar $source por $@\n";
  my @items = ($ficha =~ m{<li>(.+?)</li>}gs);
  my $base_item;
  if ( $items[2] =~ /Nacid/ ) {
    $base_item = 2;
  } else {
    $base_item = 3;
  }
  next if $item[$base_item] != /Nacid/;
  my ($lugar_nacimiento) = ( $items[$base_item] =~ m{>([^<]+)</font>\s});
  $lugar_nacimiento = $lugar_nacimiento || 'Indefinido';
  my ($fecha_nacimiento_dia, $fecha_nacimiento_mes, $fecha_nacimiento_year ) = 
    ( $items[$base_item] =~ m{el (\d+) de (\w+) de (\d+)});
  if ( !$fecha_nacimiento_year ) {
    $fecha_nacimiento_dia = 1;
    $fecha_nacimiento_mes = 1;
    $fecha_nacimiento_year = 1111;
  }
  isnt($fecha_nacimiento_year, '', "Extrayendo fecha $lugar_nacimiento en el $fecha_nacimiento_year");
  my ($estado_civil) = $items[$base_item+1];
  isnt($estado_civil, '', "Extrayendo estado $estado_civil");
  my ($formacion) = ($items[$base_item+2] =~ />([^<]+)/);
  isnt($formacion, '', "Extrayendo formación $formacion");
}


