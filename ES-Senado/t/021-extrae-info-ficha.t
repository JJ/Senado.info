#!perl 

use strict;
use warnings;

use Test::More qw( no_plan ); #Random initial string...
use lib qw( lib ../lib ../../lib  ); #Just in case we are testing it in-place

use ES::Senado qw(extrae_info_ficha);
use File::Slurp qw(read_file);

my @fichas = qw(249 278 061 125 200);

for my $f (@fichas ) {
  my $source;
  if ( -r "t/$f.html" ) {
    $source = "t/$f.html";
  } else {
    $source = "$f.html";
  }

  my $ficha = read_file( $source ) || die "No puedo cargar $source por $@\n";
  my %resultado = extrae_info_ficha( $ficha);
  isnt( $resultado{'lugar_nacimiento'}, '', "Extraído lugar de nacimiento ".$resultado{'lugar_nacimiento'});
  isnt( $resultado{'partido'}, '', "Extraído partido ".$resultado{'partido'});
}


