package ES::Senado::Result::Intervencion_Actividades;

use warnings;
use strict;
use Carp;

our $VERSION =   "0.0.1";

use base qw/DBIx::Class::Core/;

__PACKAGE__->table('intervencion_actividades');
# Traduciendo el diseño de la BD a Perl para que sea fácil hacer
# deploy en cualquier sitio 
__PACKAGE__->add_columns(id =>
			 { accessor  => 'id',
			   data_type => 'int unsigned',
			   is_nullable => 0,
			   is_auto_increment => 1
			 },
			 actividad =>
			 { accessor  => 'actividad',
			   data_type => 'text',
			   is_nullable => 0,
			 },
			 persona_id =>
			 { accessor  => 'id',
			   data_type => 'int unsigned',
			   is_nullable => 0,
			 },
			 url =>
			 { accessor  => 'url',
			   data_type => 'varchar',
			   size      => 255,
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 fecha => 
			 { accessor => 'fecha',
			   data_type => 'date',
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 fase => 
			 { accessor => 'fase',
			   data_type => 'varchar',
			   size=> 32,
			   is_nullable => 0,
			   is_auto_increment => 0
			 }
			);

__PACKAGE__->set_primary_key( qw/ id / );

"El mandato de los senadores termina cuatro años después de su elección o el día de la disolución de la Cámara, que puede tener lugar conjunta o separadamente de la disolución del Congreso de los Diputados; el derecho de disolución corresponde al Rey, que lo ejerce a petición del Presidente del Gobierno y bajo la exclusiva responsabilidad de éste."; # Magic true value required at end of module

__END__
