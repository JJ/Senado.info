#!perl 

use strict;
use warnings;

use Test::More qw( no_plan ); #Random initial string...
use lib qw( lib ../lib ../../lib  ); #Just in case we are testing it in-place

use ES::Senado;
use YAML  qw(Load);

use DBI;

my $dbh = DBI->connect("DBI:mysql:mysql", 'jmerelo', '',
		       {'RaiseError' => 1});
my $dbname = 'sena2_test';
eval { $dbh->do("CREATE DATABASE $dbname") };
print "No se puede crear la base de datos: $@\n" if $@;

my $dsn = "dbi:mysql:dbname=$dbname";
my $schema = ES::Senado->connect($dsn);
$schema->deploy({ add_drop_tables => 1});


my @hof = Load(<<END_YAML);
---
nombre: Johnny
apellidos: Be Good
grupo: RNR
origen: designado
zona: Tennessee
partido: RNB
genero: m
---
nombre: Dolly
apellidos: Parton
grupo: CNW
origen: electo
zona: Kansas
partido: Country Forever
genero: f
END_YAML

my $rs_persona = $schema->resultset('Personas');

for my $p ( @hof ) {
  my $a_la_palestra = $rs_persona->new( $p);
  $a_la_palestra->insert;
}

my @todos_y_todas = $rs_persona->all;
for my $p ( @todos_y_todas ) {
  is( $p->nombre ne '', 1, "Nombre insertado" );
}
$rs_persona->delete_all;
@todos_y_todas = $rs_persona->all;
is( $#todos_y_todas, -1, "Borrados" );

eval { $dbh->do("DROP DATABASE $dbname") };
print "No se puede cerrar la base de datos: $@\n" if $@;
$dbh->disconnect();



