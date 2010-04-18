#!perl 

use strict;
use warnings;

use lib qw( lib ../lib ../../lib  ); #Just in case we are testing it in-place

use ES::Senado qw(extrae_nombres_listado extrae_info_ficha);

use File::Slurp qw(read_file);
use LWP::Simple qw(get);

#Conectamos a la BD
my $dbname = 'sena2';
my $dsn = "dbi:mysql:dbname=$dbname";
my $schema = ES::Senado->connect($dsn);
my $rs_persona = $schema->resultset('Personas');

#Leemos la lista de senadores local
my $source;
if ( -r '../../data/lista-alfabetica-senadores.html' ) {
  $source = '../../data/lista-alfabetica-senadores.html';
} else {
   $source = '../data/lista-alfabetica-senadores.html';
}

my $listado = read_file( $source ) || die "No puedo cargar $source por $@\n";

my @senadores_hash = extrae_nombres_listado( $listado );

my $url_base = "http://www.senado.es";

#Añadimos o la BD uno por uno
for my $s (@senadores_hash) { #loncha arbitrario
  #Descarcar información
  my $url_ficha = $s->{'url'};
  my @senadores = $rs_persona->search( { url => $s->{'url'} } );
  my $este_senador = $senadores[0];
  if ( !$s->{'genero'} ) {
    print "Error sin genero en $url_ficha\n";
  }
  $este_senador->genero( $s->{'genero'} );
  eval {
    $este_senador->update;
  };
  if ( $@ ) {
    print "Error $@ en el url $url_ficha. Comprobar";
  }
  print "Actualizado ", $s->{'nombre'}, " ", $s->{'genero'}, "\n";
}
