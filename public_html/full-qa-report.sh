# mkdir -p build/phpmd && mkdir -p build/phpstan && mkdir -p build/phpcs && mkdir -p build/coverage-report;\
# 	vendor/bin/phpunit --coverage-clover ./build/phpunit-sonarqube/coverage.xml --log-junit ./build/phpunit-sonarqube/logfile.xml \
# 	--coverage-html ./build/coverage-report;\
# 	sudo phpdismod -s cli xdebug;\
# 	vendor/bin/phpmd app html phpmd.xml --reportfile build/phpmd/phpmd.html;\
# 	vendor/bin/phpcs --report=summary --report-file=./build/phpcs/phpcs_summary.txt;\
# 	vendor/bin/phpcs --report=source --report-file=./build/phpcs/phpcs_source.txt;\
# 	vendor/bin/phpcs --report=full --report-file=./build/phpcs/phpcs_full.txt;

    vendor/bin/phpunit --coverage-html reports/