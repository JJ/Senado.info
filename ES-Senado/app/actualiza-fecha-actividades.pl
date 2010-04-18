#!perl 

use strict;
use warnings;

use lib qw( lib ../lib ../../lib  ); #Just in case we are testing it in-place

use ES::Senado qw(orden_de);

use File::Slurp qw(read_file);
use LWP::Simple qw(get);

#Conectamos a la BD
my $dbname = 'sena2';
my $dsn = "dbi:mysql:dbname=$dbname";
my $schema = ES::Senado->connect($dsn);
my $rs_actividad = $schema->resultset('Actividades');
my @actividades = $rs_actividad->all;

my $url_base = "http://www.senado.es";

#Añadimos o la BD uno por uno
for my $a (@actividades) { #loncha arbitrario
  #Descarcar información
  my $this_url = $a->url;
  $this_url =~ s{index_}{general/};
  my $ficha;
  eval {
    $ficha = get( "$url_base".$this_url );
  };
  if ( !$ficha ) {
    print "No puedo bajar ". $this_url, " por $@ \n";
  } else { 
    my ($dia,$mes,$anho) = ($ficha =~ /Registrad.\s+el\s+(\d+)\s+de\s+(\w+)\s+de\s+(\d+)/gs); 
    $a->fecha("$anho-".orden_de($mes)."-$dia");
    eval{
      $a->update;
    };
    if ( $@ ) {
      print "Error $@ en el url $this_url. Comprobar";
    }
    print "Actualizado ", $a->url, " ", $a->fecha, "\n"; 
  }
  
} # fin bucle senadores
