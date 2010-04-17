package ES::Senado::Result::Personas;

use warnings;
use strict;
use Carp;

our $VERSION =   "0.0.1";

use base qw/DBIx::Class::Core/;

__PACKAGE__->table('personas');
# Traduciendo el diseño de la BD a Perl para que sea fácil hacer
# deploy en cualquier sitio 
__PACKAGE__->add_columns(id =>
			 { accessor  => 'id',
			   data_type => 'int unsigned',
			   is_nullable => 0,
			   is_auto_increment => 1
			 },
			 nombre =>
			 { accessor  => 'nombre',
			   data_type => 'varchar',
			   size      => 64,
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 apellidos =>
			 { accessor => 'apellidos',
			   data_type => 'varchar',
			   size      => 128,
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 grupo =>
			 { accessor => 'grupo',
			   data_type => 'varchar',
			   size      => 32,
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 origen =>
			 { accessor  => 'origen',
			   data_type => "enum( 'electo','designado') ",
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 zona =>
			 { accessor => 'zona',
			   data_type => 'varchar',
			   size      => 64,
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 partido =>
			 { accessor => 'partido',
			   data_type => 'varchar',
			   size      => 16,
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 genero =>
			 { accessor => 'genero',
			   data_type => "enum( 'f','m' )",
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 lugar_nacimiento =>
			 { accessor => 'lugar_nacimiento',
			   data_type => 'varchar',
			   size      => 64,
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 estado_civil =>
			 { accessor => 'estado_civil',
			   data_type => 'varchar',
			   size      => 64,
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 descendencia =>
			 { accessor => 'descendencia',
			   data_type => 'varchar',
			   size      => 64,
			   is_nullable => 0,
			   is_auto_increment => 0
			 },
			 fecha_nacimiento => 
			 { accessor => 'fecha_nacimiento',
			   data_type => 'date',
			   is_nullable => 0,
			   is_auto_increment => 0
			 }
			);

__PACKAGE__->set_primary_key( qw/ id / );


"La democracia se basa en el equilibrio de poderes"; # Magic true value required at end of module

__END__
