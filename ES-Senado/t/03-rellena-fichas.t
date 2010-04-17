#!perl 

use strict;
use warnings;

use Test::More qw( no_plan ); #Random initial string...
use lib qw( lib ../lib ../../lib  ); #Just in case we are testing it in-place

use ES::Senado qw(extrae_nombres_listado extrae_info_ficha);

use File::Slurp qw(read_file);
use LWP::Simple qw(get);

my $source;
if ( -r '../../data/lista-alfabetica-senadores.html' ) {
  $source = '../../data/lista-alfabetica-senadores.html';
} else {
   $source = '../data/lista-alfabetica-senadores.html';
}

my $listado = read_file( $source ) || die "No puedo cargar $source por $@\n";


my @senadores_hash = extrae_nombres_listado( $listado );

isnt( $#senadores_hash, -1, "Extraídos senadores" );

my $url_base = "http://www.senado.es";
for my $s (@senadores_hash[150..160]) { #loncha arbitrario
  #Descarcar información
  my $url_ficha = $s->{'url'};
  my ($id) = ( $s->{'url'} =~ /(\d+)_index/);
  $url_ficha =~ s{$id\_index.html}{/ficha/$id.html};
  my $ficha = get( "$url_base$url_ficha" ) || die "No puedo bajar $url_ficha";
  isnt($ficha, '', "Bajada ficha $url_ficha");
  my @datos_adicionales = extrae_info_ficha( $ficha );
  is( $#datos_adicionales, 6, "Extraidos datos ". join( " - ", @datos_adicionales) );
}
