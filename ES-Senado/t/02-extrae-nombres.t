#!perl 

use strict;
use warnings;

use Test::More qw( no_plan ); #Random initial string...
use lib qw( lib ../lib ../../lib  ); #Just in case we are testing it in-place

use ES::Senado;
use File::Slurp qw(read_file);

my $source;
if ( -r '../../data/lista-alfabetica-senadores.html' ) {
  $source = '../../data/lista-alfabetica-senadores.html';
} else {
   $source = '../data/lista-alfabetica-senadores.html';
}

my $listado = read_file( $source ) || die "No puedo cargar $source por $@\n";


my @lista_con_formato = ($listado =~ m{<li>(.+?)</li>}gs);

is ( $#lista_con_formato, 262, "Número OK");

my @senadores;
for my $s ( @lista_con_formato ) {
  my ( $url_ficha, $apellidos, $nombre, $nombramiento, $zona ) = ($s =~ m{'([^']+)'\)">([^,]+), ([^)]+)+ \((\w+)\)</a>\s+. (\w+) por (.+)});
  push @senadores, { url => $url_ficha,
		     apellidos => $apellidos,
		     nombre => $nombre,
		     nombramiento => $nombramiento,
		     zona => $zona };
}

for my $s ( @senadores ) {
  is ( $s->{'nombre'} ne '', 1, "Nombre ".$s->{'nombre'}." no nulo" );
}
