package ES::Senado::Result::Actividades;

use warnings;
use strict;
use Carp;

our $VERSION =   "0.0.1";

use base qw/DBIx::Class::Core/;

__PACKAGE__->table('actividades');
# Traduciendo el diseño de la BD a Perl para que sea fácil hacer
# deploy en cualquier sitio 
__PACKAGE__->add_columns(titulo =>
			 { accessor  => 'nombre',
			   data_type => 'text',
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 url =>
			 { accessor  => 'url',
			   data_type => 'varchar',
			   size      => 255,
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 tipo =>
			 { accessor  => 'tipo',
			   data_type => 'varchar',
			   size      => 64,
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 fecha => 
			 { accessor => 'fecha',
			   data_type => 'date',
			   is_nullable => 1,
			   is_auto_increment => 0
			 }
			);

__PACKAGE__->set_primary_key( qw/ url / );
__PACKAGE__->has_many('intervencion_actividades', 'ES::Senado::Result::Intervencion_Actividades', 'actividad');
__PACKAGE__->has_many('descriptoress_actividad', 'ES::Senado::Result::Descriptores_Actividad', 'actividad');



"El Senado se compone de un número variable de senadores, elegidos por un sistema mixto"; # Magic true value required at end of module

__END__
