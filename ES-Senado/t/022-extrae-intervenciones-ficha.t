#!perl 

use strict;
use warnings;

use Test::More qw( no_plan ); #Random initial string...
use lib qw( lib ../lib ../../lib  ); #Just in case we are testing it in-place

use ES::Senado;
use File::Slurp qw(read_file);

my @fichas = qw(089);

for my $f (@fichas ) {
  my $source;
  if ( -r "../../data/interv_$f.html" ) {
    $source = "../../data/interv_$f.html";
  } else {
    $source = "../data/interv_$f.html";
  }

  my $ficha = read_file( $source ) || die "No puedo cargar $source por $@\n";

  my ($prologo, $intervenciones) = split( "<br><hr><br>", $ficha );
  my @secciones = split( "<br><br><br>", $intervenciones);

  for my $s (@secciones ) {
    my ($nombre_seccion, $intervenciones) = 
      ( $s =~ m{<b>([^.]+)\.</b></a>\s+<br>(.+)}s );
    my @intervenciones = split(/\s+<br><br>\s+/, $intervenciones );
    for my $i ( @intervenciones ) {
      my ($nombre, $fases ) = ($i =~  m{^\s*(.+?)</a>\s+(<table.+)}s);
      my @fases = split( "<br><br>", $fases );
      print "Intervención $nombre", join( "---", @fases );
    }
  }
}


