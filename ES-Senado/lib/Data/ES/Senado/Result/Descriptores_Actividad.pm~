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

=head1 NAME

ES::Senado::Result::Descriptores_Actividad - Descriptores de actividades/intervenciones en el senado, siguiendo el estándar EUROVOC

=head1 VERSION

Describe ES::Senado::Result::Descriptores_Actividad versión 0.0.1


=head1 SYNOPSIS

    use ES::Senado;
    my $dbname = 'sena2';
    my $dsn = "dbi:mysql:dbname=$dbname";
    my $schema = ES::Senado->connect($dsn);
    $schema->deploy({ add_drop_tables => 1});
    my $rs_desc = $schema->resultset('Descriptores_Actividad');

    my $tag = $rs_desc->new( { descriptor => 'haciendo cosas',
                               actividad => $actividad->url} );
    eval {
     $tag->insert;
    };

    my @tags = $rs_desc->all;
   
  
=head1 DESCRIPTION

Subclase de L<DBI::Class::Core> para manejar los descriptores (que son como tags), con
los siguientes campos


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
