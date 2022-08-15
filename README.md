<h1>Step by step: How to clone this project<h1>

    <li>
        <ol>Run <b>git clone https://github.com/nescafaye/ovrs_commuter.git on your terminal</b></ol>
        <ol>Go to the folder application using cd command on your cmd or terminal</ol>
        <ol>Run composer install on your cmd or terminal</ol>
        <ol>Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal</ol>
        <ol>Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.</ol>
        <ol>Run php artisan key:generate</ol>
        <ol>Run php artisan migrate</ol>
        <ol>Go to http://localhost:8000/</ol>
                
    </li>
