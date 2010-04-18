package ES::Senado::Result::Descriptores_Actividad;

use warnings;
use strict;
use Carp;

our $VERSION =   "0.0.1";

use base qw/DBIx::Class::Core/;

__PACKAGE__->table('descriptores_actividad');
# Traduciendo el diseño de la BD a Perl para que sea fácil hacer
# deploy en cualquier sitio 
__PACKAGE__->add_columns(actividad =>
			 { accessor  => 'actividad',
			   data_type => 'text',
			   is_nullable => 0,
			 },
			 descriptor => 
			 { accessor => 'descriptor',
			   data_type => 'varchar',
			   size=> 64,
			   is_nullable => 0,
			   is_auto_increment => 0
			 }
			);

"El régimen de elección de los senadores hace del Senado una cámara de representación territorial, aunque en la actualidad se debate la idea de reformar la Constitución a fin de reafirmar este carácter; posibles soluciones serían la eliminación de las circunscripciones provinciales, la atribución a los órganos de las comunidades autónomas de la elección de la totalidad de los senadores o la unión de la condición de senador a la de miembro del Gobierno autonómico respectivo."

__END__
