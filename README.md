# CSE311 University Information System

1. Make sure your php got mod_rewrite enabled. You can check this easily from phpinfo(). [Note - not tested with nginx yet!]

2. Import auth_schema.sql in your database.

3. Add an .env file similar to .env.example and update with your database login.

4. Open index.php and comment out last line. Fill this up with preferred email and a strong password. 

5. Run the script once, check database table phpauth_users to see if your user was added and comment the line again in index.php. 

6. You can define custom routes on router.yaml

7. Adding route like Queries.myq1query means, it will execute method myq1query of class Queries. The file is located at inc/class.queries.php

8. Adding route like views/index means, it will display the page from views/index.html

9. You can add your new classes from index.php. Make sure your class extends the class Essential. Similar to Queries class.

9. Update site config from config.php

10. To add a table with your query and data, follow the example on class Queries, method myq1query. 

