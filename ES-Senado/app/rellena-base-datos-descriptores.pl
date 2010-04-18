#!perl 

use strict;
use warnings;

use lib qw( lib ../lib ../../lib  ); #Just in case we are testing it in-place

use ES::Senado qw(extrae_intervenciones extrae_info_ficha);

use File::Slurp qw(read_file);
use LWP::Simple qw(get);

#Conectamos a la BD
my $dbname = 'sena2';
my $dsn = "dbi:mysql:dbname=$dbname";
my $schema = ES::Senado->connect($dsn);
#eval {
#  $schema->deploy();
#};
#$schema->deploy({ sources => ['actividades'],
#		  add_drop_tables => 1});
my $rs_actividad = $schema->resultset('Actividades');
my $rs_descriptor = $schema->resultset('Descriptores_Actividad');

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
    my ($descriptores) = ($ficha =~ /EUROVOC: (.+?)\./gs); 
    
    my @descriptores = split(/,\s+/, $descriptores);
    for my $d (@descriptores) {
      my $este_descriptor = $rs_descriptor->new( { actividad => $a->url,
						   descriptor => $d } );
      eval {
	$este_descriptor->insert;
      };
      if ( $@ ) {
	print "Error $@ en el url ", $a->url, ". Comprobar";
      }
      print "Insertado ", $a->url, " ", $d, "\n";
    }
  }
  
} # fin bucle senadores
