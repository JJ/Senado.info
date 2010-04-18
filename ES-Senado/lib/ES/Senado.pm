package ES::Senado;

use warnings;
use strict;
use Carp;

use version; our $VERSION = qv('0.0.3');

# Other recommended modules (uncomment to use):
#  use IO::Prompt;
#  use Perl6::Export;
#  use Perl6::Slurp;
#  use Perl6::Say;

use base qw/DBIx::Class::Schema Exporter/;

our @EXPORT_OK = qw(extrae_nombres_listado extrae_info_ficha
		    extrae_intervenciones);

our @meses = qw( enero febrero marzo abril mayo junio julio 
		 agosto septiembre octubre noviembre diciembre); 

my %orden_de;
for ( my $i = 0; $i <= $#meses; $i++ ) {
  $orden_de{$meses[$i]} = $i + 1;
}

# Module implementation here
__PACKAGE__->load_namespaces();

sub extrae_nombres_listado {
  my $string = shift || croak "Hace falta una cadena";

  my @lista_con_formato = ($string =~ m{<li>(.+?)</li>}gs);

  my @senadores;
  for my $s ( @lista_con_formato ) {
    my ( $url_ficha, $apellidos, $nombre, $grupo, $nombramiento, $zona ) = ($s =~ m{'([^']+)'\)">([^,]+), ([^)]+)+ \((\w+)\)</a>\s+. (\w+) por (.+)});
    push @senadores, { url => $url_ficha,
		       apellidos => $apellidos,
		       nombre => $nombre,
		       grupo => $grupo,
		       nombramiento => lcfirst($nombramiento),
		       zona => $zona };
  }
  return @senadores;
}

sub extrae_info_ficha {
  my $ficha = shift || croak "Hace falta una cadena";

  my @items = ($ficha =~ m{<li>(.+?)</li>}gs);
  my $base_item;
  if ( $items[2] =~ /Nacid/ ) {
    $base_item = 2;
  } else {
    $base_item = 3;
  }
  my ( $fecha_nacimiento_dia, $fecha_nacimiento_mes, 
       $fecha_nacimiento_year,$estado_civil);
       
  #Extraemos formación primero
  my ($formacion) =  ($ficha =~ m{<li>Partido.+?>([^<]+)</font>}sg);
  
  my ($lugar_nacimiento) = ($ficha =~ m{<li>Nacid. en <font[^>]+>([^<]+)</font>}sg);
  $lugar_nacimiento = $lugar_nacimiento || 'Indefinido';
  #Luego, más o menos el resto
  if ( $items[$base_item] =~ /Nacid/ ) { 
    ($fecha_nacimiento_dia, $fecha_nacimiento_mes, $fecha_nacimiento_year ) = 
      ( $items[$base_item] =~ m{el (\d+) de (\w+) de (\d+)});
    ($estado_civil) = $items[$base_item+1];
  } elsif ( $items[2] =~ /Formaci/ ) {
    $estado_civil='Indefinido';
  }
  if ( !$fecha_nacimiento_year ) {
    $fecha_nacimiento_dia = 1;
    $fecha_nacimiento_mes = 'enero';
    $fecha_nacimiento_year = 1111;
  }
  my $mes_en_numero = $orden_de{$fecha_nacimiento_mes};
  return ( lugar_nacimiento => $lugar_nacimiento, 
	   fecha_nacimiento => "$fecha_nacimiento_year-$mes_en_numero-$fecha_nacimiento_dia",
	   estado_civil => $estado_civil || "Indefinido",
	   partido => $formacion );
}

sub extrae_intervenciones {
  my $ficha = shift || croak "Hace falta una cadena";
  my ($prologo, $resto);
  if ( $ficha =~ /<br><hr><br>/ ) {
    ($prologo, $resto) = split( "<br><hr><br>", $ficha );
  } else {
    $prologo = '';
    $resto = $ficha;
  }
  my @secciones = split( "<br><br><br>", $resto);
  
  my %intervenciones_hash = ( prologo => $prologo);
			      
  for my $s (@secciones ) {
    my ($nombre_seccion, $intervenciones) = 
      ( $s =~ m{<b>([^.]+)\.</b></a>\s+<br>(.+)}s );
    $intervenciones_hash{'secciones'}{$nombre_seccion} = [];
    
    my @intervenciones = split(/\s+<br><br>\s+/, $intervenciones );
    for my $i ( @intervenciones ) {
      my ($nombre, $fases ) = ($i =~  m{^\s*(.+?)</a>\s+(<table.+)}s);
      my @fases = split( "<br><br>", $fases );
      push( @{$intervenciones_hash{'secciones'}{$nombre_seccion}},
	    { nombre => $nombre,
	      fases => \@fases } );
    }
  }
  return %intervenciones_hash;
}

"La Nación española, deseando establecer la justicia, la libertad y la seguridad y promover el bien de cuantos la integran, en uso de su soberanía, proclama su voluntad de:Garantizar la convivencia democrática dentro de la Constitución y de las leyes conforme a un orden económico y social justo. Consolidar un Estado de Derecho que asegure el imperio de la ley como expresión de la voluntad popular. Proteger a todos los españoles y pueblos de España en el ejercicio de los derechos humanos, sus culturas y tradiciones, lenguas e instituciones. Promover el progreso de la cultura y de la economía para asegurar a todos una digna calidad de vida. Establecer una sociedad democrática avanzada, y Colaborar en el fortalecimiento de unas relaciones pacíficas y de eficaz cooperación entre todos los pueblos de la Tierra. "; # Magic true value required at end of module
__END__

=head1 NAME

ES::Senado - Clase base para representar los datos del Senado español


=head1 VERSION

This document describes ES::Senado version 0.0.1


=head1 SYNOPSIS

    use ES::Senado;

    my $senadores = ES::Senado::find( { nombre => 'Juan' } );
    my $senadoras = ES::Senado::find( { genero => 'f' } );
  
  
=head1 DESCRIPTION

Basándonos en la información del Senado español
(http://www.senado.es), este módulo incluye funciones para hacer
scraping del mismo y acceder, una vez almacenada, a la información.

=head1 INTERFACE 

=head2 extrae_nombres_listado( $cadena ) 

Extrae los nombres del listado alfabético de senadores. Devuelve una lista de hashes con la estructura:
  { url => $url_ficha,
    apellidos => $apellidos,
    nombre => $nombre,
    nombramiento => $nombramiento,
    zona => $zona };

=head2 extrae_info_ficha( $cadena )

De la ficha de cada senador extrae información que no aparece en el
listado alfabético. Devuelve un array con 

    $lugar_nacimiento, $fecha_nacimiento_dia, $fecha_nacimiento_mes, 
    $fecha_nacimiento_year, $estado_civil, $descendencia, $formacion 


=head2 extrae_intervenciones( $cadena )

Extrae de la ficha de intervenciones del senador las intervenciones en
las que ha participado. Devuelve un hash con información sobre las
actividades (mociones, nombramientos) en los que ha participado y la
estructura de las mismas. Es un hash con dos claves, prologo y
secciones, cada sección, siendo única, es también un hash con clave el
nombre de sección; dentro de cada sección hay un array de
intervenciones que contiene un array de fases. Vamos, que uses
L<Data::Dumper> para ver lo que te sale, porque parece un lío.

=head1 DIAGNOSTICS

Se queja cuando a las funciones no se les pasa una cadena

=head1 CONFIGURATION AND ENVIRONMENT

Necesitas MySQL, y los módulos necesarios para instalar esto. MySQL
debe estar funcionando. 

=head1 DEPENDENCIES

Base de datos Mysql. Como usa enum, no puede usar SQLite (aunque
estaría bien tener una versión)


=head1 INCOMPATIBILITIES

Con el autoritarismo y la falta de transparencia. ¡Datos libres ya!

=head1 BUGS AND LIMITATIONS

Si cambian la web del senado, habrá que cambiarlo, claro.

Please report any bugs or feature requests to
C<bug-es-senado@rt.cpan.org>, or through the web interface at
L<http://rt.cpan.org>.


=head1 AUTHOR

JJ Merelo  C<< <jj@merelo.net> >>


=head1 LICENCE AND COPYRIGHT

Copyright (c) 2010, JJ Merelo C<< <jj@merelo.net> >>. All rights reserved.

This module is free software; you can redistribute it and/or
modify it under the same terms as Perl itself. See L<perlartistic>.


=head1 DISCLAIMER OF WARRANTY

BECAUSE THIS SOFTWARE IS LICENSED FREE OF CHARGE, THERE IS NO WARRANTY
FOR THE SOFTWARE, TO THE EXTENT PERMITTED BY APPLICABLE LAW. EXCEPT WHEN
OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES
PROVIDE THE SOFTWARE "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER
EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. THE
ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE SOFTWARE IS WITH
YOU. SHOULD THE SOFTWARE PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL
NECESSARY SERVICING, REPAIR, OR CORRECTION.

IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED TO IN WRITING
WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MAY MODIFY AND/OR
REDISTRIBUTE THE SOFTWARE AS PERMITTED BY THE ABOVE LICENCE, BE
LIABLE TO YOU FOR DAMAGES, INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL,
OR CONSEQUENTIAL DAMAGES ARISING OUT OF THE USE OR INABILITY TO USE
THE SOFTWARE (INCLUDING BUT NOT LIMITED TO LOSS OF DATA OR DATA BEING
RENDERED INACCURATE OR LOSSES SUSTAINED BY YOU OR THIRD PARTIES OR A
FAILURE OF THE SOFTWARE TO OPERATE WITH ANY OTHER SOFTWARE), EVEN IF
SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF
SUCH DAMAGES.
