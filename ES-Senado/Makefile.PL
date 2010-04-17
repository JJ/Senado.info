use strict;
use warnings;
use ExtUtils::MakeMaker;

WriteMakefile(
	      NAME                => 'ES::Senado',
	      AUTHOR              => 'JJ Merelo <jj@merelo.net>',
	      VERSION_FROM        => 'lib/ES/Senado.pm',
	      ABSTRACT_FROM       => 'lib/ES/Senado.pm',
	      PL_FILES            => {},
	      PREREQ_PM => {
			    'Test::More' => 0,
			    'version'    => 0,
			    'YAML' => 0,
			    'DBIx::Class' => 0
			   },
	      dist                => { COMPRESS => 'gzip -9f', SUFFIX => 'gz', },
	      clean               => { FILES => 'ES-Senado-*' },
);
