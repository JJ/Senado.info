#!perl 

use strict;
use warnings;

use Test::More qw( no_plan ); #Random initial string...
use lib qw( lib ../lib ../../lib  ); #Just in case we are testing it in-place

use ES::Senado;
use File::Slurp qw(read_file);

my @fichas = qw (125 200);

for my $f (@fichas ) {
  my $source;
  if ( -r "../../data/$f"."_index_files/$f.html" ) {
    $source = "../../data/$f"."_index_files/$f.html";
  } else {
    $source = "../data/$f"."_index_files/$f.html";
  }

  my $ficha = read_file( $source ) || die "No puedo cargar $source por $@\n";
  my @items = ($ficha =~ m{<li>(.+?)</li>}g);
  my ($lugar_nacimiento, $fecha_nacimiento_dia, $fecha_nacimiento_mes, $fecha_nacimiento_year ) = 
    ( $items[2] =~ m{>([^<]+)</font>\sel (\d+) de (\w+) de (\d+)});
  isnt($fecha_nacimiento_year, '', "Extrayendo fecha $lugar_nacimiento en el $fecha_nacimiento_year");
  my ($estado_civil, $descendencia) = ( $items[3] =~ /([^.]+)\.(.+)/ );
  isnt($estado_civil, '', "Extrayendo estado $estado_civil");
  my ($formacion) = ($items[4] =~ />([^<]+)/);
  isnt($formacion, '', "Extrayendo formación $formacion");
}


