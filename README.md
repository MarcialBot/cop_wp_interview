# WordPress Interview Project

This is a WordPress project developed as part of an interview process for PHP & WordPress Software Engineer role. It implements custom post types, meta boxes, and extends the REST API to handle preschool registrations.

## Project Structure

The project has the following structure:

- `wp-content/plugins/`: Contains the custom WordPress plugin.
- `db.sql`: SQL file for importing the database.

## Prerequisites

- WordPress: Make sure you have a working WordPress installation.
- MySQL/MariaDB: Create an empty database for the project.

## Installation

1. Clone the repository:
  ```
  gh repo clone MarcialBot/cop_wp_interview
  ```
2. Import the database:
- Create a new empty database in your MySQL/MariaDB.
- Execute the following command to import the database from `db.sql`:
  ```
  mysql -u your-username -p your-database-name < db.sql
  ```
- Enter your MySQL/MariaDB password when prompted.

3. Activate the plugin:
- Copy the plugin folder `wp-content/plugins/your-plugin` to the `wp-content/plugins/` directory of your WordPress installation.
- Log in to your WordPress admin dashboard and go to "Plugins" > "Installed Plugins".
- Find your plugin and click "Activate" to activate it.

## Usage

- The custom post type "Preschool Registration" is now available in your WordPress admin.
- Use the provided meta boxes to fill in the details of each preschool registration.
- The REST API endpoint for preschool registrations is extended to include additional meta fields.
- You can query the REST API using parameters like `registration_time` to filter preschools based on their registration availability.

Ex. 
  ```
  http://cop-interview.local/wp-json/wp/v2/preschool-reg/?registration_start_date=2023-06-01&registration_end_date=2023-06-25&registration_start_time=00:00&registration_end_time=24:00
  ```

## License

This project is licensed under the [MIT License](LICENSE).
