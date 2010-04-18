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
			 url =>
			 { accessor  => 'url',
			   data_type => 'varchar',
			   size      => 255,
			   is_nullable => 0,
			   is_auto_increment => 0
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
			 nombramiento =>
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
			   size      => 64,
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
			 fecha_nacimiento => 
			 { accessor => 'fecha_nacimiento',
			   data_type => 'date',
			   is_nullable => 0,
			   is_auto_increment => 0
			 }
			);

__PACKAGE__->set_primary_key( qw/ id / );
__PACKAGE__->has_many('intervenciones', 'ES::Senado::Result::Intervencion_Actividades', 'persona_id');



"La democracia se basa en el equilibrio de poderes"; # Magic true value required at end of module

__END__

=head1 NAME

ES::Senado::Result::Personas - Conjunto de resultados para la tabla personas, senadores en este caso


=head1 VERSION

Describe ES::Senado::Result::Personas versión 0.0.1


=head1 SYNOPSIS

    use ES::Senado;
    my $dbname = 'sena2';
    my $dsn = "dbi:mysql:dbname=$dbname";
    my $schema = ES::Senado->connect($dsn);
    $schema->deploy({ add_drop_tables => 1});
    my $rs_persona = $schema->resultset('Personas');

    my $senador_a = $rs_persona->new( $s );
    eval {
     $senador_a->insert;
    };

    my @senadores = $rs_persona->all;
   
  
=head1 DESCRIPTION

Subclase de L<DBI::Class::Core> para manejar la tabla de personas, con
los siguientes campos

+------------------+----------------------------+------+-----+---------+----------------+
| Field            | Type                       | Null | Key | Default | Extra          |
+------------------+----------------------------+------+-----+---------+----------------+
| id               | int(10) unsigned           | NO   | PRI | NULL    | auto_increment | 
| url              | varchar(255)               | NO   |     | NULL    |                | 
| nombre           | varchar(64)                | NO   |     | NULL    |                | 
| apellidos        | varchar(128)               | NO   |     | NULL    |                | 
| grupo            | varchar(32)                | NO   |     | NULL    |                | 
| nombramiento     | enum('electo','designado') | NO   |     | NULL    |                | 
| zona             | varchar(64)                | NO   |     | NULL    |                | 
| partido          | varchar(64)                | NO   |     | NULL    |                | 
| genero           | enum('f','m')              | NO   |     | NULL    |                | 
| lugar_nacimiento | varchar(64)                | NO   |     | NULL    |                | 
| estado_civil     | varchar(64)                | NO   |     | NULL    |                | 
| fecha_nacimiento | date                       | NO   |     | NULL    |                | 
+------------------+----------------------------+------+-----+---------+----------------+


=head1 INTERFACE 

Heredado de la clase base.

=head1 INCOMPATIBILITIES

Con la poca transparencia en los datos, ea.

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
