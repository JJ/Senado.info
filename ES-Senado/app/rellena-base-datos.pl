#!perl 

use strict;
use warnings;

use lib qw( lib ../lib ../../lib  ); #Just in case we are testing it in-place

use Data::ES::Senado qw(extrae_nombres_listado extrae_info_ficha);

use File::Slurp qw(read_file);
use LWP::Simple qw(get);

#Conectamos a la BD
my $dbname = shift || 'sena2';
my $source_file = shift; 
my $dsn = "dbi:mysql:dbname=$dbname";
my $schema = Data::ES::Senado->connect($dsn);
$schema->deploy({ add_drop_tables => 1});
my $rs_persona = $schema->resultset('Personas');

#Leemos la lista de senadores local o remota
my $listado;
if ( $source_file ) {
  my $source;
  if ( -r '../../data/'.$source_file ) {
    $source = '../../data/'.$source_file;
  } else {
    $source = '../data/'..$source_file;
  }
  $listado = read_file( $source ) || die "No puedo cargar $source por $@\n";
} else {
  $listado = get ('http://www.senado.es/legis9/senadores/alfabet.html') || die "No puedo bajarme la pagina de Senado";
}


#  Extraemos los nombres
my @senadores_hash = extrae_nombres_listado( $listado );
my $url_base = "http://www.senado.es";

#Añadimos o la BD uno por uno
for my $s (@senadores_hash) { #loncha arbitrario
  #Descarcar información
  my $url_ficha = $s->{'url'};
  my ($id) = ( $s->{'url'} =~ /(\d+)_index/);
  $url_ficha =~ s{$id\_index.html}{/ficha/$id.html};
  my $ficha = get( "$url_base$url_ficha" ) || die "No puedo bajar $url_ficha";
  my %datos_adicionales = extrae_info_ficha( $ficha );
  for my $d ( keys %datos_adicionales ) {
    $s->{$d} = $datos_adicionales{$d};
  }
  my $senador_a = $rs_persona->new( $s );
  eval {
    $senador_a->insert;
  };
  if ( $@ ) {
    print "Error $@ en el url $url_ficha. Comprobar";
  }
  print "Insertado ", $s->{'nombre'}, " ", $s->{'apellidos'}, "\n";
}
