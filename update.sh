git stash --include-untracked
git reset --hard
git clean -fd
git pull

npm install
composer install -n --optimize-autoloader --no-dev

php8.2 artisan migrate
npm run build

php8.2 artisan optimize:clear
