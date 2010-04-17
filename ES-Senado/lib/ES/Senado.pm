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

# Module implementation here
__PACKAGE__->load_namespaces();

sub extrae_nombres_listado {
  my $string = shift || croak "Hace falta una cadena";

  my @lista_con_formato = ($string =~ m{<li>(.+?)</li>}gs);

  my @senadores;
  for my $s ( @lista_con_formato ) {
    my ( $url_ficha, $apellidos, $nombre, $nombramiento, $zona ) = ($s =~ m{'([^']+)'\)">([^,]+), ([^)]+)+ \((\w+)\)</a>\s+. (\w+) por (.+)});
    push @senadores, { url => $url_ficha,
		       apellidos => $apellidos,
		       nombre => $nombre,
		       nombramiento => $nombramiento,
		       zona => $zona };
  }
  return \@senadores;
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

=for author to fill in:
    Write a full description of the module and its features here.
    Use subsections (=head2, =head3) as appropriate.


=head1 INTERFACE 

=head2 extrae_nombres_listado( $cadena ) 

Extrae los nombres del listado alfabético de senadores. Devuelve una lista de hashes con la estructura:
  { url => $url_ficha,
    apellidos => $apellidos,
    nombre => $nombre,
    nombramiento => $nombramiento,
    zona => $zona };

=head1 DIAGNOSTICS

=for author to fill in:
    List every single error and warning message that the module can
    generate (even the ones that will "never happen"), with a full
    explanation of each problem, one or more likely causes, and any
    suggested remedies.

=over

=item C<< Error message here, perhaps with %s placeholders >>

[Description of error here]

=item C<< Another error message here >>

[Description of error here]

[Et cetera, et cetera]

=back


=head1 CONFIGURATION AND ENVIRONMENT

=for author to fill in:
    A full explanation of any configuration system(s) used by the
    module, including the names and locations of any configuration
    files, and the meaning of any environment variables or properties
    that can be set. These descriptions must also include details of any
    configuration language used.
  
ES::Senado requires no configuration files or environment variables.


=head1 DEPENDENCIES

=for author to fill in:
    A list of all the other modules that this module relies upon,
    including any restrictions on versions, and an indication whether
    the module is part of the standard Perl distribution, part of the
    module's distribution, or must be installed separately. ]

None.


=head1 INCOMPATIBILITIES

=for author to fill in:
    A list of any modules that this module cannot be used in conjunction
    with. This may be due to name conflicts in the interface, or
    competition for system or program resources, or due to internal
    limitations of Perl (for example, many modules that use source code
    filters are mutually incompatible).

None reported.


=head1 BUGS AND LIMITATIONS

=for author to fill in:
    A list of known problems with the module, together with some
    indication Whether they are likely to be fixed in an upcoming
    release. Also a list of restrictions on the features the module
    does provide: data types that cannot be handled, performance issues
    and the circumstances in which they may arise, practical
    limitations on the size of data sets, special cases that are not
    (yet) handled, etc.

No bugs have been reported.

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
