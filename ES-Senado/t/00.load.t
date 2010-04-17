use Test::More tests => 2;

BEGIN {
use_ok( 'ES::Senado' );
use_ok( 'ES::Senado::Result::Personas');
}

diag( "Testing ES::Senado $ES::Senado::VERSION" );
