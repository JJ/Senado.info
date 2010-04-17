package ES::Senado::Result::Participacion_Iniciativas;

use warnings;
use strict;
use Carp;

our $VERSION =   "0.0.1";

use base qw/DBIx::Class::Core/;

__PACKAGE__->table('participacion_iniciativas');
# Traduciendo el diseño de la BD a Perl para que sea fácil hacer
# deploy en cualquier sitio 
__PACKAGE__->add_columns(id =>
			 { accessor  => 'id',
			   data_type => 'int unsigned',
			   is_nullable => 0,
			   is_auto_increment => 1
			 },
			 iniciativa =>
			 { accessor  => 'iniciativa',
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


"La democracia se basa en el equilibrio de poderes"; # Magic true value required at end of module

__END__
