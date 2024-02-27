# Generate the key
php artisan key:generate

# Get the current folder
folder=$(git rev-parse --show-toplevel)

# Start the server
exec php "$folder"/artisan serve --host=192.168.0.174 --port=8000 & npm run dev -- --host 192.168.0.174 --port 8888 &

trap stop_commands INT
wait
