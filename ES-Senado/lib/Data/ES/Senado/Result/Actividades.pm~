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

=head1 NAME

ES::Senado::Result::Actividades - Actividades de senadores


=head1 VERSION

Describe ES::Senado::Result::Actividades versión 0.0.1


=head1 SYNOPSIS

    use ES::Senado;
    my $dbname = 'sena2';
    my $dsn = "dbi:mysql:dbname=$dbname";
    my $schema = ES::Senado->connect($dsn);
    $schema->deploy({ add_drop_tables => 1});
    my $rs_actividades = $schema->resultset('Actividades');

    my $mocion = $rs_actividades->new( $m ); #$m incluye todos los campos
                                         #de abajo
    eval {
     $mocion->insert;
    };

    my @todas_actividades = $rs_actividades->all;
    my @mociones $rs_actividades->search( { tipo => 'Pregunta oral en Pleno' } );
   
  
=head1 DESCRIPTION

Subclase de L<DBI::Class::Core> para manejar la tabla de personas, con
los siguientes campos

+--------+--------------+------+-----+---------+-------+
| Field  | Type         | Null | Key | Default | Extra |
+--------+--------------+------+-----+---------+-------+
| titulo | text         | NO   |     | NULL    |       | 
| url    | varchar(255) | NO   | PRI | NULL    |       | 
| tipo   | varchar(64)  | NO   |     | NULL    |       | 
| fecha  | date         | YES  |     | NULL    |       | 
+--------+--------------+------+-----+---------+-------+

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
