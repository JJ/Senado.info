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
eval {
  $schema->deploy();
};
#$schema->deploy({ sources => ['actividades'],
#		  add_drop_tables => 1});
my $rs_persona = $schema->resultset('Personas');
my $rs_actividad = $schema->resultset('Actividades');

my @senadores = $rs_persona->all;

my $url_base = "http://www.senado.es";

#Añadimos o la BD uno por uno
for my $s (@senadores) { #loncha arbitrario
  #Descarcar información
  my $this_url = $s->url;
  my ($id) = ( $this_url =~ /(\d+)_index/);
  $this_url =~ s{$id\_index.html}{/interv/$id.html};
  my $ficha = get( "$url_base$this_url" ) || die "No puedo bajar $this_url";
  my %intervenciones = extrae_intervenciones( $ficha );

  for my $s ( keys %{$intervenciones{'secciones'}} ) {
    for my $i ( @{$intervenciones{'secciones'}{$s}} ) {
      my %actividad = ( tipo => $s );
      my ( $titulo, $url ) = 
	( $i->{'nombre'} =~ m{([^<]+).+\'([^']+)\'} );
      $actividad{'titulo'} = $titulo;
      $actividad{'url'} = $url;
      my $esta_actividad = $rs_actividad->find( $url );
      if ( !$esta_actividad ) { #Añadir a la BD
	my $nueva_actividad = $rs_actividad->new( \%actividad );
	eval {
	  $nueva_actividad->insert;
	};
	if ( $@ ) {
	  print "Error $@ en el url $this_url. Comprobar";
	}
	print "Insertado $s $titulo\n";  
      }
    }
  }
  
} # fin bucle senadores
