use Test::More tests => 5;

use lib qw( lib ../lib);

BEGIN {
use_ok( 'Data::ES::Senado' );
use_ok( 'Data::ES::Senado::Result::Personas');
use_ok( 'Data::ES::Senado::Result::Actividades');
use_ok( 'Data::ES::Senado::Result::Intervencion_Actividades');
use_ok( 'Data::ES::Senado::Result::Descriptores_Actividad');
}

diag( "Testing Data::ES::Senado $Data::ES::Senado::VERSION" );
