<h2>Step by step: How to clone this project</h2>

1. Run <b>git clone https://github.com/nescafaye/ovrs_commuter.git</b> on your terminal
2. Go to the folder application using cd command on your cmd or terminal
3. Run **composer install** on your cmd or terminal
4. Copy .env.example file to .env on the root folder. You can type **copy .env.example .env** if using command prompt Windows or **cp .env.example .env** if using terminal Ubuntu
5. Open your .env file and change the **database name (DB_DATABASE)** to whatever you have, **username (DB_USERNAME)** and **password (DB_PASSWORD)** field correspond to your configuration.
8. Run php artisan key:generate
9. Run php artisan migrate
10. Run **npm install && npm run dev**
11. Go to http://localhost:8000/

