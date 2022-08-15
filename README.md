<h2>Step by step: How to clone this project</h2>

        <p>Run <b>git clone https://github.com/nescafaye/ovrs_commuter.git on your terminal</b></p>
        <p>Go to the folder application using cd command on your cmd or terminal</p>
        <p>Run composer install on your cmd or terminal</ol>
        <p>Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal</p>
        <p>Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.</p>
        <p>Run php artisan key:generate</p>
        <p>Run php artisan migrate</p>
        <p>Go to http://localhost:8000/</p>

