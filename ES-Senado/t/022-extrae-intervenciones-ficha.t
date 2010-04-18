#!perl 

use strict;
use warnings;

use Test::More qw( no_plan ); #Random initial string...
use lib qw( lib ../lib ../../lib  ); #Just in case we are testing it in-place

use ES::Senado qw(extrae_intervenciones);
use File::Slurp qw(read_file);

my @fichas = qw(089);

for my $f (@fichas ) {
  my $source;
  if ( -r "t/interv_$f.html" ) {
    $source = "t/interv_$f.html";
  } else {
    $source = "interv_$f.html";
  }

  my $ficha = read_file( $source ) || die "No puedo cargar $source por $@\n";
  my %intervenciones = extrae_intervenciones( $ficha );

  for my $s (keys %{$intervenciones{'secciones'}} ) {
    isnt( ref $intervenciones{'secciones'}{$s}, '', "Sección $s" );
    isnt( ref $intervenciones{'secciones'}{$s}[0], '', "Fases sección $s");
  }
}


