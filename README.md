# Avalon Browser Game Engine

Avalon is a browser game engine based on the Devana project.

> For anyone interested in the original project, please visit http://devana.eu/ for more info.

## How to install

1. Make sure you have a web server (like Apache) with PHP activated, and a MySQL server.
2. Create a database and import devana.sql int the database.
  * Connection data (username and password) can be edited in the antet.php file.
3. Open your browser and go to http://localhost/devana/index.php (or the URL to your game) and you should see the homepage of the game.
4. Go to install.php and follow the instructions.
  * In the end you should get the "Map data added." message.
5. Delete the install.php and install_.php files after the installation to prevent other users from creating admin accounts.
  * Now others can register new accounts and play the game.

> Hint: the default map data is gathered from a BMP image in the old/sources folder using the devana_maps.exe application. The source code for it is lost. To use it follow the steps in the file menu, skipping step 2 which is a data consistency check that wasn't coded properly. The correct check should have made sure that no 2 bodies of water of different IDs are in contact. Since it is bugged, it does exactly the opposite.

## Credits

The original Devana engine was developed by Andrei Busuioc from http://www.devana.eu/

The iconic font used for the icons in the game were created by Daniela Howe from the RPG-Awsome project found on http://nagoshiashumari.github.io/Rpg-Awesome/
