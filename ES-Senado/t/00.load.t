use Test::More tests => 5;

use lib qw( lib ../lib);

BEGIN {
use_ok( 'ES::Senado' );
use_ok( 'ES::Senado::Result::Personas');
use_ok( 'ES::Senado::Result::Actividades');
use_ok( 'ES::Senado::Result::Intervencion_Actividades');
use_ok( 'ES::Senado::Result::Descriptores_Actividad');
}

diag( "Testing ES::Senado $ES::Senado::VERSION" );
