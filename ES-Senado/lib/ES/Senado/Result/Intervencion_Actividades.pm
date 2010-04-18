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
			 { accessor  => 'persona_id',
			   data_type => 'int unsigned',
			   is_nullable => 0,
			 },			 
			 fecha => 
			 { accessor => 'fecha',
			   data_type => 'date',
			   is_nullable => 1,
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

=head1 NAME

ES::Senado::Result::Intervencion_Actividades - Tabla que relaciona senadores con actividades


=head1 VERSION

Describe ES::Senado::Result::Intervencion_Actividades versión 0.0.1


=head1 SYNOPSIS

    use ES::Senado;
    my $dbname = 'sena2';
    my $dsn = "dbi:mysql:dbname=$dbname";
    my $schema = ES::Senado->connect($dsn);
    $schema->deploy({ add_drop_tables => 1});
    my $rs_interv = $schema->resultset('Intervencion_Actividades');

    my $voy_palla = $rs_interv->new( $s );
    eval {
     $voy_palla->insert;
    };

    my @intervenciones = $rs_interv->all;
    my @intervenciones_de = $rs_interv->search( {persona_id => $URL} );
   
  
=head1 DESCRIPTION

Subclase de L<DBI::Class::Core> para manejar la tabla de intervenciones, con
los siguientes campos
+------------+------------------+------+-----+---------+----------------+
| Field      | Type             | Null | Key | Default | Extra          |
+------------+------------------+------+-----+---------+----------------+
| id         | int(10) unsigned | NO   | PRI | NULL    | auto_increment | 
| actividad  | text             | NO   |     | NULL    |                | 
| persona_id | int(10) unsigned | NO   |     | NULL    |                | 
| fecha      | date             | YES  |     | NULL    |                | 
| fase       | varchar(32)      | NO   |     | NULL    |                | 
+------------+------------------+------+-----+---------+----------------+

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
--
